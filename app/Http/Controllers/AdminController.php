<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\Mahasiswa as MahasiswaModel;
use App\Models\Dosen as DosenModel;
use App\Models\Jurusan as JurusanModel;
use App\Models\ScoreJawaban as ScoreJawabanModel;
use DB;

class AdminController extends Controller
{
    //
    public function index(){
        return view('layouts.admin.admin');
    }

    public function manageuser(){
        // $getdatamahasiswa = UserModel::join('dosen', 'dosen.user_id', '=', 'users.id')
        //         ->get(['users.*','dosen.active','dosen.approve']);

        // $getdatadosen = UserModel::join('mahasiswa', 'mahasiswa.user_id', '=', 'users.id')
        // ->get(['users.*','mahasiswa.active','mahasiswa.approve'])->union($getdatamahasiswa);


        $getdatadsn = UserModel::select('users.id','users.name','users.email','users.usertype','users.updated_at','dosen.id as dsn_id','dosen.user_id as dsn_uid','dosen.fotodsn','dosen.approve','dosen.active')
                ->join('dosen', 'dosen.user_id','=','users.id')
                ->get();

        $getdatamhs = UserModel::select('users.id','users.name','users.email','users.usertype','users.updated_at','mahasiswa.id as mhs_id','mahasiswa.user_id as mhs_uid','mahasiswa.fotomhs', 'mahasiswa.approve','mahasiswa.active')
                ->join('mahasiswa', 'mahasiswa.user_id','=','users.id')
                ->get();


        //dd($getdatamhs);
        return view('layouts.admin.listuser')->with(['datadosen'=>$getdatadsn, 'datamahasiswa' =>$getdatamhs]);
    }

    public function userapprove(Request $request){
        //dd($request);
        $dosen = DosenModel::where('user_id', '=', $request->id)->exists();
        $mahasiswa = MahasiswaModel::where('user_id', '=', $request->id)->exists();
        if($dosen){
            $dosenapprove = DosenModel::where('user_id',$request->id)->update([
                'approve' => $request->approve_val
            ]);
            // $dosenapprove->approve = $request->approve_val;
            // $dosenapprove->save();
        }else if($mahasiswa){
            $mahasiswaapprove = MahasiswaModel::where('user_id',$request->id)->update([
                'approve' => $request->approve_val
            ]);
        }
        
        return redirect()->route('list.user');
        
    }
    public function gayabelajar(){
        $getdatascore = ScoreJawabanModel::select('mahasiswa.nim','mahasiswa.namadepan','mahasiswa.fotomhs','mahasiswa.namabelakang', 'score_jawaban.*')
                ->join('mahasiswa', 'mahasiswa.nim','=','score_jawaban.nim')
                ->get();

        //dd($getdatascore);

        return view('layouts.admin.gayabelajar')->with(['datascore'=>$getdatascore]);
    }
}
