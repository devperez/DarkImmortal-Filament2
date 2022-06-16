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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->longText('groupe');
            $table->longText('morceau');
            $table->longText('clip');
            $table->longText('article');
            $table->longText('pays');
            $table->longText('genre');
            $table->longText('image');
            $table->longText('album');
            $table->longText('couv');
            $table->longText('paroles');
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
        Schema::dropIfExists('posts');
    }
};
