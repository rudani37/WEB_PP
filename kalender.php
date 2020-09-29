<style type="text/css">
  
  .hari{
  float:left;
  padding:5px;
  width:30px;
  text-align:center;
  margin:1px;
  background:#800080;

}
  .tgl{
  float:left;
  padding:5px;
  width:30px;
  text-align:center;
  margin:1px;
  background:#08b326;

  }
  .tgl:hover{
  color: #000000;
  }

  .float_habis{
  padding:1px;
  text-align:center;
  }

  .tgl_blank{
  float:left;
  padding:5px;
  width:30px;
  text-align:center;
  margin:1px;
  background:#000;
  color:#CCC;
  }

  .tgl_skrng{
  float:left;
  padding:5px;
  width:30px;
  text-align:center;
  margin:1px;
  background:#FF6347;
  }

  .blokbaris{
  padding:5px;
  text-align:center;
  margin:1px;
  }
</style>
<?php
$now = getdate(time());
$time = mktime(0,0,0, $now['mon'], 1, $now['year']);
$date = getdate($time);
$dayTotal = cal_days_in_month(0, $date['mon'], $date['year']);
//Print the calendar header with the month name.
print '<strong> ' . $date['month'] . ' ' . $date['year'] . '</strong>';
print '<div class=blokbaris>';
$hari=array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
for ($i = 0; $i < 7; $i++) { 
print "<div class='hari'>$hari[$i]</div>";
}
print '<div class=float_habis>&nbsp;</div></div>';

for ($i = 0; $i < 6; $i++) {
print '<div class=blokbaris>';
for ($j = 1; $j <= 7; $j++) {
$dayNum = $j + $i*7 - $date['wday'];
//Print a cell with the day number in it.  If it is today, highlight it.
print '<div';
if ($dayNum > 0 && $dayNum <= $dayTotal) {
print ($dayNum == $now['mday']) ? ' class=tgl_skrng>' : ' class=tgl>';
print "$dayNum";
}
else {
//Print a blank cell if no date falls on that day, but the row is unfinished.
print ' class=tgl_blank> - ';
}
print '</div>';
}
print '<div class=float_habis>&nbsp;</div></div>';
if ($dayNum >= $dayTotal && $i != 6)
break;
}
?> 