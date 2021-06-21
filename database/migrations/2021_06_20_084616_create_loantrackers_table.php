<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoantrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	 
    public function up()
    {
        Schema::create('loantrackers', function (Blueprint $table) {
            /*
				id, customername, amountrequired,loanterm,created_at,updated_at
			*/
			$table->bigIncrements('id');
			//$table->dateTime('created_at', 0);
			$table->string('customername', 100);
			$table->integer('amountrequired');
			$table->integer('loanterm',3);
			$table->dateTime('created_at',0);
			$table->dateTime('updated_at',0);
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loantrackers');
    }
}
