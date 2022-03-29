<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Contact;
use App\HomeBlog;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function homeBlog()
    {
        $data['data'] = HomeBlog::orderBy('id', 'DESC')->get();
        $data['m_m_n'] = 'home_blog';
        // $data['m_n'] = 'main_slider';

        return view('back-end.blog.home-blog', $data);
    }

    public function insertHomeBlog(Request $req)
    {
        if ($req->img) {
            $img = $req->file('img');
            $img_name = time() . '.' . $img->getClientOriginalExtension();
            $img->move('homeBlog', $img_name);
        }
        $blog = new HomeBlog;
        $blog->title_en = $req->title_en;
        $blog->title_lt = $req->title_lt;
        $blog->title_rus = $req->title_rus;
        $blog->description_en = $req->description_en;
        $blog->description_lt = $req->description_lt;
        $blog->description_rus = $req->description_rus;
        if (@$img_name) {
            $blog->img = $img_name;
        }
        $blog->save();
        // return 'true';
        $blogs = HomeBlog::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($blogs as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
                '<td>' . $n . '</td>
			<td class="td-' . $n . '">';
            if ($value->img) {
                $html .= '<img src="' . asset('homeBlog/' . $value->img) . '" class="img-fluid">';
            } else {
                $html .= '<img src="' . asset('assets/img/logo.png') . '" class="img-fluid" style="filter: blur(3px);-webkit-filter: blur(3px);">';
            }
            $html .= '</td>
			<td class="td-' . $n . '">' .
            'EN - ' . $value->title_en . '<br>' .
            'LT - ' . $value->title_lt . '<br>' .
            'RUS - ' . $value->title_rus .
            '</td>
			<td class="td-' . $n . '" style="white-space: normal;">' .
            'EN - ' . substr(strip_tags($value->description_en), 0, 50) . '<br>' .
            'LT - ' . substr(strip_tags($value->description_lt), 0, 50) . '<br>' .
            'RUS - ' . substr(strip_tags($value->description_rus), 0, 50) .
            '. . . .</td>
			<td>
			<button type="button" onclick="editHomeBlog(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleHometeBlog(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
        }
        return $html;
    }

    public function deleteHomeBlog(Request $req)
    {
        $img_d = HomeBlog::find($req->id)->img;
        if ($img_d) {
            if (file_exists('homeBlog/' . $img_d)) {
                unlink('homeBlog/' . $img_d);
            }
        }
        $blog = HomeBlog::find($req->id)->delete();

        $blogs = HomeBlog::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($blogs as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
                '<td>' . $n . '</td>
			<td class="td-' . $n . '">';
            if ($value->img) {
                $html .= '<img src="' . asset('homeBlog/' . $value->img) . '" class="img-fluid">';
            } else {
                $html .= '<img src="' . asset('assets/img/logo.png') . '" class="img-fluid" style="filter: blur(3px);-webkit-filter: blur(3px);">';
            }
            $html .= '</td>
			<td class="td-' . $n . '">' .
            'EN - ' . $value->title_en . '<br>' .
            'LT - ' . $value->title_lt . '<br>' .
            'RUS - ' . $value->title_rus .
            '</td>
			<td class="td-' . $n . '" style="white-space: normal;">' .
            'EN - ' . substr(strip_tags($value->description_en), 0, 50) . '<br>' .
            'LT - ' . substr(strip_tags($value->description_lt), 0, 50) . '<br>' .
            'RUS - ' . substr(strip_tags($value->description_rus), 0, 50) .
            '. . . .</td>
			<td>
			<button type="button" onclick="editHomeBlog(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleHometeBlog(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
        }
        return $html;
    }
    public function getHomeBlog(Request $req)
    {
        return $blog = HomeBlog::find($req->id);
    }
    public function updateHomeBlog(Request $req)
    {
        $blog = HomeBlog::find($req->id);
        if ($req->img) {
            $img_d = $blog->img;
            if ($img_d) {
                if (file_exists('homeBlog/' . $img_d)) {
                    unlink('homeBlog/' . $img_d);
                }
            }
            $img = $req->file('img');
            $img_name = time() . '.' . $img->getClientOriginalExtension();
            $img->move('homeBlog', $img_name);
        }
        if (@$img_name) {
            $blog->img = $img_name;
        }
        $blog->description_en = $req->description_en;
        $blog->description_lt = $req->description_lt;
        $blog->description_rus = $req->description_rus;
        $blog->title_en = $req->title_en;
        $blog->title_lt = $req->title_lt;
        $blog->title_rus = $req->title_rus;
        $blog->save();
        // return $req->all();
        $blogs = HomeBlog::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($blogs as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
                '<td>' . $n . '</td>
			<td class="td-' . $n . '">';
            if ($value->img) {
                $html .= '<img src="' . asset('homeBlog/' . $value->img) . '" class="img-fluid">';
            } else {
                $html .= '<img src="' . asset('assets/img/logo.png') . '" class="img-fluid" style="filter: blur(3px);-webkit-filter: blur(3px);">';
            }
            $html .= '</td>
			<td class="td-' . $n . '">' .
            'EN - ' . $value->title_en . '<br>' .
            'LT - ' . $value->title_lt . '<br>' .
            'RUS - ' . $value->title_rus .
            '</td>
			<td class="td-' . $n . '" style="white-space: normal;">' .
            'EN - ' . substr(strip_tags($value->description_en), 0, 50) . '<br>' .
            'LT - ' . substr(strip_tags($value->description_lt), 0, 50) . '<br>' .
            'RUS - ' . substr(strip_tags($value->description_rus), 0, 50) .
            '. . . .</td>
			<td>
			<button type="button" onclick="editHomeBlog(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deleHometeBlog(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
        }
        return $html;
    }
    // end home blog

    // star blog
    public function Blog()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = Blog::orderBy('id', 'DESC')->get();
        $data['m_m_n'] = 'blog';

        $data['menus'] = Menu::get();

        return view('back-end.blog.blog', $data);
    }

    public function insertBlog(Request $req)
    {
        if ($req->is_video != 1) {
            if ($req->img) {
                $img = $req->file('img');
                $img_name = time() . '.' . $img->getClientOriginalExtension();
                $img->move('uploads/blogs', $img_name);
            }
        } else {
            preg_match('~v=([A-Za-z0-9]+)~', $req->video, $video_code);
        }
        $blog = new Blog;
        $blog->title = $req->title;
        $blog->description = $req->description;
        if ($req->is_video != 1) {
            if (@$img_name) {
                $blog->img = $img_name;
            }
        } else {
            if (count($video_code)) {
                $blog->video = $video_code[1];
            }
        }
        $blog->save();
        // return 'true';
        $blogs = Blog::orderBy('id', 'DESC')->get();
        $html = view('back-end.blog.blog-view')->with(['data' => $blogs])->render();
        return $html;
    }

    public function deleteBlog(Request $req)
    {
        $blog = Blog::find($req->id)->delete();

        $blogs = Blog::orderBy('id', 'DESC')->get();

        $html = view('back-end.blog.blog-view')->with(['data' => $blogs])->render();
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

    public function contact()
    {
        $data['data'] = Contact::orderBy('id', 'DESC')->first();
        $data['m_m_n'] = 'contact';
        // $data['m_n'] = 'main_slider';

        return view('back-end.contact.contact', $data);
    }
    public function contactSubmit(Request $req)
    {
        $check = Contact::orderBy('id', 'desc')->first();
        if ($check) {
            $contact = Contact::find($check->id);
        } else {
            $contact = new Contact;
        }
        $contact->company_name = $req->company_name;
        $contact->address = $req->address;
        $contact->tel = $req->tel;
        $contact->fax = $req->fax;
        $contact->email = $req->email;
        $contact->company_name_o = $req->company_name_o;
        $contact->address_o = $req->address_o;
        $contact->tel_o = $req->tel_o;
        $contact->fax_o = $req->fax_o;
        $contact->email_o = $req->email_o;
        $contact->company_code = $req->company_code;
        $contact->vat_code = $req->vat_code;
        $contact->bank_name = $req->bank_name;
        $contact->bank_code = $req->bank_code;
        $contact->other_code = $req->other_code;
        $contact->director_name = $req->director_name;
        $contact->director_tel = $req->director_tel;
        $contact->de_director_name = $req->de_director_name;
        $contact->de_director_tel = $req->de_director_tel;
        $contact->save();

        return back();
    }
}
