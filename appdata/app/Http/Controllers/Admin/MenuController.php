<?php

namespace App\Http\Controllers\Admin;

use App\CustomSize;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\InnerMenu;
use App\Menu;
use App\Product;
use App\Services\CustomSizeFilterService;
use App\Specification;
use App\SubMenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function menuList()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = Menu::orderBy('id', 'DESC')->with('menuInfo')->get();
        $data['cusotm_sizes'] = CustomSize::all();
        $data['specifications'] = Specification::all();

        $data['m_n'] = 'menu-list';
        $data['m_m_n'] = 'menu';
        return view('back-end.menu.menu-list', $data);
    }
    public function insertMenu(Request $req)
    {
        $img = '';
        $icon = '';
        if ($req->img) {
            $file = $req->file('img');
            $dimensions = ['xs' => 100, 'sm' => 300];
            $name = 'menu' . time();
            $img = $name . '.webp';
            ImageHelper::save($file, $name, 'webp', 'uploads/menus/', $dimensions);
        }
        if ($req->icon) {
            $file = $req->file('icon');
            $icon = 'menu-icon' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/menus/', $icon);
        }

        $menu = new Menu;
        $menu->menu_en = $req->menu_en;
        $menu->menu_lt = $req->menu_lt ?: $req->menu_en;
        $menu->menu_rus = $req->menu_rus ?: $req->menu_en;
        $menu->menu_pt = $req->menu_pt ?: $req->menu_en;
        $menu->menu_es = $req->menu_es ?: $req->menu_en;
        $menu->url_en = $req->url_en;
        $menu->url_lt = $req->url_lt;
        $menu->url_rus = $req->url_rus;
        $menu->url_pt = $req->url_pt;
        $menu->url_es = $req->url_es;
        $menu->custom_size_id = $req->custom_size_id;
        $menu->custom_clasp_id = $req->custom_clasp_id;
        $menu->surface_amber_id = $req->surface_amber_id;
        $menu->specification_id = $req->specification_id;
        $menu->save();

        $menu->menuInfo()->create([
            'description_en' => $req->description_en,
            'description_lt' => $req->description_lt ?: $req->description_en,
            'description_rus' => $req->description_rus ?: $req->description_en,
            'description_pt' => $req->description_pt ?: $req->description_en,
            'description_es' => $req->description_es ?: $req->description_en,
            'img' => $img,
            'icon' => $icon,
        ]);

        $menus = Menu::orderBy('id', 'DESC')->with('menuInfo')->get();

        $html = view('back-end.menu.menu-view')->with(['data' => $menus])->render();

        return $html;
    }
    public function deleteMenu(Request $req)
    {
        $menu = Menu::find($req->id);
        $products = Product::where('menu_id', $req->id)->exists();

        if ($products) {
            return ["error" => "This menu attached with multiple product. You can't delete this menu."];
        }

        if ($menu->menuInfo->img) {
            $dimensions = ['xs' => 100, 'sm' => 300];
            foreach ($dimensions as $key => $value) {
                $path = 'uploads/menus/' . $key . '-' . $menu->menuInfo->img;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        if ($menu->menuInfo->icon) {
            $path = 'uploads/menus/' . $menu->menuInfo->icon;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $menu->menuInfo()->delete();
        // $menu->slugs()->first()->delete();
        SubMenu::where('menu_id', $req->id)->delete();
        InnerMenu::where('menu_id', $req->id)->delete();
        $menu->delete();

        $menus = Menu::orderBy('id', 'DESC')->with('menuInfo')->get();

        $html = view('back-end.menu.menu-view')->with(['data' => $menus])->render();

        return $html;
    }
    public function getMenu(Request $req)
    {
        $data['menu'] = Menu::find($req->id);
        $data['selected_size'] = [];
        if ($data['menu']) {
            foreach ($data['menu']->customSizes as $size) {
                $data['selected_size'][] = $size->id;
            }
        }
        $data['specification'] = [];
        if ($data['menu']) {
            foreach ($data['menu']->specifications as $specification) {
                $data['specification'][] = $specification->id;
            }
        }
        $data['img'] = '<span class="pip">
		<img class="imageThumb" src="' . (($data['menu']->menuInfo->img) ? asset('uploads/menus/xs-' . $data['menu']->menuInfo->img) : asset('uploads/demo.webp')) . '">
		</span>';
        $data['icon'] = '<span class="pip">
		<img class="imageThumb" src="' . (($data['menu']->menuInfo->icon) ? asset('uploads/menus/' . $data['menu']->menuInfo->icon) : asset('uploads/demo.webp')) . '" style="min-width: 45px">
		</span>';

        return $data;
    }
    public function updateMenu(Request $req)
    {
        $menu = Menu::find($req->id);

        if ($req->img) {
            $dimensions = ['xs' => 100, 'sm' => 300];
            if ($menu->menuInfo->img) {
                foreach ($dimensions as $key => $value) {
                    $path = 'uploads/menus/' . $key . '-' . $menu->menuInfo->img;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
            $file = $req->file('img');
            $name = 'menu' . time();
            $img = $name . '.webp';
            ImageHelper::save($file, $name, 'webp', 'uploads/menus/', $dimensions);

        } else {
            $img = $menu->menuInfo->img;
        }
        if ($req->icon) {
            if ($menu->menuInfo->icon) {
                $path = 'uploads/menus/' . $menu->menuInfo->icon;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $file = $req->file('icon');
            $icon = 'menu-icon' . time() . '.' . $file->getClientOriginalExtension();

            $file->move('uploads/menus/', $icon);
        } else {
            $icon = $menu->menuInfo->icon;
        }

        $menu->menu_en = $req->menu_en;
        $menu->menu_lt = $req->menu_lt ?: $req->menu_en;
        $menu->menu_rus = $req->menu_rus ?: $req->menu_en;
        $menu->menu_pt = $req->menu_pt ?: $req->menu_en;
        $menu->menu_es = $req->menu_es ?: $req->menu_en;
        $menu->url_en = $req->url_en;
        $menu->url_lt = $req->url_lt;
        $menu->url_rus = $req->url_rus;
        $menu->url_pt = $req->url_pt;
        $menu->url_es = $req->url_es;
        $menu->custom_size_id = $req->custom_size_id;
        $menu->custom_clasp_id = $req->custom_clasp_id;
        $menu->surface_amber_id = $req->surface_amber_id;
        $menu->specification_id = $req->specification_id;
        $menu->save();
        $menu->menuInfo()->update([
            'description_en' => $req->description_en,
            'description_lt' => $req->description_lt ?: $req->description_en,
            'description_rus' => $req->description_rus ?: $req->description_en,
            'description_pt' => $req->description_pt ?: $req->description_en,
            'description_es' => $req->description_es ?: $req->description_en,
            'img' => $img,
            'icon' => $icon,
        ]);

        $menus = Menu::orderBy('id', 'DESC')->with('menuInfo')->get();

        $html = view('back-end.menu.menu-view')->with(['data' => $menus])->render();

        return $html;
    }
    public function subMenuList()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = SubMenu::orderBy('id', 'DESC')->with('menu', 'subMenuInfo')->get();
        $data['menus'] = Menu::get();
        // dd($menu);
        $data['m_n'] = 'sub-menu-list';
        $data['m_m_n'] = 'menu';
        return view('back-end.menu.sub-menu-list', $data);
    }
    public function insertSubMenu(Request $req)
    {
        $img = '';
        if ($req->img) {
            $file = $req->file('img');
            $dimensions = ['xs' => 100, 'sm' => 300];
            $name = 'sub-menu' . time();
            $img = $name . '.webp';
            ImageHelper::save($file, $name, 'webp', 'uploads/sub_menus/', $dimensions);
        }

        $sub_menu = new SubMenu;
        $sub_menu->menu_id = $req->menu_id;
        $sub_menu->sub_menu_en = $req->sub_menu_en;
        $sub_menu->sub_menu_lt = $req->sub_menu_lt ?: $req->sub_menu_en;
        $sub_menu->sub_menu_rus = $req->sub_menu_rus ?: $req->sub_menu_en;
        $sub_menu->sub_menu_pt = $req->sub_menu_pt ?: $req->sub_menu_en;
        $sub_menu->sub_menu_es = $req->sub_menu_es ?: $req->sub_menu_en;
        $sub_menu->url_en = $req->url_en;
        $sub_menu->url_lt = $req->url_lt;
        $sub_menu->url_rus = $req->url_rus;
        $sub_menu->url_pt = $req->url_pt;
        $sub_menu->url_es = $req->url_es;
        $sub_menu->custom_size_id = $req->custom_size_id;
        $sub_menu->custom_clasp_id = $req->custom_clasp_id;
        $sub_menu->surface_amber_id = $req->surface_amber_id;
        $sub_menu->specification_id = $req->specification_id;
        $sub_menu->save();

        $sub_menu->subMenuInfo()->create([
            'description_en' => $req->description_en,
            'description_lt' => $req->description_lt ?: $req->description_en,
            'description_rus' => $req->description_rus ?: $req->description_en,
            'description_pt' => $req->description_pt ?: $req->description_en,
            'description_es' => $req->description_es ?: $req->description_en,
            'img' => $img,
        ]);

        $sub_menus = SubMenu::with('menu', 'subMenuInfo')->orderBy('sub_menus.id', 'DESC')->get();

        $html = view('back-end.menu.sub-menu-view')->with(['data' => $sub_menus])->render();

        return $html;
    }
    public function deleteSubMenu(Request $req)
    {
        $sub_menu = SubMenu::find($req->id);

        $products = Product::where('sub_menu_id', $req->id)->exists();

        if ($products) {
            return ["error" => "This sub menu attached with multiple product. You can't delete this sub menu."];
        }

        if ($sub_menu->subMenuInfo->img) {
            $dimensions = ['xs' => 100, 'sm' => 300];
            foreach ($dimensions as $key => $value) {
                $path = 'uploads/sub_menus/' . $key . '-' . $sub_menu->subMenuInfo->img;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        $sub_menu->subMenuInfo()->delete();
        // $sub_menu->slugs()->first()->delete();

        $inner_menus = InnerMenu::where('sub_menu_id', $req->id)->delete();
        $sub_menu->delete();

        $sub_menus = SubMenu::with('menu', 'subMenuInfo')->orderBy('sub_menus.id', 'DESC')->get();

        $html = view('back-end.menu.sub-menu-view')->with(['data' => $sub_menus])->render();

        return $html;
    }
    public function getSubMenu(Request $req)
    {
        $data['sub_menu'] = SubMenu::find($req->id);
        $data['selected_size'] = [];
        $data['selecte_option']['en'] = '';
        $data['selecte_option']['lt'] = '';
        $data['selecte_option']['rus'] = '';
        $data['selecte_option']['pt'] = '';
        $data['selecte_option']['es'] = '';

        foreach ($data['sub_menu']->customSizes as $size) {
            $data['selected_size'][] = $size->id;
        }
        if ($data['sub_menu']->menu) {
            foreach ($data['sub_menu']->menu->customSizes as $size) {
                $data['selecte_option']['en'] .= '<option value="' . $size->id . '">' . $size->name_en . '</option>';
                $data['selecte_option']['lt'] .= '<option value="' . $size->id . '">' . $size->name_lt . '</option>';
                $data['selecte_option']['rus'] .= '<option value="' . $size->id . '">' . $size->name_rus . '</option>';
                $data['selecte_option']['pt'] .= '<option value="' . $size->id . '">' . $size->name_pt . '</option>';
                $data['selecte_option']['es'] .= '<option value="' . $size->id . '">' . $size->name_es . '</option>';
            }
        }
        $data['specifications'] = [];
        $data['specification']['en'] = '';
        $data['specification']['lt'] = '';
        $data['specification']['rus'] = '';
        $data['specification']['pt'] = '';
        $data['specification']['es'] = '';
        foreach ($data['sub_menu']->specifications as $specification) {
            $data['specifications'][] = $specification->id;
        }

        if ($data['sub_menu']->menu) {
            foreach ($data['sub_menu']->menu->specifications as $specification) {
                $data['specification']['en'] .= '<option value="' . $specification->id . '">' . $specification->name_en . '</option>';
                $data['specification']['lt'] .= '<option value="' . $specification->id . '">' . $specification->name_lt . '</option>';
                $data['specification']['rus'] .= '<option value="' . $specification->id . '">' . $specification->name_rus . '</option>';
                $data['specification']['pt'] .= '<option value="' . $specification->id . '">' . $specification->name_pt . '</option>';
                $data['specification']['es'] .= '<option value="' . $specification->id . '">' . $specification->name_es . '</option>';
            }
        }
         $data['img'] = '<span class="pip">' .
         '<img class="imageThumb" src="' . (($data['sub_menu']->subMenuInfo->img) ? asset('uploads/sub_menus/xs-' . $data['sub_menu']->subMenuInfo->img) : asset('uploads/demo.webp')) . '">' .
         '</span>'; 

        return $data;
    }
    public function updateSubMenu(Request $req)
    {
        $sub_menu = SubMenu::find($req->id);

        if ($req->img) {
            $dimensions = ['xs' => 100, 'sm' => 300];
            if ($sub_menu->subMenuInfo->img) {
                foreach ($dimensions as $key => $value) {
                    $path = 'uploads/sub_menus/' . $key . '-' . $sub_menu->subMenuInfo->img;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
            $file = $req->file('img');
            $name = 'sub-menu' . time();
            $img = $name . '.webp';
            ImageHelper::save($file, $name, 'webp', 'uploads/sub_menus/', $dimensions);
        } else {
            $img = $sub_menu->subMenuInfo->img;
        }

        $sub_menu->menu_id = $req->menu_id;
        $sub_menu->sub_menu_en = $req->sub_menu_en;
        $sub_menu->sub_menu_lt = $req->sub_menu_lt ?: $req->sub_menu_en;
        $sub_menu->sub_menu_rus = $req->sub_menu_rus ?: $req->sub_menu_en;
        $sub_menu->sub_menu_pt = $req->sub_menu_pt ?: $req->sub_menu_en;
        $sub_menu->sub_menu_es = $req->sub_menu_es ?: $req->sub_menu_en;
        $sub_menu->url_en = $req->url_en;
        $sub_menu->url_lt = $req->url_lt;
        $sub_menu->url_rus = $req->url_rus;
        $sub_menu->url_pt = $req->url_pt;
        $sub_menu->url_es = $req->url_es;
        $sub_menu->custom_size_id = $req->custom_size_id;
        $sub_menu->custom_clasp_id = $req->custom_clasp_id;
        $sub_menu->surface_amber_id = $req->surface_amber_id;
        $sub_menu->specification_id = $req->specification_id;
        $sub_menu->save();
        $sub_menu->subMenuInfo()->update([
            'description_en' => $req->description_en,
            'description_lt' => $req->description_lt ?: $req->description_en,
            'description_rus' => $req->description_rus ?: $req->description_en,
            'description_pt' => $req->description_pt ?: $req->description_en,
            'description_es' => $req->description_es ?: $req->description_en,
            'img' => $img,
        ]);

        $sub_menus = SubMenu::with('menu', 'subMenuInfo')->orderBy('sub_menus.id', 'DESC')->get();

        $html = view('back-end.menu.sub-menu-view')->with(['data' => $sub_menus])->render();

        return $html;
    }
    public function innerMenuList()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = InnerMenu::orderBy('id', 'DESC')->with('menu', 'submenu', 'innerMenuInfo')->get();
        $data['menus'] = Menu::get();
        $data['sub_menus'] = SubMenu::where('menu_id', @$data['menus'][0]->id)->get();
        // dd($menu);
        $data['m_n'] = 'inner-menu-list';
        $data['m_m_n'] = 'menu';
        return view('back-end.menu.inner-menu-list', $data);
    }
    public function insertInnerMenu(Request $req)
    {
        $img = '';
        if ($req->img) {
            $file = $req->file('img');
            $dimensions = ['xs' => 100, 'sm' => 300];
            $name = 'inner-menu' . time();
            $img = $name . '.webp';
            ImageHelper::save($file, $name, 'webp', 'uploads/inner_menus/', $dimensions);
        }

        $inner_menu = new InnerMenu;
        $inner_menu->menu_id = $req->menu_id;
        $inner_menu->sub_menu_id = $req->sub_menu_id;
        $inner_menu->inner_menu_en = $req->inner_menu_en;
        $inner_menu->inner_menu_lt = $req->inner_menu_lt ?: $req->inner_menu_en;
        $inner_menu->inner_menu_rus = $req->inner_menu_rus ?: $req->inner_menu_en;
        $inner_menu->inner_menu_pt = $req->inner_menu_pt ?: $req->inner_menu_en;
        $inner_menu->inner_menu_es = $req->inner_menu_es ?: $req->inner_menu_en;
        $inner_menu->url_en = $req->url_en;
        $inner_menu->url_lt = $req->url_lt;
        $inner_menu->url_rus = $req->url_rus;
        $inner_menu->url_pt = $req->url_pt;
        $inner_menu->url_es = $req->url_es;
        $inner_menu->custom_size_id = $req->custom_size_id;
        $inner_menu->custom_clasp_id = $req->custom_clasp_id;
        $inner_menu->surface_amber_id = $req->surface_amber_id;
        $inner_menu->specification_id = $req->specification_id;
        $inner_menu->save();

        $inner_menu->innerMenuInfo()->create([
            'description_en' => $req->description_en,
            'description_lt' => $req->description_lt ?: $req->description_en,
            'description_rus' => $req->description_rus ?: $req->description_en,
            'description_pt' => $req->description_pt ?: $req->description_en,
            'description_es' => $req->description_es ?: $req->description_en,
            'img' => $img,
        ]);

        $inner_menus = InnerMenu::orderBy('id', 'DESC')->with('menu', 'submenu', 'innerMenuInfo')->get();

        $html = view('back-end.menu.inner-menu-view')->with(['data' => $inner_menus])->render();
        return $html;
    }
    public function deleteInnerMenu(Request $req)
    {
        $inner_menu = InnerMenu::find($req->id);
        $products = Product::where('inner_menu_id', $req->id)->exists();

        if ($products) {
            return ["error" => "This inner menu attached with multiple product. You can't delete this inner menu."];
        }

        if ($inner_menu->innerMenuInfo->img) {
            $dimensions = ['xs' => 100, 'sm' => 300];
            foreach ($dimensions as $key => $value) {
                $path = 'uploads/inner_menus/' . $key . '-' . $inner_menu->innerMenuInfo->img;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        $inner_menu->innerMenuInfo()->delete();
        // $inner_menu->slugs()->first()->delete();

        $inner_menu->delete();

        $inner_menus = InnerMenu::orderBy('id', 'DESC')->with('menu', 'submenu', 'innerMenuInfo')->get();

        $html = view('back-end.menu.inner-menu-view')->with(['data' => $inner_menus])->render();
        return $html;
    }
    public function getInnerMenu(Request $req)
    {
        $data['innermenu'] = InnerMenu::find($req->id);
        $data['submenu']['en'] = '';
        $data['submenu']['lt'] = '';
        $data['submenu']['rus'] = '';
        $data['submenu']['pt'] = '';
        $data['submenu']['es'] = '';
        if ($data['innermenu']->menu) {
            foreach ($data['innermenu']->menu->subMenus as $submenu) {
                $data['submenu']['en'] .= '<option value="' . $submenu->id . '" ';
                $data['submenu']['lt'] .= '<option value="' . $submenu->id . '" ';
                $data['submenu']['rus'] .= '<option value="' . $submenu->id . '" ';
                $data['submenu']['pt'] .= '<option value="' . $submenu->id . '" ';
                $data['submenu']['es'] .= '<option value="' . $submenu->id . '" ';
                if ($submenu->id == $data['innermenu']->sub_menu_id) {
                    $data['submenu']['en'] .= 'selected';
                    $data['submenu']['lt'] .= 'selected';
                    $data['submenu']['rus'] .= 'selected';
                    $data['submenu']['pt'] .= 'selected';
                    $data['submenu']['es'] .= 'selected';
                }
                $data['submenu']['en'] .= '>' . $submenu->sub_menu_en . '</option>';
                $data['submenu']['lt'] .= '>' . $submenu->sub_menu_lt . '</option>';
                $data['submenu']['rus'] .= '>' . $submenu->sub_menu_rus . '</option>';
                $data['submenu']['pt'] .= '>' . $submenu->sub_menu_rus . '</option>';
                $data['submenu']['es'] .= '>' . $submenu->sub_menu_rus . '</option>';
            }
        }
        $data['selected_size'] = [];
        $data['selecte_option']['en'] = '';
        $data['selecte_option']['lt'] = '';
        $data['selecte_option']['rus'] = '';
        $data['selecte_option']['pt'] = '';
        $data['selecte_option']['es'] = '';
        foreach ($data['innermenu']->customSizes as $size) {
            $data['selected_size'][] = $size->id;
        }
        if ($data['innermenu']->submenu) {
            foreach ($data['innermenu']->submenu->customSizes as $size) {
                $data['selecte_option']['en'] .= '<option value="' . $size->id . '">' . $size->name_en . '</option>';
                $data['selecte_option']['lt'] .= '<option value="' . $size->id . '">' . $size->name_lt . '</option>';
                $data['selecte_option']['rus'] .= '<option value="' . $size->id . '">' . $size->name_rus . '</option>';
                $data['selecte_option']['pt'] .= '<option value="' . $size->id . '">' . $size->name_pt . '</option>';
                $data['selecte_option']['es'] .= '<option value="' . $size->id . '">' . $size->name_es . '</option>';
            }
        }
        $data['specifications'] = [];
        $data['specification']['en'] = '';
        $data['specification']['lt'] = '';
        $data['specification']['rus'] = '';
        $data['specification']['pt'] = '';
        $data['specification']['es'] = '';
        foreach ($data['innermenu']->specifications as $specification) {
            $data['specifications'][] = $specification->id;
        }
        if ($data['innermenu']->submenu) {
            foreach ($data['innermenu']->submenu->specifications as $specification) {
                $data['specification']['en'] .= '<option value="' . $specification->id . '">' . $specification->name_en . '</option>';
                $data['specification']['lt'] .= '<option value="' . $specification->id . '">' . $specification->name_lt . '</option>';
                $data['specification']['rus'] .= '<option value="' . $specification->id . '">' . $specification->name_rus . '</option>';
                $data['specification']['pt'] .= '<option value="' . $specification->id . '">' . $specification->name_pt . '</option>';
                $data['specification']['es'] .= '<option value="' . $specification->id . '">' . $specification->name_es . '</option>';
            }
        }
        $data['img'] = '<span class="pip">' .
            '<img class="imageThumb" src="' . (($data['innermenu']->innerMenuInfo->img) ? asset('uploads/inner_menus/xs-' . $data['innermenu']->innerMenuInfo->img) : asset('uploads/demo.webp')) . '">' .
            '</span>';

        return $data;
    }
    public function updateInnerMenu(Request $req)
    {
        // return $req->all();
        $inner_menu = InnerMenu::find($req->id);

        if ($req->img) {
            $dimensions = ['xs' => 100, 'sm' => 300];
            if ($inner_menu->innerMenuInfo->img) {
                foreach ($dimensions as $key => $value) {
                    $path = 'uploads/inner_menus/' . $key . '-' . $inner_menu->innerMenuInfo->img;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
            $file = $req->file('img');
            $dimensions = ['xs' => 100, 'sm' => 300];
            $name = 'inner-menu' . time();
            $img = $name . '.webp';
            ImageHelper::save($file, $name, 'webp', 'uploads/inner_menus/', $dimensions);
        } else {
            $img = $inner_menu->innerMenuInfo->img;
        }

        $inner_menu->menu_id = $req->menu_id;
        $inner_menu->sub_menu_id = $req->sub_menu_id;
        $inner_menu->inner_menu_en = $req->inner_menu_en;
        $inner_menu->inner_menu_lt = $req->inner_menu_lt ?: $req->inner_menu_en;
        $inner_menu->inner_menu_rus = $req->inner_menu_rus ?: $req->inner_menu_en;
        $inner_menu->inner_menu_pt = $req->inner_menu_pt ?: $req->inner_menu_en;
        $inner_menu->inner_menu_es = $req->inner_menu_es ?: $req->inner_menu_en;
        $inner_menu->url_en = $req->url_en;
        $inner_menu->url_lt = $req->url_lt;
        $inner_menu->url_rus = $req->url_rus;
        $inner_menu->url_pt = $req->url_pt;
        $inner_menu->url_es = $req->url_es;
        $inner_menu->custom_size_id = $req->custom_size_id;
        $inner_menu->custom_clasp_id = $req->custom_clasp_id;
        $inner_menu->surface_amber_id = $req->surface_amber_id;
        $inner_menu->specification_id = $req->specification_id;

        $inner_menu->save();
        $inner_menu->innerMenuInfo()->update([
            'description_en' => $req->description_en,
            'description_lt' => $req->description_lt ?: $req->description_en,
            'description_rus' => $req->description_rus ?: $req->description_en,
            'description_pt' => $req->description_pt ?: $req->description_en,
            'description_es' => $req->description_es ?: $req->description_en,
            'img' => $img,
        ]);

        $inner_menus = InnerMenu::orderBy('id', 'DESC')->with('menu', 'submenu', 'innerMenuInfo')->get();

        $html = view('back-end.menu.inner-menu-view')->with(['data' => $inner_menus])->render();
        return $html;
    }
    public function getSubMenuByMenu(Request $req)
    {
        $submenus = SubMenu::where('menu_id', $req->id)->with('menu', 'subMenuInfo')->get();
        $html['en'] = '<option value="">Select</option>';
        $html['lt'] = '<option value="">Select</option>';
        $html['rus'] = '<option value="">Select</option>';
        $html['pt'] = '<option value="">Select</option>';
        $html['es'] = '<option value="">Select</option>';
        foreach ($submenus as $submenu) {
            $html['en'] .= '<option value="' . $submenu->id . '">' . $submenu->sub_menu_en . '</option>';
            $html['lt'] .= '<option value="' . $submenu->id . '">' . $submenu->sub_menu_lt . '</option>';
            $html['rus'] .= '<option value="' . $submenu->id . '">' . $submenu->sub_menu_rus . '</option>';
            $html['pt'] .= '<option value="' . $submenu->id . '">' . $submenu->sub_menu_pt . '</option>';
            $html['es'] .= '<option value="' . $submenu->id . '">' . $submenu->sub_menu_es . '</option>';
        }
        $html1['en'] = '';
        $html1['lt'] = '';
        $html1['rus'] = '';
        $html1['pt'] = '';
        $html1['es'] = '';
        if ($submenus->count()) {
            foreach ($submenus[0]->menu->customSizes as $size) {
                $html1['en'] .= '<option value="' . $size->id . '">' . $size->name_en . '</option>';
                $html1['lt'] .= '<option value="' . $size->id . '">' . $size->name_lt . '</option>';
                $html1['rus'] .= '<option value="' . $size->id . '">' . $size->name_rus . '</option>';
                $html1['pt'] .= '<option value="' . $size->id . '">' . $size->name_pt . '</option>';
                $html1['es'] .= '<option value="' . $size->id . '">' . $size->name_es . '</option>';
            }
        }
        $html2['en'] = '';
        $html2['lt'] = '';
        $html2['rus'] = '';
        $html2['pt'] = '';
        $html2['es'] = '';
        if ($submenus->count()) {
            foreach ($submenus[0]->menu->customClasps as $clasp) {
                $html2['en'] .= '<option value="' . $clasp->id . '">' . $clasp->name_en . '</option>';
                $html2['lt'] .= '<option value="' . $clasp->id . '">' . $clasp->name_lt . '</option>';
                $html2['rus'] .= '<option value="' . $clasp->id . '">' . $clasp->name_rus . '</option>';
                $html2['pt'] .= '<option value="' . $clasp->id . '">' . $clasp->name_pt . '</option>';
                $html2['es'] .= '<option value="' . $clasp->id . '">' . $clasp->name_es . '</option>';
            }
        }
        $html3['en'] = '';
        $html3['lt'] = '';
        $html3['rus'] = '';
        $html3['pt'] = '';
        $html3['es'] = '';
        if ($submenus->count()) {
            foreach ($submenus[0]->menu->specifications as $specification) {
                $html3['en'] .= '<option value="' . $specification->id . '">' . $specification->name_en . '</option>';
                $html3['lt'] .= '<option value="' . $specification->id . '">' . $specification->name_lt . '</option>';
                $html3['rus'] .= '<option value="' . $specification->id . '">' . $specification->name_rus . '</option>';
                $html3['pt'] .= '<option value="' . $specification->id . '">' . $specification->name_pt . '</option>';
                $html3['es'] .= '<option value="' . $specification->id . '">' . $specification->name_es . '</option>';
            }
        }
        $data['isNotSubMenu'] = $submenus->count() ? 0 : 1;
        if ($data['isNotSubMenu']) {
            $data['filter'] = CustomSizeFilterService::create();
        }
        $data['submenu'] = $html;
        $data['size'] = $html1;
        $data['clasp'] = $html2;
        $data['specification'] = $html3;
        return $data;
    }
    public function getInnerMenuBySubMenu(Request $req)
    {

        $innermenus = InnerMenu::where('sub_menu_id', $req->id)->with('menu', 'submenu', 'innerMenuInfo')->get();
        $html['en'] = '';
        $html['lt'] = '';
        $html['rus'] = '';
        $html['pt'] = '';
        $html['es'] = '';
        foreach ($innermenus as $innermenu) {
            $html['en'] .= '<option value="' . $innermenu->id . '">' . $innermenu->inner_menu_en . '</option>';
            $html['lt'] .= '<option value="' . $innermenu->id . '">' . $innermenu->inner_menu_lt . '</option>';
            $html['rus'] .= '<option value="' . $innermenu->id . '">' . $innermenu->inner_menu_rus . '</option>';
            $html['pt'] .= '<option value="' . $innermenu->id . '">' . $innermenu->inner_menu_pt . '</option>';
            $html['es'] .= '<option value="' . $innermenu->id . '">' . $innermenu->inner_menu_es . '</option>';
        }
        $data['isNotInnerMenu'] = $innermenus->count() ? 0 : 1;
        if ($data['isNotInnerMenu']) {
            $data['filter'] = CustomSizeFilterService::create();
        }
        $data['innermenu'] = $html;
        return $data;
    }
    public function getCtmSizeFM(Request $request)
    {
        $menu = Menu::find($request->id);
        $data['en'] = '';
        $data['lt'] = '';
        $data['rus'] = '';
        $data['pt'] = '';
        $data['es'] = '';

        foreach ($menu->customSizes as $size) {
            $data['en'] .= '<option value="' . $size->id . '">' . $size->name_en . '</option>';
            $data['lt'] .= '<option value="' . $size->id . '">' . $size->name_lt . '</option>';
            $data['rus'] .= '<option value="' . $size->id . '">' . $size->name_rus . '</option>';
            $data['pt'] .= '<option value="' . $size->id . '">' . $size->name_pt . '</option>';
            $data['es'] .= '<option value="' . $size->id . '">' . $size->name_es . '</option>';
        }
        $data['spec_en'] = '';
        $data['spec_lt'] = '';
        $data['spec_rus'] = '';
        $data['spec_pt'] = '';
        $data['spec_es'] = '';

        foreach ($menu->specifications as $specification) {
            $data['spec_en'] .= '<option value="' . $specification->id . '">' . $specification->name_en . '</option>';
            $data['spec_lt'] .= '<option value="' . $specification->id . '">' . $specification->name_lt . '</option>';
            $data['spec_rus'] .= '<option value="' . $specification->id . '">' . $specification->name_rus . '</option>';
            $data['spec_pt'] .= '<option value="' . $specification->id . '">' . $specification->name_pt . '</option>';
            $data['spec_es'] .= '<option value="' . $specification->id . '">' . $specification->name_es . '</option>';
        }
        $data['cen'] = '';
        $data['clt'] = '';
        $data['crus'] = '';
        $data['cpt'] = '';
        $data['ces'] = '';

        foreach ($menu->customClasps as $clasp) {
            $data['cen'] .= '<option value="' . $clasp->id . '">' . $clasp->name_en . '</option>';
            $data['clt'] .= '<option value="' . $clasp->id . '">' . $clasp->name_lt . '</option>';
            $data['crus'] .= '<option value="' . $clasp->id . '">' . $clasp->name_rus . '</option>';
            $data['cpt'] .= '<option value="' . $clasp->id . '">' . $clasp->name_pt . '</option>';
            $data['ces'] .= '<option value="' . $clasp->id . '">' . $clasp->name_es . '</option>';
        }
        $data['saen'] = '';
        $data['salt'] = '';
        $data['sarus'] = '';
        $data['sapt'] = '';
        $data['saes'] = '';

        foreach ($menu->surfaceAmbers as $surfaceAmber) {
            $data['saen'] .= '<option value="' . $surfaceAmber->id . '">' . $surfaceAmber->name_en . '</option>';
            $data['salt'] .= '<option value="' . $surfaceAmber->id . '">' . $surfaceAmber->name_lt . '</option>';
            $data['sarus'] .= '<option value="' . $surfaceAmber->id . '">' . $surfaceAmber->name_rus . '</option>';
            $data['sapt'] .= '<option value="' . $surfaceAmber->id . '">' . $surfaceAmber->name_pt . '</option>';
            $data['saes'] .= '<option value="' . $surfaceAmber->id . '">' . $surfaceAmber->name_es . '</option>';
        }
        return $data;
    }
    public function getCtmSizeFSM(Request $request)
    {
        $menu = SubMenu::find($request->id);
        $data['en'] = '';
        $data['lt'] = '';
        $data['rus'] = '';
        $data['pt'] = '';
        $data['es'] = '';
        if ($menu->customSizes) {
            foreach ($menu->customSizes as $size) {
                $data['en'] .= '<option value="' . $size->id . '">' . $size->name_en . '</option>';
                $data['lt'] .= '<option value="' . $size->id . '">' . $size->name_lt . '</option>';
                $data['rus'] .= '<option value="' . $size->id . '">' . $size->name_rus . '</option>';
                $data['pt'] .= '<option value="' . $size->id . '">' . $size->name_pt . '</option>';
                $data['es'] .= '<option value="' . $size->id . '">' . $size->name_es . '</option>';
            }
        }
        $data['spec_en'] = '';
        $data['spec_lt'] = '';
        $data['spec_rus'] = '';
        $data['spec_pt'] = '';
        $data['spec_es'] = '';
        if ($menu->specifications) {
            foreach ($menu->specifications as $specification) {
                $data['spec_en'] .= '<option value="' . $specification->id . '">' . $specification->name_en . '</option>';
                $data['spec_lt'] .= '<option value="' . $specification->id . '">' . $specification->name_lt . '</option>';
                $data['spec_rus'] .= '<option value="' . $specification->id . '">' . $specification->name_rus . '</option>';
                $data['spec_pt'] .= '<option value="' . $specification->id . '">' . $specification->name_pt . '</option>';
                $data['spec_es'] .= '<option value="' . $specification->id . '">' . $specification->name_es . '</option>';
            }
        }
        $data['cen'] = '';
        $data['clt'] = '';
        $data['crus'] = '';
        $data['cpt'] = '';
        $data['ces'] = '';

        foreach ($menu->customClasps as $clasp) {
            $data['cen'] .= '<option value="' . $clasp->id . '">' . $clasp->name_en . '</option>';
            $data['clt'] .= '<option value="' . $clasp->id . '">' . $clasp->name_lt . '</option>';
            $data['crus'] .= '<option value="' . $clasp->id . '">' . $clasp->name_rus . '</option>';
            $data['cpt'] .= '<option value="' . $clasp->id . '">' . $clasp->name_pt . '</option>';
            $data['ces'] .= '<option value="' . $clasp->id . '">' . $clasp->name_es . '</option>';
        }
        return $data;
    }
    public function getCtmSizeFIM()
    {
        return CustomSizeFilterService::create();
    }
}
