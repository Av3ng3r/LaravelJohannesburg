<?php namespace App\Http\Controllers;

class WelcomeController extends Controller
{
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$people = $this->getMeetupRsvpYesList();

		$meetupRsvpList = [];

		foreach ($people->results as $index => $person) {
			$meetupRsvpList[] = $person->member->name;
		}

		return view('welcome')->with(['winner' => $this->getRandomWinners($meetupRsvpList)]);
	}

	private function getRandomWinners($meetupRsvpList)
	{
		return $meetupRsvpList[mt_rand(0, count($meetupRsvpList) - 1)];
	}

}
