<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Transformers\CategoryTransformer;

class CategoryController extends ApiController {

	protected $validationRules = ['name'=>'bail|required|max:255'];

	public function destroy($id) {
		$category = Category::findOrFail($id);
		$category->delete();

		return $this->respondWithArray(['category_id'=>$category->id]);
	}

	public function index() {
		return $this->respondWithCollection(Category::paginate($this->setLimit(10, 100)), new CategoryTransformer);
	}

	public function show($id) {
		return $this->respondWithItem(Category::findOrFail($id), new CategoryTransformer);
	}

	public function store(Request $request) {
		$this->validateOrDie($request);

		$category = Category::create( $request->all() );

		return $this->respondWithArray(['category_id'=>$category->id]);
	}

	public function update(Request $request, $id) {
		$this->validateOrDie($request);

		$category = Category::findOrFail($id);
		$category->name = $request->name;
		$category->save();

		return $this->respondWithArray(['category_id'=>$category->id]);
	}
	
}
