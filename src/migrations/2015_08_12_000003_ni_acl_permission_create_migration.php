<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NiAclPermissionCreateMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('permission', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('role__id')->unsigned();
            $table->string('resource');
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
        Schema::drop('permission');
	}

}
