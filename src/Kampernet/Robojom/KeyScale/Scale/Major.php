<?php
namespace Kampernet\Robojom\KeyScale\Scale;

use Kampernet\Robojom\KeyScale\ScaleInterface;

class Major implements ScaleInterface {

	/**
	 * @return array|\int[]
	 */
	public function getNotes() {

		return [0, 2, 4, 5, 7, 9, 11, 12];
	}
} 