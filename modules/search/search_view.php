<div class="container srch320">
    <div class="search-main">
        <div class="row">
            <form method="get" action="" name="form_search" id="form_search">
                <div class="col-sm-5 col-xs-12">
                    <label>Near x-miles</label>
                    <div class="range_sliderotr">
                        <input class="range-slider" type="hidden" name="radius" value="<?=isset($_GET["radius"])?(int)$_GET["radius"]:0;?>"/>
                    </div>
                </div>
                <div class="col-sm-7 col-xs-12">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <input type="text" class="form-input round" name="zipcode" value="<?= $_GET["zipcode"]?>" placeholder="Enter Zip Code">
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <input value="Refine Search" type="submit" class="form-submit round trans" id="form_search_btn">
                            <!--<button class="form-submit round trans" id="form_search_btn"><i class="fa fa-search"></i>Refine Search</button>-->
                        </div>
                    </div>
                </div>
            </form>					
        </div>
    </div>
</div>

<!-- results -->
<section class="search-otr">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <?php
                if (count($domestic_data) > 0) {
                    $i=1;
                    foreach ($domestic_data as $dkey => $dval) {
                        ?>	
                        <div class="result-blk trans">
                            <h2><img src="<?= DEFAULT_URL; ?>/assets/img/pin/pin<?= $i;?>.png" alt="Pin"/><?= $dval["attorney_name"];?> <?php if(isset($dval["distance"])){?> <small>- <?= number_format($dval["distance"],2);?> miles away </small><?php }?></h2>
                            <ul>
                                <li><i class="fa fa-map-marker"></i><b>Address </b><?= $dval["attorney_address"];?>,<?= $dval["attorney_city"];?>,<?= $dval["attorney_state"];?>,<?= $dval["attorney_zipcode"];?> </li>
                                <li><i class="fa fa-link"></i><b>Website </b><a href="http://www.lawfirm.com"><?= $dval["attorney_website"];?></a></li>
                                <li><i class="fa fa-mobile"></i><b>Phone Number </b><?= $dval["attorney_phone_no"];?></li>
                            </ul>
                            <p><label><i class="fa fa-exclamation-circle"></i>Description</label>
                                <?= $dval["attorney_description"];?> <a href="javascript:void(0);" title="more">more..</a> 	
                            </p>
                        </div>
                <?php $i++;}}else{?>
                    <!-- ***** result block ***** -->
                    <!--<div class="text-center"><a href="javascript:void(0);" title="Load More" class="view-all trans">Load More</a></div>-->
                    <!-- ***** if no result then show ***** -->
                    <h4 class="nothing">Sorry there doesn't seem to be anyone near your location ! <i>Try some of the national or global companies below,</i></h4>
                <?php
                }
                if (count($international_data) > 0) {
                    $j=1;
                    foreach ($international_data as $ikey => $ival) {
                        ?>	

                        <div class="result-blk trans">
                            <h2><img src="<?= DEFAULT_URL; ?>/assets/img/pin/pin<?=$j;?>.png" alt="Pin"/><?= $ival["attorney_name"];?></h2>
                            <ul>
                                <li><i class="fa fa-map-marker"></i><b>Address </b><?= $ival["attorney_address"];?>,<?= $ival["attorney_city"];?>,<?= $ival["attorney_state"];?>,<?= $ival["attorney_zipcode"];?></li>
                                <li><i class="fa fa-link"></i><b>Website </b><a href="<?= $ival["attorney_website"];?>"><?= $ival["attorney_website"];?></a></li>
                                <li><i class="fa fa-mobile"></i><b>Phone Number </b><?= $ival["attorney_phone_no"];?></li>
                            </ul>
                            <p><label><i class="fa fa-exclamation-circle"></i>Description</label>
                                <?= $ival["attorney_description"];?> <a href="javascript:void(0);" title="more">more..</a> 	
                            </p>
                        </div>
    <?php $j++;}
} ?>
                <!-- ***** result block ***** -->

                    <!-- ***** result block ***** -->
                    <!--<div class="text-center"><a href="javascript:void(0);" title="Load More" class="view-all trans">Load More</a></div>-->
            </div>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize"></script>
            <div class="col-sm-4 col-xs-12">
                <h5 class="visible-xs">Map Locations for Above Offices</h5>
                <div class="map-otr">
                    <div class="map">
                        <!--<img src="<?= DEFAULT_URL; ?>/assets/img/map.jpg" alt="map"/>-->
                        <?php if(!empty($domestic_data)){?>
                        <div id="googleMap"></div>
                        <?php }?>
                    </div>
                    <div class="map-foot">
                        <h3>Timeshare Attorneys</h3>
                        <p>find the solution of your problem or some kind of line to highlight the concept.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    #googleMap {
        width: 360px;
        height: 523px;
    }
</style>
<script>
    $(window).load(function() {
        //initialize();
    });
    function initialize() {
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };
        // Display a map on the page
        map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        map.setTilt(45);
        // Multiple Markers
        var markers = [<?php
    $locArr = '';
    if (!empty($domestic_data)) {
        foreach ($domestic_data as $key => $val) {
            $locArr .= "['" . str_replace("'", "&#39", $val['attorney_name']) . "'," . $val['attorney_latitude'] . "," . $val['attorney_longitude'] . "],";
        }
    }
    ?>
<?= trim($locArr, ',') ?>];
        // Info Window Content
        var infoWindowContent = [
            ['<div class="info_content">' +
                        '<h3>London Eye</h3>' +
                        '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' + '</div>'],
            ['<div class="info_content">' +
                        '<h3>Palace of Westminster</h3>' +
                        '<p>The Palace of Westminster is the meeting place of the House of Commons and the House of Lords, the two houses of the Parliament of the United Kingdom. Commonly known as the Houses of Parliament after its tenants.</p>' +
                        '</div>']
        ];
        // Display multiple markers on a map
        var infoWindow = new google.maps.InfoWindow(), marker, i;
        // Loop through our array of markers & place each one on the map  
        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            //var newIcon = MapIconMaker.createMarkerIcon({width: 64, height: 64, primaryColor: "#00ff00"});
            var pinColor = "FE7569";
            var img = parseInt(i) + parseInt(1);
            var pinImage = new google.maps.MarkerImage("<?= DEFAULT_URL ?>/assets/img/pin/pin" + img + ".png");
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0],
                icon: pinImage
            });
            // Allow each marker to have an info window    
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    //infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.setContent(markers[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));
            // Automatically center the map fitting all markers on the screen
            map.fitBounds(bounds);
        }

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            this.setZoom(3);
            google.maps.event.removeListener(boundsListener);
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
//submit form
//$("body").on("click","#form_search_btn",function(){
//    $("#form_search").submit();
//});
        //////Sticky Map
        function sticky_relocate() {
            var window_top = $(window).scrollTop();
            var div_top = $('#sticky-anchor').offset().top;
            if (window_top > div_top) {
                $('#sticky').addClass('map-stick');
            } else {
                $('#sticky').removeClass('map-stick');
            }
        }

        //        $(function() {
        //            $(window).scroll(sticky_relocate);
        //            sticky_relocate();
        //        });

    });</script>

