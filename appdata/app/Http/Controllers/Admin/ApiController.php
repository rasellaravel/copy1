<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Api;
use App\Blog;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // star api
    public function api()
    {
        // if (auth()->user()->role == 2) {
        //     return redirect()->route('admin.dashboard');
        // }
        $checkRole = Admin::find(auth()->user()->id);
        $data['data'] = Api::orderBy('id', 'DESC')
            ->when($checkRole->role != 1, function ($q) use ($checkRole) {
                return $q->where('user_id', $checkRole->id);
            })
            ->get();
        $data['vendors'] = Admin::whereNotIn('role', [1])->get();
        $token = Str::random(60);
        $data['token'] = hash('sha256', $token);
        $data['m_m_n'] = 'api';
        $data['m_n'] = 'create-api';
        return view('back-end.apis.api-list', $data);
    }

    public function insertApi(Request $req)
    {
        $api = new Api;
        $api->user_id = $req->vendor_id;
        $api->api_key = $req->api_key;
        $api->save();
        // return 'true';
        $apis = Api::orderBy('id', 'DESC')->get();
        $data['html'] = view('back-end.apis.api-view')->with(['data' => $apis])->render();
        $token = Str::random(60);
        $data['token'] = hash('sha256', $token);
        return $data;
    }

    public function deleteApi(Request $req)
    {
        $api = Api::find($req->id)->delete();

        $apis = Api::orderBy('id', 'DESC')->get();

        $html = view('back-end.apis.api-view')->with(['data' => $apis])->render();
        return $html;
    }
    public function getBlog(Request $req)
    {
        $blog = Blog::find($req->id);
        return $blog;
    }
    public function updateBlog(Request $req)
    {
        $blog = Blog::find($req->id);
        if ($req->is_video != 1) {
            if ($req->img) {
                $img = $req->file('img');
                $img_name = time() . '.' . $img->getClientOriginalExtension();
                $img->move('uploads/blogs', $img_name);
            }
        } else {
            preg_match('~v=([A-Za-z0-9]+)~', $req->video, $video_code);
        }

        if ($req->is_video != 1) {
            if (@$img_name) {
                $blog->img = $img_name;
                $blog->video = '';
            }
        } else {
            if (count($video_code)) {
                $blog->video = $video_code[1];
                $blog->img = '';
            }
        }
        $blog->title = $req->title;
        $blog->description = $req->description;
        $blog->save();
        // return $req->all();
        $blogs = Blog::orderBy('id', 'DESC')->get();

        $data['html'] = view('back-end.blog.blog-view')->with(['data' => $blogs])->render();
        $data['blog'] = $blog;
        $data['is_video'] = $req->is_video;
        return $data;
    }
    public function insertProductApi()
    {
        // $menu_data = [];
        // $m = 0;
        // $menus = Menu::get();
        // foreach ($menus as $menu) {
        //     $menu_data['menu'][$m] = [
        //         'own' => [
        //             'id' => $menu->id,
        //             'name' => [
        //                 'en' => $menu->menu_en,
        //                 'lt' => $menu->menu_lt,
        //                 'rus' => $menu->menu_rus,
        //                 'es' => $menu->menu_es,
        //                 'pt' => $menu->menu_pt,
        //             ],
        //         ],
        //         'other' => [
        //             'id' => '',
        //             'name' => [
        //                 'en' => '',
        //                 'lt' => '',
        //                 'rus' => '',
        //                 'es' => '',
        //                 'pt' => '',
        //             ],
        //         ],
        //     ];
        //     $menu_data['menu'][$m]['sub_menu'] = [];
        //     $sm = 0;
        //     foreach ($menu->subMenus as $sub_menu) {
        //         $menu_data['menu'][$m]['sub_menu'][$sm] = [
        //             'own' => [
        //                 'id' => $sub_menu->id,
        //                 'name' => [
        //                     'en' => $sub_menu->sub_menu_en,
        //                     'lt' => $sub_menu->sub_menu_lt,
        //                     'rus' => $sub_menu->sub_menu_rus,
        //                     'es' => $sub_menu->sub_menu_es,
        //                     'pt' => $sub_menu->sub_menu_pt,
        //                 ],
        //             ],
        //             'other' => [
        //                 'id' => '',
        //                 'name' => [
        //                     'en' => '',
        //                     'lt' => '',
        //                     'rus' => '',
        //                     'es' => '',
        //                     'pt' => '',
        //                 ],
        //             ],
        //         ];
        //         $menu_data['menu'][$m]['sub_menu'][$sm]['inner_menu'] = [];
        //         $im = 0;
        //         foreach ($sub_menu->innerMenus as $inner_menu) {
        //             $menu_data['menu'][$m]['sub_menu'][$sm]['inner_menu'][$im] = [
        //                 'own' => [
        //                     'id' => $inner_menu->id,
        //                     'name' => [
        //                         'en' => $inner_menu->inner_menu_en,
        //                         'lt' => $inner_menu->inner_menu_lt,
        //                         'rus' => $inner_menu->inner_menu_rus,
        //                         'es' => $inner_menu->inner_menu_es,
        //                         'pt' => $inner_menu->inner_menu_pt,
        //                     ],
        //                 ],
        //                 'other' => [
        //                     'id' => '',
        //                     'name' => [
        //                         'en' => '',
        //                         'lt' => '',
        //                         'rus' => '',
        //                         'es' => '',
        //                         'pt' => '',
        //                     ],
        //                 ],
        //             ];
        //             $im++;
        //         }

        //         $sm++;
        //     }
        //     $m++;
        // }

        $data['m_m_n'] = 'api';
        $data['m_n'] = 'insert-product-api';
        $data['menus'] = Menu::with('subMenus.innerMenus')->get();
        return view('back-end.apis.insert-product-api', $data);
    }
}
