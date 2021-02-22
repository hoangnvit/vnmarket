<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
       
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('group_id');
            $table->string('avatar');
            $table->string('title');
            $table->string('title_vn');
            $table->string('summary');
            $table->string('summary_vn');
            $table->string('content');
            $table->string('content_vn');
            $table->double('price', 7,2);
          
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('articles');
    }
}
