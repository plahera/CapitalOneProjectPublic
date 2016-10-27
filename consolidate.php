<?php       
$locList = array(1=>5 , 2=>5,3=>.05,4=>3,5=>5,6=>.05);

$thing = array(0=>6, 1=>5);
           $key = array_search ( $thing[0] , $locList );
          if($key!=false)
              {
                $key = $key+1;
                if ($locList[$key] ==$thing[1] )
                {$locList[$key+1] = $locList[$key+1] +0.05;
                echo "dupe";
              }
              }
          else
            {array_push($locList, $thing[0], $thing[1],.05); 
        echo "Added";}

              print_r($locList);



/*

          if(in_array(  $json_obj["coordinates"][0] , $locList ))
              {
                $key = array_search ( $json_obj["coordinates"][0] , $locList )+1;
                if ($locList[$key] ==$json_obj["coordinates"][0] )
                {$locList[$key+1] = $locList[$key+1] +0.05;
                echo "dupe";
              }
              }
          else
            {array_push($locList, $json_obj["coordinates"][0], $json_obj["coordinates"][1],.05); }
        }
        else{
           $thing = getLatLon( $result->user->location);
          if(in_array(  $thing[0] , $locList ))
              {
                $key = array_search ( $thing[0] , $locList )+1;
                if ($locList[$key] == $thing[1] )
                {$locList[$key+1] = $locList[$key+1] +0.05;
                echo "dupe";
              }
              }
          else
            { array_push($locList, $thing[0], $thing[1],.05);}
        }

}
       */       ?>