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
        Schema::create('c_salons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('state')->default(0);
            $table->string('title');
            $table->string('thumbs')->nullable();
            $table->string('date')->nullable();
            $table->string('plan')->nullable();
            $table->string('number_of_people')->nullable();
            $table->longText('content')->nullable();
            $table->string('stripe_api_id')->nullable();
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
        Schema::dropIfExists('c_salons');
    }
};