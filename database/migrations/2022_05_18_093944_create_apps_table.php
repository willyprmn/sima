<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pic_id')->index()->constrained('pics');
            $table->string('appName')->unique();
            $table->string('url')->unique();
            $table->string('framework');
            $table->tinyInteger('tahunPengadaan');
            $table->string('status', 15);
            $table->string('class', 15);
            $table->string('grade', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apps');
    }
}
