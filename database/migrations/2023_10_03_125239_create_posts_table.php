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
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->text('content');
            $table->string('image');
            $table->bigInteger('cat_id');
            $table->tinyInteger('status')->default(2)->comment('0: Deleted | 1: Published | 2: Draft');
            $table->dateTime('crt_on');
            $table->dateTime('updt_on');
            $table->bigInteger('crt_by');
            $table->bigInteger('updt_by');
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
