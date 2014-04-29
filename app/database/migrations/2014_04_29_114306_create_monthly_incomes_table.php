<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyIncomesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_incomes', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('month_id')->unsigned();
            $table->float('value');
            $table->smallInteger('year');
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
		Schema::dropIfExists('monthly_incomes');
	}

}
