<!DOCTYPE html>

<html>

<head>
  <title>PHP Annual Calendar </title>
  <style type="text/css">
  <!--
  table{
    float:left;
    height:250px;
    font-size:12px;
    font-family: Tahoma, Arial, sans-serif;
border-collapse:separate;
empty-cells:hide;
    }

  #sample{
   height:200px;
   white-space: nowrap; 
  }

  #sample::after{
    content: "\a";
    white-space: pre;
  }

  .find{
    color:#FFFFFF;
    background:#FF0000;
  }

  -->
  </style>
</head>

<body>
<?php

$current_date=date('Y-m-d');


  for($i=1;$i<=12;$i++){

  //main script
  calendar(date('Y'),$i, $current_date);

    //for space after 6 month
    if($i==6){
      echo "<br /><br /><br /><div id='sample'></div><br />";
    }
  
  }

//simple month calendar functions
function calendar1($start,$div){
  echo '<table border="1"><tr>';
  for($i=1;$i<=31;$i++){
  $j=$i%7;
  if($j=='1'){
  echo '</tr><tr>';
  }
  echo '<td>'.$i.':'.$j.'</td>';
  }
  echo '</tr></table>';
}

//version#2
function calendar2($start){
  echo '<table border="1"><tr>';
  for($k=1;$k<=$start;$k++){
    echo '<td></td>';
  }
  $div=8-$start;
  for($i=1;$i<=31;$i++){
  $j=$i%7;
  if($j==$div){
  echo '</tr><tr>';
  }
  echo '<td>'.$i.':'.$j.'</td>';
  }
  echo '</tr></table>';
}


//calendar method
function calendar($year,$month, $find_dt){

$find=$start=0;

//find no.of days
$last = cal_days_in_month(CAL_GREGORIAN, $month, $year);

$d = new DateTime(''.$year.'-'.$month.'-01');
$day=$d->format('w, F Y');
$start=intval($day)+1;


if(date('m',strtotime($find_dt))==$month AND date('Y',strtotime($find_dt))==$year)
{
  $find=1;
}

$div=array("1"=>"1","2"=>"0","3"=>"6","4"=>"5","5"=>"4","6"=>"3","7"=>"2","8"=>"1");


$mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");


echo '<table border="1">
<tr bgcolor="#A9D4EA"><th colspan="7">'.$mons[$month].' '.$year.' </td></tr>
<tr bgcolor="#FFFFCC"><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>';


for($k=1;$k<$start;$k++){
 echo '<td></td>';
}



for($i=1;$i<=$last;$i++){

  $j=$i%7;

  if($j==$div[$start]){
  echo '</tr><tr>';
  }
  if($find==1 AND date('d',strtotime($find_dt))==$i){
  echo '<td align="center" class="find" width="15">'.$i.'</td>';
  }
  else{
  echo '<td align="center" width="15">'.$i.'</td>';
  }
  }
  echo '</tr></table>';
}

?>
</body>
</html>