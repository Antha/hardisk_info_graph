<?php
require_once 'Config.php';
require_once 'DiskStatus.class.php';

try {
  $diskStatus = new DiskStatus('C:');
  $freeSpace = $diskStatus->freeSpace();
  $totalSpace = $diskStatus->totalSpace();
  $barWidth = ($diskStatus->usedSpace()) ;

} catch (Exception $e) {
  echo 'Error ('.$e->getMessage().')';
  exit();
}

try {
  $diskStatus1 = new DiskStatus('E:');
  $freeSpace1 = $diskStatus1->freeSpace();
  $totalSpace1 = $diskStatus1->totalSpace();
  $barWidth1 = ($diskStatus1->usedSpace()) ;

} catch (Exception $e) {
  echo 'Error ('.$e->getMessage().')';
  exit();
}

$message = "\n\nServer My Local <br/>
Free Drive C:  : $freeSpace of $totalSpace ($barWidth) <br/>
Free Drive D:  $freeSpace1 of $totalSpace1 ($barWidth1) <br/>
";

$query = "INSERT INTO size_info VALUES ('".date("Y-m-d H:i:s")."',$freeSpace,$freeSpace1) ";
echo "<pre>".$query."</pre>";
mysqli_query($connect,$query);

echo $message;

?>