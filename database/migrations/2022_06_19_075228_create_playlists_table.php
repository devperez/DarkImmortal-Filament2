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
        Schema::disableForeignKeyConstraints();
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->longText('article');
            $table->longText('clip01');
            $table->longText('clip02');
            $table->longText('clip03');
            $table->longText('clip04');
            $table->longText('clip05');
            $table->longText('clip06');
            $table->longText('clip07');
            $table->longText('clip08');
            $table->longText('clip09');
            $table->longText('clip10');
            $table->integer('vues');
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
        Schema::dropIfExists('playlists');
    }
};
