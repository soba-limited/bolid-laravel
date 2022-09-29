
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateLPresentsTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("l_presents", function (Blueprint $table) {

						$table->bigIncrements('id');
						$table->string('title',255)->nullable();
						$table->string('thumbs',255)->nullable();
						$table->string('offer',255)->nullable();
						$table->timestamp('limit')->nullable();
						$table->timestamps();



						// ----------------------------------------------------
						// -- SELECT [l_presents]--
						// ----------------------------------------------------
						// $query = DB::table("l_presents")
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
                Schema::dropIfExists("l_presents");
            }
        }
    