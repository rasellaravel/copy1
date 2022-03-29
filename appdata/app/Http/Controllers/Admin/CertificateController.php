<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Certificate;
use App\CertificatePassword;

class CertificateController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function certificatePassword() 
	{
		$data['data'] = CertificatePassword::orderBy('id', 'DESC')->get();
		$data['m_n'] = 'certificate-password';
		$data['m_m_n'] = 'certificate-a';
		return view('back-end.certificate.certificate-password', $data);
	}
	public function certificatePasswordInsert(Request $req) 
	{
		$cer_pass = new CertificatePassword;
		$cer_pass->password = md5($req->password);
		$cer_pass->save();

		$ces_passS = CertificatePassword::orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($ces_passS as $value) {
			$html .= '<tr class="tr-' . ++$n . '">
			<td>' . $n . '</td>
			<td class="td-' . $n . '">' . $value->password . '</td>
			<td>
			<button type="button" onclick="editCerPass(' . $value->id  . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteCerPass(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}
	public function certificatePasswordGet(Request $req)
	{
		return $cer_pass = CertificatePassword::find($req->id);
	}
	public function certificatePasswordUpdate(Request $req)
	{
		$cer_pass = CertificatePassword::find($req->id);
		if($cer_pass->password != $req->password) {
			$cer_pass->password = md5($req->password);
		}
		$cer_pass->save();
		return $cer_pass->password;
	}
	public function certificatePasswordDelete(Request $req)
	{
		$ces_pass = CertificatePassword::find($req->id)->delete();

		$ces_passS = CertificatePassword::orderBy('id', 'DESC')->get();

		$n = 0;
		$html = '';
		foreach ($ces_passS as $value) {
			$html .= '<tr class="tr-' . ++$n . '">
			<td>' . $n . '</td>
			<td class="td-' . $n . '">' . $value->password . '</td>
			<td>
			<button type="button" onclick="editCerPass(' . $value->id  . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteCerPass(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
		}
		return $html;
	}
	public function certificate() 
	{
		$data['data'] = Certificate::orderBy('id', 'DESC')->first();
		$data['m_n'] = 'certificate';
		$data['m_m_n'] = 'certificate-a';
		return view('back-end.certificate.certificate-list', $data);
	}
	public function updateCertificate(Request $request)
	{
		if ($request->file) {
			$file = $request->file('file');
			$file_name = 'certificate.' . $file->getClientOriginalExtension();
			$file->move('certificate', $file_name);
		}
		$data = Certificate::orderBy('id', 'DESC')->first();
		if($data) {
			$certificate = Certificate::find($data->id);
		}else {
			$certificate = new Certificate;
		}
		$certificate->file = $file_name;
		$certificate->price = $request->price;
		$certificate->save();
		
		return Certificate::orderBy('id', 'DESC')->first();
	}

}
