<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('packet_category_id');
            $table->foreign('packet_category_id')->references('id')->on('packet_categories')->cascadeOnDelete();
            $table->string('name');
            $table->text('description');
            $table->integer('quota'); // MB
            $table->integer('price');
            $table->integer('point_reward');
            $table->integer('active_period'); // day
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
        Schema::dropIfExists('packets');
    }
}
