<?php
include("session.php");
include("header.php");

$query = " select sum(saving) as totalSaving from budget where user_id='$userid' ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$saving = $row['totalSaving'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<style>
  .size-48{
width: 48px;
height: 48px;
stroke: green;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
  fill: none;
}
  </style>
  <title>Expense Manager - Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Feather JS for Icons -->
  <script src="js/feather.min.js"></script>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php
        include("navbar.php");
        ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">


      <div class="container-fluid">
        <h3 class="mt-4">Dashboard</h3>
        <div class="row">
          <div class="col-md">
          <div class="card" style="width:300px;text-align:center;margin:10px auto;">
  <div class="card-header text-success"><h4>Total Savings</h4></div>
  <div class="card-body bg-success " style="font-size:35px;"><?php echo number_format($saving)." PKR" ; ?> </div>

</div>
           </div></div>
        <div style="display:flex;width:100%">
      <div id="chartContainer1" style="height: 350px; width: 50%;"></div>
      <div id="chartContainer2" style="height: 350px; width: 50%;"></div>
</div>
       
      </div>
    </div>

  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/canvasjs.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script>
    feather.replace()
  </script>


  <!-- -------------------------canvas chart js--------------------- -->
  <?php
$dataPoints1 = array();
$dataPoints2 = array();
 $sql = "SELECT sum(expense) as amount ,expensecategory as category FROM expenses WHERE user_id='$userid' group by expensecategory";
 $query = $con->query($sql);
     while($row = $query->fetch_assoc()){
           $point = array("label" =>  $row['category'] ,"y" =>  $row['amount']);
            array_push($dataPoints1, $point);
     }

     $sql2 = "SELECT sum(income) as budget,title FROM budget WHERE user_id='$userid' group by title";
     $query2 = $con->query($sql2);
         while($row2 = $query2->fetch_assoc()){
               $point2 = array("label" =>  $row2['title'] ,"y" =>  $row2['budget']);
                array_push($dataPoints2, $point2);
         }
?>

<script>
window.onload = function() {
 
 
var chart1 = new CanvasJS.Chart("chartContainer1", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Total Expense Category Wise"
	},
	data: [{
		type: "column",
		indexLabel: "{y}",
		yValueFormatString: "#,##",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
 

var chart2 = new CanvasJS.Chart("chartContainer2", {
	theme: "light1",
	animationEnabled: true,
	title: {
		text: "Total Budgeted Amount"
	},
	data: [{
		type: "column",
		indexLabel: "{y}",
		yValueFormatString: "#,##0",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
}
</script>
</body>

</html>