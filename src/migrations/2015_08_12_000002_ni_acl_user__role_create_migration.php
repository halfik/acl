<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NiAclUserRoleCreateMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('user__role', function(Blueprint $table)
        {
            $table->integer('user__id')->unsigned();
            $table->integer('role__id')->unsigned();
            $table->primary(array('user__id', 'role__id'));
            $table->foreign('user__id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('role__id')->references('id')->on('role')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('user__role');
	}

}
