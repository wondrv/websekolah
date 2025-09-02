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
        \App\Models\Page::updateOrCreate(['slug' => 'about-us'], [
            'title' => 'Tentang Kami',
            'content' => 'Profil singkat sekolah, sejarah, dan nilai inti.',
            'published_at' => now(),
        ]);
        \App\Models\Page::updateOrCreate(['slug' => 'ppdb'], [
            'title' => 'PPDB',
            'content' => "Informasi Penerimaan Peserta Didik Baru (PPDB):\n- Syarat pendaftaran\n- Jadwal\n- Alur pendaftaran\n- Kontak panitia",
            'published_at' => now(),
        ]);
        // Profil Sekolah tambahan
        \App\Models\Page::updateOrCreate(['slug' => 'struktur-organisasi'], [
            'title' => 'Struktur Organisasi',
            'content' => "Kepala Sekolah\nWakil Kepala Sekolah\nGuru\nStaf Tata Usaha\n\n(Struktur detail dapat ditambahkan kemudian)",
            'published_at' => now(),
        ]);
        \App\Models\Page::updateOrCreate(['slug' => 'fasilitas'], [
            'title' => 'Fasilitas Sekolah',
            'content' => "Laboratorium, Perpustakaan, Lapangan Olahraga, Mushola, UKS, Ruang Multimedia, dll.",
            'published_at' => now(),
        ]);
        \App\Models\Page::updateOrCreate(['slug' => 'prestasi'], [
            'title' => 'Prestasi Sekolah',
            'content' => "Daftar prestasi akademik dan non-akademik siswa dan sekolah.",
            'published_at' => now(),
        ]);
        // Informasi Akademik tambahan
        \App\Models\Page::updateOrCreate(['slug' => 'jadwal-kegiatan'], [
            'title' => 'Jadwal Kegiatan',
            'content' => "Jadwal ekstrakurikuler mingguan dan agenda kegiatan tahunan.\n\n(Silakan diperbarui oleh admin)",
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
