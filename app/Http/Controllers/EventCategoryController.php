<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Event;
use App\Transformers\CategoryTransformer;

class EventCategoryController extends ApiController {
	public function index(Event $event) {
		return $this->respondWithCollection($event->categories()->paginate($this->setLimit(10, 100)), new CategoryTransformer);
	}
	
	public function show(Event $event, $category_id) {
		return $this->respondWithItem($event->categories()->findOrFail($category_id), new CategoryTransformer);
	}
}
