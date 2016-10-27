

<?php 
$response = array(1,2,3,4);
$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
?>