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
        Schema::create('c_user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('c_profile_id');
            $table->integer('maximum_follower')->default(0);
            $table->string('brand')->nullable();
            $table->string('appeal_text')->nullable();
            $table->string('appeal_image')->nullable();
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
        Schema::dropIfExists('c_user_profiles');
    }
};