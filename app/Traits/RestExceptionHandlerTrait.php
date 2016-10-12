<?php namespace App\Traits;

use Exception;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


trait RestExceptionHandlerTrait {
	

	protected function getJsonResponseForException(Request $request, Exception $exception) {
//		print_r($exception->getCode());
//		print_r($exception->getMessage());
		return $this->jsonResponse($exception, 404);
	}


	protected function jsonResponse($exception, $status_code) {
		return response()->json(['status'=>'error', 'message'=>$exception->getMessage(), 'code'=>$exception->getCode()], $status_code);
	}

}


?>
