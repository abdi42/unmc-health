@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Dashboard</div>

<div class="card-body">

                  Welcome to UNMC MHealth Application, {{Auth::user()->name}}!


                </div>
            </div>
        </div>
    </div>
</div>

Your User name is : {{ Auth::user()->name }}
<br>
    Your Email Address is: {{ Auth::user()->email }}
    <br>
    Your User ID is: {{ Auth::user()->userid }}

<br>
    <?php
            use Illuminate\Support\Facades\DB;
            $userid= Auth::user()->userid;
echo '<hr>';


            if($userid == null)
                {
                    print('No Data available');
                }
                else
                    {


      $weight_value = DB::table('weights')->where('userid','=',$userid)->orderBy('id','desc')->first();
      if($weight_value == null)
          {
              print('No Weight data');
          }
          else
              {
      print('Your Current Weight Value is: ');
      echo $weight_value->WeightValue;
      echo '<br>';
      print('Your Current BMI Value is: ');
      echo $weight_value->BMI;
            }

        echo '<hr>';



        $bps_value = DB::table('bps')->where('userid','=',$userid)->orderBy('id','desc')->first();
        if($bps_value == null)
            {
                print('No BP Data available');
            }
            else{
        print('Your current HP is: ');
        echo $bps_value->HP;
        echo '<br>';
        print('Your current Heart Rate is: ');
        echo $bps_value->HR;
        echo '<br>';
        print('Your current LP value is: ');
        echo $bps_value->LP;
        echo '<br>';
        }

        echo '<hr>';




        $bgs_value = DB::table('bgs')->where('userid','=',$userid)->orderBy('id','desc')->first();
        if($bgs_value == null)
            {
                print('No BG Data Available');
            }
            else
                {
        print('Your current Blood Glucose value is: ');
        echo $bgs_value->BG;
        echo '<br>';
        print('The Dinner Situation was: ');
        echo $bgs_value->DinnerSituation;
        echo '<br>';
        print('The Drug Situation was: ');
        echo $bgs_value->DrugSituation;
        echo '<br>';
        }

        echo '<hr>';




      $pulseoxs_value = DB::table('pulseoxes')->where('userid','=',$userid)->orderBy('id','desc')->first();
      if($pulseoxs_value == null)
          {
              print('No Pulseox data available');
          }
          else
              {


        print('Your current Blood Oxygen value is: ');
        echo $pulseoxs_value->BO;
        echo '<br>';
        print('Your current Heart Rate is: ');
        echo $pulseoxs_value->HR;
            }
        echo '<hr>';
        }
 /*
    for($i=0;$i< count($response->WeightDataList);$i++)
        {
            if($response->WeightDataList[$i]->userid == $userid)
            {
                echo '<hr>';
            print_r("The details for Reading Number"."\x20".$i. "\x20". "are as follows:");
            echo '<br/>';
            print_r("Current Record Count is:\n")."\x20".print_r($response->CurrentRecordCount);
            echo '<br/>';
            print_r("Next Page URL is:\n")."\x20".print_r($response->NextPageUrl);
            echo '<br/>';
            print_r("Page Length is:\n")."\x20".print_r($response->PageLength);
            echo '<br/>';
            print_r("Page Number is:\n")."\x20".print_r($response->PageNumber);
            echo '<br/>';
            print_r("Previous Page URL is:\n")."\x20".print_r($response->PrevPageUrl);
            echo '<br/>';
            print_r("Record Count is:\n")."\x20".print_r($response->RecordCount);
            echo '<br/>';
            print_r("BMI value is:\n")."\x20".print_r($response->WeightDataList[$i]->BMI );
            echo '<br/>';
            print_r("BoneValue value is:\n")."\x20".print_r($response->WeightDataList[$i]->BoneValue);
            echo '<br/>';
            print_r("DCI value is:\n")."\x20".print_r($response->WeightDataList[$i]->DCI );
            echo '<br/>';
            print_r("DataID value is:\n")."\x20".print_r($response->WeightDataList[$i]->DataID);
            echo '<br/>';
            print_r("DataSource value is:\n")."\x20".print_r($response->WeightDataList[$i]->DataSource);
            echo '<br/>';
            print_r("FatValue value is:\n")."\x20".print_r($response->WeightDataList[$i]->FatValue);
            echo '<br/>';
            $latest_time = date("Y-m-d\TH:i:s\Z",$response->WeightDataList[$i]->LastChangeTime);
            print_r("LastChangeTime value is:\n")."\x20".print_r($latest_time);
            echo '<br/>';
            $mdate = date("Y-m-d\TH:i:s\Z",$response->WeightDataList[$i]->MDate);
            print_r("MDate value is:\n")."\x20".print_r($mdate);
            echo '<br/>';
            print_r("MuscaleValue is:\n")."\x20".print_r($response->WeightDataList[$i]->MuscaleValue);
            echo '<br/>';
            print_r("Note is:\n")."\x20".print_r($response->WeightDataList[$i]->Note);
            echo '<br/>';
            print_r("Timezone is:\n")."\x20".print_r($response->WeightDataList[$i]->TimeZone);
            echo '<br/>';
            print_r("VFR is:\n")."\x20".print_r($response->WeightDataList[$i]->VFR);
            echo '<br/>';
            print_r("WaterValue is:\n")."\x20".print_r($response->WeightDataList[$i]->WaterValue);
            echo '<br/>';
            print_r("WeightValue is:\n")."\x20".print_r($response->WeightDataList[$i]->WeightValue);
            echo '<br/>';
            print_r("Measurement time is:")."\x20".print_r($response->WeightDataList[$i]->measurement_time);
            echo '<br/>';
            print_r("Time Zone is:")."\x20".print_r($response->WeightDataList[$i]->time_zone);
            echo '<br/>';
            print_r("User ID:")."\x20".print_r($response->WeightDataList[$i]->userid);
            echo '<br/>';
            print_r("Weight Unit is:\n")."\x20".print_r($response->WeightUnit);
            echo '<br/>';}
        }
  */
    ?>
@endsection
