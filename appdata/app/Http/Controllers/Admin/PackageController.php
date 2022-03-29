<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function package()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = Package::orderBy('id', 'DESC')->get();
        $data['m_m_n'] = 'manage_package';
        $data['m_n'] = 'package';

        return view('back-end.package.index', $data);
    }
    public function insertPackage(Request $req)
    {

        $data = new Package;
        $data->package_name = $req->package_name;
        $data->package_price = $req->package_price;
        $data->package_discount = $req->package_discount;
        $data->save();
        $package = Package::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($package as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
            '<td>' . $n . '</td>
            <td class="td-' . $n . '">'
            . $value->package_name . '
            </td>
            <td class="td-' . $n . '" style="white-space: normal;">'
            . $value->package_price . '
            </td>
            <td class="td-' . $n . '">'
            . $value->package_discount . '
            </td>
        	<td>
        	<button type="button" onclick="editPackage(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
        	<button class="btn btn-sm btn-danger" onclick="deletePackage(' . $value->id . ')"><i class="icon-trash"></i></button>
        	</td>
        	</tr>';
        }
        return $html;
    }
    public function deletePackage(Request $req)
    {

        $package = Package::find($req->id)->delete();

        $package = Package::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($package as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
            '<td>' . $n . '</td>
            <td class="td-' . $n . '">'
            . $value->package_name . '
            </td>
            <td class="td-' . $n . '" style="white-space: normal;">'
            . $value->package_price . '
            </td>
            <td class="td-' . $n . '">'
            . $value->package_discount . '
            </td>
        	<td>
        	<button type="button" onclick="editPackage(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
        	<button class="btn btn-sm btn-danger" onclick="deletePackage(' . $value->id . ')"><i class="icon-trash"></i></button>
        	</td>
        	</tr>';
        }
        return $html;
    }
    public function getPackage(Request $req)
    {
        return $package = Package::find($req->id);
    }
    public function updatePackage(Request $req)
    {
        $data = Package::find($req->id);
        $data->package_name = $req->package_name;
        $data->package_price = $req->package_price;
        $data->package_discount = $req->package_discount;
        $data->save();
        $package = Package::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($package as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
            '<td>' . $n . '</td>
            <td class="td-' . $n . '">'
            . $value->package_name . '
            </td>
            <td class="td-' . $n . '" style="white-space: normal;">'
            . $value->package_price . '
            </td>
            <td class="td-' . $n . '">'
            . $value->package_discount . '
            </td>
        	<td>
        	<button type="button" onclick="editPackage(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
        	<button class="btn btn-sm btn-danger" onclick="deletePackage(' . $value->id . ')"><i class="icon-trash"></i></button>
        	</td>
        	</tr>';
        }
        return $html;
    }
}
