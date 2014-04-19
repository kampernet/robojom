<?php
namespace Kampernet\Robojom\Midi;

use Kampernet\Robojom\KeyScale\KeyScale;
use Kampernet\Robojom\Tempo\Tempo;

class MidiGenerator {

	/**
	 * @param \Kampernet\Robojom\Tempo\Tempo $tempo
	 * @param \Kampernet\Robojom\KeyScale\KeyScale $keyScale
	 * @return \Kampernet\Robojom\Midi\MidiData
	 */
	public static function generateMidiData(Tempo $tempo, KeyScale $keyScale) {

		$msg = new MidiData();

		$adjust = $keyScale->scale->getNotes()[array_rand($keyScale->scale->getNotes())];

		$msg->noteNumber = MidiData::$midiNoteNumbers[$keyScale->key->getKeyName()][5] + $adjust;
		$msg->noteStatus = 'on';
		$msg->velocity = rand(50, 80);

		// convert bpm to ms ( quarter note )
		$quarter = ((1/$tempo->bpm) * 60000);
		$half = ($quarter * 2);
		$eighth = ($quarter / 2);

		$options = [$half, $quarter, $eighth];
		$msg->elapsed = $options[array_rand($options)];

		return $msg;
	}
} 