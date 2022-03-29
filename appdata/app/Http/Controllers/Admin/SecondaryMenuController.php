<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SecondaryMenu;
use App\SecondarySubMenu;

class SecondaryMenuController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function scdMenuList()
	{
		$data['data'] = SecondaryMenu::orderBy('id', 'DESC')->get();
		// dd($menu);
		$data['m_n'] = 'scd-menu-list';
		$data['m_m_n'] = 'scd-menu';
		return view('back-end.secondary_menu.scd-menu-list', $data);
	}
	public function insertScdMenu(Request $req)
	{
		$menu = new SecondaryMenu;
		if($req->img){
			$img = $req->file('img');
			$img_name = time() . '.' . $img->getClientOriginalExtension();
			$img->move('scdMenu',$img_name);
			$menu->img = $img_name;
		}
		$menu->menu_en = $req->menu_en;
		$menu->menu_lt = $req->menu_lt;
		$menu->menu_rus = $req->menu_rus;
		$menu->url_en = $req->url_en;
		$menu->url_lt = $req->url_lt;
		$menu->url_rus = $req->url_rus;
		$menu->save();

		$menus = SecondaryMenu::orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($menus as $value) {
			$html .= '<tr class="tr-' . ++$n . '">
			<td>' . $n . '</td>
			<td>';
			if($value->img){
				$html .= '<img src="' . asset('scdMenu/' . $value->img) . '">';
			}
			$html .= '</td>
			<td class="td-' . $n . '">' .
			'EN - ' . $value->menu_en . '<br>' .
			'LT - ' . $value->menu_lt . '<br>' .
			'RUS - ' . $value->menu_rus .
			'</td>
			<td>
			<button type="button" onclick="editScdMenu(' . $value->id  . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteScdMenu(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}
	public function deleteScdMenu(Request $req)
	{
		$menu = SecondaryMenu::find($req->id);
		$path = 'scdMenu/' . $menu->img;
		if($menu->img){
			if(file_exists($path)){
				unlink($path);
			}
		}
		SecondarySubMenu::where('menu_id', $req->id)->delete();
		$menu->delete();

		$menus = SecondaryMenu::orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($menus as $value) {
			$html .= '<tr class="tr-' . ++$n . '">
			<td>' . $n . '</td>
			<td>';
			if($value->img){
				$html .= '<img src="' . asset('scdMenu/' . $value->img) . '">';
			}
			$html .= '</td>
			<td class="td-' . $n . '">' .
			'EN - ' . $value->menu_en . '<br>' .
			'LT - ' . $value->menu_lt . '<br>' .
			'RUS - ' . $value->menu_rus .
			'</td>
			<td>
			<button type="button" onclick="editScdMenu(' . $value->id  . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteScdMenu(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}
	public function getScdMenu(Request $req)
	{
		return $menu = SecondaryMenu::find($req->id);
	}
	public function updateScdMenu(Request $req)
	{
		$menu = SecondaryMenu::find($req->id);
		if($req->img){
			$img_d = $menu->img;
			if($img_d){
				if(file_exists('scdMenu/' . $img_d)) {
					unlink('scdMenu/' . $img_d);
				}
			}
			$img = $req->file('img');
			$img_name = time() . '.' . $img->getClientOriginalExtension();
			$img->move('scdMenu',$img_name);
			$menu->img = $img_name;
		}
		$menu->menu_en = $req->menu_en;
		$menu->menu_lt = $req->menu_lt;
		$menu->menu_rus = $req->menu_rus;
		$menu->url_en = $req->url_en;
		$menu->url_lt = $req->url_lt;
		$menu->url_rus = $req->url_rus;
		$menu->save();

		$menus = SecondaryMenu::orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($menus as $value) {
			$html .= '<tr class="tr-' . ++$n . '">
			<td>' . $n . '</td>
			<td>';
			if($value->img){
				$html .= '<img src="' . asset('scdMenu/' . $value->img) . '">';
			}
			$html .= '</td>
			<td class="td-' . $n . '">' .
			'EN - ' . $value->menu_en . '<br>' .
			'LT - ' . $value->menu_lt . '<br>' .
			'RUS - ' . $value->menu_rus .
			'</td>
			<td>
			<button type="button" onclick="editScdMenu(' . $value->id  . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteScdMenu(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}
	public function scdSubMenuList()
	{
		$data['data'] = SecondarySubMenu::orderBy('id', 'DESC')->get();
		$data['menus'] = SecondaryMenu::get();
		// dd(42);
		$data['m_n'] = 'scd-sub-menu-list';
		$data['m_m_n'] = 'scd-menu';
		return view('back-end.secondary_menu.scd-sub-menu-list', $data);
	}
	public function insertScdSubMenu(Request $req)
	{
		$sub_menu = new SecondarySubMenu;
		$sub_menu->menu_id = $req->menu_id;
		$sub_menu->sub_menu_en = $req->sub_menu_en;
		$sub_menu->sub_menu_lt = $req->sub_menu_lt;
		$sub_menu->sub_menu_rus = $req->sub_menu_rus;
		$sub_menu->url_en = $req->url_en;
		$sub_menu->url_lt = $req->url_lt;
		$sub_menu->url_rus = $req->url_rus;
		$sub_menu->save();

		$sub_menus = SecondarySubMenu::with('scdMenu')->orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($sub_menus as $value) {
			$html .= '<tr class="tr-' . ++$n . '">
			<td>' . $n . '</td>
			<td class="td-m-' . $n . '">' .
			'EN - ' . $value->scdMenu->menu_en . '<br>' .
			'LT - ' . $value->scdMenu->menu_lt . '<br>' .
			'RUS - ' . $value->scdMenu->menu_rus .
			'</td>
			<td class="td-' . $n . '">' .
			'EN - ' . $value->sub_menu_en . '<br>' .
			'LT - ' . $value->sub_menu_lt . '<br>' .
			'RUS - ' . $value->sub_menu_rus .
			'</td>
			<td>
			<button type="button" onclick="editScdSubMenu(' . $value->id  . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteSedSubMenu(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}
	public function deleteScdSubMenu(Request $req)
	{
		$sub_menu = SecondarySubMenu::find($req->id)->delete();

		$sub_menus = SecondarySubMenu::with('scdMenu')->orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($sub_menus as $value) {
			$html .= '<tr class="tr-' . ++$n . '">
			<td>' . $n . '</td>
			<td class="td-m-' . $n . '">' .
			'EN - ' . $value->scdMenu->menu_en . '<br>' .
			'LT - ' . $value->scdMenu->menu_lt . '<br>' .
			'RUS - ' . $value->scdMenu->menu_rus .
			'</td>
			<td class="td-' . $n . '">' .
			'EN - ' . $value->sub_menu_en . '<br>' .
			'LT - ' . $value->sub_menu_lt . '<br>' .
			'RUS - ' . $value->sub_menu_rus .
			'</td>
			<td>
			<button type="button" onclick="editScdSubMenu(' . $value->id  . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteSedSubMenu(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}
	public function getScdSubMenu(Request $req)
	{
		return $sub_menu = SecondarySubMenu::find($req->id);
	}
	public function updateScdSubMenu(Request $req)
	{
		// return $req->all();
		$sub_menu = SecondarySubMenu::find($req->id);
		$sub_menu->menu_id = $req->menu_id;
		$sub_menu->sub_menu_en = $req->sub_menu_en;
		$sub_menu->sub_menu_lt = $req->sub_menu_lt;
		$sub_menu->sub_menu_rus = $req->sub_menu_rus;
		$sub_menu->url_en = $req->url_en;
		$sub_menu->url_lt = $req->url_lt;
		$sub_menu->url_rus = $req->url_rus;
		$sub_menu->save();

		$sub_menus = SecondarySubMenu::with('scdMenu')->orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($sub_menus as $value) {
			$html .= '<tr class="tr-' . ++$n . '">
			<td>' . $n . '</td>
			<td class="td-m-' . $n . '">' .
			'EN - ' . $value->scdMenu->menu_en . '<br>' .
			'LT - ' . $value->scdMenu->menu_lt . '<br>' .
			'RUS - ' . $value->scdMenu->menu_rus .
			'</td>
			<td class="td-' . $n . '">' .
			'EN - ' . $value->sub_menu_en . '<br>' .
			'LT - ' . $value->sub_menu_lt . '<br>' .
			'RUS - ' . $value->sub_menu_rus .
			'</td>
			<td>
			<button type="button" onclick="editScdSubMenu(' . $value->id  . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteSedSubMenu(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}

}
