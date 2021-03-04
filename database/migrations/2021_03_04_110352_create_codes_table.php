<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Code;

use Illuminate\Support\Str;
use Carbon\Carbon;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->char('name', 100);
            $table->string('description', 1000);
            $table->char('code', 100);
            $table->dateTime('created_at');
        });

        for($i = 10; $i > 0; $i--){
            $code = Code::make([
                'name' => Str::random(10),
                'description' => Str::random(20),
                'code' => rand(500, 1000),
            ]);

            $code->created_at = Carbon::createFromTimeString('2021-03-'.rand(1,30).' 00:00:00');
            $code->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codes');
    }
}
