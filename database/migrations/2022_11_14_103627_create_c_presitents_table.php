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
        Schema::create('c_presitents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('c_profile_id');
            $table->string('title');
            $table->string('thumbs')->nullable();
            $table->string('top_text')->nullable();
            $table->string('content')->nullable();
            $table->timestamps();

            $table->foreign("c_profile_id")->references("id")->on("c_profiles")->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_presitents');
    }
};