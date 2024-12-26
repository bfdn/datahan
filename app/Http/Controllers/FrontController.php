<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'ana-sayfa')->first();
        // Tüm "üst menü" kayıtları: parent_id = null
        // Alt menüler: children relationship
        $menus = Page::whereNull('parent_id')
            ->with('children')  // alt menüler
            ->get();


        return view('front.index', compact('menus', 'page'));
    }

    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $menus = Page::whereNull('parent_id')
            ->with('children')  // alt menüler
            ->get();

        return view('front.index', compact('menus', 'page'));
    }

    public function getContent($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $settings = Setting::first();

        if ($page->slug !== "iletisim") {
            return response()->json([
                'content' => $page->content ?? '',
                'settings' => $settings,
            ]);
        } else {
            return response()->json([
                'content' => $page->content ?? '',
                'settings' => view('front.contact', compact('settings'))->render(),
            ]);
        }
    }
}
