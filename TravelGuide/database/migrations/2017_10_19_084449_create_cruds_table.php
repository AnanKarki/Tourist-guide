<?php
// create_cruds_table

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('post');
            $table->string('image')->default('0');
            $table->string('when_to_visit');
            $table->string('first_month');
            $table->string('second_month');
            $table->string('third_month');
            $table->string('fourth_month');
            $table->string('fifth_month');
            $table->string('sixth_month');
            $table->string('seventh_month');
            $table->string('eight_month');
            $table->string('ninth_month');
            $table->string('tenth_month');
            $table->string('eleventh_month');
            $table->string('twelveth_month');
            $table->Integer('domestic_tourist_livingexpense_lowrate');
            $table->Integer('domestic_tourist_livingexpense_highrate');
            $table->Integer('international_tourist_livingexpense_lowrate');
            $table->Integer('international_tourist_livingexpense_highrate');
            $table->Integer('domestic_tourist_transportationexpense_lowrate');
            $table->Integer('domestic_tourist_transportationexpense_highrate');
            $table->Integer('international_tourist_transportationexpense_lowrate');
            $table->Integer('international_tourist_transportationexpense_highrate');
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
        Schema::dropIfExists('cruds');
    }
}
