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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('from_area_id');
            $table->foreign("from_area_id")->references("id")->on("areas")->cascadeOnDelete();

            $table->unsignedBigInteger('to_area_id');
            $table->foreign("to_area_id")->references("id")->on("areas")->cascadeOnDelete();

            $table->unsignedBigInteger('bus_id');
            $table->foreign("bus_id")->references("id")->on("buses")->cascadeOnDelete();

            $table->string('status');

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
        Schema::dropIfExists('trips');
    }
};
