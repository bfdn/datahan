<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // 1) Listeleme
    public function index()
    {
        // Tüm sayfaları çekebilirsiniz
        $pages = Page::orderBy('id', 'desc')->get();
        return view('pages.index', compact('pages'));
    }

    // 2) Düzenleme Formu
    public function edit(Page $page)
    {
        // Route Model Binding ile $page nesnesi gelir
        return view('pages.edit', compact('page'));
    }

    // 3) Update
    public function update(Request $request, Page $page)
    {
        // Validasyon basit bir örnek:
        $request->validate([
            'title' => 'required|string|max:255',
            'slug'  => 'required|string|max:255',
            'content' => 'nullable|string'
        ]);

        $page->update([
            'title'   => $request->input('title'),
            'slug'    => $request->input('slug'),
            'content' => $request->input('content'),
        ]);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Kayıt başarıyla güncellendi!');
    }
}
