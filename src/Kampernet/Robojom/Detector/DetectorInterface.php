<?php
namespace Kampernet\Robojom\Detector;

use Kampernet\Robojom\Midi\MidiData;

interface DetectorInterface {

	/**
	 * @param \Kampernet\Robojom\Midi\MidiData $midiData
	 * @return mixed
	 */
	public function detect(MidiData $midiData);
}