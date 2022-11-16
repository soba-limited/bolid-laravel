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
        Schema::create('c_company_socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('c_company_profile_id');
            $table->string('name');
            $table->string('url');
            $table->timestamps();

            $table->foreign("c_company_profile_id")->references("id")->on("c_company_profiles")->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_company_socials');
    }
};