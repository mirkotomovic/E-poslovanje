<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacePathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('path_place', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')
                ->references('id')->on('places')
                ->onDelete('cascade');
                
            $table->unsignedBigInteger('path_id');
            $table->foreign('path_id')
                ->references('id')->on('paths')
                ->onDelete('cascade');

            $table->unsignedBigInteger('ordinal');
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
        Schema::dropIfExists('place_path');
    }
}
