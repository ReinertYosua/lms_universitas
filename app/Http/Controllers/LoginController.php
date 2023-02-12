<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dosen as DosenModel;
use App\Models\User as UserModel;
use App\Models\Mahasiswa as MahasiswaModel;

class LoginController extends Controller
{
    public function index(){
        if($user = Auth::user()){
            if($user->usertype == '1'){
                return redirect()->intended('admin');
            }else if($user->usertype == '2'){
                return redirect()->intended('dosen');
            }else if($user->usertype == '3'){
                return redirect()->intended('mahasiswa');
            }
        }
        return view('auth/login');
    }

    public function proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]
        );

        //cek user approve
        if(UserModel::join('dosen', 'users.id', '=', 'dosen.user_id')
                ->where([
                    ["dosen.approve", "=", "N"],
                    ["users.email", "=", $request->email]
                ])
                ->exists())
        {
            return back()->with('danger','Akun Dosen '.$request->email.' belum diapprove. Harap menunggu approval dari admin !');
        }else if(UserModel::join('mahasiswa', 'users.id', '=', 'mahasiswa.user_id')
                ->where([
                    ["mahasiswa.approve", "=", "N"],
                    ["users.email", "=", $request->email]
                ])
                ->exists())
        {
            return back()->with('danger','Akun Mahasiswa '.$request->email.' belum diapprove. Harap menunggu approval dari admin !');
        }else{
            $kredensial = $request->only('email','password');
            if(Auth::attempt($kredensial)){
                $request->session()->regenerate();
                $user=Auth::user();
                if($user->usertype == '1'){
                    session(['fotouser' => "admin.png"]);
                    return redirect()->intended('/admin');
                }else if($user->usertype == '2'){
                    $getfotodsn = UserModel::join('dosen', 'users.id', '=', 'dosen.user_id')
                            ->where([
                                ["dosen.user_id", "=", $user->id],
                            ])
                            ->get("dosen.fotodsn");
                    
                    session(['fotouser' => "dosen/".$getfotodsn[0]->fotodsn]);

                    return redirect()->intended('/dosen');
                }else if($user->usertype == '3'){
                    $getfotomhs = UserModel::join('mahasiswa', 'users.id', '=', 'mahasiswa.user_id')
                            ->where([
                                ["mahasiswa.user_id", "=", $user->id],
                            ])
                            ->get("mahasiswa.fotomhs");
                            
                            session(['fotouser' => "mahasiswa/".$getfotomhs[0]->fotomhs]);

                    return redirect()->intended('/mahasiswa/kuesioner');
                }
                //return redirect()->intended('/');
            }
            return back()->with('danger','Maaf email atau password anda salah !');
            // return back()->withErrors([
            //     'email' => 'Maaf email atau password anda salah',
            // ])->onlyInput('email');
        }
            
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
