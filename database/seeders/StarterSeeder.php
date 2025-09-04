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
        // Admin default (gunakan ini agar bisa login pertama kali)
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@sekolah.test'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );

        // Catatan: Konten halaman, berita, dan agenda TIDAK lagi di-seed.
        // Tambahkan kontennya dari menu Admin (Pages, Posts, Events).
        // Rekomendasi slug untuk menu yang sudah ada di navbar:
        // - sejarah
        // - visi-misi
        // - struktur-organisasi
        // - fasilitas
        // - prestasi
        // - ppdb
        // - jadwal-kegiatan
    }
}
