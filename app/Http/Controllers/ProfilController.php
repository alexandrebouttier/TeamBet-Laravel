<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil()
    {
       
        return view('pages/profil', [
            'tipster' => request('tipster'),
        ]);
    }

}
