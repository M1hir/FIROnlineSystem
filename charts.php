<!DOCTYPE html>
<html lang="en">
<head>
<title>FIR Online</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />	
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="#">FIR online</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li   id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      
    </li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-signal"></i> Charts &amp; graphs</a>
  <ul>
    <li><a href="Login.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="active"> <a href="charts.php"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="form-common.php">File FIR</a></li>
        <li><a href="form-validation.php">Issue NOC</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">3</span></a>
      <ul>
        
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="invoice.html">News Update</a></li>
        <li><a href="chat.html">Chat Box</a></li>
      </ul>
    </li>
  </ul>

</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"><a href="Login.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Charts &amp; graphs</a></div>
    <h1>Charts &amp; graphs</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Real Time chart</h5>
          </div>
          <div class="widget-content">
            <div id="placeholder2"></div>
            <p>Time between updates:
              <input id="updateInterval" type="text" value="" style="text-align: right; width:5em">
              milliseconds</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Turning-series chart</h5>
          </div>
          <div class="widget-content">
            <div id="placeholder"></div>
            <p id="choices"></p>
          </div>
        </div>
      </div>
    </div>
	
	
	
<?php
session_start();
include("db_connection.php"); 
$check_user2="select * from compaintdb";
    $run=mysqli_query($dbcon,$check_user2);  
	$count = 0;
	$new = 0;
	$open = 0;
	
	$maleArr = []; $femaleArr = [];

for ($i = 0; $i < 100; $i++)
{
    array_push($maleArr, 0);
    array_push($femaleArr, 0);
    //or $array[] = $some_data; for single items.
}

while($row=mysqli_fetch_array($run))
{
	$count=$count+1;
	$complaintdate = substr( $row['complaint_date'] , 0, 10);
	$today = date("Y-m-d");
	if($today==$complaintdate)
	{
		$new=$new+1;
	}
	if($row['statusid']=='Open')
	{
		$open=$open+1;
	}



	if($row['gender']==1) //MALE
	{
		$maleArr[($row['age'])]++;
	}
	else //FEMALE
	{
		$femaleArr[($row['age'])]++;
	}
}



$closed=$count-$open;

$type_0=0;
$type_1=0;
$type_2=0;
$type_3=0;
$type_4=0;
$type_5=0;
$type_6=0;
$type_7=0;
$query="select type from compaintdb";
$run=mysqli_query($dbcon,$query);
while($row=mysqli_fetch_array($run))
{
	
	$t=$row['type'];
	if($t=='robbery')
	{
		$type_0=$type_0+1;
	}
	if($t=='lost')
	{
		$type_1=$type_1+1;
	}
	if($t=='kidnap')
	{
		$type_2=$type_2+1;
	}
	if($t=='rape')
	{
		$type_3=$type_3+1;
	}
	if($t=='assault')
	{
		$type_4=$type_4+1;
	}
	if($t=='homicide')
	{
		$type_5=$type_5+1;
	}
	if($t=='theft')
	{
		$type_6=$type_6+1;
	}
	if($t=='violence')
	{
		$type_7=$type_7+1;
	}
}

$full = $type_0 +$type_1 + $type_2  + $type_3  + $type_4  + $type_5  + $type_6  + $type_7; 

		$type_0=($type_0/$full)*100;
		$type_1=($type_1/$full)*100;
		$type_2=($type_2/$full)*100;
		$type_3=($type_3/$full)*100;
		$type_4=($type_4/$full)*100;
		$type_5=($type_5/$full)*100;
		$type_6=($type_6/$full)*100;
		$type_7=($type_7/$full)*100;
		
		$tempi=1;
		$temp_j=1;
?>




    <div class="widget-box widget-plain">
      <div class="center">
        <ul class="stat-boxes2">
          <li>
            <div class="left peity_bar_neutral"><span><span style="display: none;">2,4,9,7,12,10,12</span>
              <canvas width="50" height="24"></canvas>
              </span>+10%</div>
            <div class="right"> <strong><?php echo $count; ?></strong> Total Reports </div>
          </li>
          <li>
            <div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
              <canvas width="50" height="24"></canvas>
              </span>10%</div>
            <div class="right"> <strong><?php echo $new; ?></strong> New Reports </div>
          </li>
          <li>
            <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
              <canvas width="50" height="24"></canvas>
              </span>-40%</div>
            <div class="right"> <strong><?php echo $open; ?></strong> Open Cases</div>
          </li>
          <li>
            <div class="left peity_line_good"><span><span style="display: none;">12,6,9,23,14,10,17</span>
              <canvas width="50" height="24"></canvas>
              </span>+60%</div>
            <div class="right"> <strong><?php echo $closed; ?></strong> Closed Cases </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row-fluid">

    </div>
	
	
	
	
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Pie chart</h5>
          </div>
          <div class="widget-content">
            <div class="pie"></div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Bar chart</h5>
          </div>
          <div class="widget-content">
            <div class="chart"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->

<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.pie.min.js"></script> 
<script src="js/matrix.charts.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<!--Real-time-chart-js-->
<script type="text/javascript">
$(function () {
    // we use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 300;
    function getRandomData() {
        if (data.length > 0)
            data = data.slice(1);

        // do a random walk
        while (data.length < totalPoints) {
            var prev = data.length > 0 ? data[data.length - 1] : 50;
            var y = prev + Math.random() * 10 - 5;
            if (y < 0)
                y = 0;
            if (y > 100)
                y = 100;
            data.push(y);
        }

        // zip the generated y values with the x values
        var res = [];
        for (var i = 0; i < data.length; ++i)
            res.push([i, data[i]])
        return res;
    }

    // setup control widget
    var updateInterval = 30;
    $("#updateInterval").val(updateInterval).change(function () {
        var v = $(this).val();
        if (v && !isNaN(+v)) {
            updateInterval = +v;
            if (updateInterval < 1)
                updateInterval = 1;
            if (updateInterval > 2000)
                updateInterval = 2000;
            $(this).val("" + updateInterval);
        }
    });

    // setup plot
    var options = {
        series: { shadowSize: 0 }, // drawing is faster without shadows
        yaxis: { min: 0, max: 100 },
        xaxis: { show: false }
    };
    var plot = $.plot($("#placeholder2"), [ getRandomData() ], options);

    function update() {
        plot.setData([ getRandomData() ]);
        // since the axes don't change, we don't need to call plot.setupGrid()
        plot.draw();
        
        setTimeout(update, updateInterval);
    }

    update();
});
</script> 
<!--Real-time-chart-js-end-->
<!--Turning-series-chart-js-->
<script type="text/javascript">
$(function () {
    var datasets = {
        "usa": {
            label: "USA",
            data: [[2000, 342], [2001, 344], [2002, 387], [2003, 440], [2004, 480], [2005, 504], [2006, 528]]
        },        
        "russia": {
            label: "Russia",
            data: [[2000, 181], [2001, 213], [2002, 236], [2003, 251], [2004, 261], [2005, 311], [2006, 347]]
        },
        "uk": {
            label: "UK",
            data: [[2000, 477], [2001, 486], [2002, 509], [2003, 574], [2004, 602], [2005, 600], [2006, 592]]
        },
        "germany": {
            label: "Germany",
            data: [[2000, 411], [2001, 404], [2002, 404], [2003, 400], [2004, 377], [2005, 380], [2006, 369]]
        },
        "denmark": {
            label: "Denmark",
            data: [[2000, 355], [2001, 377], [2002, 372], [2003, 361], [2004, 363], [2005, 346], [2006, 377]]
        },
        "sweden": {
            label: "Sweden",
            data: [[2000, 641], [2001, 593], [2002, 583], [2003, 579], [2004, 540], [2005, 552], [2006, 527]]
        }
    };

    // hard-code color indices to prevent them from shifting as
    // countries are turned on/off
    var i = 0;
    $.each(datasets, function(key, val) {
        val.color = i;
        ++i;
    });
    
    // insert checkboxes 
    var choiceContainer = $("#choices");
    $.each(datasets, function(key, val) {
        choiceContainer.append('<br/><input type="checkbox" name="' + key +
                               '" checked="checked" id="id' + key + '">' +
                               '<label for="id' + key + '">'
                                + val.label + '</label>');
    });
    choiceContainer.find("input").click(plotAccordingToChoices);

    
    function plotAccordingToChoices() {
        var data = [];

        choiceContainer.find("input:checked").each(function () {
            var key = $(this).attr("name");
            if (key && datasets[key])
                data.push(datasets[key]);
        });

        if (data.length > 0)
            $.plot($("#placeholder"), data, {
                yaxis: { min: 0 },
                xaxis: { tickDecimals: 0 }
            });
    }

    plotAccordingToChoices();
});
</script> 
<!--Turning-series-chart-js-->
<script src="js/matrix.dashboard.js"></script>
</body>

	<script>	
    var data = [];
	data[0] = { label: "robbery", data: <?php echo $type_0 ?> }
	data[1] = { label: "lost", data: <?php echo $type_1 ?> }
	data[2] = { label: "kidnap", data: <?php echo $type_2 ?> }
	data[3] = { label: "rape", data: <?php echo $type_3 ?> }
	data[4] = { label: "assault", data: <?php echo $type_4 ?> }
	data[5] = { label: "homicide", data: <?php echo $type_5 ?> }
	data[6] = { label: "theft", data: <?php echo $type_6 ?> }
	data[7] = { label: "violence", data: <?php echo $type_7 ?> }
	
	var series = 4;
	
    var pie = $.plot($(".pie"), data,{
        series: {
            pie: {
                show: true,
                radius: 3/4,
                label: {
                    show: true,
                    radius: 3/4,
                    formatter: function(label, series){
                        return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
                    },
                    background: {
                        opacity: 0.5,
                        color: '#000'
                    }
                },
                innerRadius: 0.2
            },
			legend: {
				show: false
			}
		}
	});	
	
	
	
	// === Prepare the chart data ===/
	var sin = [], cos = [];
	
	
		<?php for($tempi=0; $tempi<100; $tempi++) { ?>
		if(!<?php echo $maleArr[$tempi]?> == 0)
		{
			sin.push([<?php echo $tempi?>, <?php echo $maleArr[$tempi]?>]);
		}
		<?php } ?>
	
	
		<?php for($temp_j=0; $temp_j<100; $temp_j++) { ?>
		if(!<?php echo $femaleArr[$temp_j]?> == 0)
		{
			cos.push([<?php echo $temp_j?>, <?php echo $femaleArr[$temp_j]?>]);
		}
		<?php } ?>

	// === Make chart === //
    var plot = $.plot($(".chart"),
           [ { data: sin, label: "Male", color: "#ee7951"}, { data: cos, label: "Female",color: "#4fb9f0" } ], {
               series: {
                   lines: { show: true },
                   points: { show: true }
               },
               grid: { hoverable: true, clickable: true },
               yaxis: { min: 0, max: 10 }
		   });
    
	// === Point hover in chart === //
    var previousPoint = null;
    $(".chart").bind("plothover", function (event, pos, item) {
		
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;
                
                $('#tooltip').fadeOut(200,function(){
					$(this).remove();
				});
                var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
                    
                maruti.flot_tooltip(item.pageX, item.pageY,item.series.label + " of " + x + " = " + y);
            }
            
        } else {
			$('#tooltip').fadeOut(200,function(){
					$(this).remove();
				});
            previousPoint = null;           
        }   
    });	
	
	
	
	
	
	</script>
	
</html>
