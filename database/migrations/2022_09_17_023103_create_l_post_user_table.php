<?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;

        class CreateLPostUserTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("l_post_user", function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->bigInteger('user_id')->nullable()->unsigned();
                    $table->bigInteger('l_post_id')->nullable()->unsigned();
                    $table->timestamps();
                    $table->foreign("user_id")->references("id")->on("users")->onUpdate('CASCADE')->onDelete('CASCADE');
                    $table->foreign("l_post_id")->references("id")->on("l_posts")->onUpdate('CASCADE')->onDelete('CASCADE');



                    // ----------------------------------------------------
                    // -- SELECT [l_post_user]--
                    // ----------------------------------------------------
                    // $query = DB::table("l_post_user")
                    // ->leftJoin("users","users.id", "=", "l_post_user.user_id")
                    // ->leftJoin("l_posts","l_posts.id", "=", "l_post_user.l_post_id")
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
                Schema::dropIfExists("l_post_user");
            }
        }
