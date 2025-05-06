<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pengelolaan()
    {
        $data = [
            ['id' => 1, 'nama' => 'Tugas 1', 'status' => 'Selesai'],
            ['id' => 2, 'nama' => 'Tugas 2', 'status' => 'Belum Selesai'],
            ['id' => 3, 'nama' => 'Tugas 3', 'status' => 'Dalam Proses'],
        ];

        return view('to-do-list', compact('data'));
    }
}
