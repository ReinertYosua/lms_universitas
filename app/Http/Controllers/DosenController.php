<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User as UserModel;
use App\Models\Matakuliah as MatakuliahModel;
use App\Models\MateriMatakuliah as MateriMatakuliahModel;
use App\Models\Jurusan as JurusanModel;
use App\Models\Dosen as DosenModel;
use App\Models\TransaksiMatakuliah as TransaksiMatakuliahModel;
use App\Models\Periode as PeriodeModel;
use App\Models\Scoring as ScoringModel;
use App\Models\Feedback as FeedbackModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use DB;
use Carbon\Carbon;


class DosenController extends Controller
{
    //
    public function index(){
        return view('layouts.lecturer.dosen');
    }

    public function listcourses(){
        $iddosen = DosenModel::where('user_id',Auth::user()->id)->get();
        // $getdatacourse = MatakuliahModel::select('matakuliah.id','matakuliah.kode_matakuliah', 'matakuliah.nama_matakuliah', 'matakuliah.sks', 'matakuliah.deskripsi','matakuliah.active','jurusan.jurusan')
        //         ->join('jurusan', 'jurusan.id','=','matakuliah.id_jurusan')
        //         ->where('id_dosen',$iddosen[0]->id)
        //         ->get();

        $getcourse = DB::table('matakuliah')
                    ->select('matakuliah.id','matakuliah.kode_matakuliah', 'matakuliah.nama_matakuliah', 'matakuliah.sks', 'matakuliah.deskripsi','matakuliah.active','jurusan.jurusan',DB::raw('(select count(materi_matakuliah.id_matakuliah) from materi_matakuliah WHERE materi_matakuliah.id_matakuliah = matakuliah.id) as total_session'))
                    ->join('jurusan', 'jurusan.id','=','matakuliah.id_jurusan')
                    ->where('id_dosen',$iddosen[0]->id)
                    ->get();

        return view('layouts.lecturer.listcourses')->with(['matkul'=>$getcourse]);
    }

    public function addcourses(){
        $jurusan = JurusanModel::all();
        return view('layouts.lecturer.addcourse')->with('jurusan', $jurusan);
    }

    public function createKode($jur){
        $kodejur = JurusanModel::where('id','=',$jur)->get();
        $number = MatakuliahModel::where('id_jurusan','=',$jur)->count('id_jurusan')+1;
        $idmatkul = MatakuliahModel::max('id')+1;
        //comp6232
        $kode = $kodejur[0]->kode_jurusan.str_pad($idmatkul+$number, 4, "0", STR_PAD_LEFT);
        // if($number>9){
        //     $kode = $kodejur[0]->kode_jurusan.str_pad($number, 4, "0", STR_PAD_LEFT);
        // }else{
        //     $kode = $kodejur[0]->kode_jurusan.str_pad($number, 4, "0", STR_PAD_LEFT);
        // }
    
        return $kode;
    }

    public function createcourse(Request $request){
        $rules =[
            'jurusan' => 'required',
            'matakuliah' => 'required|string|min:3|unique:matakuliah,nama_matakuliah',
            'sks' => 'required',
            'deskripsi' => 'required|string|min:3',
            'active' => 'required'
        ];
        $id=
        [
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => ':attribute maksimal berisi :max karakter.',
            'min' => ':attribute minimal berisi :min karakter.',
            'email' => ':attribute harus diisi dengan alamat email yang valid.',
            'unique' => ':attribute sudah ada.',
        ]; 
        $validator = Validator::make($request->all(),$rules,$id);

        if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator);
		}else{
            $kodeMtk = $this->createKode($request->jurusan);
            $iddosen = DosenModel::where('user_id',Auth::user()->id)->get();
            // dd($iddosen[0]->id);
            $mtk=MatakuliahModel::create([
                'id_dosen' => $iddosen[0]->id,
                'id_jurusan' => $request->jurusan,
                'kode_matakuliah' => $kodeMtk,
                'nama_matakuliah' => $request->matakuliah,
                'sks' => $request->sks,
                'deskripsi' => $request->deskripsi,
                'active' => $request->active,
                
            ]);

            return redirect()->route('list.courses')->with('success','Matakuliah '.$request->matakuliah.' berhasil disimpan.');
        }
        //dd($request);
    }

    public function deletecourse($id){
        $namamtk = MatakuliahModel::where('id',$id)->get();
        MatakuliahModel::destroy($id);
        // dd($namamtk[0]->nama_matakuliah);
        return redirect()->route('list.courses')->with('success','Matakuliah '.$namamtk[0]->nama_matakuliah.' berhasil dihapus.');
        
    }

    public function editcourse($id){
        $jurusan = JurusanModel::all();
        $mtk = MatakuliahModel::where('id',decrypt($id))->get();
        return view('layouts.lecturer.editcourse',['mk'=>$mtk,'jurusan'=>$jurusan]);
    }

    public function updatecourse(Request $request, $idmk){
        $rules =[
            'jurusan' => 'required',
            'matakuliah' => 'required|string|min:3',
            'sks' => 'required',
            'deskripsi' => 'required|string|min:3',
            //'active' => 'required'
        ];
        $id=
        [
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => ':attribute maksimal berisi :max karakter.',
            'min' => ':attribute minimal berisi :min karakter.',
            'email' => ':attribute harus diisi dengan alamat email yang valid.',
        ]; 
        $validator = Validator::make($request->all(),$rules,$id);
        //dd($request->all());
        if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator);
		}else{
             
             //dd(decrypt($idmk));
             $mk = MatakuliahModel::find(decrypt($idmk));
             if($request->active==""){
                $request->merge(['active' => "N"]);
             }
             $mk->update([
                 'id_jurusan' => $request->jurusan,
                 'kode_matakuliah' => $request->kode_matakuliah,
                 'nama_matakuliah' => $request->matakuliah,
                 'sks' => $request->sks,
                 'deskripsi' => $request->deskripsi,
                 'active' => $request->active,
             ]);
             return redirect()->route('list.courses')->with('success','Matakuliah '.$request->matakuliah.' berhasil diubah.');
        }
    }

    public function detailmateri($id){
        session(['idmatakuliah' => decrypt($id)]);
        $mtk = MatakuliahModel::where('id',decrypt($id))->get();
        $mmtk = MateriMatakuliahModel::where('id_matakuliah',session('idmatakuliah'))->get();
        //dd(session('idmatakuliah'));
        return view('layouts.lecturer.listdetailmateri',['materimk'=>$mmtk])->with('mk',$mtk);
    }

    public function addmatericourse($idmtk){
        $mtk = MatakuliahModel::where('id',decrypt($idmtk))->get();
        return view('layouts.lecturer.adddetailmateri',['mk'=>$mtk]);
    }

    public function createdetailcourse(Request $request){
        $rules =[
            'session' => 'required',
            'materi' => 'required|string|min:3',
            'jenis_materi' => 'required',
            'deskripsi' => 'required|string|min:3',
            'referensi' => 'required',
            'kesulitan' => 'required',
            'filemateri' => 'required',
            'filemateriactive' => 'required',
            'filematerireflective' => 'required',
            'filematerisensing' => 'required',
            'filemateriintuitive' => 'required',
            'filematerivisual' => 'required',
            'filemateriverbal' => 'required',
            'filematerisequential' => 'required',
            'filemateriglobal' => 'required'
        ];
        $id=
        [
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => ':attribute maksimal berisi :max karakter.',
            'min' => ':attribute minimal berisi :min karakter.',
            'email' => ':attribute harus diisi dengan alamat email yang valid.',
        ]; 
        $validator = Validator::make($request->all(),$rules,$id);
        //dd($request->all());
        
        $sessionexists=MateriMatakuliahModel::where('id_matakuliah','=',decrypt($request->id_mtk))->where('session','=',$request->session)->exists();
        //dd($sessionexists);
        if($sessionexists){
            //cek jika session sudah ada
            $validator->after(function ($validator) {

                if (request('event') == null) {
                    //add custom error to the Validator
                    $validator->errors()->add('session', 'Session sudah ada');
                }
            
            });
        }
       
        if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator);
		}else{
             //upload file
             $mtk = MatakuliahModel::where('id','=',decrypt($request->id_mtk))->get();

             $filemateri = $request->file('filemateri');
             $filename = $mtk[0]->kode_matakuliah."_session".$request->session.".".$filemateri->getClientOriginalExtension();
             $path = Storage::disk('public')->putFileAs('file/materikuliah', $filemateri,$filename);

             $filemateriactive = $request->file('filemateriactive');
             $filenameactive = $mtk[0]->kode_matakuliah."_session".$request->session."_active.".$filemateriactive->getClientOriginalExtension();
             $path = Storage::disk('public')->putFileAs('file/materikuliah', $filemateriactive,$filenameactive);

             $filematerireflective = $request->file('filematerireflective');
             $filenamereflective = $mtk[0]->kode_matakuliah."_session".$request->session."_reflective.".$filematerireflective->getClientOriginalExtension();
             $path = Storage::disk('public')->putFileAs('file/materikuliah', $filematerireflective,$filenamereflective);

             $filematerisensing = $request->file('filematerisensing');
             $filenamesensing = $mtk[0]->kode_matakuliah."_session".$request->session."_sensing.".$filematerisensing->getClientOriginalExtension();
             $path = Storage::disk('public')->putFileAs('file/materikuliah', $filematerisensing,$filenamesensing);

             $filemateriintuitive = $request->file('filemateriintuitive');
             $filenameintuitive = $mtk[0]->kode_matakuliah."_session".$request->session."_intuitive.".$filemateriintuitive->getClientOriginalExtension();
             $path = Storage::disk('public')->putFileAs('file/materikuliah', $filemateriintuitive,$filenameintuitive);

             $filematerivisual = $request->file('filematerivisual');
             $filenamevisual = $mtk[0]->kode_matakuliah."_session".$request->session."_visual.".$filematerivisual->getClientOriginalExtension();
             $path = Storage::disk('public')->putFileAs('file/materikuliah', $filematerivisual,$filenamevisual);

             $filemateriverbal = $request->file('filemateriverbal');
             $filenameverbal = $mtk[0]->kode_matakuliah."_session".$request->session."_verbal.".$filemateriverbal->getClientOriginalExtension();
             $path = Storage::disk('public')->putFileAs('file/materikuliah', $filemateriverbal,$filenameverbal);

             $filematerisequential = $request->file('filematerisequential');
             $filenamesequential = $mtk[0]->kode_matakuliah."_session".$request->session."_sequential.".$filematerisequential->getClientOriginalExtension();
             $path = Storage::disk('public')->putFileAs('file/materikuliah', $filematerisequential,$filenamesequential);

             $filemateriglobal = $request->file('filemateriglobal');
             $filenameglobal = $mtk[0]->kode_matakuliah."_session".$request->session."_global.".$filemateriglobal->getClientOriginalExtension();
             $path = Storage::disk('public')->putFileAs('file/materikuliah', $filemateriglobal,$filenameglobal);

             //$filemateri->storeAs('public/file/materikuliah', $filename);
 
             $mtk=MateriMatakuliahModel::create([
                 'id_matakuliah' => decrypt($request->id_mtk),
                 'session' => $request->session,
                 'materi' => $request->materi,
                 'jenis_materi' => $request->jenis_materi,
                 'deskripsi' => $request->deskripsi,
                 'referensi' => $request->referensi,
                 'tingkat_kesulitan' => $request->kesulitan, 
                 'file_materi' => $filename,
                 'file_active' => $filenameactive,
                 'file_reflective' => $filenamereflective,
                 'file_sensing' => $filenamesensing,
                 'file_intuitive' => $filenameintuitive,
                 'file_visual' => $filenamevisual,
                 'file_verbal' => $filenameverbal,
                 'file_sequential' => $filenamesequential,
                 'file_global' => $filenameglobal
                 
             ]);
 
             return redirect()->route('detail.materi', $request->id_mtk)->with('success',' Materi Session '.$request->session.' berhasil ditambahkan.');
        }
    }

    public function editdetailmateri($idmkdet,$idmk){
        $mtk = MatakuliahModel::where('id',decrypt($idmk))->get();
        $mmtk = MateriMatakuliahModel::where('id',decrypt($idmkdet))->get();
        return view('layouts.lecturer.editdetailmateri',['mk'=>$mtk,'mmk'=>$mmtk]);
    }

    public function updatedetailcourse(Request $request){
        $rules =[
            'session' => 'required',
            'materi' => 'required|string|min:3',
            'jenis_materi' => 'required',
            'deskripsi' => 'required|string|min:3',
            'referensi' => 'required',
            'kesulitan' => 'required',
            'filemateri' => 'required',
            'filemateriactive' => 'required',
            'filematerireflective' => 'required',
            'filematerisensing' => 'required',
            'filemateriintuitive' => 'required',
            'filematerivisual' => 'required',
            'filemateriverbal' => 'required',
            'filematerisequential' => 'required',
            'filemateriglobal' => 'required'
        ];
        $id=
        [
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => ':attribute maksimal berisi :max karakter.',
            'min' => ':attribute minimal berisi :min karakter.',
            'email' => ':attribute harus diisi dengan alamat email yang valid.',
        ]; 
        $validator = Validator::make($request->all(),$rules,$id);
        if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator);
		}else{
            // dd($request);

            $namamtk = MateriMatakuliahModel::where('id',decrypt($request->id_mmk))->get();
            if($namamtk[0]->file_materi!=""){
                //delete file lama
                Storage::delete('public/file/materikuliah/'.$namamtk[0]->file_materi);
            }
            

            $mtk = MatakuliahModel::where('id','=',decrypt($request->id_mtk))->get();

            $filemateri = $request->file('filemateri');
            $filename = $mtk[0]->kode_matakuliah."_session".$request->session.".".$filemateri->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('file/materikuliah', $filemateri,$filename);
            //$filemateri->storeAs('public/file/materikuliah', $filename);

            $filemateriactive = $request->file('filemateriactive');
            $filenameactive = $mtk[0]->kode_matakuliah."_session".$request->session."_active.".$filemateriactive->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('file/materikuliah', $filemateriactive,$filenameactive);

            $filematerireflective = $request->file('filematerireflective');
            $filenamereflective = $mtk[0]->kode_matakuliah."_session".$request->session."_reflective.".$filematerireflective->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('file/materikuliah', $filematerireflective,$filenamereflective);

            $filematerisensing = $request->file('filematerisensing');
            $filenamesensing = $mtk[0]->kode_matakuliah."_session".$request->session."_sensing.".$filematerisensing->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('file/materikuliah', $filematerisensing,$filenamesensing);

            $filemateriintuitive = $request->file('filemateriintuitive');
            $filenameintuitive = $mtk[0]->kode_matakuliah."_session".$request->session."_intuitive.".$filemateriintuitive->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('file/materikuliah', $filemateriintuitive,$filenameintuitive);

            $filematerivisual = $request->file('filematerivisual');
            $filenamevisual = $mtk[0]->kode_matakuliah."_session".$request->session."_visual.".$filematerivisual->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('file/materikuliah', $filematerivisual,$filenamevisual);

            $filemateriverbal = $request->file('filemateriverbal');
            $filenameverbal = $mtk[0]->kode_matakuliah."_session".$request->session."_verbal.".$filemateriverbal->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('file/materikuliah', $filemateriverbal,$filenameverbal);

            $filematerisequential = $request->file('filematerisequential');
            $filenamesequential = $mtk[0]->kode_matakuliah."_session".$request->session."_sequential.".$filematerisequential->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('file/materikuliah', $filematerisequential,$filenamesequential);

            $filemateriglobal = $request->file('filemateriglobal');
            $filenameglobal = $mtk[0]->kode_matakuliah."_session".$request->session."_global.".$filemateriglobal->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('file/materikuliah', $filemateriglobal,$filenameglobal);
             
            $dmk = MateriMatakuliahModel::find(decrypt($request->id_mmk));
            $dmk->update([
                'session' => $request->session,
                'materi' => $request->materi,
                'jenis_materi' => $request->jenis_materi,
                'deskripsi' => $request->deskripsi,
                'referensi' => $request->referensi,
                'tingkat_kesulitan' => $request->kesulitan,
                'file_materi' => $filename,
                'file_active' => $filenameactive,
                'file_reflective' => $filenamereflective,
                'file_sensing' => $filenamesensing,
                'file_intuitive' => $filenameintuitive,
                'file_visual' => $filenamevisual,
                'file_verbal' => $filenameverbal,
                'file_sequential' => $filenamesequential,
                'file_global' => $filenameglobal
            ]);
            return redirect()->route('detail.materi', $request->id_mtk)->with('success',' Materi Session '.$request->session.' berhasil diubah.');
        }
        
    }
    public function downloadmatericourse($filemateri){
        $extfil = explode(".",$filemateri);
        return Storage::disk('public')->download('file/materikuliah/'.$filemateri);

        // $file = Storage::disk('public')->get($filemateri);
  
        // return (new Response($file, 200))
        //       ->header('Content-Type', 'file/'.$extfil[1]);
    }

    public function deletematericourse($idmmk,$idmk){
        //dd($idmmk);
        $namamtk = MateriMatakuliahModel::where('id',decrypt($idmmk))->get();
        //dd($namamtk[0]->file_materi);
        Storage::delete('public/file/materikuliah/'.$namamtk[0]->file_materi);
        
        MateriMatakuliahModel::destroy(decrypt($idmmk));
        return redirect()->route('detail.materi', $idmk)->with('success','Materi '.$namamtk[0]->materi.' berhasil dihapus.');
        
    }

    public function listcoursescore(){
        $todayDate = Carbon::now();
        //dd($todayDate);
        $getPeriode = PeriodeModel::whereRaw('tanggal_awal <= ? and tanggal_akhir >= ?', [$todayDate, $todayDate])->get();

        //dd($getPeriode[0]->kode_periode);

        $iddosen = DosenModel::where('user_id',Auth::user()->id)->get();
        $getCourse = TransaksiMatakuliahModel::join('matakuliah','matakuliah.kode_matakuliah','=','transaksimatakuliah.kode_matakuliah')
                        ->select('transaksimatakuliah.kode_matakuliah','matakuliah.nama_matakuliah','matakuliah.sks')
                        ->where([
                                ['matakuliah.id_dosen','=',$iddosen[0]->id],
                                ['transaksimatakuliah.periode','=',$getPeriode[0]->kode_periode]
                                ])
                        ->groupBy('transaksimatakuliah.kode_matakuliah')
                        ->get();
                        
        return view('layouts.lecturer.listcoursescore')->with(['matkulscore'=>$getCourse,'periode'=>$getPeriode[0]->kode_periode]);
    }

    public function inputscore($kodemk){
        $todayDate = Carbon::now();
        //dd($todayDate);
        $getPeriode = PeriodeModel::whereRaw('tanggal_awal <= ? and tanggal_akhir >= ?', [$todayDate, $todayDate])->get();

        $getStudents = TransaksiMatakuliahModel::join('matakuliah','matakuliah.kode_matakuliah','=','transaksimatakuliah.kode_matakuliah')
                        ->join('mahasiswa','mahasiswa.nim','=','transaksimatakuliah.nim')
                        ->select('transaksimatakuliah.kode_matakuliah','matakuliah.nama_matakuliah','matakuliah.sks','transaksimatakuliah.nim','mahasiswa.nim','mahasiswa.namadepan','mahasiswa.namabelakang','mahasiswa.fotomhs')
                        ->where([
                            ['transaksimatakuliah.kode_matakuliah','=',decrypt($kodemk)],
                            ['transaksimatakuliah.periode','=',$getPeriode[0]->kode_periode]
                            ])
                        ->get();

        $getSession= MateriMatakuliahModel::join('matakuliah','matakuliah.id','=','materi_matakuliah.id_matakuliah')
                    ->select('materi_matakuliah.session')
                    ->where('matakuliah.kode_matakuliah','=',decrypt($kodemk))
                    ->get();
        //dd($getSession);
        
        return view('layouts.lecturer.liststudentscore')->with(['mhsscore'=>$getStudents,'periode'=>$getPeriode[0]->kode_periode,'session'=>$getSession]);
    }

    public function submitscore(Request $request){
        //dd($request->chkScore);
        $periode = decrypt($request->periode);
        $kode_mk = decrypt($request->kode_mk);
        $kategori = $request->kategori;

        $rules =[
            'kategori' => 'required',
            'chkScore' => 'required',
        ];
        $id=
        [
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => ':attribute maksimal berisi :max karakter.',
            'min' => ':attribute minimal berisi :min karakter.',
            'email' => ':attribute harus diisi dengan alamat email yang valid.',
        ];

        $validator = Validator::make($request->all(),$rules,$id);
        if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->with('danger','Belum memilih mahasiswa yang ingin diinput nilainya');
		}else{
            
            
            foreach($request->chkScore as $key1 => $value1){
                $data = $request->except('_token','periode','kategori','kode_mk','active','chkScore');
                
                foreach ($data as $key => $value) {
                    $nim = explode("_",$key);
                    //dd($nim[1]."-".$value);
                    //echo $nim[1]."-".$value1."<br>";
                    if($value>=70 && $value<=100)
                    {
                        $mastery = 'high';
                    }else if($value>=60 && $value<70){
                        $mastery = 'medium';
                    }else if($value < 60){
                        $mastery = 'low';
                    }

                    //cek nim yg dipilih
                    if($value1==$nim[1]){
                        //cek jika score exists
                        $scoringexists=ScoringModel::where('periode','=',$periode)
                                        ->where('kode_matakuliah','=',$kode_mk)
                                        ->where('nim','=',$nim[1])
                                        ->where('kategori_ujian','=',$kategori)
                                        ->exists();
                        if($scoringexists){
                            //echo $nim[1]."-".$periode."-".$kode_mk."-".$kategori."-".$value."Sudah<br>";
                            $dmk = ScoringModel::where('periode', $periode)
                                ->where('kode_matakuliah', $kode_mk)
                                ->where('nim',$nim[1])
                                ->where('kategori_ujian','=',$kategori)
                                ->update(['final_score' => $value,'topic_mastery' => $mastery]);
                        }else{
                            //echo $nim[1]."-".$periode."-".$kode_mk."-".$kategori."-".$value."Sudah<br>";
                            $dmk=ScoringModel::create([
                                'periode' => $periode,
                                'nim' => $nim[1],
                                'kode_matakuliah' => $kode_mk,
                                'kategori_ujian' => $kategori,
                                'final_score' => $value,
                                'topic_mastery' => $mastery
                            ]);
                        }
                    }
                }
                
            }
                
            return redirect()->route('listcourse.score')->with('success','Berhasil submit nilai.');
        }
        
    }

    public function detailscore($kodemk, $periode){
        
        $detscore = ScoringModel::select(
                        'scoring.periode',
                        'scoring.nim',
                        'scoring.kode_matakuliah',
                        'mahasiswa.namadepan', 
                        'mahasiswa.namabelakang', 
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '1' THEN scoring.final_score END) AS sesi1"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '2' THEN scoring.final_score END) AS sesi2"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '3' THEN scoring.final_score END) AS sesi3"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '4' THEN scoring.final_score END) AS sesi4"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '5' THEN scoring.final_score END) AS sesi5"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '6' THEN scoring.final_score END) AS sesi6"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '7' THEN scoring.final_score END) AS sesi7"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '8' THEN scoring.final_score END) AS sesi8"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '9' THEN scoring.final_score END) AS sesi9"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '10' THEN scoring.final_score END) AS sesi10"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '11' THEN scoring.final_score END) AS sesi11"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '12' THEN scoring.final_score END) AS sesi12"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '13' THEN scoring.final_score END) AS sesi13"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = 'UTS' THEN scoring.final_score END) AS sesiUTS"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = 'UAS' THEN scoring.final_score END) AS sesiUAS")
                    )
                    ->join('mahasiswa', 'mahasiswa.nim', '=', 'scoring.nim')
                    ->where('scoring.kode_matakuliah', '=', decrypt($kodemk))
                    ->where('scoring.periode', '=', $periode)
                    ->groupBy('scoring.periode', 'scoring.nim', 'scoring.kode_matakuliah')
                    ->get();

        //dd($detscore);

        //dump(decrypt($kodemk));
        $html = "";
        if(!empty($detscore)){
            //dd($detscore);
          foreach($detscore as $dts){

           $html .= "<tr>
                    <td>".$dts->nim."</td>
                    <td>".$dts->namadepan.$dts->namabelakang."</td>
                    <td>".$dts->sesi1."</td>
                    <td>".$dts->sesi2."</td>
                    <td>".$dts->sesi3."</td>
                    <td>".$dts->sesi4."</td>
                    <td>".$dts->sesi5."</td>
                    <td>".$dts->sesi6."</td>
                    <td>".$dts->sesi7."</td>
                    <td>".$dts->sesi8."</td>
                    <td>".$dts->sesi9."</td>
                    <td>".$dts->sesi10."</td>
                    <td>".$dts->sesi11."</td>
                    <td>".$dts->sesi12."</td>
                    <td>".$dts->sesi13."</td>
                    <td>".$dts->sesiUTS."</td>
                    <td>".$dts->sesiUAS."</td>
             </tr>
             ";
          }
        }

        //echo $html;

        $response['html'] = $html;
  
        return response()->json($response);

    }

    public function schedulelecturer(){
        // get nim from user login
        $user=Auth::user();
        $getiddosen = UserModel::join('dosen', 'users.id', '=', 'dosen.user_id')
                    ->where([
                        ["dosen.user_id", "=", $user->id],
                    ])
                    ->get("dosen.id");

        //get periode by tanggal berjalan
        $todayDate = Carbon::now();
        $getPeriode = PeriodeModel::whereRaw('tanggal_awal <= ? and tanggal_akhir >= ?', [$todayDate, $todayDate])->get();
        $periodtr ="";
        //dd($getPeriode[0]->kode_periode);
        if(!$getPeriode->isEmpty())
        {
            $resultschedule = TransaksiMatakuliahModel::select(
                        'transaksimatakuliah.id',
                        'transaksimatakuliah.periode',
                        'transaksimatakuliah.kode_matakuliah',
                        'matakuliah.nama_matakuliah',
                        'matakuliah.sks',
                        'matakuliah.deskripsi',
                        DB::raw('COUNT(transaksimatakuliah.nim) as total_mahasiswa')
                    )
                    ->join('matakuliah', 'matakuliah.kode_matakuliah', '=', 'transaksimatakuliah.kode_matakuliah')
                    ->join('dosen', 'dosen.id', '=', 'matakuliah.id_dosen')
                    ->where('periode', $getPeriode[0]->kode_periode)
                    ->where('matakuliah.id_dosen', $getiddosen[0]->id)
                    ->groupBy('transaksimatakuliah.kode_matakuliah')
                    ->get();
        }
        
                    $getperiod = PeriodeModel::all();
                    return view('layouts.lecturer.schedulelecturer')->with(['listperiode'=>$getperiod,'transaksi'=>$resultschedule,'periode'=>$getPeriode[0]->kode_periode]);
    }

    public function detailschedulelecturer($trkodemtk, $periode){
        $matakuliah = MatakuliahModel::where('matakuliah.kode_matakuliah','=',decrypt($trkodemtk))
                        ->get();
        $getmateri = MateriMatakuliahModel::join('matakuliah','matakuliah.id','=','materi_matakuliah.id_matakuliah')
                    ->where([["matakuliah.kode_matakuliah", "=", decrypt($trkodemtk)]])
                    ->select('matakuliah.kode_matakuliah','matakuliah.nama_matakuliah', 'materi_matakuliah.id','materi_matakuliah.session','materi_matakuliah.tingkat_kesulitan','materi_matakuliah.materi','materi_matakuliah.jenis_materi','materi_matakuliah.deskripsi','materi_matakuliah.referensi','materi_matakuliah.file_materi','materi_matakuliah.file_active','materi_matakuliah.file_reflective','materi_matakuliah.file_sensing','materi_matakuliah.file_intuitive','materi_matakuliah.file_visual','materi_matakuliah.file_verbal','materi_matakuliah.file_sequential','materi_matakuliah.file_global')
                    ->get();


        // $getstudentscore = DB::table('scoring')
        //                     ->select('scoring.periode', 'scoring.kode_matakuliah', 'scoring.nim','mahasiswa.fotomhs', 'mahasiswa.namadepan', 'mahasiswa.namabelakang', 
        //                             'scoring.kategori_ujian', 'scoring.final_score', 'scoring.topic_mastery')
        //                     ->join('mahasiswa', 'mahasiswa.nim', '=', 'scoring.nim')
        //                     ->whereNotIn('kategori_ujian', ['UTS', 'UAS'])
        //                     ->where('scoring.periode', '=', 'GENAP2022')
        //                     ->where('scoring.kode_matakuliah', '=', 'COMP0003')
        //                     ->get();
        //dd($getstudentscore);
        return view('layouts.lecturer.detailcourselecturer')->with(['detailjadwal'=>$getmateri,'matkul'=>$matakuliah,'periode'=>$periode]);
    }

    public function getAffection($mastery, $level){
        
        $affection = '';

        if ($mastery == 'low') {
            if ($level == 'low') {
                $affection = 'Apathy';
            } elseif ($level == 'medium') {
                $affection = 'Worry';
            } elseif ($level == 'high') {
                $affection = 'Anxiety';
            }
        } elseif ($mastery == 'medium') {
            if ($level == 'low') {
                $affection = 'Boredom';
            } elseif ($level == 'medium') {
                if ($affection == 'Netral') {
                    $affection = 'Netral';
                } elseif ($affection == 'Arousal') {
                    $affection = 'Arousal';
                }
            } elseif ($level == 'high') {
                $affection = 'Flow';
            }
        } elseif ($mastery == 'high') {
            if ($level == 'low') {
                $affection = 'Relaxation';
            } elseif ($level == 'medium') {
                $affection = 'Control';
            } elseif ($level == 'high') {
                $affection = 'Flow';
            }
        }

        return $affection;

    }

    public function detaillecturerscore($kodemk, $periode, $session){
        //dd(decrypt($kodemk)."-".decrypt($periode)."-".$session);
        $getdif = MateriMatakuliahModel::select('tingkat_kesulitan')
                    ->where('session','=',$session)
                    ->get();
        //dd($getdif[0]->tingkat_kesulitan);
        $detscore = DB::table('scoring')
                    ->join('mahasiswa', 'mahasiswa.nim', '=', 'scoring.nim')
                    ->select('scoring.periode', 'scoring.kode_matakuliah', 'scoring.nim', 'mahasiswa.fotomhs', 'mahasiswa.namadepan', 'mahasiswa.namabelakang', 'scoring.kategori_ujian', 'scoring.final_score', 'scoring.topic_mastery')
                    ->whereNotIn('scoring.kategori_ujian', ['UTS', 'UAS'])
                    ->where('scoring.kategori_ujian', $session)
                    ->where('scoring.periode', decrypt($periode))
                    ->where('scoring.kode_matakuliah', decrypt($kodemk))
                    ->get();

        //dd($detscore);

        //dump(decrypt($kodemk));
        $html = "";
        if(!empty($detscore)){
            //dd($detscore);
            $no=1;
          foreach($detscore as $dts){
                
           $html .= "<tr>
                <td width='10%'>".$no."</td>
                <td width='15%'>".$dts->nim."</td>
                <td width='30%'>".$dts->namadepan." ".$dts->namabelakang."</td>
                <td width='15%'>".$dts->final_score."</td>
                <td width='20%'>".$dts->topic_mastery."</td>
                <td width='10%'>".$this->getAffection($dts->topic_mastery,$getdif[0]->tingkat_kesulitan)."</td>
             </tr>
             ";
             $no++;
          }
        }

        //echo $html;

        $response['html'] = $html;
  
        return response()->json($response);
    }

    public function listcoursefeedback(){
        $todayDate = Carbon::now();
        //dd($todayDate);
        $getPeriode = PeriodeModel::whereRaw('tanggal_awal <= ? and tanggal_akhir >= ?', [$todayDate, $todayDate])->get();

        //dd($getPeriode[0]->kode_periode);

        $iddosen = DosenModel::where('user_id',Auth::user()->id)->get();
        $getCourse = TransaksiMatakuliahModel::join('matakuliah','matakuliah.kode_matakuliah','=','transaksimatakuliah.kode_matakuliah')
                        ->select('transaksimatakuliah.kode_matakuliah','matakuliah.nama_matakuliah','matakuliah.sks')
                        ->where([
                                ['matakuliah.id_dosen','=',$iddosen[0]->id],
                                ['transaksimatakuliah.periode','=',$getPeriode[0]->kode_periode]
                                ])
                        ->groupBy('transaksimatakuliah.kode_matakuliah')
                        ->get();
                        
        return view('layouts.lecturer.listcoursefeedback')->with(['matkulfeedback'=>$getCourse,'periode'=>$getPeriode[0]->kode_periode]);
    }

    public function inputfeedback($kodemk){
        $todayDate = Carbon::now();
        //dd($todayDate);
        $getPeriode = PeriodeModel::whereRaw('tanggal_awal <= ? and tanggal_akhir >= ?', [$todayDate, $todayDate])->get();

        $getStudents = TransaksiMatakuliahModel::join('matakuliah','matakuliah.kode_matakuliah','=','transaksimatakuliah.kode_matakuliah')
                        ->join('mahasiswa','mahasiswa.nim','=','transaksimatakuliah.nim')
                        ->select('transaksimatakuliah.kode_matakuliah','matakuliah.nama_matakuliah','matakuliah.sks','transaksimatakuliah.nim','mahasiswa.nim','mahasiswa.namadepan','mahasiswa.namabelakang','mahasiswa.fotomhs')
                        ->where([
                            ['transaksimatakuliah.kode_matakuliah','=',decrypt($kodemk)],
                            ['transaksimatakuliah.periode','=',$getPeriode[0]->kode_periode]
                            ])
                        ->get();

        $getSession= MateriMatakuliahModel::join('matakuliah','matakuliah.id','=','materi_matakuliah.id_matakuliah')
                    ->select('materi_matakuliah.session')
                    ->where('matakuliah.kode_matakuliah','=',decrypt($kodemk))
                    ->get();
        //dd($getSession);
        
        return view('layouts.lecturer.liststudentfeedback')->with(['mhsscore'=>$getStudents, 'periode'=>$getPeriode[0]->kode_periode,'session'=>$getSession]);
    }

    public function detaillecturerfeedback($kodemk, $periode, $session){
        //dd(decrypt($kodemk)."-".decrypt($periode)."-".$session);
        $getdif = MateriMatakuliahModel::select('tingkat_kesulitan')
                    ->where('session','=',$session)
                    ->get();
        //dd($getdif[0]->tingkat_kesulitan);
        $getStudents = $scoringData = ScoringModel::join('matakuliah', 'matakuliah.kode_matakuliah', '=', 'scoring.kode_matakuliah')
                        ->join('mahasiswa', 'mahasiswa.nim', '=', 'scoring.nim')
                        ->select('matakuliah.kode_matakuliah', 'matakuliah.nama_matakuliah', 'matakuliah.sks', 'mahasiswa.nim', 'mahasiswa.namadepan', 'mahasiswa.namabelakang', 'mahasiswa.fotomhs', 'scoring.id','scoring.final_score', 'scoring.kategori_ujian', 'scoring.topic_mastery')
                        ->where('scoring.kode_matakuliah', '=', decrypt($kodemk))
                        ->where('scoring.periode', '=', $periode)
                        ->where('scoring.kategori_ujian', '=', $session)
                        ->get();
    

        //dd($getStudents);

        //dump(decrypt($kodemk));
        $html = "";
        if(!empty($getStudents)){
            //dd($detscore);
            $no=1;
            $label="";
          foreach($getStudents as $get){
            if($get->topic_mastery=='high'){
                $label="label-success";
            }else if($get->topic_mastery=='medium'){
                $label="label-warning";
            }else if($get->topic_mastery=='low'){
                $label="label-danger";
            }
            $url = asset('storage/foto/mahasiswa/'.$get->fotomhs.'');
           $html .= "
            <tr>
                <td><img src='".$url."' class='rounded-circle mr-3' alt=''><label class='col-form-label' for='".$get->nim."'>".$get->nim." - ".$get->namadepan." ".$get->namabelakang ."</td>
                <td>
                    <span>".$get->final_score."</span>
                    
                </td>
                <td>
                    <span class='label ".$label." text-capitalize'>".$get->topic_mastery."</span>
                </td>
                <td>
                    <textarea class='form-control' name='fscore_".$get->id."' id='fscore_".$get->id."' cols='30' rows='3' placeholder='Masukkan Feedback' disabled></textarea>
                </td>
                
                <td>
                    <div class='input-group-text'>
                        <input type='checkbox' name='chkScore[]' id='chkScore' value='".$get->id."' onclick='checkmhs()'>
                    </div>
                </td>
            </tr>
             ";
             $no++;
          }
        }

        //echo $html;

        $response['html'] = $html;
  
        return response()->json($response);
    }

    public function submitfeedback(Request $request){
        //dd($request->chkScore);
        //$periode = decrypt($request->periode);
        //$kode_mk = decrypt($request->kode_mk);
        $iddosen = DosenModel::where('user_id',Auth::user()->id)->get();
        $kategori = $request->kategori;

        $rules =[
            'kategori' => 'required',
            'chkScore' => 'required',
        ];
        $id=
        [
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => ':attribute maksimal berisi :max karakter.',
            'min' => ':attribute minimal berisi :min karakter.',
            'email' => ':attribute harus diisi dengan alamat email yang valid.',
        ];

        $validator = Validator::make($request->all(),$rules,$id);
        if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->with('danger','Harus memilih mahasiswa terlebih dahulu');
		}else{
            //dd($request);
            
            foreach($request->chkScore as $key1 => $value1){
                $data = $request->except('_token','periode','kategori','kode_mk','active','chkScore');
                //echo $value1."a<br>";
                foreach ($data as $key => $value) {
                    $id_scoring = explode("_",$key);
                    if($value1==$id_scoring[1]){//cek idscoring jika nim sama dengan yang dipilih
                        //echo $value1."-".$id_scoring[1]."".$value."<br>";
                        //cek jika feedback exists
                        $feedbackexists=FeedbackModel::where('id_scoring','=',$id_scoring[1])
                                        ->exists();
                        if($feedbackexists){
                            $dmk = FeedbackModel::where('id_scoring','=',$id_scoring[1])
                                ->update(['saran' => $value,'id_dosen' => $iddosen[0]->id]);
                        }else{
                            $dmk=FeedbackModel::create([
                                'id_scoring' => $id_scoring[1],
                                'saran' => $value,
                                'id_dosen' => $iddosen[0]->id,
                            ]);
                        }

                    }
                }
                
            }
            return redirect()->route('listcourse.feedback')->with('success','Berhasil submit feedback.');
        }
        
    }

    public function detailfeedback($kodemk, $periode){
       
        $detfeedback = ScoringModel::select(
                        'scoring.periode',
                        'scoring.nim',
                        'scoring.kode_matakuliah',
                        'mahasiswa.namadepan', 
                        'mahasiswa.namabelakang', 
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '1' THEN feedback.saran END) AS sesi1"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '2' THEN feedback.saran END) AS sesi2"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '3' THEN feedback.saran END) AS sesi3"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '4' THEN feedback.saran END) AS sesi4"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '5' THEN feedback.saran END) AS sesi5"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '6' THEN feedback.saran END) AS sesi6"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '7' THEN feedback.saran END) AS sesi7"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '8' THEN feedback.saran END) AS sesi8"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '9' THEN feedback.saran END) AS sesi9"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '10' THEN feedback.saran END) AS sesi10"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '11' THEN feedback.saran END) AS sesi11"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '12' THEN feedback.saran END) AS sesi12"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = '13' THEN feedback.saran END) AS sesi13"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = 'UTS' THEN feedback.saran END) AS sesiUTS"),
                        DB::raw("MAX(CASE WHEN scoring.kategori_ujian = 'UAS' THEN feedback.saran END) AS sesiUAS")
                    )
                    ->join('feedback', 'feedback.id_scoring', '=', 'scoring.id')
                    ->join('mahasiswa', 'mahasiswa.nim', '=', 'scoring.nim')
                    ->where('scoring.kode_matakuliah', '=', decrypt($kodemk))
                    ->where('scoring.periode', '=', $periode)
                    ->groupBy('scoring.periode', 'scoring.nim', 'scoring.kode_matakuliah')
                    ->get();

        //dd($detfeedback);

        //dump(decrypt($kodemk));
        $html = "";
        if(!empty($detfeedback)){
            //dd($detscore);
          foreach($detfeedback as $dts){

           $html .= "<tr>
                <td>".$dts->nim."</td>
                <td>".$dts->namadepan.$dts->namabelakang."</td>
                <td>".$dts->sesi1."</td>
                <td>".$dts->sesi2."</td>
                <td>".$dts->sesi3."</td>
                <td>".$dts->sesi4."</td>
                <td>".$dts->sesi5."</td>
                <td>".$dts->sesi6."</td>
                <td>".$dts->sesi7."</td>
                <td>".$dts->sesi8."</td>
                <td>".$dts->sesi9."</td>
                <td>".$dts->sesi10."</td>
                <td>".$dts->sesi11."</td>
                <td>".$dts->sesi12."</td>
                <td>".$dts->sesi13."</td>
                <td>".$dts->sesiUTS."</td>
                <td>".$dts->sesiUAS."</td>
             </tr>
             ";
          }
        }

        //echo $html;

        $response['html'] = $html;
  
        return response()->json($response);

    }
}
