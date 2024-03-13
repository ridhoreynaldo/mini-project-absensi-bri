<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;//tambah
use App\Models\Code;//tambah
use Illuminate\Support\Facades\Auth;//tambah

use Illuminate\Support\Facades\Hash; //tambahan
use App\Models\Asisten;               //tambahan
use App\Models\Role;               //tambahan

class AdminController extends Controller
{
    public function index() {//tambah
        return view('dashboard');//tambah
    }//tambah

    public function indexAsisten() {//tambah
        $users = User::with('role')->get();
        // $users = User::All();
        return view('admin/data-asisten', compact('users'));//tambah
    }//tambah

    public function storeAsisten(Request $request)
    { 
        // dd($request);
        $asisten = new User;                                 //tambahan
        $asisten->name = $request->name;                  //tambahan
        $asisten->email = $request->email;                  //tambahan
        $asisten->password = Hash::make($request->password);                  //tambahan
        
        $asisten->role_id = $request->role_id;                  //tambahan

        $asisten->save();                                       //tambahan
        if (!$asisten){                                         //tambahan
            return redirect()->back();                          //tambahan
        }                        
        $users = User::with('role')->get();                               //tambahan
        return view('admin/data-asisten', compact('users'));//tambah
        //tambahan
    }
    public function destroy($id): RedirectResponse
    {
   
    }

    // public function index2() {//tambah
    //     $randomBytes = openssl_random_pseudo_bytes(8);
    //     $hexString = bin2hex($randomBytes);
    //     $shuffledString = '';
    //     for ($i = 0; $i < strlen($hexString); $i++) {
    //         if (ctype_alpha($hexString[$i])) {
    //             $shuffledString .= mt_rand(0, 1) ? strtoupper($hexString[$i]) : strtolower($hexString[$i]);
    //         } else {
    //             $shuffledString .= $hexString[$i];
    //         }
    //     }
    //     $dataw = $shuffledString;
    //     $aId = Auth::user()->id;

    //     $code = new Code();
    //     $code->code = $dataw;
    //     $code->id_user = $aId;
    //     $code->save();
    //     return view('admin.dashboard', compact('dataw'));

    // }//tambah
}
