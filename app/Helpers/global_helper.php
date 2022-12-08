<?php

use App\Models\metadata;

function get_meta_value($meta_key)
{
    $data = metadata::where('meta_key', $meta_key)->first();
    if ($data) {
        return $data->meta_value;
    }
}
function set_about_nama($nama)
{
    // nama = "Syaiful Iqbal"
    $arr = explode(" ", $nama); // index 1 Syaiful index 2 iqbal
    $kataakhir = end($arr);
    $kataakhir2 = "<span class='text-primary'>$kataakhir</span>";
    array_pop($arr);
    $namaAwal = implode(" ", $arr);
    return $namaAwal . " " . $kataakhir2;
}
function set_list_awards($isi)
{
    $isi = str_replace("<ul>", ' <ul class="fa-ul mb-0">', $isi);
    $isi = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>', $isi);
    return $isi;
}
function set_list_workflow($isi)
{
    $isi = str_replace("<ul>", ' <ul class="fa-ul mb-0">', $isi);
    $isi = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-check"></i></span>', $isi);
    return $isi;
}
