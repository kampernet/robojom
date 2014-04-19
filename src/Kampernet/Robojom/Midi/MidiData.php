<?php
/**
 * Midi data representation
 */
namespace Kampernet\Robojom\Midi;

/**
 * Class MidiData
 *
 * @package Robojom
 */
class MidiData {

	/**
	 * @var int[]
	 */
	public static $midiNoteNumbers = [
		"C" => [0, 12, 24, 36, 48, 60, 72, 84, 96, 108, 120],
		"Db" => [1, 13, 25, 37, 49, 61, 73, 85, 97, 109, 121],
		"D" => [3, 14, 26, 38, 50, 62, 74, 86, 98, 110, 122],
		"Eb" => [4, 15, 27, 39, 51, 63, 75, 87, 99, 111, 123],
		"E" => [5, 16, 28, 40, 52, 64, 76, 88, 100, 112, 124],
		"F" => [6, 17, 29, 41, 53, 65, 77, 89, 101, 113, 125],
		"Gb" => [7, 18, 30, 42, 54, 66, 78, 90, 102, 114, 126],
		"G" => [8, 19, 31, 43, 55, 67, 79, 91, 103, 115, 127],
		"Ab" => [9, 20, 32, 44, 56, 68, 80, 92, 104, 116, 128],
		"A" => [10, 21, 33, 45, 57, 69, 81, 93, 105, 117, 129],
		"Bb" => [11, 22, 34, 46, 58, 70, 82, 94, 106, 118, 130],
		"B" => [12, 23, 35, 47, 59, 71, 83, 95, 107, 119, 131],
	];

	/**
	 * The midi note number
	 *
	 * @var int
	 */
	public $noteNumber;

	/**
	 * The note status ( on / off )
	 *
	 * @var int
	 */
	public $noteStatus;

	/**
	 * The velocity of the note
	 *
	 * @var int
	 */
	public $velocity;

	/**
	 * Milliseconds elapsed since last note
	 *
	 * @var int
	 */
	public $elapsed;
} 