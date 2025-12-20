<?php

function tanggal_indonesia($tanggal)
{
    $bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    $time = strtotime($tanggal);

    return date('d', $time) . ' ' .
        $bulan[(int) date('m', $time)] . ' ' .
        date('Y', $time);
}
