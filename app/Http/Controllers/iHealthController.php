<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\iHealth;
use App\Subject;

class iHealthController extends Controller
{

  protected $ihealthService;

  public function __construct(iHealth $ihealth)
  {
    $this->ihealthService = $ihealth;
  }


  public function show_weight(Subject $subject)
  {
    $results = $this->ihealthService->weights($subject->userid,$subject->access_token);

    return view('weights.index', [
      "results" => $results,
      "subjectId" => $subject->subject
    ]);
  }


  public function show_bloodpressure(Subject $subject)
  {
    $results = $this->ihealthService->bloodPressure($subject->userid,$subject->access_token);

    return view('bloodpressures.index', [
      "results" => $results,
      "subjectId" => $subject->subject
    ]);
  }


  public function show_bloodglucose(Subject $subject)
  {
    $results = $this->ihealthService->bloodGlucose($subject->userid,$subject->access_token);

    return view('bloodglucoses.index',[
      "results" => $results,
      "subjectId" => $subject->subject
    ]);
  }


  public function show_pulseoxygen(Subject $subject)
  {
    $results = $this->ihealthService->pulseOxygen($subject->userid,$subject->access_token);

    return view('pulseoxygens.index', [
      "results" => $results,
      "subjectId" => $subject->subject
    ]);
  }

  
}
