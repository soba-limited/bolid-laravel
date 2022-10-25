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
        Schema::create('d_shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('url');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('thumbs')->nullable();
            $table->integer('image_permission')->default(0);
            $table->unsignedBigInteger('official_user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("user_id")->references("id")->on("users")->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_shops');
    }
};
