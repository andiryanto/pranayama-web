<?php

return [

    'accepted'             => 'Kolom :attribute harus diterima.',
    'active_url'           => 'Kolom :attribute bukan URL yang valid.',
    'after'                => 'Kolom :attribute harus berupa tanggal setelah :date.',
    'after_or_equal'       => 'Kolom :attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha'                => 'Kolom :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Kolom :attribute hanya boleh berisi huruf, angka, strip dan garis bawah.',
    'alpha_num'            => 'Kolom :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Kolom :attribute harus berupa array.',
    'before'               => 'Kolom :attribute harus berupa tanggal sebelum :date.',
    'before_or_equal'      => 'Kolom :attribute harus berupa tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => 'Kolom :attribute harus antara :min dan :max.',
        'file'    => 'Kolom :attribute harus antara :min dan :max kilobyte.',
        'string'  => 'Kolom :attribute harus antara :min dan :max karakter.',
        'array'   => 'Kolom :attribute harus memiliki antara :min dan :max item.',
    ],
    'boolean'              => 'Kolom :attribute harus bernilai true atau false.',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => 'Kolom :attribute bukan tanggal yang valid.',
    'date_equals'          => 'Kolom :attribute harus sama dengan tanggal :date.',
    'date_format'          => 'Kolom :attribute tidak sesuai format :format.',
    'different'            => 'Kolom :attribute dan :other harus berbeda.',
    'digits'               => 'Kolom :attribute harus :digits digit.',
    'digits_between'       => 'Kolom :attribute harus antara :min dan :max digit.',
    'email'                => 'Kolom :attribute harus alamat email yang valid.',
    'exists'               => 'Kolom :attribute yang dipilih tidak valid.',
    'file'                 => 'Kolom :attribute harus berupa file.',
    'filled'               => 'Kolom :attribute wajib diisi.',
    'image'                => 'Kolom :attribute harus berupa gambar.',
    'in'                   => 'Kolom :attribute yang dipilih tidak valid.',
    'in_array'             => 'Kolom :attribute tidak ada di dalam :other.',
    'integer'              => 'Kolom :attribute harus berupa bilangan bulat.',
    'ip'                   => 'Kolom :attribute harus alamat IP yang valid.',
    'ipv4'                 => 'Kolom :attribute harus alamat IPv4 yang valid.',
    'ipv6'                 => 'Kolom :attribute harus alamat IPv6 yang valid.',
    'json'                 => 'Kolom :attribute harus string JSON yang valid.',
    'max'                  => [
        'numeric' => 'Kolom :attribute tidak boleh lebih dari :max.',
        'file'    => 'Kolom :attribute tidak boleh lebih dari :max kilobyte.',
        'string'  => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
        'array'   => 'Kolom :attribute tidak boleh lebih dari :max item.',
    ],
    'min'                  => [
        'numeric' => 'Kolom :attribute minimal :min.',
        'file'    => 'Kolom :attribute minimal :min kilobyte.',
        'string'  => 'Kolom :attribute minimal :min karakter.',
        'array'   => 'Kolom :attribute minimal :min item.',
    ],
    'not_in'               => 'Kolom :attribute yang dipilih tidak valid.',
    'numeric'              => 'Kolom :attribute harus berupa angka.',
    'present'              => 'Kolom :attribute harus ada.',
    'regex'                => 'Format kolom :attribute tidak valid.',
    'required'             => 'Kolom :attribute wajib diisi.',
    'required_if'          => 'Kolom :attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Kolom :attribute wajib diisi kecuali :other ada di :values.',
    'required_with'        => 'Kolom :attribute wajib diisi bila ada :values.',
    'required_with_all'    => 'Kolom :attribute wajib diisi bila ada :values.',
    'required_without'     => 'Kolom :attribute wajib diisi bila tidak ada :values.',
    'required_without_all' => 'Kolom :attribute wajib diisi bila tidak ada satupun dari :values.',
    'same'                 => 'Kolom :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Kolom :attribute harus :size.',
        'file'    => 'Kolom :attribute harus :size kilobyte.',
        'string'  => 'Kolom :attribute harus :size karakter.',
        'array'   => 'Kolom :attribute harus mengandung :size item.',
    ],
    'string'               => 'Kolom :attribute harus berupa string.',
    'timezone'             => 'Kolom :attribute harus zona waktu yang valid.',
    'unique'               => 'Kolom :attribute sudah digunakan.',
    'url'                  => 'Format kolom :attribute tidak valid.',
    'uuid'                 => 'Kolom :attribute harus UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'pesan-khusus',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'name'     => 'nama',
        'email'    => 'email',
        'phone'    => 'nomor HP',
        'password' => 'kata sandi',
    ],

];
