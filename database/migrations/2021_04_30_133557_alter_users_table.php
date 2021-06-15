<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            // Data
            $table->string('register_type')->default('member');
            $table->boolean('situation')->default('1');
            $table->string('cover')->nullable();

            $table->date('date_of_birth')->nullable();
            $table->string('document')->unique()->nullable();
            $table->string('document_secondary', 20)->nullable();
            $table->string('document_secondary_complement')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('schooling')->nullable();
            $table->string('occupation')->nullable();
            $table->string('genre')->nullable();

            // contact
            $table->string('telephone')->nullable();
            $table->string('cell')->nullable();
            $table->string('telephone_commercial')->nullable();

            //Ministry
            $table->boolean('church')->nullable();
            $table->date('date_of_baptism')->nullable();
            $table->date('date_of_register')->nullable();
            $table->string('reason_of_register')->nullable();
            $table->string('previous_church')->nullable();
            $table->date('date_of_exit')->nullable();
            $table->string('reason_of_exit')->nullable();
            $table->string('destiny_church')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Data
            $table->dropColumn('register_type');
            $table->dropColumn('situation');
            $table->dropColumn('cover');

            $table->dropColumn('date_of_birth');
            $table->dropColumn('document');
            $table->dropColumn('document_secondary');
            $table->dropColumn('document_secondary_complement');
            $table->dropColumn('place_of_birth');
            $table->dropColumn('civil_status');
            $table->dropColumn('schooling');
            $table->dropColumn('occupation');
            $table->dropColumn('genre');

            // contact
            $table->dropColumn('telephone');
            $table->dropColumn('cell');
            $table->dropColumn('telephone_commercial');

            //Ministry
            $table->dropColumn('church');
            $table->dropColumn('date_of_baptism');
            $table->dropColumn('date_of_register');
            $table->dropColumn('reason_of_register');
            $table->dropColumn('previous_church');
            $table->dropColumn('date_of_exit');
            $table->dropColumn('reason_of_exit');
            $table->dropColumn('destiny_church');
        });
    }
}
