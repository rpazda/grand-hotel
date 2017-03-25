<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	
    		Schema::create('users', function(Blueprint $table)
    		{
        		$table->increments('id'); // the username
        		$table->string('password', 12);
			$table->float('balance', 10, 2);
			$table->boolean('staff');
        		$table->string('name', 20);
       			//$table->timestamps();
    		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}
}
