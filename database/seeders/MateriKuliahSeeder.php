<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
//use DB;

class MateriKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
        $gayabelajar = array('General','Active','Reflective','Sensing','Intuitive','Visual','Verbal','Sequential','Global');
        $jenis_materi = array('Multimedia','PPT','PDF','Buku','Diktat','Dokumen','Excel','Teks','Tugas','Proyek','Diskusi','Referensi');
        $session = array('6','8','9','10','11','12','13','14','15','16','17','18','19');
    	for($i = 1; $i < 13; $i++){
            for($j = 0; $j <= 8; $j++){
                \DB::table('file_materi')->insert([
                    'id_materi_mtk' => $session[$i],
                    'nama_materi' => "Sesi ".($i+1)." ".$gayabelajar[$j],
                    'jenis_materi' => $jenis_materi[array_rand($jenis_materi)],
                    'gaya_belajar' => $gayabelajar[$j],
                    'file_materi' => "COMP0003_session".($i+1)."_".$gayabelajar[$j].".pptx"
                ]);
            }
    	}
    }
}
