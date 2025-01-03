<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voting;
use Auth; 

class AdminController extends Controller
{
     //Fungsi menampilkan halaman admin
    public function index(){
        $stat = [
            "totalVotingan" => Voting::count(),

        ];

        $username = Auth::user()->username;

        return View('admin', compact(['stat', 'username']));
    }
}
