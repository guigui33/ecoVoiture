<!DOCTYPE html>
<html> 
<head> 
   <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
   <title>Google Maps GDirections Demo</title> 
   <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false" 
           type="text/javascript"></script> 
</head> 
<body onunload="GUnload()" style="font-family: Arial; font-size: 12px;"> 

   <div id="map" style="width: 400px; height: 300px"></div> 
   <div id="duration">Duration: </div> 
   <div id="distance">Distance: </div> 

   <script type="text/javascript"> 

   var map = new GMap2(document.getElementById("map"));
   var directions = new GDirections(map);

   directions.load("from: Chennai, India to: Mumbai, India");

   GEvent.addListener(directions, "load", function() {

       // Display the distance from the GDirections.getDistance() method:
       document.getElementById('distance').innerHTML += 
           directions.getDistance().meters + " meters";

       // Display the duration from the GDirections.getDuration() method:
       document.getElementById('duration').innerHTML += 
           directions.getDuration().seconds + " seconds";
   });
   </script> 
</body> 
</html>