<?php
namespace Kampernet\Robojom\KeyScale;

class Key {

	/**
	 * @var string
	 */
	private $keyName;

	/**
	 * @var array
	 */
	public static $keys = [
		"C", "Db", "D", "Eb", "E", "F", "Gb", "G", "Ab", "A", "Bb", "B"
	];

	public function getKeyName() {

		return $this->keyName;
	}

	public function setKeyName($keyName) {

		$this->keyName = $keyName;
	}
} 