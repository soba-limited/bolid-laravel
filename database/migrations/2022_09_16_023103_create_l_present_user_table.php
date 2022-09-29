<?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;

        class CreateLPresentUserTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("l_present_user", function (Blueprint $table) {
                    $table->increments('id');
                    $table->bigInteger('user_id')->nullable()->unsigned();
                    $table->bigInteger('l_present_id')->nullable()->unsigned();
                    $table->text('hobby')->nullable();
                    $table->text('brand')->nullable();
                    $table->text('cosmetic')->nullable();
                    $table->integer('marriage')->nullable();
                    $table->integer('child')->nullable();
                    $table->string('income', 50)->nullable();
                    $table->timestamps();
                    $table->foreign("user_id")->references("id")->on("users")->onUpdate('CASCADE')->onDelete('CASCADE');
                    $table->foreign("l_present_id")->references("id")->on("l_presents")->onUpdate('CASCADE')->onDelete('CASCADE');



                    // ----------------------------------------------------
                    // -- SELECT [l_present_user]--
                    // ----------------------------------------------------
                    // $query = DB::table("l_present_user")
                    // ->leftJoin("users","users.id", "=", "l_present_user.user_id")
                    // ->leftJoin("l_presents","l_presents.id", "=", "l_present_user.l_present_id")
                    // ->get();
                    // dd($query); //For checking
                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists("l_present_user");
            }
        }