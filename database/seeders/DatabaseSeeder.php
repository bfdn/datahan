<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Bilal Fidan',
            'email' => 'bilalfiddan@gmail.com',
        ]);

        // 1) Ana Sayfa
        $anasayfa = Page::create([
            'title'   => 'Ana Sayfa',
            'slug'    => 'ana-sayfa',
            'parent_id' => null, // Üst menü, parent yok
            'content' => '<h1>Hoş Geldiniz!</h1><p>Burası ana sayfanın içeriği.</p>'
        ]);

        // 2) Hakkımda (üst menü)
        $hakkimda = Page::create([
            'title'   => 'Hakkımda',
            'slug'    => 'hakkimda',
            'parent_id' => null,
            'content' => null
        ]);

        // alt menü -> "Özgeçmişim"
        Page::create([
            'title'   => 'Özgeçmişim',
            'slug'    => 'ozgecmisim',
            'parent_id' => $hakkimda->id,
            'content' => '<p>Özgeçmiş metni burada.</p>'
        ]);

        // alt menü -> "Hobilerim"
        Page::create([
            'title'   => 'Hobilerim',
            'slug'    => 'hobilerim',
            'parent_id' => $hakkimda->id,
            'content' => '<p>Hobilerim listesi burada.</p>'
        ]);

        // alt menü -> "Fobilerim"
        Page::create([
            'title'   => 'Fobilerim',
            'slug'    => 'fobilerim',
            'parent_id' => $hakkimda->id,
            'content' => '<p>Fobilerim listesi burada.</p>'
        ]);

        // 3) Portfolyo (üst menü)
        $portfolyo = Page::create([
            'title'   => 'Portfolyo',
            'slug'    => 'portfolyo',
            'parent_id' => null
        ]);

        // alt menü -> "Bitirdiğim Okullar"
        Page::create([
            'title'   => 'Bitirdiğim Okullar',
            'slug'    => 'bitirdigim-okullar',
            'parent_id' => $portfolyo->id,
            'content' => '<p>Okullar listesi.</p>'
        ]);

        // alt menü -> "Bitirdiğim Projeler"
        Page::create([
            'title'   => 'Bitirdiğim Projeler',
            'slug'    => 'bitirdigim-projeler',
            'parent_id' => $portfolyo->id,
            'content' => '<p>Projeler listesi.</p>'
        ]);

        // Ayarlar
        // 4) İletişim (üst menü)
        $iletisim = Page::create([
            'title'   => 'İletişim',
            'slug'    => 'iletisim',
            'parent_id' => null
        ]);

        /*
        // alt menü -> "Harita"
        Page::create([
            'title'   => 'Harita',
            'slug'    => 'harita',
            'parent_id' => $iletisim->id,
            'content' => '<p>Google Maps veya benzeri embed kodu.</p>'
        ]);

        // alt menü -> "Telefon"
        Page::create([
            'title'   => 'Telefon',
            'slug'    => 'telefon',
            'parent_id' => $iletisim->id,
            'content' => '<p>(0xxx) 123 45 67</p>'
        ]);

        // alt menü -> "Adres"
        Page::create([
            'title'   => 'Adres',
            'slug'    => 'adres',
            'parent_id' => $iletisim->id,
            'content' => '<p>Standart adres bilgisi.</p>'
        ]);
        */
    }
}
