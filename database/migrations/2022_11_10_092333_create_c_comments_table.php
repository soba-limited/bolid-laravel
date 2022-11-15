<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('to_user_id');
            $table->string('title');
            $table->string('content');
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign("to_user_id")->references("id")->on("users")->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_comments');
    }
};