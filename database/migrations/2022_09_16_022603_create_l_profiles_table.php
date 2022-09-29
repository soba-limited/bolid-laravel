<?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;

        class CreateLProfilesTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("l_profiles", function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->string('nicename', 255)->nullable();
                    $table->string('thumbs')->nullable();
                    $table->string('sex')->nullable();
                    $table->string('zipcode', 16)->nullable();
                    $table->string('zip', 8)->nullable();
                    $table->string('other_address', 255)->nullable();
                    $table->integer('age')->nullable();
                    $table->string('work_type', 16)->nullable();
                    $table->string('industry', 100)->nullable();
                    $table->string('occupation', 100)->nullable();
                    $table->timestamps();
                    $table->softDeletes();



                    // ----------------------------------------------------
                    // -- SELECT [l_profiles]--
                    // ----------------------------------------------------
                    // $query = DB::table("l_profiles")
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
                Schema::dropIfExists("l_profiles");
            }
        }