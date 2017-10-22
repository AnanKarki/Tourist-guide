<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopularityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popularity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
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
        Schema::dropIfExists('popularity');
    }
}
