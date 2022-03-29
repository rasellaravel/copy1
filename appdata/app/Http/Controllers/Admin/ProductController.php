<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Cart;
use App\CustomColor;
use App\Favourite;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\InnerMenu;
use App\Menu;
use App\Product;
use App\ProductImage;
use App\ProductPrice;
use App\ProductShippingCategory;
use App\ProductSize;
use App\ProductSpecification;
use App\Shipping;
use App\ShippingCategory;
use App\SubMenu;
use App\YarnColor;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function productList()
    {
        if (Session::has('pro_alt_temp_img')) {
            Session::forget('pro_alt_temp_img');
        }
        if (Session::has('pro_alt_temp_imgE')) {
            Session::forget('pro_alt_temp_imgE');
        }
        $files = glob('uploads/product/alt/temp/*'); //get all file names
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file); //delete file
            }
        }
        if (Session::has('product_img')) {
            Session::forget('product_img');
        }
        $files = glob('uploads/product/temp/*'); //get all file names
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file); //delete file
            }
        }
        $data['menus'] = Menu::get();
        $checkRole = Admin::find(auth()->user()->id);
        $data['data'] = Product::orderBy('id', 'DESC')
            ->when($checkRole->role != 1, function ($q) use ($checkRole) {
                return $q->where('vendor_id', $checkRole->id);
            })
            ->get();
        $data['colors'] = CustomColor::orderBy('id', 'DESC')->get();
        $data['yarn_colors'] = YarnColor::orderBy('id', 'DESC')->get();
        $data['shipping_categories'] = ShippingCategory::get();
        $data['m_m_n'] = 'product';
        $data['m_n'] = 'product-list';
        return view('back-end.product.product', $data);
    }
    public function insertProduct(Request $req)
    {
        $shipping = '';
        if(count($req->shipping_category_id) > 0){
            foreach($req->shipping_category_id as $id){
                $shipping = Shipping::where('vendor_id', $req->vendor_id)
                    ->where('shipping_category_id', $id)
                    ->exists();
            }
        }
       
        if (!$shipping) {
            return ["error" => "To create this product first you need to add shipping for those selected vendor and shipping category."];
        }

        $size_m = [];
        if ($req->product_size) {
            foreach ($req->product_size as $size) {
                for ($i = 0; $i < count($size['size']); $i++) {
                    if ($size['size'][$i] != 0) {
                        $size_m[$i][] = $size['size'][$i];
                    }
                }
            }
            for ($i = 0; $i < count($size_m); $i++) {
                $size_m[$i] = array_values(array_unique($size_m[$i]));
            }
        }
        $main_img = '';
        if ($req->file('main_img')) {
            $file = $req->file('main_img');
            $dimensions = ['xs' => 100, 'sm' => 300, 'md' => 600, 'lg' => 1000];
            $name = 'product_main' . time();
            $main_img = $name . '.webp';
            ImageHelper::save($file, $name, 'webp', 'uploads/product/alt/', $dimensions);
        }
        $product = new Product;
        $product->code = $req->code;
        $product->vendor_id = $req->vendor_id;
        $product->shipping_category_id = $req->shipping_category_id[0];
        $product->menu_id = $req->menu_id;
        $product->sub_menu_id = $req->sub_menu_id;
        $product->inner_menu_id = $req->inner_menu_id;
        $product->title_en = $req->title_en;
        $product->title_lt = $req->title_lt ?: $req->title_en;
        $product->title_rus = $req->title_rus ?: $req->title_en;
        $product->title_pt = $req->title_pt ?: $req->title_en;
        $product->title_es = $req->title_es ?: $req->title_en;
        $product->description_en = $req->description_en;
        $product->description_lt = $req->description_lt ?: $req->description_en;
        $product->description_rus = $req->description_rus ?: $req->description_en;
        $product->description_pt = $req->description_pt ?: $req->description_en;
        $product->description_es = $req->description_es ?: $req->description_en;
        $product->delivery_en = $req->delivery_en;
        $product->delivery_lt = $req->delivery_lt ?: $req->delivery_en;
        $product->delivery_rus = $req->delivery_rus ?: $req->delivery_en;
        $product->delivery_pt = $req->delivery_pt ?: $req->delivery_en;
        $product->delivery_es = $req->delivery_es ?: $req->delivery_en;
        $product->specification_en = $req->specification_en;
        $product->specification_lt = $req->specification_lt ?: $req->specification_en;
        $product->specification_rus = $req->specification_rus ?: $req->specification_en;
        $product->specification_pt = $req->specification_pt ?: $req->specification_en;
        $product->specification_es = $req->specification_es ?: $req->specification_en;
        $product->url_en = $req->url_en;
        $product->url_lt = $req->url_lt;
        $product->url_rus = $req->url_rus;
        $product->url_pt = $req->url_pt;
        $product->url_es = $req->url_es;
        $product->others = $req->others;
        $product->weight = $req->weight;
        if ($req->new_s) {
            $product->new_s = $req->new_s;
        }
        if ($req->is_top_product) {
            $product->is_top_product = $req->is_top_product;
        }
        if ($req->is_free_shipping) {
            $product->is_free_shipping = $req->is_free_shipping;
        }
        if ($req->is_certificate) {
            $product->is_certificate = $req->is_certificate;
        }
        $product->product_img = $main_img;
        $product->save();
        $pro_id = $product->id;

        if(count($req->shipping_category_id) > 0){
            foreach($req->shipping_category_id as $index => $id){
                if($index != 0){
                    $typeId = Shipping::where('shipping_category_id', $id)->first()->shipping_type_id;
                    $proShip = new ProductShippingCategory();
                    $proShip->product_id = $pro_id;
                    $proShip->shipping_category_id = $id;
                    $proShip->type_id = $typeId;
                    $proShip->save();
                }
            }
        }



        if ($req->sub_menu_id == null) {
            $insertSpecifications = Menu::where('id', $req->menu_id)->first();
        } elseif ($req->inner_menu_id == null) {
            $insertSpecifications = SubMenu::where('id', $req->sub_menu_id)->first();
        } else {
            $insertSpecifications = InnerMenu::where('id', $req->inner_menu_id)->first();
        }

        if (count($insertSpecifications->specifications)) {
            foreach ($insertSpecifications->specifications as $specification) {
                $product_specification = new ProductSpecification;
                $spec_name = strtolower(str_replace(' ', '_', $specification->name_en));
                $product_specification->specification_id = $specification->id;
                $product_specification->product_id = $pro_id;
                $product_specification->text_en = $req->{$spec_name . '_en'};
                $product_specification->text_lt = $req->{$spec_name . '_lt'} ?: $req->{$spec_name . '_en'};
                $product_specification->text_rus = $req->{$spec_name . '_rus'} ?: $req->{$spec_name . '_en'};
                $product_specification->text_pt = $req->{$spec_name . '_pt'} ?: $req->{$spec_name . '_en'};
                $product_specification->text_es = $req->{$spec_name . '_es'} ?: $req->{$spec_name . '_en'};
                $product_specification->save();
            }
        }

        $product_colors = new ProductSize;
        $product_colors->product_id = $pro_id;
        $product_colors->price = $req->price;
        $product_colors->save();
        if ($req->product_size) {
            foreach ($req->product_size as $size) {
                if (!in_array(0, $size['size'])) {
                    $product_colors = new ProductSize;
                    $product_colors->product_id = $pro_id;
                    if (array_key_exists('size', $size)) {
                        $product_colors->size_id = $size['size'];
                    }
                    $product_colors->price = $size['price'];
                    $product_colors->save();
                }
            }
        }

        // if($req->price) {
        $product_price = new ProductPrice;
        $product_price->pro_id = $pro_id;
        $product_price->price = $req->price;
        $product_price->discount = $req->discount;
        $product_price->custom_clasp_id = $req->custom_clasp_id;
        $product_price->custom_color_id = $req->custom_color_id;
        $product_price->yarn_color_id = $req->yarn_color_id;
        $product_price->surface_amber_id = $req->surface_amber_id;
        $product_price->size_id = json_encode($size_m);
        $product_price->save();
        // }

        if (Session::has('pro_alt_temp_img')) {
            $alt_img = Session::get('pro_alt_temp_img');
            foreach ($alt_img as $key => $img) {
                $oldPath = 'uploads/product/alt/temp/' . $img;
                $nPath = 'uploads/product/alt/' . $img;
                if (file_exists($oldPath)) {
                    $dimensions = ['sm' => 300, 'md' => 600, 'lg' => 1000];
                    $name = 'product_alt-' . $key . '-' . time();
                    $alt_img = $name . '.webp';
                    ImageHelper::save($oldPath, $name, 'webp', 'uploads/product/alt/', $dimensions);
                    unlink($oldPath);

                    Session::forget('pro_alt_temp_img');

                    $product_image = new ProductImage;
                    $product_image->pro_id = $pro_id;
                    $product_image->img = $alt_img;
                    $product_image->save();
                }
            }
        }

        $checkRole = Admin::find(auth()->user()->id);
        $products = Product::orderBy('id', 'DESC')
            ->when($checkRole->role != 1, function ($q) use ($checkRole) {
                return $q->where('vendor_id', $checkRole->id);
            })
            ->get();

        $html = view('back-end.product.product-view')->with(['data' => $products])->render();

        return $html;
    }
    public function deleteProduct(Request $req)
    {
        $product = Product::find($req->id);
        $product->productSpecifications()->delete();
        $product->productPrice()->delete();
        $product->productSizes()->delete();
        $product->slug()->delete();
        $product->views()->delete();
        $product->myView()->delete();
        Cart::where('product_id', $req->id)->delete();
        Favourite::where('product_id', $req->id)->delete();
        $product->delete();

        $checkRole = Admin::find(auth()->user()->id);
        $products = Product::orderBy('id', 'DESC')
            ->when($checkRole->role != 1, function ($q) use ($checkRole) {
                return $q->where('vendor_id', $checkRole->id);
            })
            ->get();
        $delPSCategory = ProductShippingCategory::where('product_id', $req->id)->delete();
        return $product->id;
    }
    public function getProduct(Request $req)
    {
        $data['product'] = Product::where('id', $req->id)
            ->with('productPrice.customClasps', 'productPrice.customColors', 'productPrice.yarnColors', 'productPrice.surfaceAmbers', 'productSpecifications.specification')
            ->first();
        $submenus = SubMenu::where('menu_id', $data['product']->menu_id)->get();
        $innermenus = InnerMenu::where('sub_menu_id', $data['product']->sub_menu_id)->get();
        $pro_images = ProductImage::where('pro_id', $req->id)->get();

        $data['submenu']['en'] = '<option value="">Select</option>';
        $data['submenu']['lt'] = '<option value="">Select</option>';
        $data['submenu']['rus'] = '<option value="">Select</option>';
        $data['submenu']['pt'] = '<option value="">Select</option>';
        $data['submenu']['es'] = '<option value="">Select</option>';
        foreach ($submenus as $submenu) {
            $data['submenu']['en'] .= '<option value="' . $submenu->id . '"';
            $data['submenu']['lt'] .= '<option value="' . $submenu->id . '"';
            $data['submenu']['rus'] .= '<option value="' . $submenu->id . '"';
            $data['submenu']['pt'] .= '<option value="' . $submenu->id . '"';
            $data['submenu']['es'] .= '<option value="' . $submenu->id . '"';
            if ($data['product']->sub_menu_id == $submenu->id) {
                $data['submenu']['en'] .= ' selected';
                $data['submenu']['lt'] .= ' selected';
                $data['submenu']['rus'] .= ' selected';
                $data['submenu']['pt'] .= ' selected';
                $data['submenu']['es'] .= ' selected';
            }
            $data['submenu']['en'] .= '>' . $submenu->sub_menu_en . '</option>';
            $data['submenu']['lt'] .= '>' . $submenu->sub_menu_lt . '</option>';
            $data['submenu']['rus'] .= '>' . $submenu->sub_menu_rus . '</option>';
            $data['submenu']['pt'] .= '>' . $submenu->sub_menu_pt . '</option>';
            $data['submenu']['es'] .= '>' . $submenu->sub_menu_es . '</option>';
        }
        $data['innermenu']['en'] = '<option value="">Select</option>';
        $data['innermenu']['lt'] = '<option value="">Select</option>';
        $data['innermenu']['rus'] = '<option value="">Select</option>';
        $data['innermenu']['pt'] = '<option value="">Select</option>';
        $data['innermenu']['es'] = '<option value="">Select</option>';
        foreach ($innermenus as $innermenu) {
            $data['innermenu']['en'] .= '<option value="' . $innermenu->id . '"';
            $data['innermenu']['lt'] .= '<option value="' . $innermenu->id . '"';
            $data['innermenu']['rus'] .= '<option value="' . $innermenu->id . '"';
            $data['innermenu']['pt'] .= '<option value="' . $innermenu->id . '"';
            $data['innermenu']['es'] .= '<option value="' . $innermenu->id . '"';
            if ($data['product']->inner_menu_id == $innermenu->id) {
                $data['innermenu']['en'] .= ' selected';
                $data['innermenu']['lt'] .= ' selected';
                $data['innermenu']['rus'] .= ' selected';
                $data['innermenu']['pt'] .= ' selected';
                $data['innermenu']['es'] .= ' selected';
            }
            $data['innermenu']['en'] .= '>' . $innermenu->inner_menu_en . '</option>';
            $data['innermenu']['lt'] .= '>' . $innermenu->inner_menu_lt . '</option>';
            $data['innermenu']['rus'] .= '>' . $innermenu->inner_menu_rus . '</option>';
            $data['innermenu']['pt'] .= '>' . $innermenu->inner_menu_pt . '</option>';
            $data['innermenu']['es'] .= '>' . $innermenu->inner_menu_es . '</option>';
        }

        $data['pro_color'] = '';
        $data['append_item'] = '';

        $colors = CustomColor::orderBy('id', 'DESC')->get();

        if ($data['product']->sub_menu_id == null) {
            $sizes = Menu::where('id', $data['product']->menu_id)->first();
            $id_c = "menuIdEn";
        } elseif ($data['product']->inner_menu_id == null) {
            $sizes = SubMenu::where('id', $data['product']->sub_menu_id)->first();
            $id_c = "subMenuIdEn";
        } else {
            $sizes = InnerMenu::where('id', $data['product']->inner_menu_id)->first();
            $id_c = "innerMenuIdEn";
        }
        $data['last_menu_id'] = $sizes->id;
        if (count($sizes->customSizes)) {
            $data['append_item'] = '<div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn" type="button" onclick="removeItem(event)">
                    <i class="fa fa-minus"></i>
                </button>
            </div>';
            $unique_id = uniqid();
            $cp = "cpriceE";
            foreach ($sizes->customSizes as $customSize) {
                $data['append_item'] .= '<select name="product_size[' . $unique_id . '][size][]" class="custom-select">
          <option value="0">Select an Option</option>';
                foreach ($customSize->sizes as $size) {
                    $data['append_item'] .= '<option value="' . $size->id . '">' . $size->size_en . '</option>';
                }
                $data['append_item'] .= '</select>';
            }
            $data['append_item'] .= '<input type="text" name="product_size[' . $unique_id . '][price]" value="' . number_format((float) $data['product']->productPrice->price, 2, '.', '') . '" class="cpriceE form-control" style="width: 100px;">
        <div class="input-group-append">
          <button class="btn btn-info" type="button" onclick="appendItemP(event, \'' . $id_c . '\', \'' . $cp . '\')">
            <i class="fa fa-plus"></i>
          </button>
        </div>
      </div>';
        }
        foreach ($data['product']->productSizes as $v) {
            if ($v->size_id != null) {
                $data['pro_color'] .= '<div class="input-group mb-3">';
                $n = 0;
                foreach ($sizes->customSizes as $customSize) {
                    $data['pro_color'] .= '<select name="product_size2[' . $v->id . '][size][]" class="custom-select">
                    <option value="0">Select an Option</option>';
                    foreach ($customSize->sizes as $size) {
                        if ($size->id == $v->sizes[$n]->id) {
                            $data['pro_color'] .= '<option value="' . $size->id . '" selected>' . $size->size_en . '</option>';
                        } else {
                            $data['pro_color'] .= '<option value="' . $size->id . '">' . $size->size_en . '</option>';
                        }
                    }
                    $data['pro_color'] .= '</select>';
                    $n++;
                }
                $data['pro_color'] .= '<input type="text" name="product_size2[' . $v->id . '][price]" value="' . number_format((float) $v->price, 2, '.', '') . '" class="cpricepE form-control" style="width: 100px;">
          <div class="input-group-append">
          <button class="btn btn-danger p_delete" type="button" onclick="deleteProductSize(event, ' . $v->id . ')">
          <i class="icofont icofont-delete"></i>
          </button>
          </div>
          <div class="input-group-append">
          <button class="btn btn-success p_update" type="button" onclick="updateProductSize(event, ' . $v->id . ')">
          <i class="icofont icofont-save"></i>
          </button>
          </div>
          </div>';
            }
        }

        $data['main_img'] = '<span class="pip">
    <img class="imageThumb" src="' . (($data['product']->product_img) ? asset('uploads/product/alt/sm-' . $data['product']->product_img) : asset('uploads/demo.webp')) . '">
    </span>';
        $data['main_img_path'] = asset('uploads/product/alt/sm-' . $data['product']->product_img);
        $data['alt_img'] = '';

        foreach ($pro_images as $value) {
            $data['alt_img'] .= '<span class="pip">';
            $data['alt_img'] .= '<img class="imageThumb" src="' . asset('uploads/product/alt/sm-' . $value->img) . '">';
            $data['alt_img'] .= '<br/>';
            $data['alt_img'] .= '<span class="remove-p" onclick="deleteAltImgById(event, ' . $value->id . ')">Remove</span>';
            $data['alt_img'] .= '</span>';
        }
        $data['clasp'] = '';
        $data['surfaceAmber'] = '';
        if ($data['product']->subMenu) {
            foreach ($data['product']->subMenu->customClasps as $clasp) {
                $data['clasp'] .= '<option value="' . $clasp->id . '">' . $clasp->name_en . '</option>';
            }
            foreach ($data['product']->subMenu->surfaceAmbers as $surfaceAmber) {
                $data['surfaceAmber'] .= '<option value="' . $surfaceAmber->id . '">' . $surfaceAmber->name_en . '</option>';
            }
        }
        $data['color'] = '';
        foreach ($colors as $color) {
            $data['color'] .= '<option value="' . $color->id . '">' . $color->color_en . '</option>';
        }
        $data['yarn_color'] = '';
        if ($data['product']->sub_menu_id == null) {
            $specifications = Menu::where('id', $data['product']->menu_id)->first()->specifications;
        } elseif ($data['product']->inner_menu_id == null) {
            $specifications = SubMenu::where('id', $data['product']->sub_menu_id)->first()->specifications;
        } else {
            $specifications = InnerMenu::where('id', $data['product']->inner_menu_id)->first()->specifications;
        }
        $data['specification_en'] = '';
        $data['specification_lt'] = '';
        $data['specification_rus'] = '';
        $data['specification_pt'] = '';
        $data['specification_es'] = '';
        if (count($specifications)) {
            foreach ($specifications as $specification) {
                $spec_name = strtolower(str_replace(' ', '_', $specification->name_en));
                $data['specification_en'] .= '<label class="col-form-label">' . $specification->name_en . '</label>
                    <input type="text" id="' . $spec_name . '_enEdit" name="' . $spec_name . '_en"
                        class="form-control">';
                $data['specification_lt'] .= '<label class="col-form-label">' . $specification->name_lt . '</label>
                    <input type="text" id="' . $spec_name . '_ltEdit" name="' . $spec_name . '_lt"
                        class="form-control">';
                $data['specification_rus'] .= '<label class="col-form-label">' . $specification->name_rus . '</label>
                    <input type="text" id="' . $spec_name . '_rusEdit" name="' . $spec_name . '_rus"
                        class="form-control">';
                $data['specification_pt'] .= '<label class="col-form-label">' . $specification->name_pt . '</label>
                    <input type="text" id="' . $spec_name . '_ptEdit" name="' . $spec_name . '_pt"
                        class="form-control">';
                $data['specification_es'] .= '<label class="col-form-label">' . $specification->name_es . '</label>
                    <input type="text" id="' . $spec_name . '_esEdit" name="' . $spec_name . '_es"
                        class="form-control">';
            }
        }

        $data['csCategories'] = ProductShippingCategory::where('product_id', $req->id)->get(); 

        return $data;
    }
    public function duplicateProduct(Request $req)
    {
        $data['product'] = Product::where('id', $req->id)
            ->with('productPrice.customClasps', 'productPrice.customColors', 'productPrice.yarnColors', 'productPrice.surfaceAmbers', 'productSpecifications.specification')
            ->first();
        $submenus = SubMenu::where('menu_id', $data['product']->menu_id)->get();
        $innermenus = InnerMenu::where('sub_menu_id', $data['product']->sub_menu_id)->get();

        $data['submenu']['en'] = '<option value="">Select</option>';
        $data['submenu']['lt'] = '<option value="">Select</option>';
        $data['submenu']['rus'] = '<option value="">Select</option>';
        $data['submenu']['pt'] = '<option value="">Select</option>';
        $data['submenu']['es'] = '<option value="">Select</option>';
        foreach ($submenus as $submenu) {
            $data['submenu']['en'] .= '<option value="' . $submenu->id . '"';
            $data['submenu']['lt'] .= '<option value="' . $submenu->id . '"';
            $data['submenu']['rus'] .= '<option value="' . $submenu->id . '"';
            $data['submenu']['pt'] .= '<option value="' . $submenu->id . '"';
            $data['submenu']['es'] .= '<option value="' . $submenu->id . '"';
            if ($data['product']->sub_menu_id == $submenu->id) {
                $data['submenu']['en'] .= ' selected';
                $data['submenu']['lt'] .= ' selected';
                $data['submenu']['rus'] .= ' selected';
                $data['submenu']['pt'] .= ' selected';
                $data['submenu']['es'] .= ' selected';
            }
            $data['submenu']['en'] .= '>' . $submenu->sub_menu_en . '</option>';
            $data['submenu']['lt'] .= '>' . $submenu->sub_menu_lt . '</option>';
            $data['submenu']['rus'] .= '>' . $submenu->sub_menu_rus . '</option>';
            $data['submenu']['pt'] .= '>' . $submenu->sub_menu_pt . '</option>';
            $data['submenu']['es'] .= '>' . $submenu->sub_menu_es . '</option>';
        }
        $data['innermenu']['en'] = '<option value="">Select</option>';
        $data['innermenu']['lt'] = '<option value="">Select</option>';
        $data['innermenu']['rus'] = '<option value="">Select</option>';
        $data['innermenu']['pt'] = '<option value="">Select</option>';
        $data['innermenu']['es'] = '<option value="">Select</option>';
        foreach ($innermenus as $innermenu) {
            $data['innermenu']['en'] .= '<option value="' . $innermenu->id . '"';
            $data['innermenu']['lt'] .= '<option value="' . $innermenu->id . '"';
            $data['innermenu']['rus'] .= '<option value="' . $innermenu->id . '"';
            $data['innermenu']['pt'] .= '<option value="' . $innermenu->id . '"';
            $data['innermenu']['es'] .= '<option value="' . $innermenu->id . '"';
            if ($data['product']->inner_menu_id == $innermenu->id) {
                $data['innermenu']['en'] .= ' selected';
                $data['innermenu']['lt'] .= ' selected';
                $data['innermenu']['rus'] .= ' selected';
                $data['innermenu']['pt'] .= ' selected';
                $data['innermenu']['es'] .= ' selected';
            }
            $data['innermenu']['en'] .= '>' . $innermenu->inner_menu_en . '</option>';
            $data['innermenu']['lt'] .= '>' . $innermenu->inner_menu_lt . '</option>';
            $data['innermenu']['rus'] .= '>' . $innermenu->inner_menu_rus . '</option>';
            $data['innermenu']['pt'] .= '>' . $innermenu->inner_menu_pt . '</option>';
            $data['innermenu']['es'] .= '>' . $innermenu->inner_menu_es . '</option>';
        }

        $data['append_item'] = '';
        $colors = CustomColor::orderBy('id', 'DESC')->get();
        if ($data['product']->sub_menu_id == null) {
            $sizes = Menu::where('id', $data['product']->menu_id)->first();
            $id_c = "menu_id_en";
        } elseif ($data['product']->inner_menu_id == null) {
            $sizes = SubMenu::where('id', $data['product']->sub_menu_id)->first();
            $id_c = "sub_menu_id_en";
        } else {
            $sizes = InnerMenu::where('id', $data['product']->inner_menu_id)->first();
            $id_c = "inner_menu_id_en";
        }
        $data['last_menu_id'] = $sizes->id;

        if (count($sizes->customSizes)) {
            $data['append_item_show'] = 1;
            if (count($data['product']->productSizes) - 1) {
                foreach ($data['product']->productSizes as $v) {
                    $unique_id = uniqid();
                    $cp = "cprice";
                    if ($v->size_id != null) {
                        $data['append_item'] .= '<div class="input-group mb-3">' .
                            '<div class="input-group-prepend">' .
                            '<button class="btn" type="button" onclick="removeItem(event)">' .
                            '<i class="fa fa-minus"></i>' .
                            '</button>' .
                            '</div>';
                        $n = 0;
                        foreach ($sizes->customSizes as $customSize) {
                            $data['append_item'] .= '<select id="color_en" name="product_size[' . $unique_id . '][size][]" class="custom-select">' .
                                '<option value="0">Select an Option</option>';
                            foreach ($customSize->sizes as $size) {
                                if ($size->id == $v->sizes[$n]->id) {
                                    $data['append_item'] .= '<option value="' . $size->id . '" selected>' . $size->size_en . '</option>';
                                } else {
                                    $data['append_item'] .= '<option value="' . $size->id . '">' . $size->size_en . '</option>';
                                }
                            }
                            $data['append_item'] .= '</select>';
                            $n++;
                        }
                        $data['append_item'] .= '<input type="text" name="product_size[' . $unique_id . '][price]" value="' . number_format((float) $v->price, 2, '.', '') . '"' .
                            ' class="cpricepE form-control" style="width: 100px;">' .
                            '<div class="input-group-append">' .
                            '<button class="btn btn-info" type="button" onclick="appendItemP(event, \'' . $id_c . '\', \'' . $cp . '\')">' .
                            '<i class="fa fa-plus"></i>' .
                            '</button>' .
                            '</div>' .
                            '</div>';
                    }
                }
            } else {
                $unique_id = uniqid();
                $cp = "cprice";

                $data['append_item'] = '<div class="input-group mb-3">' .
                    '<div class="input-group-prepend">' .
                    '<button class="btn" type="button" onclick="removeItem(event)">' .
                    '<i class="fa fa-minus"></i>' .
                    '</button>' .
                    '</div>';
                foreach ($sizes->customSizes as $customSize) {
                    $data['append_item'] .= '<select name="product_size2[' . $unique_id . '][size][]" class="custom-select">' .
                        '<option value="0">Select an Option</option>';
                    foreach ($customSize->sizes as $size) {
                        $data['append_item'] .= '<option value="' . $size->id . '">' . $size->size_en . '</option>';
                    }
                    $data['append_item'] .= '</select>';
                }
                $data['append_item'] .= '<input type="text" name="product_size2[' . $unique_id . '][price]" value="' . number_format((float) $data['product']->productPrice->price, 2, '.', '') .
                    '" class="cpriceE form-control" style="width: 100px;">' .
                    '<div class="input-group-append">' .
                    '<button class="btn btn-info" type="button" onclick="appendItemP(event, \'' . $id_c . '\', \'' . $cp . '\')">' .
                    '<i class="fa fa-plus"></i>' .
                    '</button>' .
                    '</div>' .
                    '</div>';
            }
        } else {
            $data['append_item_show'] = 0;
        }

        $data['clasp'] = '';
        $data['surfaceAmber'] = '';
        if ($data['product']->subMenu) {
            foreach ($data['product']->subMenu->customClasps as $clasp) {
                $data['clasp'] .= '<option value="' . $clasp->id . '">' . $clasp->name_en . '</option>';
            }
            foreach ($data['product']->subMenu->surfaceAmbers as $surfaceAmber) {
                $data['surfaceAmber'] .= '<option value="' . $surfaceAmber->id . '">' . $surfaceAmber->name_en . '</option>';
            }
        }
        $data['color'] = '';
        foreach ($colors as $color) {
            $data['color'] .= '<option value="' . $color->id . '">' . $color->color_en . '</option>';
        }
        $data['yarn_color'] = '';

        if ($data['product']->sub_menu_id == null) {
            $specifications = Menu::where('id', $data['product']->menu_id)->first()->specifications;
        } elseif ($data['product']->inner_menu_id == null) {
            $specifications = SubMenu::where('id', $data['product']->sub_menu_id)->first()->specifications;
        } else {
            $specifications = InnerMenu::where('id', $data['product']->inner_menu_id)->first()->specifications;
        }

        $data['specification_en'] = '';
        $data['specification_lt'] = '';
        $data['specification_rus'] = '';
        $data['specification_pt'] = '';
        $data['specification_es'] = '';
        if (count($specifications)) {
            foreach ($specifications as $specification) {
                $spec_name = strtolower(str_replace(' ', '_', $specification->name_en));
                $data['specification_en'] .= '<div class="col-sm-6">
                    <label class="col-form-label">' . $specification->name_en . '</label>
                    <input type="text" id="' . $spec_name . '_en" name="' . $spec_name . '_en"
                        class="form-control">
                </div>';
                $data['specification_lt'] .= '<div class="col-sm-6">
                    <label class="col-form-label">' . $specification->name_lt . '</label>
                    <input type="text" id="' . $spec_name . '_lt" name="' . $spec_name . '_lt"
                        class="form-control">
                </div>';
                $data['specification_rus'] .= '<div class="col-sm-6">
                    <label class="col-form-label">' . $specification->name_rus . '</label>
                    <input type="text" id="' . $spec_name . '_rus" name="' . $spec_name . '_rus"
                        class="form-control">
                </div>';
                $data['specification_pt'] .= '<div class="col-sm-6">
                    <label class="col-form-label">' . $specification->name_pt . '</label>
                    <input type="text" id="' . $spec_name . '_pt" name="' . $spec_name . '_pt"
                        class="form-control">
                </div>';
                $data['specification_es'] .= '<div class="col-sm-6">
                    <label class="col-form-label">' . $specification->name_es . '</label>
                    <input type="text" id="' . $spec_name . '_es" name="' . $spec_name . '_es"
                        class="form-control">
                </div>';
            }
        }

        $data['csCategories'] = ProductShippingCategory::where('product_id', $req->id)->get(); 
        return $data;
    }
    public function updateProduct(Request $req)
    {
        
        $shipping = '';
        if(count($req->shipping_category_id) > 0){
            foreach($req->shipping_category_id as $id){
                $shipping = Shipping::where('vendor_id', $req->vendor_id)
                    ->where('shipping_category_id', $id)
                    ->exists();
            }
        }

        if (!$shipping) {
            return ["error" => "To Update this product first you need to add shipping for those selected vendor and shipping category."];
        }

        $product = Product::find($req->id);
        if ($req->main_img) {
            $img = $product->product_img;
            $dimensions = ['xs' => 100, 'sm' => 300, 'md' => 600, 'lg' => 1000];
            foreach ($dimensions as $key => $value) {
                $path = 'uploads/product/alt/' . $key . '-' . $img;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $file = $req->file('main_img');
            $name = 'product_main' . time();
            $main_img = $name . '.webp';
            ImageHelper::save($file, $name, 'webp', 'uploads/product/alt/', $dimensions);
        }
        $oldprice = $product->productPrice->price;
        $product->code = $req->code;
        $product->vendor_id = $req->vendor_id;
        $product->shipping_category_id = $req->shipping_category_id[0];
        $product->menu_id = $req->menu_id;
        $menuM = $product->menu_id;
        $subM = $product->sub_menu_id;
        $innerM = $product->inner_menu_id;
        $product->sub_menu_id = $req->sub_menu_id;
        $product->inner_menu_id = $req->inner_menu_id;
        $product->title_en = $req->title_en;
        $product->title_lt = $req->title_lt ?: $req->title_en;
        $product->title_rus = $req->title_rus ?: $req->title_en;
        $product->title_pt = $req->title_pt ?: $req->title_en;
        $product->title_es = $req->title_es ?: $req->title_en;
        $product->description_en = $req->description_en;
        $product->description_lt = $req->description_lt ?: $req->description_en;
        $product->description_rus = $req->description_rus ?: $req->description_en;
        $product->description_pt = $req->description_pt ?: $req->description_en;
        $product->description_es = $req->description_es ?: $req->description_en;
        $product->delivery_en = $req->delivery_en;
        $product->delivery_lt = $req->delivery_lt ?: $req->delivery_en;
        $product->delivery_rus = $req->delivery_rus ?: $req->delivery_en;
        $product->delivery_pt = $req->delivery_pt ?: $req->delivery_en;
        $product->delivery_es = $req->delivery_es ?: $req->delivery_en;
        $product->specification_en = $req->specification_en;
        $product->specification_lt = $req->specification_lt ?: $req->specification_en;
        $product->specification_rus = $req->specification_rus ?: $req->specification_en;
        $product->specification_pt = $req->specification_pt ?: $req->specification_en;
        $product->specification_es = $req->specification_es ?: $req->specification_en;
        $product->url_en = $req->url_en;
        $product->url_lt = $req->url_lt;
        $product->url_rus = $req->url_rus;
        $product->url_pt = $req->url_pt;
        $product->url_es = $req->url_es;
        $product->weight = $req->weight;
        if (@$main_img) {
            $product->product_img = $main_img;
        }
        if ($req->new_s) {
            $product->new_s = $req->new_s;
        } else {
            $product->new_s = 0;
        }
        if (@$req->is_stock) {
            $product->is_stock = $req->is_stock;
        } else {
            $product->is_stock = 0;
        }
        if (@$req->is_top_product) {
            $product->is_top_product = $req->is_top_product;
        } else {
            $product->is_top_product = 0;
        }
        if (@$req->is_free_shipping) {
            $product->is_free_shipping = $req->is_free_shipping;
        } else {
            $product->is_free_shipping = 0;
        }
        if (@$req->is_certificate) {
            $product->is_certificate = $req->is_certificate;
        } else {
            $product->is_certificate = 0;
        }
        $product->save();

        $delPSCategory = ProductShippingCategory::where('product_id', $req->id)->delete();
        if(count($req->shipping_category_id) > 0){
            foreach($req->shipping_category_id as $index => $id){
                if($index != 0){
                    $typeId = Shipping::where('shipping_category_id', $id)->first()->shipping_type_id;
                    $proShip = new ProductShippingCategory();
                    $proShip->product_id = $req->id;
                    $proShip->shipping_category_id = $id;
                    $proShip->type_id = $typeId;
                    $proShip->save();
                }
            }
        }

        ProductSpecification::where('product_id', $req->id)->delete();
        if ($req->sub_menu_id == null) {
            $menu_specifications = Menu::where('id', $req->menu_id)->first();
        } elseif ($req->inner_menu_id == null) {
            $menu_specifications = SubMenu::where('id', $req->sub_menu_id)->first();
        } else {
            $menu_specifications = InnerMenu::where('id', $req->inner_menu_id)->first();
        }

        if (count($menu_specifications->specifications)) {
            foreach ($menu_specifications->specifications as $specification) {
                $product_specification = new ProductSpecification;
                $spec_name = strtolower(str_replace(' ', '_', $specification->name_en));
                $product_specification->specification_id = $specification->id;
                $product_specification->product_id = $req->id;
                $product_specification->text_en = $req->{$spec_name . '_en'};
                $product_specification->text_lt = $req->{$spec_name . '_lt'} ?: $req->{$spec_name . '_en'};
                $product_specification->text_rus = $req->{$spec_name . '_rus'} ?: $req->{$spec_name . '_en'};
                $product_specification->text_pt = $req->{$spec_name . '_pt'} ?: $req->{$spec_name . '_en'};
                $product_specification->text_es = $req->{$spec_name . '_es'} ?: $req->{$spec_name . '_en'};
                $product_specification->save();
            }
        }

        if ($menuM != $req->menu_id || $subM != $req->sub_menu_id || $innerM != $req->inner_menu_id) {
            ProductSize::where('product_id', $req->id)->whereNotNull('size_id')->delete();
        }
        if ($oldprice != $req->price) {
            $cpid = ProductSize::where('product_id', $req->id)->where('price', $oldprice)->pluck('id');
            ProductSize::whereIn('id', $cpid)->update([
                'price' => $req->price,
            ]);
        }
        if ($req->product_size) {
            foreach ($req->product_size as $size) {
                if (!in_array(0, $size['size'])) {
                    $product_colors = new ProductSize;
                    $product_colors->product_id = $req->id;
                    if (array_key_exists('size', $size)) {
                        $product_colors->size_id = $size['size'];
                    }
                    $product_colors->price = $size['price'];
                    $product_colors->save();
                }
            }
        }

        $product_size_g = ProductSize::where('product_id', $req->id)->whereNotNull('size_id')->get();
        $size_t = [];
        $size_m = [];
        for ($i = 0; $i < $product_size_g->count(); $i++) {
            $size_t[$i] = $product_size_g[$i]->size_id;
        }
        foreach ($size_t as $size) {
            for ($i = 0; $i < count($size); $i++) {
                $size_m[$i][] = $size[$i];
            }
        }
        for ($i = 0; $i < count($size_m); $i++) {
            $size_m[$i] = array_values(array_unique($size_m[$i]));
        }

        $check = ProductPrice::where('pro_id', $req->id)->exists();

        if ($check) {
            $product_price = ProductPrice::where('pro_id', $req->id)->update([
                'price' => $req->price,
                'discount' => $req->discount,
                'custom_clasp_id' => $req->custom_clasp_id,
                'custom_color_id' => $req->custom_color_id,
                'yarn_color_id' => $req->yarn_color_id,
                'surface_amber_id' => $req->surface_amber_id,
                'size_id' => json_encode($size_m),
            ]);
        } else {
            $product_price = new ProductPrice;
            $product_price->pro_id = $req->id;
            $product_price->price = $req->price;
            $product_price->custom_clasp_id = $req->custom_clasp_id;
            $product_price->custom_color_id = $req->custom_color_id;
            $product_price->surface_amber_id = $req->surface_amber_id;
            $product_price->size_id = json_encode($size_m);
            $product_price->save();
        }

        if (Session::has('pro_alt_temp_imgE')) {
            $alt_img = Session::get('pro_alt_temp_imgE');
            foreach ($alt_img as $key => $img) {
                $oldPath = 'uploads/product/alt/temp/' . $img;
                $nPath = 'uploads/product/alt/' . $img;
                if (file_exists($oldPath)) {
                    $dimensions = ['sm' => 300, 'md' => 600, 'lg' => 1000];
                    $name = 'product_alt-' . $key . '-' . time();
                    $alt_img = $name . '.webp';
                    ImageHelper::save($oldPath, $name, 'webp', 'uploads/product/alt/', $dimensions);
                    unlink($oldPath);

                    Session::forget('pro_alt_temp_imgE');

                    $product_image = new ProductImage;
                    $product_image->pro_id = $req->id;
                    $product_image->img = $alt_img;
                    $product_image->save();
                }
            }
        }

        $checkRole = Admin::find(auth()->user()->id);
        $products = Product::orderBy('id', 'DESC')
            ->when($checkRole->role != 1, function ($q) use ($checkRole) {
                return $q->where('vendor_id', $checkRole->id);
            })
            ->get();

        $html = view('back-end.product.product-view')->with(['data' => $products])->render();

        return $html;
    }
    public function altTempPimgUp(Request $req)
    {
        // return $req->TotalImages;
        for ($i = 0; $i < $req->TotalImages; $i++) {
            $file = $req->file('images' . $i);
            $name = 'alt_pro_' . time() . $i . '.' . $file->getClientOriginalExtension();

            if (Session::has($req->ssn_id)) {
                $img = Session::get($req->ssn_id);
                array_push($img, $name);
                Session::put($req->ssn_id, $img);
            } else {
                $img[] = $name;
                Session::put($req->ssn_id, $img);
            }
            Image::make($file)->orientate()->save('uploads/product/alt/temp/' . $name);
        }

        $image = Session::get($req->ssn_id);
        $html = '';
        if ($req->pro_id) {
            $pro_images = ProductImage::where('pro_id', $req->pro_id)->get();
            foreach ($pro_images as $value) {
                $html .= '<span class="pip">';
                $html .= '<img class="imageThumb" src="' . asset('uploads/product/alt/sm-' . $value->img) . '">';
                $html .= '<br/>';
                $html .= '<span class="remove-p" onclick="deleteAltImgById(event, ' . $value->id . ')">Remove</span>';
                $html .= '</span>';
            }
        }
        foreach ($image as $value) {
            $html .= '<span class="pip">';
            $html .= '<img class="imageThumb" src="' . asset('uploads/product/alt/temp/' . $value) . '">';
            $html .= '<br/>';
            $html .= '<span class="remove" id="' . $value . '" onclick="deleteAltImg(event, \'' . $req->ssn_id . '\')">Remove</span>';
            $html .= '</span>';
        }
        return $html;
    }
    public function altTempPimgRemove(Request $req)
    {
        $all_img = Session::get($req->ssn_id);
        $image_name = $req->img_name;

        if (in_array($image_name, $all_img)) {
            $pos = array_search($image_name, $all_img);
            unset($all_img[$pos]);
            Session::put($req->ssn_id, $all_img);
            $path = 'uploads/product/alt/temp/' . $image_name;
            if (file_exists($path)) {
                unlink($path);
            }
            // print_r($all_img);
        }
    }
    public function updateProductPrice(Request $req)
    {
        $pro_price = ProductPrice::find($req->id);
        $pro_price->size = $req->size;
        $pro_price->price = $req->price;
        $pro_price->save();
    }
    public function deleteProductPrice(Request $req)
    {
        $pro_price = ProductPrice::find($req->id)->delete();
    }
    public function deleteAltImgById(Request $req)
    {
        $pro_img = ProductImage::find($req->id)->delete();
    }
    public function addProductTmpMainImg(Request $request)
    {
        $file = $request->file('avatar');
        if (Session::has('product_img')) {
            $name = Session::get('product_img');
        } else {
            $name = 'product_main' . time() . '.webp';
        }
        Session::put('product_img', $name);
        Image::make($file)->encode('webp', 50)->save('uploads/product/alt/' . $name);
        $image = Session::get('product_img');
        $html = '';
        $html .= '<span class="pip">';
        $html .= '<img class="imageThumb" src="' . asset('uploads/product/alt/' . $image) . '">';
        $html .= '<br/>';
        $html .= '<span class="remove" id="' . $image . '">✖</span>';
        return $html;
    }
    public function removeProductTmpMainImg(Request $request)
    {
        $image_name = $request->img_name;
        Session::forget('product_img');
        $path = $path = 'uploads/product/temp/' . $image_name;
        if (file_exists($path)) {
            unlink($path);
        }
    }
    public function updateProductTmpMainImg(Request $request)
    {
        $file = $request->file('avatar');
        $product = Product::find($request->id);
        $main_img = 'product_main' . time() . '.webp';

        Image::make($file)->encode('webp', 50)->save('uploads/product/alt/' . $main_img);

        list($width, $height) = getimagesize($npath);
        Image::make($file)->resize($width, $height)->encode('webp', 50)->save('uploads/product/alt/r_' . $main_img);

        $product->product_img = $main_img;
        $product->save();
        $html = '';
        $html .= '<span class="pip">';
        $html .= '<img class="imageThumb" src="' . asset($npath) . '">';
        $html .= '</span>';
        return $html;
    }
    public function updateProductSizeSingle(Request $request)
    {
        $product_size = ProductSize::find($request->id);
        $product_id = $product_size->product_id;
        $product_size->size_id = $request->sizes;
        $product_size->price = $request->price;
        $product_size->save();

        $product_size_g = ProductSize::where('product_id', $product_id)->whereNotNull('size_id')->get();
        $size_t = [];
        $size_m = [];
        for ($i = 0; $i < $product_size_g->count(); $i++) {
            $size_t[$i] = $product_size_g[$i]->size_id;
        }
        foreach ($size_t as $size) {
            for ($i = 0; $i < count($size); $i++) {
                $size_m[$i][] = $size[$i];
            }
        }
        for ($i = 0; $i < count($size_m); $i++) {
            $size_m[$i] = array_values(array_unique($size_m[$i]));
        }
        ProductPrice::where('pro_id', $product_id)->update([
            "size_id" => json_encode($size_m),
        ]);
    }
    public function deleteProductSizeSingle(Request $request)
    {
        $product_size = ProductSize::find($request->id);
        $product_id = $product_size->product_id;
        $product_size->delete();
        $product_size_g = ProductSize::where('product_id', $product_id)->get();
        $size_t = [];
        $size_m = [];
        for ($i = 0; $i < $product_size_g->count(); $i++) {
            $size_t[$i] = $product_size_g[$i]->size_id;
        }
        foreach ($size_t as $size) {
            for ($i = 0; $i < count($size); $i++) {
                $size_m[$i][] = $size[$i];
            }
        }
        for ($i = 0; $i < count($size_m); $i++) {
            $size_m[$i] = array_values(array_unique($size_m[$i]));
        }
        ProductPrice::where('pro_id', $product_id)->update([
            "size_id" => json_encode($size_m),
        ]);
    }
}
