<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravellingRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelling_routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->bigInteger('company_id')->unsigned()->index();;
            $table->foreign('company_id')->references('id')->on('bus_companies');
            $table->bigInteger('from_town_id')->unsigned()->index();;
            $table->foreign('from_town_id')->references('id')->on('towns');
            $table->bigInteger('to_town_id')->unsigned()->index();;
            $table->foreign('to_town_id')->references('id')->on('towns');
            $table->text('boarding_points')->nullable();
            $table->integer('status');
            $table->timestamp('departure_time');
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
        Schema::dropIfExists('travelling_routes');
    }
}
