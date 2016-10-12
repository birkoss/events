<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Event;
use App\Media;
use App\Transformers\EventTransformer;

class EventController extends ApiController {

	public function index() {
		return $this->respondWithCollection(Event::paginate($this->setLimit(30, 100)), new EventTransformer);
	}

	public function show($id) {
		$event = Event::findOrFail($id);

		return $this->respondWithItem($event, new EventTransformer);
	}

}
