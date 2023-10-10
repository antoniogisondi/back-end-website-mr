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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_id')->nullable();
            $table->foreign('work_id')->references('id')->on('works')->onDelete('set null');
            $table->string('image');
            $table->string('description');
            $table->string('image_2');
            $table->string('description_2');
            $table->string('image_3');
            $table->string('description_3');
            $table->string('image_4');
            $table->string('description_4');
            $table->string('image_5');
            $table->string('description_5');
            $table->string('image_6');
            $table->string('description_6');
            $table->string('image_7');
            $table->string('description_7');
            $table->string('image_8');
            $table->string('description_8');
            $table->string('image_9');
            $table->string('description_9');
            $table->string('image_10');
            $table->string('description_10');
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
        Schema::dropIfExists('images');
    }
};
