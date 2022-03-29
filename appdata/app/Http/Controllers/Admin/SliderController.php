<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProSlider;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function mainSlider()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = Slider::orderBy('id', 'DESC')->get();
        $data['m_m_n'] = 'slider';
        $data['m_n'] = 'main_slider';

        return view('back-end.slider.main-slider', $data);
    }
    public function insertMainSlider(Request $req)
    {
        if ($req->main_slider) {
            $slider = $req->file('main_slider');
            $slider_name = time() . '.' . $slider->getClientOriginalExtension();
            $slider->move('uploads/sliders/main', $slider_name);
        }
        // return $req->main_slider;
        $man_slider = new Slider;
        $man_slider->slider = $slider_name;
        $man_slider->title_en = $req->title_en;
        $man_slider->title_lt = $req->title_lt;
        $man_slider->title_rus = $req->title_rus;
        $man_slider->description_en = $req->description_en;
        $man_slider->description_lt = $req->description_lt;
        $man_slider->description_rus = $req->description_rus;
        $man_slider->url = $req->url;
        $man_slider->btn_name_en = $req->btn_name_en;
        $man_slider->btn_name_lt = $req->btn_name_lt;
        $man_slider->btn_name_rus = $req->btn_name_rus;
        $man_slider->save();
        // return 'true';
        $sliders = Slider::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($sliders as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
            '<td>' . $n . '</td>
			<td class="td-' . $n . '"><img src="' . asset('uploads/sliders/main/' . $value->slider) . '" class="img-fluid"></td>
			<td class="td-' . $n . '" style="white-space: normal;">' .
            'EN - ' . substr($value->description_en, 0, 50) . '<br>' .
            'LT - ' . substr($value->description_lt, 0, 50) . '<br>' .
            'RUS - ' . substr($value->description_rus, 0, 50) .
            '. . . .</td>
			<td class="td-' . $n . '">' . $value->url . '</td>
			<td class="td-' . $n . '">' .
            'EN - ' . $value->btn_name_en . '<br>' .
            'LT - ' . $value->btn_name_lt . '<br>' .
            'RUS - ' . $value->btn_name_rus .
            '</td>
			<td>
			<button type="button" onclick="editSlider(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteSlider(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
        }
        return $html;
    }
    public function deleteMainSlider(Request $req)
    {
        $slider = Slider::find($req->id)->delete();

        $sliders = Slider::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($sliders as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
            '<td>' . $n . '</td>
			<td class="td-' . $n . '"><img src="' . asset('uploads/sliders/main/' . $value->slider) . '" class="img-fluid"></td>
			<td class="td-' . $n . '" style="white-space: normal;">' .
            'EN - ' . substr($value->description_en, 0, 50) . '<br>' .
            'LT - ' . substr($value->description_lt, 0, 50) . '<br>' .
            'RUS - ' . substr($value->description_rus, 0, 50) .
            '. . . .</td>
			<td class="td-' . $n . '">' . $value->url . '</td>
			<td class="td-' . $n . '">' .
            'EN - ' . $value->btn_name_en . '<br>' .
            'LT - ' . $value->btn_name_lt . '<br>' .
            'RUS - ' . $value->btn_name_rus .
            '</td>
			<td>
			<button type="button" onclick="editSlider(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteSlider(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
        }
        return $html;
    }
    public function getMainSlider(Request $req)
    {
        return $slider = Slider::find($req->id);
    }
    public function updateMainSlider(Request $req)
    {
        if ($req->main_slider) {
            $slider = $req->file('main_slider');
            $slider_name = time() . '.' . $slider->getClientOriginalExtension();
            $slider->move('uploads/sliders/main', $slider_name);
        }
        $man_slider = Slider::find($req->id);
        if (@$slider_name) {
            $man_slider->slider = $slider_name;
        }
        $man_slider->title_en = $req->title_en;
        $man_slider->title_lt = $req->title_lt;
        $man_slider->title_rus = $req->title_rus;

        $man_slider->description_en = $req->description_en;
        $man_slider->description_lt = $req->description_lt;
        $man_slider->description_rus = $req->description_rus;
        $man_slider->url = $req->url;
        $man_slider->btn_name_en = $req->btn_name_en;
        $man_slider->btn_name_lt = $req->btn_name_lt;
        $man_slider->btn_name_rus = $req->btn_name_rus;
        $man_slider->save();
        // return 'true';
        $sliders = Slider::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($sliders as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
            '<td>' . $n . '</td>
			<td class="td-' . $n . '"><img src="' . asset('uploads/sliders/main/' . $value->slider) . '" class="img-fluid"></td>
			<td class="td-' . $n . '" style="white-space: normal;">' .
            'EN - ' . substr($value->description_en, 0, 50) . '<br>' .
            'LT - ' . substr($value->description_lt, 0, 50) . '<br>' .
            'RUS - ' . substr($value->description_rus, 0, 50) .
            '. . . .</td>
			<td class="td-' . $n . '">' . $value->url . '</td>
			<td class="td-' . $n . '">' .
            'EN - ' . $value->btn_name_en . '<br>' .
            'LT - ' . $value->btn_name_lt . '<br>' .
            'RUS - ' . $value->btn_name_rus .
            '</td>
			<td>
			<button type="button" onclick="editSlider(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteSlider(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
        }
        return $html;
    }
    public function secondSlider()
    {
        $data['data'] = ProSlider::orderBy('id', 'DESC')->get();
        $data['m_m_n'] = 'slider';
        $data['m_n'] = 'second_slider';

        return view('back-end.slider.pro-slider', $data);
    }
    public function insertSecondSlider(Request $req)
    {
        // return $req->all();
        if ($req->slider) {
            $slider = $req->file('slider');
            $slider_name = time() . '.' . $slider->getClientOriginalExtension();
            $slider->move('secondSlider', $slider_name);
        }
        // return $req->main_slider;
        $secomd_slider = new ProSlider;
        $secomd_slider->img = $slider_name;
        $secomd_slider->save();
        // return 'true';
        $sliders = ProSlider::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($sliders as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
            '<td>' . $n . '</td>
			<td class="td-' . $n . '"><img src="' . asset('secondSlider/' . $value->img) . '" class="img-fluid" style="max-width: 100px"></td>
			<td>
			<button type="button" onclick="editSSlider(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteSSlider(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
        }
        return $html;
    }
    public function deleteSecondSlider(Request $req)
    {
        $slider_d = ProSlider::find($req->id)->img;
        if (file_exists('secondSlider/' . $slider_d)) {
            unlink('secondSlider/' . $slider_d);
        }
        $slider = ProSlider::find($req->id)->delete();

        $sliders = ProSlider::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($sliders as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
            '<td>' . $n . '</td>
			<td class="td-' . $n . '"><img src="' . asset('secondSlider/' . $value->img) . '" class="img-fluid" style="max-width: 100px"></td>
			<td>
			<button type="button" onclick="editSSlider(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteSSlider(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
        }
        return $html;
    }
    public function getSecondSlider(Request $req)
    {
        return $slider = ProSlider::find($req->id);
    }
    public function updateSecondSlider(Request $req)
    {
        if ($req->slider) {
            $slider_d = ProSlider::find($req->id)->img;
            if (file_exists('secondSlider/' . $slider_d)) {
                unlink('secondSlider/' . $slider_d);
            }
            $slider = $req->file('slider');
            $slider_name = time() . '.' . $slider->getClientOriginalExtension();
            $slider->move('secondSlider', $slider_name);
        }
        // return $slider;
        $scnd_slider = ProSlider::find($req->id);
        if (@$slider_name) {
            $scnd_slider->img = $slider_name;
        }
        $scnd_slider->save();
        // return 'true';
        $sliders = ProSlider::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($sliders as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
            '<td>' . $n . '</td>
			<td class="td-' . $n . '"><img src="' . asset('secondSlider/' . $value->img) . '" class="img-fluid" style="max-width: 100px"></td>
			<td>
			<button type="button" onclick="editSSlider(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleteSSlider(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
        }
        return $html;
    }
}
