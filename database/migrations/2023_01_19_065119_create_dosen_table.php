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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('nidn');
            $table->string('namadsn');
            $table->string('tempatlahirdsn');
            $table->date('tgllahirdsn');
            $table->char('genderdsn',2);
            $table->text('alamatdsn');
            $table->text('fotodsn');
            //$table->string('emaildsn',100);
            $table->string('notlpdsn',100);
            $table->enum('approve', ['Y', 'N']);
            $table->enum('active', ['Y', 'N']);
            $table->timestamps();

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
        Schema::dropIfExists('dosen');
    }
};
