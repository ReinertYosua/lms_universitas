<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuesioner as KuesionerModel;
use App\Models\JawabanKuis as JawabanKuisModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;
use App\Models\Mahasiswa as MahasiswaModel;
use App\Models\ScoreJawaban as ScoreModel;
use App\Models\Periode as PeriodeModel;
use App\Models\Matakuliah as MatakuliahModel;
use App\Models\TransaksiMatakuliah as TransaksiMatakuliahModel;
use App\Models\MateriMatakuliah as MateriMatakuliahModel;
use Carbon\Carbon;

class MahasiswaController extends Controller
{
    //
    public function index(){
        //echo "halaman mhs";

        $user=Auth::user();
        $getnim = UserModel::join('mahasiswa', 'users.id', '=', 'mahasiswa.user_id')
                    ->where([
                        ["mahasiswa.user_id", "=", $user->id],
                    ])
                    ->get("mahasiswa.nim");
        if (JawabanKuisModel::where('nim', '=', $getnim[0]->nim)->exists()) {
                $getnim = UserModel::join('mahasiswa', 'users.id', '=', 'mahasiswa.user_id')
                            ->where([
                                ["mahasiswa.user_id", "=", $user->id],
                            ])
                            ->get("mahasiswa.nim");
                $score = ScoreModel::where('nim',$getnim[0]->nim)->first();
                if($score!=NULL){
                    $sc[0] = $score->score_active;
                    $sc[1] = $score->score_reflective;
                    $sc[2] = $score->score_sensing;
                    $sc[3] = $score->score_intuitive;
                    $sc[4] = $score->score_visual;
                    $sc[5] = $score->score_verbal;
                    $sc[6] = $score->score_sequential;
                    $sc[7] = $score->score_global;
                }else{
                    $sc[0] = null;
                    $sc[1] = null;
                    $sc[2] = null;
                    $sc[3] = null;
                    $sc[4] = null;
                    $sc[5] = null;
                    $sc[6] = null;
                    $sc[7] = null;
                }
                
            

                return view('layouts.student.mahasiswa', compact('sc'))->with('scorejwb',$score);
        }else{
            $kuesioner = kuesionerModel::all();
            return redirect()->route('tampil.kuesioner')->with('quiz', $kuesioner);
        }
            
    }

    public function kuesioner(){
        $user=Auth::user();
        $getnim = UserModel::join('mahasiswa', 'users.id', '=', 'mahasiswa.user_id')
                    ->where([
                        ["mahasiswa.user_id", "=", $user->id],
                    ])
                    ->get("mahasiswa.nim");
        //dd($getnim[0]->nim);
         //cek user already isi kuesioner
        if (JawabanKuisModel::where('nim', '=', $getnim[0]->nim)->exists()) {
            return redirect()->route('index.mahasiswa');
        }else{
            $kuesioner = kuesionerModel::all();
            return view('layouts.student.kuesioner')->with('quiz', $kuesioner);
        }
    }

    public function kuesionerstore(Request $request){
        $active= 0;
        $reflective= 0;
        $sensing= 0;
        $intuitive= 0;
        $visual= 0;
        $verbal= 0;
        $sequential= 0;
        $global = 0;
        $v_active= 0;
        $v_reflective= 0;
        $v_sensing= 0;
        $v_intuitive= 0;
        $v_visual= 0;
        $v_verbal= 0;
        $v_sequential= 0;
        $v_global = 0;
        $level ="";


        $user=Auth::user();
        $getnim = UserModel::join('mahasiswa', 'users.id', '=', 'mahasiswa.user_id')
                    ->where([
                        ["mahasiswa.user_id", "=", $user->id],
                    ])
                    ->get("mahasiswa.nim");
        //$nimmhs = (int)$getnim;
        //$newrequest=$request->request->add(['nim'=>$getnim]);
        $request->merge(['nim' => $getnim]);
        // dd($request->nim[0]->nim);
       
        $jawaban=JawabanKuisModel::create([
            "nim" => $request->nim[0]->nim,
            "P01" => $request->P01,
            "C01" => $request->C01,
            "R01" => $request->R01,
            "U01" => $request->U01,
            "P02" => $request->P02,
            "C02" => $request->C02,
            "R02" => $request->R02,
            "U02" => $request->U02,
            "P03" => $request->P03,
            "C03" => $request->C03,
            "R03" => $request->R03,
            "U03" => $request->U03,
            "P04" => $request->P04,
            "C04" => $request->C04,
            "R04" => $request->R04,
            "U04" => $request->U04,
            "P05" => $request->P05,
            "C05" => $request->C05,
            "R05" => $request->R05,
            "U05" => $request->U05,
            "P06" => $request->P06,
            "C06" => $request->C06,
            "R06" => $request->R06,
            "U06" => $request->U06,
            "P07" => $request->P07,
            "C07" => $request->C07,
            "R07" => $request->R07,
            "U07" => $request->U07,
            "P08" => $request->P08,
            "C08" => $request->C08,
            "R08" => $request->R08,
            "U08" => $request->U08,
            "P09" => $request->P09,
            "C09" => $request->C09,
            "R09" => $request->R09,
            "U09" => $request->U09,
            "P10" => $request->P10,
            "C10" => $request->C10,
            "R10" => $request->R10,
            "U10" => $request->U10,
            "P11" => $request->P11,
            "C11" => $request->C11,
            "R11" => $request->R11,
            "U11" => $request->U11,
        ]);

        $P[1]= $request->P01;
        $C[1]= $request->C01;
        $R[1]= $request->R01;
        $U[1]= $request->U01;
        $P[2]= $request->P02;
        $C[2]= $request->C02;
        $R[2]= $request->R02;
        $U[2]= $request->U02;
        $P[3]= $request->P03;
        $C[3]= $request->C03;
        $R[3]= $request->R03;
        $U[3]= $request->U03;
        $P[4]= $request->P04;
        $C[4]= $request->C04;
        $R[4]= $request->R04;
        $U[4]= $request->U04;
        $P[5]= $request->P05;
        $C[5]= $request->C05;
        $R[5]= $request->R05;
        $U[5]= $request->U05;
        $P[6]= $request->P06;
        $C[6]= $request->C06;
        $R[6]= $request->R06;
        $U[6]= $request->U06;
        $P[7]= $request->P07;
        $C[7]= $request->C07;
        $R[7]= $request->R07;
        $U[7]= $request->U07;
        $P[8]= $request->P08;
        $C[8]= $request->C08;
        $R[8]= $request->R08;
        $U[8]= $request->U08;
        $P[9]= $request->P09;
        $C[9]= $request->C09;
        $R[9]= $request->R09;
        $U[9]= $request->U09;
        $P[10]= $request->P10;
        $C[10]= $request->C10;
        $R[10]= $request->R10;
        $U[10]= $request->U10;
        $P[11]= $request->P11;
        $C[11]= $request->C11;
        $R[11]= $request->R11;
        $U[11]= $request->U11;

        //jawaban kuesioner 1->a, 0->b
        for($a=1;$a<=11;$a++){
            //echo $P[$a]."<br>";

            if($P[$a]==1){
                $active++;
            }else{
                $reflective++;
            }

            if($C[$a]==1){
                $sensing++;
            }else{
                $intuitive++;
            }

            if($R[$a]==1){
                $visual++;
            }else{
                $verbal++;
            }

            if($U[$a]==1){
                $sequential++;
            }else{
                $global++;
            }
        }


        if($active>$reflective){
            $v_active = $active-$reflective;
            $v_reflective = 0;
        }else{
            $v_active = 0;
            $v_reflective = $reflective-$active;
        }

        if($sensing>$intuitive){
            $v_sensing = $sensing-$intuitive;
            $v_intuitive = 0;
        }else{
            $v_sensing = 0;
            $v_intuitive = $intuitive-$sensing;
        }

        if($visual>$verbal){
            $v_visual = $visual-$verbal;
            $v_verbal = 0;
        }else{
            $v_visual = 0;
            $verbal = $verbal-$visual;
        }

        if($sequential>$global){
            $v_sequential = $sequential-$global;
            $v_global = 0;
        }else{
            $v_global = $global-$sequential;
            $v_sequential =0;
        }

        
        $myarrayassoc = array("Active" => $v_active, "Reflective" => $v_reflective, "Sensing" => $v_sensing, "Intuitive" => $v_intuitive, "Visual" => $v_visual, "Verbal" => $v_verbal, "Sequential" => $v_sequential, "Global" => $v_global);
        $value = max($myarrayassoc);
        $key = array_search($value, $myarrayassoc);
        // echo "The max value is: ".$value.", its key is: ".$key."</br>";
        
        if($value >=1 && $value <=3){
            $level = "balance";
        }else if($value >=5 && $value <=7){
            $level = "moderate";
        }else if($value >=9 && $value <=11){
            $level = "strong";
        }
        
        // echo $active."-".$reflective."-".$sensing."-".$intuitive."-".$visual."-".$verbal."-".$sequential."-".$global;
        // echo $level;
        // dd($v_active."-".$v_reflective."-".$v_sensing."-".$v_intuitive."-".$v_visual."-".$v_verbal."-".$v_sequential."-".$v_global);
       
        $score_j=ScoreModel::create([
            "nim" => $request->nim[0]->nim,
            "score_active" => $active,
            "score_reflective" => $reflective,
            "score_sensing" => $sensing,
            "score_intuitive" => $intuitive,
            "score_visual" => $visual,
            "score_verbal" => $verbal,
            "score_sequential" => $sequential,
            "score_global" => $global,
            "v_active" => $v_active,
            "v_reflective" => $v_reflective,
            "v_sensing" => $v_sensing,
            "v_intuitive" => $v_intuitive,
            "v_visual" => $v_visual,
            "v_verbal" => $v_verbal,
            "v_sequential" => $v_sequential,
            "v_global" => $v_global,
            "dominan" => $key,
            "level" => $level,

        ]);

        return redirect()->route('index.mahasiswa');
       
        
    }

    public function enrollcourse(){
        $todayDate = Carbon::now();
        //dd($todayDate);
        $getPeriode = PeriodeModel::whereRaw('tanggal_awal <= ? and tanggal_akhir >= ?', [$todayDate, $todayDate])->get();

       
        //dd($getPeriode[0]->kode_periode);

        $user=Auth::user();
        $getmhs= UserModel::join('mahasiswa', 'users.id', '=', 'mahasiswa.user_id')
                    ->where([
                        ["mahasiswa.user_id", "=", $user->id],
                    ])
                    ->get();
        //dd($getmhs[0]->jurusan_id);
        
        $getmtk = MatakuliahModel::where('id_jurusan',$getmhs[0]->jurusan_id)
                ->where('active','Y')
                ->get();

        $periode="";
        if($getPeriode->isEmpty()){
            //get data matkul yang dipilih
           $periode="";
        }else{
            $periode=$getPeriode[0]->kode_periode;
        }
        //get data matkul yang dipilih
        $gettransaksi = TransaksiMatakuliahModel::join('mahasiswa', 'mahasiswa.nim', '=', 'transaksimatakuliah.nim')
        ->join('matakuliah','matakuliah.kode_matakuliah','=','transaksimatakuliah.kode_matakuliah')
        ->where([
            ["mahasiswa.nim", "=", $getmhs[0]->nim],
            ["transaksimatakuliah.periode","=",$periode]
        ])
        ->select('transaksimatakuliah.id','transaksimatakuliah.periode','transaksimatakuliah.kode_matakuliah','matakuliah.nama_matakuliah','matakuliah.sks','matakuliah.deskripsi','mahasiswa.nim','mahasiswa.namadepan','mahasiswa.namabelakang')
        ->get();
       

        return view('layouts.student.listcoursesmhs')->with(['matkul'=>$getmtk,'periode'=>$periode,'transaksi'=>$gettransaksi]);
        
        
    }

    public function deletetrcourse($trid,$namamtk){
        $tr=TransaksiMatakuliahModel::destroy($trid);
        return redirect()->route('enroll.course')->with('success','Matakuliah '.$namamtk.' berhasil dihapus.');
    }

    public function addtrcourse($mkkode){
        
        // get nim from user login
        $user=Auth::user();
        $getnim = UserModel::join('mahasiswa', 'users.id', '=', 'mahasiswa.user_id')
                    ->where([
                        ["mahasiswa.user_id", "=", $user->id],
                    ])
                    ->get("mahasiswa.nim");
        //dd($getnim[0]->nim);


        $getmtk = MatakuliahModel::where('kode_matakuliah',$mkkode)->get();
        $namamtk = $getmtk[0]->nama_matakuliah;

        
        //get periode by tanggal berjalan
        $todayDate = Carbon::now();
        $getPeriode = PeriodeModel::whereRaw('tanggal_awal <= ? and tanggal_akhir >= ?', [$todayDate, $todayDate])->get();
        //dd($getPeriode[0]->kode_periode);


        //=========== cek sks
        $getsks = TransaksiMatakuliahModel::join('matakuliah','matakuliah.kode_matakuliah','=','transaksimatakuliah.kode_matakuliah')
                    ->where([
                        ["transaksimatakuliah.nim", "=", $getnim[0]->nim],
                        ["transaksimatakuliah.periode","=",$getPeriode[0]->kode_periode]
                    ])
                    ->sum("matakuliah.sks");
        // ==============
        
        if(!$getPeriode->isEmpty())
        {
            if(TransaksiMatakuliahModel::where('nim', '=', $getnim[0]->nim)->where('periode', '=', $getPeriode[0]->kode_periode)->where('kode_matakuliah', '=', $mkkode)->exists()){
                return redirect()->route('enroll.course')->with('danger','Matakuliah '.$namamtk.' sudah ditambahkan.');
            }elseif(($getsks+0) >= 20){
                return redirect()->route('enroll.course')->with('danger','Total SKS sudah lebih dari 20 SKS.');
            }else{
                $trans=TransaksiMatakuliahModel::create([
                    "periode" => $getPeriode[0]->kode_periode,
                    "nim" => $getnim[0]->nim,
                    "kode_matakuliah" => $mkkode
                ]);
                return redirect()->route('enroll.course')->with('success','Matakuliah '.$namamtk.' berhasil ditambahkan.');
            }
            
        }
    }

    public function schedulecourse(){
        // get nim from user login
        $user=Auth::user();
        $getnim = UserModel::join('mahasiswa', 'users.id', '=', 'mahasiswa.user_id')
                    ->where([
                        ["mahasiswa.user_id", "=", $user->id],
                    ])
                    ->get("mahasiswa.nim");

        //get periode by tanggal berjalan
        $todayDate = Carbon::now();
        $getPeriode = PeriodeModel::whereRaw('tanggal_awal <= ? and tanggal_akhir >= ?', [$todayDate, $todayDate])->get();
        $periodtr ="";
        //dd($getPeriode[0]->kode_periode);
        if(!$getPeriode->isEmpty())
        {
            //get data matkul yang dipilih
            $gettransaksi = TransaksiMatakuliahModel::join('mahasiswa', 'mahasiswa.nim', '=', 'transaksimatakuliah.nim')
            ->join('matakuliah','matakuliah.kode_matakuliah','=','transaksimatakuliah.kode_matakuliah')
            ->where([
                ["mahasiswa.nim", "=", $getnim[0]->nim],
                ["transaksimatakuliah.periode","=",$getPeriode[0]->kode_periode]
            ])
            ->select('transaksimatakuliah.id','transaksimatakuliah.periode','transaksimatakuliah.kode_matakuliah','matakuliah.nama_matakuliah','matakuliah.sks','matakuliah.deskripsi')
            ->get();
            
        }


        $getperiod = PeriodeModel::all();
        return view('layouts.student.schedule')->with(['listperiode'=>$getperiod,'transaksi'=>$gettransaksi,'periode'=>$getPeriode[0]->kode_periode]);
    }

    public function detailschedule($trkodemtk, $periode){
        $matakuliah = MatakuliahModel::where('matakuliah.kode_matakuliah','=',decrypt($trkodemtk))
                        ->get();
       
        $getmateri = MateriMatakuliahModel::join('matakuliah','matakuliah.id','=','materi_matakuliah.id_matakuliah')
                    ->where([["matakuliah.kode_matakuliah", "=", decrypt($trkodemtk)]])
                    ->select('materi_matakuliah.id','materi_matakuliah.session','materi_matakuliah.materi','materi_matakuliah.jenis_materi','materi_matakuliah.deskripsi','materi_matakuliah.referensi','materi_matakuliah.file_materi')
                    ->get();
        //dd($getmateri);
        return view('layouts.student.detailcourse')->with(['detailjadwal'=>$getmateri,'matkul'=>$matakuliah]);
        
    }

}
