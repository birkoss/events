<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase {
	public function testExample() {
		$this->visit('/')->see('Laravel');
	}

	public function testAPI() {
		$this->get( 'api/events')->seeJson(['aaa' => 'abca']);

//        $this->json('POST', '/', ['name' => 'Sally'])->seeJson(['created' => true,]);

//		$this->visit('/')->see('GITHUB');
	}
}
