<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionController extends Controller
{
    public function destroy(Request $req){
      

    
        return redirect('/login'); // Redir
    }
}
