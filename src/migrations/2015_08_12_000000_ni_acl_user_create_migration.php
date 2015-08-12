<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NiAclUserCreateMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('login');
            $table->string('email');
            $table->string('password');
            $table->timestamp('last_login')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
		});

        $userMapper=\Acl::getUserMapper();
        $admin=$userMapper->createRecord(array(
            'login'=>'admin',
            'email'=>'admin@netinteractive.pl',
            'password'=>'admin',
        ));

        $guest=$userMapper->createRecord(array(
            'login'=>'guest',
            'email'=>'guest@netinteractive.pl',
            'password'=>'guest',
        ));

        $userMapper->save($admin);
        $userMapper->save($guest);

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('user');
	}

}
