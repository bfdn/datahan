<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Gösterme / form sayfası
    public function index()
    {
        // Normalde sadece 1 kayıt olduğunu varsayıyoruz
        $setting = Setting::first();

        // Eğer hiç kayıt yoksa create edelim (isteğe bağlı).
        if (!$setting) {
            $setting = Setting::create([
                'map' => '',
                'phone' => '',
                'address' => '',
            ]);
        }

        return view('settings.index', compact('setting'));
    }

    // Kaydetme
    public function update(Request $request)
    {
        // Basit validasyon örneği
        $request->validate([
            'map'       => 'nullable|string',
            'phone'     => 'nullable|string',
            'address'   => 'nullable|string',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        // Formdan gelen verileri güncelle
        $setting->update([
            'map'       => $request->input('map'),
            'phone'     => $request->input('phone'),
            'address'   => $request->input('address'),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Ayarlar başarıyla güncellendi!');
    }
}
