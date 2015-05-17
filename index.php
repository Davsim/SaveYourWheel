<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Your Wheel</title>
    <link rel="stylesheet" href="bootstrap-3.3.4-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-3.3.4-dist/css/bootstrap-theme.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    
    <link rel="stylesheet" type="text/css" href="Social_Icon.css" >
    <link rel="stylesheet" type="text/css" href="Dropup.css">
</head>
<body style="background-color:#232323">
    <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="http://i57.tinypic.com/wqn94.png" style="position:relative;  top:-8px"></a>
                <a class="navbar-brand" href="index.php">Save Your Wheel</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index,php" target="_blank">Home</a></li>
                    <li><a href="#" target="_blank">About</a></li>
                    <li><a href="#" target="_blank">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="width: 100%">
        <div class="row">
            <div style="width:100%; height:auto; position:relative; top:50px">
                <div id="map" style="width:auto; height: 500px"></div>
                    <?
                        ini_set('display_errors',1);
                        ini_set('display_startup_errors',1);
                        error_reporting(-1);

                        $connect = mysqli_connect("localhost", "ms_***********", "*****", "ms2_**********") or die('Could not connect:' . mysqli_error($connect));
                        $query = "select * from Data";
                        $result = mysqli_query($connect, $query) or die('Could not query:' . mysql_error($connect));

                        $i = 0;
                        $lat = array();
                        $lon = array();
                        $int = array();
                        while ($row = mysqli_fetch_array($result))
                        {	$lat[$i] = $row['lat'];
                            $lon[$i] = $row['lon'];
                            $int[$i] = $row['intensity'];
                            $i += 1;
                        }

                        mysqli_close($connect);
                    ?>

                    <script src="../dist/leaflet.js"></script>
                    <script type="text/javascript">
                        var lat = <? echo json_encode($lat); ?>;
                        var lon = <? echo json_encode($lon); ?>;
                        var map = L.map('map').setView([40.868432, 14.377460], 13);

                        L.tileLayer('https://a.tiles.mapbox.com/v4/fed10.94744c0a/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZmVkMTAiLCJhIjoiZ3IwWm1nMCJ9._ZjEiI_mlQ3YFcbn8sgkQw', {
                                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                                             ' <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                             ' Imagery © <a href="http://mapbox.com">Mapbox</a>'
                        }).addTo(map);

                        for(i=0; i < lat.length; i++) {
                            L.marker([lat[i],lon[i]]).addTo(map).bindPopup("You Are at: " + lat[i] + ", " + lon[i]).openPopup();
                        }
                    </script>
                </script>
            </div>
        </div>
    </div>
    <!-- Split button -->

    <nav class="navbar navbar-default navbar-inverse" style="border:none; position:relative; top:50px; min-height: 93px; margin-bottom:0; padding-bottom:0; border-radius: 0px 3px;">
        <div class="container-fluid">
        	<div id="Footer" style="z-index:1;">
                <div class="Container">
                    <div class="btn-group">
                        <!--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Dropup <span class="caret caret-up"></span>
                        </button>-->
        				<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration: none;">Filters<b class="dropup"><b class="caret"></b></b></a>
                        <ul class="dropdown-menu drop-up" role="menu">
                            <li><a href="#">1-4 intensity</a></li>
                            <li><a href="#">4-8 intensity</a></li>
                            <li><a href="#">8-10 intensity</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        		
        	<div class="col-md-12" align="center" style=" width: 100%; height:50px; position:relative; top:-25px; margin-bottom:-25px; z-index:2; padding:0px;">
        		<ul class="social-network social-circle">
        			<li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"><img src="Image\Rss-icon.png" height="100%" width="100%"></i></a></li>
        			<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"><img src="Image\Facebook-icon.png" height="100%" width="100%"></i></a></li>
        			<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"><img src="Image\Twitter-icon.png" height="100%" width="100%"></i></a></li>
        			<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"><img src="Image\Google-Plus-icon.png" height="100%" width="100%"></i></a></li>
        			<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"><img src="Image\Linkedin-icon.png" height="100%" width="100%"></i></a></li>
        		</ul>				
        	</div>
        	<p style="color:grey; text-align:right; position:relative; top:-80px; z-index:0; margin-bottom:-80px;">© Copyright 2015 Save Your Wheel</p>
    	</div><!-- /.container-fluid -->
    </nav>
</body>
</html>  
