<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('owner');
            $table->unsignedInteger('division_id');
            $table->text('description')->nullable();
            $table->string('state')->default('wait');
            $table->dateTime('wait_at')->nullable();
            $table->dateTime('process_at')->nullable();
            $table->dateTime('done_at')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();

            $table->foreign('division_id')->references('id')->on('divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
