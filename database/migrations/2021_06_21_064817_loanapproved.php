<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Loanapproved extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('loanapproved', function (Blueprint $table) {
            /*
				id, customername, amountrequired,loanterm,created_at,updated_at
			*/
			$table->integer('id');
			
			$table->boolean('confirmed');
			
        });
		
		Schema::table('loanapproved', function (Blueprint $table) 
		{
			$table->foreign('id')->references('uid')->on('loantrackers');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::drop('loanapproved');
    }
}
