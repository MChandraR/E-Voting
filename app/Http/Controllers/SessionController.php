<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionController extends Controller
{
    public function destroy(Request $req){
        Auth::logout();

    
        return redirect('/login'); // Redir
    }
}
