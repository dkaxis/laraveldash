<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubgoalEvalsTable extends Migration
{
	
	
	public function up(){
		Schema::create('subgoal_evals', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('subgoal_id');
			$table->integer('user_id');
			$table->date('date');
			$table->text('eval');
			$table->integer('score');
			$table->timestamps();
		}
		);
	}
	
	public function down(){
		Schema::dropIfExists('subgoal_evals');
	}
}
