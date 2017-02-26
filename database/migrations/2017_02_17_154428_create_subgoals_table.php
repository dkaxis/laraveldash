<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubgoalsTable extends Migration
{
	
	public function up(){
		Schema::create('subgoals', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('client_id');
			$table->integer('goal_id');
			$table->integer('tag_id');
			$table->text('subgoal');
			$table->text('description');
			$table->text('methods');
			$table->text('respons');
			$table->text('timeframe');
			$table->date('follow_up');
			$table->text('support');
			$table->text('ext_support');
			$table->integer('status');
			$table->timestamps();
		}
		);
	}
	
	public function down(){
		Schema::dropIfExists('subgoals');
	}
}
