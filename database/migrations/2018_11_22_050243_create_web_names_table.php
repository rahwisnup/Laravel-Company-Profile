<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name') ;
            $table->string('telp');
            $table->string('email') ;
            $table->text('address') ;
            $table->string('logo');
            $table->string('seo');
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
        Schema::dropIfExists('web_names');
    }
}
