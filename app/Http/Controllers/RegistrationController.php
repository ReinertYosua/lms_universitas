<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User as UserModel;
use App\Models\Dosen as DosenModel;
use App\Models\Jurusan as JurusanModel;
use App\Models\Mahasiswa as MahasiswaModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    //
    public function indexdosen(){
        return view('auth/registrationdosen');
    }

    public function storedosen(Request $request){
        
        $rules = [
            'nidn' => 'required|min:3|max:255',
            'namalengkap' => 'required|string|min:3|max:255',
            //'email' => 'required|string|min:3|max:255|unique:users,email',
            'email' => 'required|string|min:3|max:255',
            'tempatlahir' => 'required|string|min:3|max:255',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required|string|min:3|max:255',
            'imageprofil' => 'required|image',
            'imageprofil.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2048',
            'nomortelepon' => 'required|numeric',
            'katasandi' => 'required|min:8|max:255',
            'katasandikonfirmasi' => 'required|min:8|max:255',
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
        
        session(['katasandi1' => $request->katasandi,'katasandi2' => $request->katasandikonfirmasi]);
       
        // $validator->after(function($validator)
        // {
            
        //     if(session('katasandi1') != session('katasandi2')){
        //         $validator->errors()->add('sandinotmatch', 'Kata sandi tidak sama');
        //     }
        // });

        // dd($validator);
		if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator);
		}else if(session('katasandi1') != session('katasandi2')){
            return redirect()->back()->withInput()->with('danger','Kata sandi tidak sama');
        }else{
            //cek user already register
            //$getUser = UserModel::where('email', $request->email)->get();
            if (UserModel::where('email', '=', $request->email)->exists()) {
                return redirect()->back()->withInput()->with('danger','Registrasi Dosen '.$request->first_name.' gagal. Email sudah terdaftar!');
                // return redirect()->route('registrasidosen')->with('danger','Registrasi Dosen '.$request->first_name.' gagal. Email sudah terdaftar!');
            }if (DosenModel::where('nidn', '=', $request->nidn)->exists()) {
                return redirect()->back()->withInput()->with('danger','Registrasi Dosen '.$request->first_name.' gagal. NIDN sudah terdaftar!');
            } else {
                //upload image
                $imageDosen = $request->file('imageprofil');
                $imagenameDosen = $request->nidn.".".$imageDosen->getClientOriginalExtension();
                $pathDosen = Storage::disk('public')->putFileAs('foto/dosen', $imageDosen,$imagenameDosen);
                //$image->storeAs('public/foto/dosen', $imagename);

                
                $user=UserModel::create([
                    'name' => $request->namalengkap,
                    'email' => $request->email,
                    'usertype' => '2',
                    'email_verified_at' => NULL,
                    'password' => Hash::make($request->katasandikonfirmasi),
                ]);
               
                //get user_id untuk sebagai FK di table dosen
                $getUser = UserModel::where('email', $request->email)->get();
                $dosen=DosenModel::create([
                    'user_id' => $getUser[0]->id,
                    'nidn' => $request->nidn,
                    'namadsn' => $request->namalengkap,
                    'tempatlahirdsn' => $request->tempatlahir,
                    'tgllahirdsn' => $request->tanggallahir,
                    'genderdsn' => $request->jeniskelamin,
                    'alamatdsn' => $request->alamat,
                    'fotodsn' => $imagenameDosen,
                    'notlpdsn' => $request->nomortelepon,
                    'approve' => "N",
                    'active' => "Y"
                ]);
                // Customer::create($request->all());
                return redirect()->route('login')->with('success','Registrasi Dosen '.$request->first_name.' berhasil terdaftar. Mohon menunggu approval dari admin, selanjutnya silahkan login menggunakan akun yang sudah dibuat.');
            }

                
            
                
                
                
        }
    }

    public function indexmahasiswa(){
        $jurusan = JurusanModel::all();
        return view('auth/registrationmahasiswa', compact('jurusan'));
    }

    public function storemhs(Request $request){
        
        $rules = [
            'nim' => 'required|min:3|max:255',
            'namadepan' => 'required|string|min:3|max:255',
            'namabelakang' => 'required|string|min:3|max:255',
            'jurusan' => 'required',
            //'email' => 'required|string|min:3|max:255|unique:users,email',
            'email' => 'required|string|min:3|max:255',
            'tempatlahir' => 'required|string|min:3|max:255',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required|string|min:3|max:255',
            'imageprofil' => 'required|image',
            'imageprofil.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2048',
            'nomortelepon' => 'required|numeric',
            'universitas_asal' => 'required|min:3|max:255',
            'fakultas' => 'required|min:3|max:255',
            'program_studi' => 'required|min:3|max:255',
            'fotoidcard' => 'required|image',
            'fotoidcard.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2048',
            'suratpengantar' => 'required',
            'suratpengantar.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2048',
            'katasandi' => 'required|min:8|max:255',
            'katasandikonfirmasi' => 'required|min:8|max:255',
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
        
        session(['katasandi1mhs' => $request->katasandi,'katasandi2mhs' => $request->katasandikonfirmasi]);
       
        // $validator->after(function($validator)
        // {
            
        //     if(session('katasandi1mhs') != session('katasandi2mhs')){
                
        //         $validator->errors()->add('sandinotmatch', 'Kata sandi tidak sama');
        //     }
        // });

		if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator);
		}else if(session('katasandi1mhs') != session('katasandi2mhs')){
            return redirect()->back()->withInput()->with('danger','Kata sandi tidak sama');
        }
        else{
            //cek user already register
            //$getUser = UserModel::where('email', $request->email)->get();
            if (UserModel::where('email', '=', $request->email)->exists()) {
                return redirect()->back()->withInput()->with('danger','Registrasi Mahasiswa '.$request->namadepan.' gagal. Email sudah terdaftar!');
            }if (MahasiswaModel::where('nim', '=', $request->nim)->exists()) {
                return redirect()->back()->withInput()->with('danger','Registrasi Mahasiswa '.$request->namadepan.' gagal. NIM sudah terdaftar!');
            } else {
                //upload image
                $imageprofil = $request->file('imageprofil');
                $imagename = $request->nim.".".$imageprofil->getClientOriginalExtension();
                $path1 = Storage::disk('public')->putFileAs('foto/mahasiswa', $imageprofil,$imagename);
                //$image->storeAs('public/foto/mahasiswa', $imagename);

                $fotoid = $request->file('fotoidcard');
                $imagenameid = $request->nim.".".$fotoid->getClientOriginalExtension();
                $path2 = Storage::disk('public')->putFileAs('foto/mahasiswa/idcard', $fotoid,$imagenameid);
                //$image->storeAs('public/foto/mahasiswa/idcard', $imagename);

                $surat = $request->file('suratpengantar');
                $imagenamesp = $request->nim.".".$surat->getClientOriginalExtension();
                $path3 = Storage::disk('public')->putFileAs('foto/mahasiswa/surat', $surat,$imagenamesp);
                //$image->storeAs('public/foto/mahasiswa/surat', $imagename);

                $user=UserModel::create([
                    'name' => $request->namadepan." ".$request->namabelakang,
                    'email' => $request->email,
                    'usertype' => '3',
                    'email_verified_at' => NULL,
                    'password' => Hash::make($request->katasandikonfirmasi),
                ]);
               
                //get user_id untuk sebagai FK di table mahasiswa
                $getUser = UserModel::where('email', $request->email)->get();
                $dosen=MahasiswaModel::create([
                    'user_id' => $getUser[0]->id,
                    'nim' => $request->nim,
                    'jurusan_id' => $request->jurusan,
                    'namadepan' => $request->namadepan,
                    'namabelakang' => $request->namabelakang,
                    'tempatlahirmhs' => $request->tempatlahir,
                    'tgllahirmhs' => $request->tanggallahir,
                    'gendermhs' => $request->jeniskelamin,
                    'alamatmhs' => $request->alamat,
                    'fotomhs' => $imagename,
                    'notlpmhs' => $request->nomortelepon,
                    'perguruantinggi' => $request->universitas_asal,
                    'fakultas' => $request->fakultas,
                    'programstudi' => $request->program_studi,
                    'fotoidcard' => $imagenameid,
                    'suratpengantar' => $imagenamesp,
                    'approve' => "N",
                    'active' => "Y"
                ]);
                // Customer::create($request->all());
                return redirect()->route('login')->with('success','Registrasi Mahasiswa '.$request->first_name.' berhasil terdaftar. Mohon menunggu approval dari admin, selanjutnya silahkan login menggunakan akun yang sudah dibuat.');
            }

                
            
                
                
                
        }
    }

}
