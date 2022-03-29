<?php
namespace App\Services;

use App\InnerMenu;
use App\Menu;
use App\SubMenu;

// use App\Services\TestService1;
/**
 *
 */
class CustomSizeFilterService
{
    public static function create()
    {
        $id_c = request()->id_c;
        if ($id_c == 'inner_menu_id_en' || $id_c == 'innerMenuIdEn') {
            $menu = InnerMenu::where('id', request()->id)->with('customSizes.sizes', 'specifications')->first();
        } elseif ($id_c == 'sub_menu_id_en' || $id_c == 'subMenuIdEn') {
            $menu = SubMenu::where('id', request()->id)->with('customSizes.sizes', 'specifications')->first();
        } else {
            $menu = Menu::where('id', request()->id)->with('customSizes.sizes', 'specifications')->first();
        }
        $html['last_menu_id'] = $menu->id;
        $html['size'] = '';
        if (count($menu->customSizes)) {
            $html['size'] = '<div class="input-group mb-3">
			<div class="input-group-prepend">
				<button class="btn" type="button" onclick="removeItem(event)">
					<i class="fa fa-minus"></i>
				</button>
			</div>';
            $unique_id = uniqid();
            $cp = request()->class_n == 'menu_s' || request()->class_n == 'sub_menu_s' || request()->class_n == 'inner_menu_s' ? "cprice" : "cpriceE";
            foreach ($menu->customSizes as $customSize) {
                $html['size'] .= '<select id="color_en" name="product_size[' . $unique_id . '][size][]" class="custom-select">
				<option value="0">Select an Option</option>';
                foreach ($customSize->sizes as $size) {
                    $html['size'] .= '<option value="' . $size->id . '">' . $size->size_en . '</option>';
                }
                $html['size'] .= '</select>';
            }
            $html['size'] .= '<input type="text" name="product_size[' . $unique_id . '][price]" class="' . $cp . ' form-control" style="width: 100px;">
			<div class="input-group-append">
				<button class="btn btn-info" type="button" onclick="appendItemP(event, \'' . $id_c . '\', \'' . $cp . '\')">
					<i class="fa fa-plus"></i>
				</button>
			</div>
		</div>';
        }
        $html['specification_en'] = '';
        $html['specification_lt'] = '';
        $html['specification_rus'] = '';
        $html['specification_pt'] = '';
        $html['specification_es'] = '';

        if (count($menu->specifications)) {
            foreach ($menu->specifications as $specification) {
                $spec_name = strtolower(str_replace(' ', '_', $specification->name_en));
                if (request()->class_n == 'menu_s') {
                    $html['specification_en'] .= '<div class="col-sm-6">
                    <label class="col-form-label">' . $specification->name_en . '</label>
                    <input type="text" id="' . $spec_name . '_en" name="' . $spec_name . '_en"
                        class="form-control">
                </div>';
                    $html['specification_lt'] .= '<div class="col-sm-6">
                    <label class="col-form-label">' . $specification->name_lt . '</label>
                    <input type="text" id="' . $spec_name . '_lt" name="' . $spec_name . '_lt"
                        class="form-control">
                </div>';
                    $html['specification_rus'] .= '<div class="col-sm-6">
                    <label class="col-form-label">' . $specification->name_rus . '</label>
                    <input type="text" id="' . $spec_name . '_rus" name="' . $spec_name . '_rus"
                        class="form-control">
                </div>';
                    $html['specification_pt'] .= '<div class="col-sm-6">
                    <label class="col-form-label">' . $specification->name_pt . '</label>
                    <input type="text" id="' . $spec_name . '_pt" name="' . $spec_name . '_pt"
                        class="form-control">
                </div>';
                    $html['specification_es'] .= '<div class="col-sm-6">
                    <label class="col-form-label">' . $specification->name_es . '</label>
                    <input type="text" id="' . $spec_name . '_es" name="' . $spec_name . '_es"
                        class="form-control">
                </div>';
                } else {
                    $html['specification_en'] .= '<label class="col-form-label">' . $specification->name_en . '</label>
                <input type="text" id="' . $spec_name . '_enEdit" name="' . $spec_name . '_en"
                class="form-control">';
                    $html['specification_lt'] .= '<label class="col-form-label">' . $specification->name_lt . '</label>
                    <input type="text" id="' . $spec_name . '_ltEdit" name="' . $spec_name . '_lt"
                        class="form-control">';
                    $html['specification_rus'] .= '<label class="col-form-label">' . $specification->name_rus . '</label>
                    <input type="text" id="' . $spec_name . '_rusEdit" name="' . $spec_name . '_rus"
                        class="form-control">';
                    $html['specification_pt'] .= '<label class="col-form-label">' . $specification->name_pt . '</label>
                    <input type="text" id="' . $spec_name . '_ptEdit" name="' . $spec_name . '_pt"
                        class="form-control">';
                    $html['specification_es'] .= '<label class="col-form-label">' . $specification->name_es . '</label>
                    <input type="text" id="' . $spec_name . '_esEdit" name="' . $spec_name . '_es"
                        class="form-control">';
                }
            }
        }
        return $html;

    }

}
