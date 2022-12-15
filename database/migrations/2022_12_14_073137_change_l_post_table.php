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
        Schema::table('l_posts', function (Blueprint $table) {
            //
            $table->string('view_date')->after('state')->default('2022-12-08 02:52:22');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('l_posts', function (Blueprint $table) {
            //
            $table->dropColumn('view_date');
        });
    }
};