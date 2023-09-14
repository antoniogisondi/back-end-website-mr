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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            $table->string('titolo', 150);
            $table->string('slug');
            $table->text('descrizione');
            $table->decimal('costo', 10, 2);
            $table->date('data_inizio')->nullable();
            $table->date('data_fine')->nullable();
            $table->string('cliente')->nullable();
            $table->string('indirizzo_lavoro')->nullable();
            $table->string('responsabile_lavoro')->nullable();
            $table->string('materiali')->nullable();
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
        Schema::dropIfExists('works');
    }
};
