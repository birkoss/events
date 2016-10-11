<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use App\Http\Requests;

class ApiController extends Controller {

	protected $statusCode = 200;

	protected function respondWithCollection($collection, $transformer) {
		$items = array();
		foreach($collection as $item) {
			$items[] = $this->convertToArray($item, $transformer);
		}
		return $this->respondWithArray($items);
	}

	protected function respondWithItem($item, $transformer) {
		return $this->respondWithArray($this->convertToArray($item, $transformer));
	}

	protected function convertToArray($item, $transformer) {
		return $transformer->transform($item);
	}

	protected function respondWithArray(array $array, array $headers = []) {
		$results = ['data'=>$array];
		return response()->json($results, $this->statusCode);
	}
}
