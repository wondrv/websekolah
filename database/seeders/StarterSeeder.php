<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@sekolah.test'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );
        \App\Models\Page::updateOrCreate(['slug' => 'sejarah'], [
            'title' => 'Sejarah Sekolah',
            'content' => 'Isi sejarah...',
            'published_at' => now(),
        ]);
        \App\Models\Page::updateOrCreate(['slug' => 'visi-misi'], [
            'title' => 'Visi & Misi',
            'content' => 'Visi... Misi...',
            'published_at' => now(),
        ]);
        \App\Models\Post::firstOrCreate(
            ['slug' => 'uji-coba-berita'],
            [
                'title' => 'Uji Coba Berita',
                'type' => 'news',
                'excerpt' => 'Contoh ringkasan berita',
                'body' => 'Konten berita...',
                'published_at' => now(),
            ]
        );

        // Events (Kalender Akademik)
        \App\Models\Event::firstOrCreate(
            ['title' => 'Ujian Tengah Semester'],
            [
                'description' => 'Pelaksanaan Ujian Tengah Semester Genap.',
                'starts_at' => now()->addDays(14)->setTime(7, 30),
                'ends_at' => now()->addDays(19)->setTime(12, 0),
                'location' => 'Seluruh ruang kelas',
                'is_public' => true,
            ]
        );
        \App\Models\Event::firstOrCreate(
            ['title' => 'Libur Semester'],
            [
                'description' => 'Masa liburan akhir semester genap.',
                'starts_at' => now()->addMonth()->setTime(0, 0),
                'ends_at' => now()->addMonth()->addDays(7)->setTime(23, 59),
                'location' => '-',
                'is_public' => true,
            ]
        );
        \App\Models\Event::firstOrCreate(
            ['title' => 'Penerimaan Rapor'],
            [
                'description' => 'Pembagian rapor semester genap kepada orang tua/wali.',
                'starts_at' => now()->addMonths(2)->setTime(8, 0),
                'ends_at' => now()->addMonths(2)->setTime(11, 0),
                'location' => 'Aula Sekolah',
                'is_public' => true,
            ]
        );
    }
}
