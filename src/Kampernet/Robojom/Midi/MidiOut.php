<?php
namespace Kampernet\Robojom\Midi;

class MidiOut {

	/**
	 * @param \Kampernet\Robojom\Midi\MidiData $msg
	 * @return void
	 */
	public static function send(MidiData $msg) {

		print_r($msg);
		sleep($msg->elapsed / 1000);
		$msg->noteStatus = 'off';
		print_r($msg);
		sleep($msg->elapsed / 1000);
	}
} 