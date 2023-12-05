<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Congers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congers', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('num_employer');
            $table->string('motif');
            $table->string('nb_jour');
            $table->date('date_debut');
            $table->date('date_retour');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('congers');
    }
}
