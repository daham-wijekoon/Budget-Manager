<?php 

if (!($this->session->userdata('loggedin'))) {
  redirect('Welcome/login');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Budget</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style type="text/css">
  body{
    background: url("<?php echo base_url('image/1.png'); ?>");
    color: #ddd;
  }

</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month','Income','Expense'],
          <?php
            foreach ($chartBar as $bar) {
              echo "['".strval($bar['month'])."',".$bar['income'].",".$bar['expense']."],";
            }
            
          ?>
        ]);

        var options = {
          chart: {
            title: 'Monthly Budget',
            subtitle: 'All Incomes & Expenses:2020',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('index.php/Welcome/index'); ?>">HOME <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url('index.php/Admin/index'); ?>">Dashboard</a></li>
        
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname'); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('index.php/Login/logoutUser'); ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
<h2>Reports</h2>
<hr>
<!--div class="panel panel-default" style="width: 600px;">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-9">
				<h3 class="panel-title">Month Wise Expense</h3>
			</div>
			<div class="col-md-3">
				<select name="year" id="year" class="form-control">
					<?php 
						//foreach ($year_list->result_array() as $row) {
						//	echo '<option value="'.$row["year"].'">'.$row["year"].'</option>';
						//}
					?>
				</select>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div id="chart_area" style="width: 1000px; height: 400px;"></div>
	</div>
	
</div-->
<div class="container">
		<div id="columnchart_material" style="width: 800px; height: 500px;"></div>
	</div>
</div>

</body>
	
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



	<!--script type="text/javascript">
		google.charts.load('current',{'packages':['corechart','bar']});
		google.charts.setOnLoadCallback();

		function load_monthwise_data(year,title){
			var temp_title=title + ' ' + year;
			$.ajax({
				url:"<?php echo base_url(); ?>index.php/Reports/fetch_data ",
				method:"POST",
				data:{year:year},
				dataType:"JSON",
				success:function(data){
					drawMonthwiseChart(data,temp_title);
				}
			});
		}

		function drawMonthwiseChart(chart_data, chart_main_title){
			var jsonData=chart_data;
			var data=new google.visualization.DataTable();
			data.addColumn('string','Month');
			data.addColumn('number','Amount');

			$.each(jsonData, function(i, jsonData){
				var month=jsonData.month;
				var amount=parseFloat($.trim(jsonData.amount));
				data.addRows([[month,amount]]);
			});

			var options={
				title:chart_main_title,
				hAxis:{
					title:"Month"
				},
				vAxis:{
					title:'Amount'
				}
			};

			var chart=new google.visualization.ColumnChart(document.getElementById('chart_area'));

			chart.draw(data,options);
		}
	</script>
	<script>
		$(document).ready(function(){
			$('#year').change(function(){
				var year=$(this).val();
				if (year!='') {
					load_monthwise_data(year,'Month wise Amount Data For');
				}
			});
		});
	</script-->

</html>