<?php
namespace Kampernet\Robojom\Event;

use Kampernet\Robojom\Midi\MidiData;

class MidiMsgReceivedEvent implements EventInterface {

	/**
	 * @param array $data
	 * @return \Kampernet\Robojom\Midi\MidiData
	 */
	public function fire($data) {

		$msg = new MidiData();
		$msg->noteNumber = rand(0, 131);
		$msg->noteStatus = array_rand(['on', 'off']);
		$msg->velocity = rand(50, 100);
		$msg->elapsed = rand(25, 250);

		return $msg;
	}
}