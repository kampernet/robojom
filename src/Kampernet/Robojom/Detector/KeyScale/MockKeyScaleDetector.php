<?php
namespace Kampernet\Robojom\Detector\KeyScale;

use Kampernet\Robojom\Detector\DetectorInterface;
use Kampernet\Robojom\KeyScale\Key;
use Kampernet\Robojom\KeyScale\KeyScale;
use Kampernet\Robojom\KeyScale\Scale\Major;
use Kampernet\Robojom\Midi\MidiData;

/**
 * Class MockKeyScaleDetector
 *
 * @package Kampernet\Robojom\Detector\KeyScale
 */
class MockKeyScaleDetector implements DetectorInterface {

	/**
	 * @param \Kampernet\Robojom\Midi\MidiData $midiData
	 * @return \Kampernet\Robojom\KeyScale\KeyScale
	 */
	public function detect(MidiData $midiData) {

		$keyScale = new KeyScale();

		$keyScale->key = new Key();
		$options = ['C', 'D', 'G'];
		$keyScale->key->setKeyName($options[array_rand($options)]);
		$keyScale->scale = new Major();

		return $keyScale;
	}
}