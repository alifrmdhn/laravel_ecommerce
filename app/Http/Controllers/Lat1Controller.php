<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Lat1Controller extends Controller
{
    public function index() {
        $data['nama'] = "Agus";
        $data['asal'] = "Bandung";

        return view('v_latihan1', $data);
    }

    public function method2() {
        $data['title'] = "Daftar mahasiswa";
        $data['daf_mhs'] = array(
            array("nama" => "Agus 1", "asal" => "Bandung 1"),
            array("nama" => "Agus 2", "asal" => "Bandung 2"),
            array("nama" => "Agus 3", "asal" => "Bandung 3")
        );

        return view('v_latihan2', $data);

    }
}
