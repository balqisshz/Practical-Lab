<?php 
$error = "";
$showBill = false;



   if(isset($_POST['calculate'])) {
    //testing output if out form is success or not
    //echo "The first value is " . $_POST['first'];
    $firstinput = $_POST['first'];
   $secondinput = $_POST['second'] ;
   $thirdinput = $_POST['third'] ;
   $forthinput = $_POST['forth'] ;
   $fifthinput = $_POST['fifth'] ;

   //first validation
   //if user not enter anything, then output will be zero (0)
   if ($firstinput == "")
       $firstinput = 0;
    if ($secondinput == "")
       $secondinput = 0;
    if ($thirdinput == "")
       $thirdinput = 0;
    if ($forthinput == "")
       $forthinput = 0;
    if ($fifthinput == "")
       $fifthinput = 0;

    //second validation
    //if user put negative number, then output will be error
    //then warning will be displayed
    if ($firstinput <0 || $secondinput <0 || $thirdinput <0 || $forthinput <0 || $fifthinput <0 )
        $error = "Please enter positive numbers only!!";

     
    //third validation
    //will validate exactly as question asked, 
    //max value for each input
    else if ($firstinput >200)
        $error = "Please enter below 200kwh";
    else if($secondinput >100)
        $error = "Please enter below 100kwh";
    else if($thirdinput >300)
        $error = "Please enter below 300kwh";
    else if($forthinput >300)
        $error = "Please enter below 300kwh";
   //fifthinput has no limit because the tariff says 901 kwh onwards

    //forth validation
    else if($firstinput + $secondinput + $thirdinput + $forthinput + $fifthinput == 0)

    $error = "Please enter at least one input";
    //once all above validations already passed, we calcualte the bill 
    else {
        $firstcharge = $firstinput * 0.218;
        $secondcharge = $secondinput * 0.334;
        $thirdcharge = $thirdinput * 0.516;
        $forthcharge = $forthinput * 0.546;
        $fifthcharge = $fifthinput  * 0.571;

        $totalInput = $firstinput + $secondinput + $thirdinput + $forthinput + $fifthinput;
        $totalCharge = $firstcharge + $secondcharge + $thirdcharge + $forthcharge + $fifthcharge;

        if ($totalCharge < 3)
        $totalCharge = 3; 

        if ($totalInput > 600) {
            //cara lambat nak kirahasil
            // $sst = $totalCharge * 0.06;
            // $totalCharge = $totalCharge + $sst;

            //cara kira cepat
            $totalCharge = $totalCharge * 1.06;
        }

        $showBill = true;
    }
    
   }

   //create variable to store the value of multiplication
//    $firstcharge =
    //echo "The first charge is " . $firstinput;

?>