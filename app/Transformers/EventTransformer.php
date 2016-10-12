<?php namespace App\Transformers;

use App\Event;

class EventTransformer {
	public function transform(Event $event) {

		$categories = [];
		foreach($event->categories()->get() as $category) {
			$categories[] = $category->id;
		}
	
		return [
			'id'=> $event->id,
			'name'=>$event->name,
			'content'=>$event->content,
			'categories'=>$categories,
		];

	}
}

?>
