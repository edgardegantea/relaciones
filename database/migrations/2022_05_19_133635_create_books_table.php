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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->text('abstract');
            $table->unsignedBigInteger('idAuthor');
            $table->foreign('idAuthor')->references('id')->on('authors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('idEditorial');
            $table->foreign('idEditorial')->references('id')->on('editorials')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
};
