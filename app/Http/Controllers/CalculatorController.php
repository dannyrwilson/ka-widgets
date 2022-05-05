<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WidgetCalculatorService;
use App\Http\Requests\WidgetCalculatorRequest;

class CalculatorController extends Controller
{

	// use dependency injection to load the widget calculator service
	public function __construct(WidgetCalculatorService $widgetCalculatorService) {
		$this->widgetCalculatorService = $widgetCalculatorService;
	}

	// main view for application ( testing purposes )
	public function index() {
		return view('calculator.widgets');	
	}

	// result method to determine the results of the calculator widget request
	public function result(WidgetCalculatorRequest $widgetCalculatorRequest) {

		$requiredWidgets = $widgetCalculatorRequest->required_widgets;

		$packs = $this->widgetCalculatorService->calculate($requiredWidgets);

		return view('calculator.result', [
			'packs' => $packs,
			'requiredWidgets' => number_format($requiredWidgets, 0)
		])->render();
		
	}
}
