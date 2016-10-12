<?php namespace App\Http\Controllers;

use Exception;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

class ApiController extends Controller {


	protected $statusCode = 200;
	protected $limit = 10;
	protected $validationRules = [];


	protected function setLimit($limit=10, $max_limit=100) {
		$this->limit = $limit;
		if( isset($_GET['limit']) && (int)$_GET['limit'] > 0 && (int)$_GET['limit'] <= $max_limit ) {
			$this->limit = $_GET['limit'];
		}

		return $this->limit;
	}


	protected function validateOrDie(Request $request) {
		$validation = Validator::make($request->all(), $this->validationRules);

    if( $validation->fails() ) {
			foreach($validation->messages()->all() as $error) {
				throw new Exception($error, 20);
			}
    }
	}


	protected function respondWithCollection($collection, $transformer) {
		$collection->appends(['limit'=>$this->limit])->links();
		
		$paging = array();
		$paging['current'] = $collection->currentPage();
		$paging['total'] = $collection->total();
		$paging['last'] = $collection->lastPage();
		$paging['limit'] = $collection->perPage();
		$paging['links']['next'] = $collection->nextPageUrl();
		$paging['links']['previous'] = $collection->previousPageUrl();

		$items = array();
		foreach($collection as $item) {
			$items[] = $this->convertToArray($item, $transformer);
		}

		return $this->respondWithArray(['paging'=>$paging, 'data'=>$items]);
	}


	protected function respondWithItem($item, $transformer) {
		if( is_null($item) || !is_object($item) ) {
			throw new Exception('Record not found', 10);
		}

		$array = $this->convertToArray($item, $transformer);

		return $this->respondWithArray(['data'=>$array]);
	}


	protected function convertToArray($item, $transformer) {
		return $transformer->transform($item);
	}


	protected function respondWithArray(array $results, array $headers = []) {
		$results['status'] = 'ok';
		return response()->json($results, $this->statusCode);
	}
}
