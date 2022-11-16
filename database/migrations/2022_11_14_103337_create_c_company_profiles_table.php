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
        Schema::create('c_company_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('c_profile_id');
            $table->string('president')->nullable();
            $table->string('maked')->nullable();
            $table->string('jojo')->nullable();
            $table->string('capital')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->string('site_url')->nullable();
            $table->string('shop_url')->nullable();
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
        Schema::dropIfExists('c_company_profiles');
    }
};