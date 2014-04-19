<?php
namespace Kampernet\Robojom\Detector\Tempo;

use Kampernet\Robojom\Detector\DetectorInterface;
use Kampernet\Robojom\Midi\MidiData;
use Kampernet\Robojom\Tempo\Tempo;

class MockTempoDetector implements DetectorInterface {

	/**
	 * @param \Kampernet\Robojom\Midi\MidiData $midiData
	 * @return \Kampernet\Robojom\Tempo\Tempo
	 */
	public function detect(MidiData $midiData) {

		$tempo = new Tempo();
		$tempo->bpm = 120;

		return $tempo;
	}
}