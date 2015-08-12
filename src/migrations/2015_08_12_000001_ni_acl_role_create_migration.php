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
		});

        $roleMapper=\Acl::getRoleMapper();
        $roleMapper->save($roleMapper->createRecord(array('name'=>'admin')));
        $roleMapper->save($roleMapper->createRecord(array('name'=>'guest')));
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
