<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEventContentType extends Migration {
	public function up() {
		Schema::table('events', function($table) {
			$table->longText('content')->change();
		});
	}
}
