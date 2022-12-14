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
        Schema::create('c_user_socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('c_user_profile_id');
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->integer('follower')->nullable();
            $table->timestamps();

            $table->foreign("c_user_profile_id")->references("id")->on("c_user_profiles")->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_user_socials');
    }
};