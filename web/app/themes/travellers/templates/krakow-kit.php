<?php
/*
Template Name: Krakow Kit Page
*/

?>

<div class="main__the-page">
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="http://www.4sqmap.com/js/0.1/api.min.js"></script>
    <script type="text/javascript">
        // Replace '5144a40fe4b0c0b7eb1b57f3' with the ID of your Foursquare List
        foursqmap.lists('map2', '5144a40fe4b0c0b7eb1b57f3', {'sidebar': 'map2_sidebar'});
    </script>
    <div>
    <div id="map2_sidebar" style="width:300px; float:left; height: 500px; overflow: auto"></div>
    <div style="margin-left:300px;">
        <div id="map2" style="width: 100%;height: 500px"></div>
    </div>
    </div>

    
</div>