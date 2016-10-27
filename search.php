<?php
$config = include('config.php');

require_once 'lib/twitteroauth.php';

define('CONSUMER_KEY', $config['CONSUMER_KEY']);
define('CONSUMER_SECRET', $config['CONSUMER_SECRET']);
define('ACCESS_TOKEN', $config['ACCESS_TOKEN']);
define('ACCESS_TOKEN_SECRET', $config['ACCESS_TOKEN_SECRET']);
 
function search(array $query)
{
  $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
  return $toa->get('search/tweets', $query);
}
 

function buildLocs(){ 
$locList = array();


$query = array(
  "q" => "Hi OR Hello",
  "count"=>100,  
  //"geocode"=>"37.781157,-122.398720,1mi"
);

$results = search($query);
 
foreach ($results->statuses as $result) {

       if(!($result->geo==null)){
          $json_obj = json_decode(json_encode($result->coordinates), true);
           $key = array_search ( $thing[0] , $locList );
          if($key!=false)
              {
                $key = $key+1;
                if ($locList[$key] ==$json_obj["coordinates"][1] )
                {$locList[$key+1] = $locList[$key+1] +0.025;
                echo "dupe";
              }
              }
          else
            {array_push($locList, $json_obj["coordinates"][0], $json_obj["coordinates"][1],.025); }
        }
        else{
           $thing = getLatLon( $result->user->location);
            $key = array_search ( $thing[0] , $locList );
           if($key!=false)
              {
                $key = $key+1;
                if ($locList[$key] == $thing[1] )
                {$locList[$key+1] = $locList[$key+1] +0.025;
                echo "dupe";
              }
              }
          else
            { array_push($locList, $thing[0], $thing[1],.025);}
        }
}

while(count($locList)<=20000){ 
$maxID = $results->statuses[99]->id;

$query = array(
  "q" => "Hi OR Hello",
  "count"=>100,  
  "max_id" => $maxID
);

$results = search($query);
 
foreach ($results->statuses as $result) {

       if(!($result->geo==null)){
          $json_obj = json_decode(json_encode($result->coordinates), true);
           $key = array_search ( $thing[0] , $locList );
          if($key!=false)
              {
                $key = $key+1;
                if ($locList[$key] ==$json_obj["coordinates"][1] )
                {$locList[$key+1] = $locList[$key+1] +0.025;
                echo "dupe";
              }
              }
          else
            {array_push($locList, $json_obj["coordinates"][0], $json_obj["coordinates"][1],.025); }
        }
        else{
           $thing = getLatLon( $result->user->location);
            $key = array_search ( $thing[0] , $locList );
           if($key!=false)
              {
                $key = $key+1;
                if ($locList[$key] == $thing[1] )
                {$locList[$key+1] = $locList[$key+1] +0.025;
                echo "dupe";
              }
              }
          else
            { array_push($locList, $thing[0], $thing[1],.025);}
        }
}
}

//print_r( $locList);
return ($locList);
}




function getLatLon($strLoc)
{
  $map_address = $strLoc;
$url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=".urlencode($map_address);
$thing =file_get_contents($url);
if ($thing==null)
  {return;}
$lat_long = get_object_vars(json_decode($thing));
if ($lat_long["status"]=="OK"){
  $toRet = array($lat_long['results'][0]->geometry->location->lat, $lat_long['results'][0]->geometry->location->lng);
  return $toRet;
}
return;
  
}




function fixNotation($array)
{ 
  $arrayNew = array();
  $keys = array_keys($array);
  for( $i = 0; $i < count($array); $i++){
    if ($array[$i]=="")
    {
      $i = $i + 2;
    }
    else
    {
      array_push($arrayNew, $array[$i]);
    }
  }
  return $arrayNew;

}

function writeToFile($locAndLatString)
{

  $toWrite = [["tweets",  $locAndLatString ]];
  $fp = fopen('results.json', 'w');
fwrite($fp, json_encode($toWrite));
fclose($fp);
echo "done!";
}

writeToFile(fixNotation(buildLocs()));



