<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Page;
use Illuminate\Http\Request;
use App\Services\MakeUrlService;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function page()
    {
        $data['data'] = Page::orderBy('id', 'DESC')->get();
        // dd($menu);
        $data['m_n'] = 'page-list';
        $data['m_m_n'] = 'pages';
        return view('back-end.pages.page-list', $data);
    }
    public function insertPage(Request $request)
    {
        $page = new Page;
        $page->title_en = $request->title_en;
        $page->title_lt = $request->title_lt ?: $request->title_en;
        $page->title_rus = $request->title_rus ?: $request->title_en;
        $page->title_pt = $request->title_pt ?: $request->title_en;
        $page->title_es = $request->title_es ?: $request->title_en;
        $page->content_en = $request->content_en;
        $page->content_lt = $request->content_lt ?: $request->content_en;
        $page->content_rus = $request->content_rus ?: $request->content_en;
        $page->content_pt = $request->content_pt ?: $request->content_en;
        $page->content_es = $request->content_es ?: $request->content_en;
        $page->slug = MakeUrlService::url($request->title_en);
        $page->save();

        $pages = Page::orderBy('id', 'DESC')->get();

        $html = view('back-end.pages.page-view')->with(['data' => $pages])->render();

        return $html;
    }
    public function getPage(Request $request)
    {
        return $page = Page::find($request->id);
    }
    public function updatePage(Request $request)
    {
        $page = Page::find($request->id);
        $page->title_en = $request->title_en;
        $page->title_lt = $request->title_lt ?: $request->title_en;
        $page->title_rus = $request->title_rus ?: $request->title_en;
        $page->title_pt = $request->title_pt ?: $request->title_en;
        $page->title_es = $request->title_es ?: $request->title_en;
        $page->content_en = $request->content_en;
        $page->content_lt = $request->content_lt ?: $request->content_en;
        $page->content_rus = $request->content_rus ?: $request->content_en;
        $page->content_pt = $request->content_pt ?: $request->content_en;
        $page->content_es = $request->content_es ?: $request->content_en;
        $page->slug = MakeUrlService::url($request->title_en);
        $page->save();

        $pages = Page::orderBy('id', 'DESC')->get();

        $html = view('back-end.pages.page-view')->with(['data' => $pages])->render();

        return $html;
    }
    public function deletePage(Request $request)
    {
        $page = Page::find($request->id);
        $page->delete();

        $pages = Page::orderBy('id', 'DESC')->get();

        $html = view('back-end.pages.page-view')->with(['data' => $pages])->render();

        return $html;
    }
}
