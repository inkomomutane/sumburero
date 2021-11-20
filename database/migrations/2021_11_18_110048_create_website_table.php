<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->default(1);
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps(6);
            $table->string('resume')->nullable();
            $table->string('phones')->nullable();
            $table->string('emails')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->text('objectives')->nullable();
            $table->text('map')->nullable();
            $table->string('country')->nullable();
            $table->time('open_at')->nullable();
            $table->time('close_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website');
    }
}
