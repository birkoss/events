<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Media;

class EventController extends Controller {

	public function show() {

		//return Response()->json(Media::all());
		$events = [
			'aaa'=>'abc',
			'bbb'=>'def'
		];
		return Response()->json($events);

		return view('welcome')->withEvents($events);
	}

}
