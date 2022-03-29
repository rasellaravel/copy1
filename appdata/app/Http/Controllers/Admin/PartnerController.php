<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;
use App\About;

class PartnerController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function partner()
	{
		$data['data'] = Partner::orderBy('id', 'DESC')->get();
		$data['m_m_n'] = 'partner';
		// $data['m_n'] = 'second_img';

		return view('back-end.partners.partners', $data);
	}
	public function insertPartner(Request $req)
	{
		// return $req->all(); 
		if($req->img){
			$img = $req->file('img');
			$img_name = time() . '.' . $img->getClientOriginalExtension();
			$img->move('partners',$img_name);
		}
		// return $req->main_img;
		$partner = new Partner;
		$partner->img = $img_name;
		$partner->save();
// return 'true';
		$imgs = Partner::orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($imgs as $value) {
			$html .= '<tr class="tr-' . ++$n . '">' .
			'<td>' . $n . '</td>
			<td class="td-' . $n . '"><img src="' .  asset('partners/' . $value->img) . '" class="img-fluid" style="max-width: 100px"></td>
			<td>
			<button type="button" onclick="editPartner(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deletePartner(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}
	public function deletePartner(Request $req)
	{
		$img_d = Partner::find($req->id)->img;
		if(file_exists('partners/' . $img_d)) {
			unlink('partners/' . $img_d);
		}
		$img = Partner::find($req->id)->delete();

		$imgs = Partner::orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($imgs as $value) {
			$html .= '<tr class="tr-' . ++$n . '">' .
			'<td>' . $n . '</td>
			<td class="td-' . $n . '"><img src="' .  asset('partners/' . $value->img) . '" class="img-fluid" style="max-width: 100px"></td>
			<td>
			<button type="button" onclick="editPartner(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deletePartner(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}
	public function getPartner(Request $req)
	{
		return $img = Partner::find($req->id);
	}
	public function updatePartner(Request $req)
	{
		if($req->img){
			$img_d = Partner::find($req->id)->img;
			if(file_exists('partners/' . $img_d)) {
				unlink('partners/' . $img_d);
			}
			$img = $req->file('img');
			$img_name = time() . '.' . $img->getClientOriginalExtension();
			$img->move('partners',$img_name);
		}
		// return $img;
		$scnd_img = Partner::find($req->id);
		if(@$img_name) {
			$scnd_img->img = $img_name;
		}
		$scnd_img->save();
		// return 'true';
		$imgs = Partner::orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($imgs as $value) {
			$html .= '<tr class="tr-' . ++$n . '">' .
			'<td>' . $n . '</td>
			<td class="td-' . $n . '"><img src="' .  asset('partners/' . $value->img) . '" class="img-fluid" style="max-width: 100px"></td>
			<td>
			<button type="button" onclick="editPartner(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deletePartner(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}
	public function about() 
	{
		$data['about'] = About::orderBy('id', 'DESC')->first();
		$data['m_m_n'] = 'about';
		// $data['m_n'] = 'main_slider';
		
		return view('back-end.about.about', $data);
	}
	public function insertAbout(Request $req)
	{
		if(@$req->img){
			$img = $req->file('img');
			$img_name = time() . '.' . $img->getClientOriginalExtension();
			$img->move('about',$img_name);
		}
			$abouts_check = About::orderBy('id', 'DESC')->first();
		if($abouts_check){
			$about = About::find($abouts_check->id);
		}else {
			$about = new About;
		}
		$about->description_en = $req->description_en;
		$about->description_lt = $req->description_lt;
		$about->description_rus = $req->description_rus;
		if(@$img_name){
			$about->img = $img_name;
		}
		$about->save();
		
		// return 'true';
		$abouts = About::orderBy('id', 'DESC')->first();
		return $abouts;
	}
}
