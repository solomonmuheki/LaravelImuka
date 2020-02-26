<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
          
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('companyName');
            $table->string('companyType');
            $table->string('companyIndustry');
            $table->string('Address');
            $table->string('telephone');
            $table->string('email');
            $table->integer('rating');
            $table->integer('status');
            $table->string('AmountToRaise');
            $table->string('image');
            $table->text('detailedDescription');
            $table->BOOLEAN('businessPlan');
            $table->BOOLEAN('MOU');
            $table->BOOLEAN('certificateOfRegistration');
            $table->BOOLEAN('financialStatement');
            $table->BOOLEAN('cashFlowStatement');
            $table->BOOLEAN('contractDocument');
            $table->BOOLEAN('auditedAccounts');
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
        Schema::dropIfExists('deals');
    }
}
