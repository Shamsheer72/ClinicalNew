<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('role')->nullable();
            $table->string('patientfirst')->nullable();
            $table->string('patientlast')->nullable();
            $table->string('patientdate')->nullable();
            $table->string('file_name')->nullable();
            $table->string('addressinfo')->nullable();
            $table->string('contactinfo')->nullable();
            $table->string('companyinfo')->nullable();
            $table->string('jobtitleinfo')->nullable();
            $table->string('nameofcharity')->nullable();
            $table->string('bankname')->nullable();
            $table->string('account_number')->nullable();
            $table->string('credit_card_info')->nullable();
            $table->string('ach_info')->nullable();

            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
