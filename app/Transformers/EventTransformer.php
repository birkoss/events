<?php namespace App\Transformers;

use App\Event;

class EventTransformer {
	public function transform(Event $event) {

		return [
			'id'=> $event->id,
			'name'=>$event->name,
			'content'=>$event->content,
		];

	}
}

?>
