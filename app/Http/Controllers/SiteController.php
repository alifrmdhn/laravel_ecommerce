<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function auth(Request $req) {
        if (Auth::attempt(['email'=>$req->em, 'password'=>$req->pwd])) {
        //jika ada nilai lain selain data user yang ingin disimpan di session, baru

            return redirect('/product');
        }

        return redirect('/login')->with('msg', 'Email / password salah');
      }

}
