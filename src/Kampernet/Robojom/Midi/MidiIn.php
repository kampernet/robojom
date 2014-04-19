<?php
namespace Kampernet\Robojom\Midi;

use Kampernet\Robojom\Event\MidiMsgReceivedEvent;

/**
 * Class MidiIn
 *
 * @package Kampernet\Robojom\Midi
 */
class MidiIn {

	/**
	 * @return \Kampernet\Robojom\Midi\MidiData
	 */
	public static function receive() {

		$msg = new MidiMsgReceivedEvent();
		return $msg->fire([]);
	}
} 