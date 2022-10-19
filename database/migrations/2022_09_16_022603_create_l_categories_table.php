<?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;

        class CreateLCategoriesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("l_categories", function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('name', 100)->nullable();
                    $table->string('slug', 100)->nullable()->unique();
                    $table->integer('depth');
                    $table->string('parent_slug')->nullable();
                    $table->timestamps();
                    $table->softDeletes();



                    // ----------------------------------------------------
                    // -- SELECT [l_Categories]--
                    // ----------------------------------------------------
                    // $query = DB::table("l_Categories")
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
                Schema::dropIfExists("l_Categories");
            }
        }