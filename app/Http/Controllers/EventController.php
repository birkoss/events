<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

class EventController extends Controller {

	public function show() {
		$events = [
			'aaa'=>'abc',
			'bbb'=>'def'
		];

		return view('welcome')->withEvents($events);
	}

}
