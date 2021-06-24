<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->string('name');
            $table->longText('content');
            $table->longText('img');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('location');
            $table->string('organizer');
            $table->longText('calendar');
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
        Schema::dropIfExists('info');
    }
}
