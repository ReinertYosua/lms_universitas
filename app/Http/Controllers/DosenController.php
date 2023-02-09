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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;


class DosenController extends Controller
{
    //
    public function index(){
        return view('layouts.lecturer.dosen');
    }

    public function listcourses(){
        $iddosen = DosenModel::where('user_id',Auth::user()->id)->get();
        $getdatacourse = MatakuliahModel::select('matakuliah.id','matakuliah.kode_matakuliah', 'matakuliah.nama_matakuliah', 'matakuliah.sks', 'matakuliah.deskripsi','matakuliah.active','jurusan.jurusan')
                ->join('jurusan', 'jurusan.id','=','matakuliah.id_jurusan')
                ->where('id_dosen',$iddosen[0]->id)
                ->get();
        
        return view('layouts.lecturer.listcourses')->with(['matkul'=>$getdatacourse]);
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
            'filemateri' => 'required'
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

             //$filemateri->storeAs('public/file/materikuliah', $filename);
 
             $mtk=MateriMatakuliahModel::create([
                 'id_matakuliah' => decrypt($request->id_mtk),
                 'session' => $request->session,
                 'materi' => $request->materi,
                 'jenis_materi' => $request->jenis_materi,
                 'deskripsi' => $request->deskripsi,
                 'referensi' => $request->referensi,
                 'file_materi' => $filename,
                 
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
            'filemateri' => 'required'
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
             
            $dmk = MateriMatakuliahModel::find(decrypt($request->id_mmk));
            $dmk->update([
                'session' => $request->session,
                'materi' => $request->materi,
                'jenis_materi' => $request->jenis_materi,
                'deskripsi' => $request->deskripsi,
                'referensi' => $request->referensi,
                'file_materi' => $filename,
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
}
