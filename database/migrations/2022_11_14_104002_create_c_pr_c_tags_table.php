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
        Schema::create('c_pr_c_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('c_pr_id');
            $table->unsignedBigInteger('c_tag_id');
            $table->timestamps();

            $table->foreign("c_pr_id")->references("id")->on("c_prs")->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('c_pr_c_tags');
    }
};