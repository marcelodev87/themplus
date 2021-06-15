<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            //Foreign Keys
            $table->unsignedBigInteger('leader');
            $table->unsignedBigInteger('host');

            $table->string('name')->nullable();
            $table->integer('situation')->default('1');
            $table->date('date_of_foundation')->nullable();
            $table->time('time')->nullable();
            $table->integer('frequency')->default('7');
            $table->string('location')->nullable();
            //DAYS
            $table->integer('sunday')->default('0');
            $table->integer('monday')->default('0');
            $table->integer('tuesday')->default('0');
            $table->integer('wednesday')->default('0');
            $table->integer('thursday')->default('0');
            $table->integer('friday')->default('0');
            $table->integer('saturday')->default('0');
            // address
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            $table->timestamps();
        });

        Schema::table('groups', function(Blueprint $table){
            $table->foreign('leader')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('host')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
