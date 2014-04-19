<?php
namespace Kampernet\Robojom\Instrument;

class InstrumentManager {

	/**
	 * @var \Kampernet\Robojom\Instrument\InstrumentInterface[]
	 */
	private $instruments;

	public function addInstrument(InstrumentInterface $instrument) {

		$this->instruments []= $instrument;
	}
} 