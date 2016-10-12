<?php namespace App\Traits;

use Exception;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait RestExceptionHandlerTrait {
	

	protected function getJsonResponseForException(Request $request, Exception $exception) {
		if( $exception instanceof ModelNotFoundException ) {
			return $this->jsonResponse(new Exception('Record not found', 10), 404);
		} else {
			return $this->jsonResponse($exception, 404);
		}
	}


	protected function jsonResponse($exception, $status_code) {
		return response()->json(['status'=>'error', 'message'=>$exception->getMessage(), 'code'=>$exception->getCode()], $status_code);
	}

}


?>
