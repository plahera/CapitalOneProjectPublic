
<!doctype html>
<html lang="en">
<head>
  
  
  <title>WebGL Globe</title>
  <meta charset="utf-8">
  <style type="text/css">
    html {
      height: 100%;
    }

    body {
      margin: 0;
      padding: 0;
      background: #DCDCDC url(globe/loading.gif) center center no-repeat;
      color: #ffffff;
      font-family: sans-serif;
      font-size: 13px;
      line-height: 20px;
      height: 100%;
    }


    a {
      color: #000000;
      text-decoration: none;
      font: Helvetica;
    }

    a:hover {
      text-decoration: underline;
    }


    #description {
      position: absolute;
      top: 170px;
      width: 200px;
      left: 50px;
      background-color: #228B22;
      font: 15px Helvetica;
      padding: 15px;
      opacity: .5;
      border: 2px solid black ;
    }

#note {

      font: 12px Helvetica;
    }

    #bottombar{
      position: fixed;
      z-index: 100; 
      bottom: 0; 
      left: 0;
      height: 30px;
      text-align: center;
      padding-top: 10px;
      width: 100%;
      background-color: black;
      
    }

    
  </style>
</head>
<body>

<div id = "description">
<h1>Hello!</h1>
<p>Lots of people say hello to each other every day. Ever wondered where? Using Twitter, I created a globe to show you a snapshot of where people are saying hi recently.
<div id = "note"> Note: This website uses a user's profile location as a fallback. Thus, that's probably why some people are tweeting hi from the North Pole, Artartica, etc–They set that as their location.</div>
</div>


<div id="container"></div>



<script type="text/javascript" src="ThreeWebGL.js"></script>
<script type="text/javascript" src="ThreeExtras.js"></script>
<script type="text/javascript" src="RequestAnimationFrame.js"></script>
<script type="text/javascript" src="Detector.js"></script>
<script type="text/javascript" src="globe.js"></script>
<script type="text/javascript">

  var globe = DAT.Globe(document.getElementById('container'), function(label) {
    return new THREE.Color([
      0x004c7f, 0x00785f, 0x00a53f, 0x00d21f, 0x00ff00][label]);
  });


  xhr = new XMLHttpRequest();
  xhr.open('GET', 'results.json', true);
  xhr.onreadystatechange = function(e) {
     // If we've received the data
    if ( xhr.readyState === 4 && xhr.status === 200 ) {

        // Parse the JSON
      // var data = [["tweets",[42.4136428,-70.9915997,0.5,18.220833,-66.590149,0.5,37.3382082,-121.8863286,0.5,51.165691,10.451526,0.5,29.6152274,-99.5269926,0.5,36.778261,-119.4179324,0.5,40.4172871,-82.907123,0.5,28.4907332,65.0957792,0.5,37.09024,-95.712891,0.5,-73.8654295,40.4978824,141.5204807,40.645532,-74.0123851,14.882905,103.4937107,3.0175262,101.6247034,42.4136428,-70.9915997,18.220833,-66.590149,51.165691,10.451526,29.6152274,-99.5269926,-119.4179324,19.0791127,72.8404897,32.7766642,-96.7969879,-76.4549457,27.5158689,-97.856109,34.0522342,-118.2436849,-99.9018131,39.8398269,-104.1930918,36.0726354,-79.7919754,13.1683112,74.7629661,53.8852286,-109.9574952,-102.7872591,-14.235004,-51.92528,36.204824,138.252924,55.2707828,-78.6568942,28.4907332,65.0957792,15.454166,18.732207,36.1699412,-115.1398296,23.0966086,113.3675768,4.570868,-74.297333,14.705431,33.7489954,-84.3879824,23.634501,-102.552784,44.4840986,-110.8738229,21.8957589,-81.5502565,26.8466937,80.946166]]]
       var data = JSON.parse( xhr.responseText );
        console.log(JSON.parse( xhr.responseText ));

        // Tell the globe about your JSON data
            globe.addData( data[0][1], {format: 'magnitude', name: data[0][0]} );

        // Create the geometry
        globe.createPoints();

        // Begin animation
        globe.animate();

    }
  };
  xhr.send(null);

</script>

<div id="bottombar"> Created by Paula Lahera</div>
</body>

</html>
