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
        Schema::create('c_salon_c_tagas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('c_salon_id');
            $table->unsignedBigInteger('c_tag_id');
            $table->timestamps();

            $table->foreign("c_salon_id")->references("id")->on("c_salons")->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign("c_tag_id")->references("id")->on("c_tags")->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_salon_c_tagas');
    }
};