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
        Schema::create('d_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('d_shop_id');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->foreign('d_shop_id')->references('id')->on('d_shops')->onDelete('cascade');
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
        Schema::dropIfExists('d_infos');
    }
};
