<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('expense_id')->unsigned();
            $table->foreign('expense_id')->references('id')->on('expenses')->onDelete('cascade');
            $table->string('folder_name', 12);
            $table->string('name', 128);
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
        Schema::drop('images');
	}

}
