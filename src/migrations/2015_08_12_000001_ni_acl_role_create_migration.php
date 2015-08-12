<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NiAclRoleCreateMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('name');

            /**@var $user \Netinteractive\Acl\User\Record*/
            $user=App('ni.acl.user');
            $user->fill(array(
                'login'=>'admin',
                'email'=>'admin@netinteractive.pl',
                'password'=>'admin'
            ));


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('role');
	}

}
