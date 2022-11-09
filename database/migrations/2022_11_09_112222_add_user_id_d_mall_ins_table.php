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
        Schema::table('d_mall_ins', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id')->default(1)->after('d_shop_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_mall_ins', function (Blueprint $table) {
            //
            $table->dropForeign('d_mall_ins_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
