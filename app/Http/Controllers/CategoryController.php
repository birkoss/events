<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Transformers\CategoryTransformer;

class CategoryController extends ApiController {
	public function index() {
		return $this->respondWithCollection(Category::all(), new CategoryTransformer);
	}

	public function show($id) {
		return $this->respondWithItem(Category::find($id), new CategoryTransformer);
	}
}
