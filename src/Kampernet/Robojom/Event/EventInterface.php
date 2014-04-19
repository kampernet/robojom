<?php
namespace Kampernet\Robojom\Event;

interface EventInterface {

	/**
	 * @param array $data
	 * @return mixed
	 */
	public function fire($data);
}