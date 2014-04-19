<?php
namespace Kampernet\Robojom;

use Kampernet\Robojom\Detector\DetectorInterface;
use Kampernet\Robojom\Detector\KeyScale\MockKeyScaleDetector;
use Kampernet\Robojom\Detector\Tempo\MockTempoDetector;
use Kampernet\Robojom\KeyScale\KeyScale;
use Kampernet\Robojom\Midi\MidiGenerator;
use Kampernet\Robojom\Midi\MidiIn;
use Kampernet\Robojom\Midi\MidiOut;
use Kampernet\Robojom\Midi\MidiData;
use Kampernet\Robojom\Tempo\Tempo;

class Robojom {

	/**
	 * @var \Kampernet\Robojom\Detector\DetectorInterface
	 */
	private $tempoDetector;

	/**
	 * @var \Kampernet\Robojom\Detector\DetectorInterface
	 */
	private $keyScaleDetector;

	/**
	 * @param string[] $args
	 */
	public static function jom($args) {

		$jom = new Robojom();
		$jom->setTempoDetector(new MockTempoDetector());
		$jom->setKeyScaleDetector(new MockKeyScaleDetector());
		while(true) {
			$jom->playAlong($jom->listen());
		}
	}

	/**
	 * Listens to midi in
	 *
	 * @return \Kampernet\Robojom\Midi\MidiData
	 */
	public function listen() {

		return MidiIn::receive();
	}

	/**
	 * Plays midi out
	 *
	 * @param \Kampernet\Robojom\Midi\MidiData $msg
	 */
	public function playAlong(MidiData $msg) {

		$tempo = $this->tempoDetector->detect($msg);
		$keyScale = $this->keyScaleDetector->detect($msg);

		$this->playNoteIn($tempo, $keyScale);
	}

	/**
	 * @param \Kampernet\Robojom\Detector\DetectorInterface $tempoDetector
	 */
	private function setTempoDetector(DetectorInterface $tempoDetector) {

		$this->tempoDetector = $tempoDetector;
	}

	/**
	 * @param \Kampernet\Robojom\Detector\DetectorInterface $keyScaleDetector
	 */
	private function setKeyScaleDetector(DetectorInterface $keyScaleDetector) {

		$this->keyScaleDetector = $keyScaleDetector;
	}

	/**
	 * @param \Kampernet\Robojom\Tempo\Tempo $tempo
	 * @param \Kampernet\Robojom\KeyScale\KeyScale $keyScale
	 */
	private function playNoteIn(Tempo $tempo, KeyScale $keyScale) {

		$msg = MidiGenerator::generateMidiData($tempo, $keyScale);
		MidiOut::send($msg);
	}

}