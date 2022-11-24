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
        Schema::create('c_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->integer('state')->default(0);
            $table->unsignedBigInteger('c_cat_id');
            $table->string('thumbs')->nullable();
            $table->string('date')->nullable();
            $table->string('limite_date')->nullable();
            $table->integer('reward')->nullable();
            $table->string('hope_reward')->nullable();
            $table->string('number_of_people')->nullable();
            $table->string('recruitment_quota')->nullable();
            $table->string('speciality')->nullable();
            $table->string('suporter')->nullable();
            $table->string('amount_of_suport')->nullable();
            $table->string('medium')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("user_id")->references("id")->on("users")->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign("c_cat_id")->references("id")->on("c_cats")->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_posts');
    }
};