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
        Schema::table('l_present_user', function (Blueprint $table) {
            //
            $table->string('account')->nullable()->after('l_present_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('l_present_user', function (Blueprint $table) {
            //
            $table->dropColumn('account');
        });
    }
};