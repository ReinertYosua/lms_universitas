<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->bigInteger('nim');
            $table->foreignId('jurusan_id');
            $table->string('namadepan');
            $table->string('namabelakang');
            $table->string('tempatlahirmhs');
            $table->date('tgllahirmhs');
            $table->char('gendermhs',2);
            $table->text('alamatmhs');
            $table->text('fotomhs');
            $table->string('emailmhs',100);
            $table->string('notlpmhs',100);
            $table->string('perguruantinggi',100);
            $table->string('fakultas',100);
            $table->string('programstudi',100);
            $table->text('fotoidcard');
            $table->text('suratpengantar');
            $table->enum('approve', ['Y', 'N']);
            $table->enum('active', ['Y', 'N']);
            $table->timestamps();

            $table->foreign('jurusan_id')->references('id')->on('jurusan');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
};
