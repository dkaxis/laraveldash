<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
	
	public function up(){
		Schema::create('contracts', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('client_id');
			$table->date('date_from');
			$table->date('date_to');
			$table->text('goal');
			$table->text('description');
			$table->text('client_goal');
			$table->timestamps();
			$table->softDeletes();
		}
		);
	}
	
	
	public function down(){
		Schema::dropIfExists('contracts');
	}
}
