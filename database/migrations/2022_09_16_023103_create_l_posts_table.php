<?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;

        class CreateLPostsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("l_posts", function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->bigInteger('user_id')->nullable()->unsigned();
                    $table->integer('l_category_id')->nullable()->unsigned();
                    $table->bigInteger('l_series_id')->nullable();
                    $table->string('title', 255)->nullable();
                    $table->string('thumbs', 255)->nullable();
                    $table->string('mv', 255)->nullable();
                    $table->string('sub_title', 255)->nullable();
                    $table->text('discription')->nullable();
                    $table->longText('content')->nullable();
                    $table->integer('state')->nullable();
                    $table->timestamps();
                    $table->softDeletes();
                    $table->foreign("user_id")->references("id")->on("users")->onUpdate('CASCADE')->onDelete('CASCADE');
                    $table->foreign("l_category_id")->references("id")->on("l_categories")->onUpdate('CASCADE')->onDelete('CASCADE');

                    // ----------------------------------------------------
                    // -- SELECT [l_posts]--
                    // ----------------------------------------------------
                    // $query = DB::table("l_posts")
                    // ->leftJoin("users","users.id", "=", "l_posts.user_id")
                    // ->leftJoin("l_categories","l_categories.id", "=", "l_posts.l_category_id")
                    // ->leftJoin("l_series","l_series.id", "=", "l_posts.l_series_id")
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
                Schema::dropIfExists("l_posts");
            }
        }
