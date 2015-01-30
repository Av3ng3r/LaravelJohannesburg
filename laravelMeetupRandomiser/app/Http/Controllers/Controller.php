<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Jyggen\Curl\Curl;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public function getMeetupRsvpYesList()
	{
		$url = 'api.meetup.com/2/rsvps/?key=' . getenv('MEETUP_API_KEY') . '&event_id=219529709&order=name&rsvp=yes';

		$resource = Curl::get($url);

		return json_decode($resource[0]->getContent());
	}

}
