<?php
namespace App\Services;

/**
 * WidgetCalculatorService.php
 * Class to generate the required number of packs to be sent.
 * 04/05/2022
 */

class WidgetCalculatorService {

	public $totalPacks;
	public $packArray;

	public function __construct() {

		// load packs from .env
		$this->packArray = explode(',', config('app.widget_pack_sizes'));
		
	}

	public function calculate(int $requiredWidgets) : array {


		// define the total packs ( use out outside of forloop, slight performance increase )
		$this->totalPacks = count($this->packArray);

		// define empty array
		$totalPacksRequired = [];

		// start looping the packs
		for ($i=0; $i < $this->totalPacks; $i++) { 

			// if widgets required is more than pack size, see how many times requiredwidgets / self::
			if($requiredWidgets > $this->packArray[$i]) {

				// total packs
				$totalPacks = floor($requiredWidgets/$this->packArray[$i]);

				// remaining widgets left to sort
				$requiredWidgets -= $this->packArray[$i]*$totalPacks;

				// add to array
				$totalPacksRequired[] = [
					'packSize'         => number_format($this->packArray[$i],0),
					'packQuantity'     => round($totalPacks, 0)
				];

				// continue
				continue;

			}

			// if whats left still more than the last pack.
			if($requiredWidgets > end($this->packArray)){ 

				$totalPacksRequired[] = [
					'packSize' => $this->packArray[$this->totalPacks-2],
					'packQuantity' => 1
				];

				$requiredWidgets -= $this->packArray[$this->totalPacks-2];

				continue;

			}

			// still any widgets left, add the last pack
			if($requiredWidgets > 0){
				
				$totalPacksRequired[] = [
					'packSize' => end($this->packArray),
					'packQuantity' => 1
				];

			}

			break;

		}

		// return all the required packs
		return $totalPacksRequired;

	}

}
