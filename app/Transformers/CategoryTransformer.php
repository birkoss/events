<?php namespace App\Transformers;

use App\Category;

class CategoryTransformer {
	public function transform(Category $category) {
		return [
			'id'=> $category->id,
			'name'=>$category->name,
		];
	}
}

?>
