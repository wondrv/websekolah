<?php

return [
    // Basic identity
    'name' => env('SCHOOL_NAME', 'Nama Sekolah'),
    'address' => env('SCHOOL_ADDRESS', 'Jl. Contoh Alamat No. 123, Kota, Provinsi'),
    'phone' => env('SCHOOL_PHONE', '+62 812-3456-7890'),
    'email' => env('SCHOOL_EMAIL', 'info@sekolah.test'),

    // Socials (optional)
    'facebook' => env('SCHOOL_FACEBOOK', null),
    'instagram' => env('SCHOOL_INSTAGRAM', null),
    'youtube' => env('SCHOOL_YOUTUBE', null),
];
