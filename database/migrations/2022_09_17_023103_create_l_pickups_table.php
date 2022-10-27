<?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;

        class CreateLPickupsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("l_pickups", function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->bigInteger('l_post_id')->nullable()->unsigned();
                    $table->timestamps();
                    $table->foreign("l_post_id")->references("id")->on("l_posts")->onUpdate('CASCADE')->onDelete('CASCADE');



                    // ----------------------------------------------------
                    // -- SELECT [l_pickups]--
                    // ----------------------------------------------------
                    // $query = DB::table("l_pickups")
                    // ->leftJoin("l_posts","l_posts.id", "=", "l_pickups.l_post_id")
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
                Schema::dropIfExists("l_pickups");
            }
        }
