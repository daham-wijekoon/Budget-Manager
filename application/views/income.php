<?php 

if (!($this->session->userdata('loggedin'))) {
  redirect('Welcome/login');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Budget</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style type="text/css">
  body{
    background: url("<?php echo base_url('image/1.png'); ?>");
  }

  .container{
    width: 40%;
    position: absolute;
    left: 7%;
    color: red;
  }

  .col-sm-10{
    padding: 5px;
  }

  .form-group button{
    border-color: #444;
    background-color: blue;
    color: white;
  }

  .form-group select{
    margin-top: 20px;
    width: 50%;
  }

  #description{
    margin-top: 20px;
    width: 100%;
  }

  #submit{
    margin-top: 10px;
  }

  #reset{
    margin-top: 10px;
    margin-left: 20px;
  }

   #date{
    float: right;
    position: absolute;
    left: 55%;
    top: 36.5%;
    width: 220px;
  }

  #year{
    position: absolute;

    
  }

  #month{
    float: right;
  }

  #flashdata{
    position: absolute;
    left: 160px;
    top: 5px;
  }

  h2{
    color: #eee;
  }

  label{
    color: #eee;
  }
 

</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Category', 'Income'],
           <?php
            foreach ($chartDonut as $corechart) {
              echo "['".strval($corechart['category'])."',".$corechart['income']."],";
            }
            
          ?>
        ]);

        var options = {
          title: 'Categorical Income:2020',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
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
	<h2>Income</h2>
  <div id="flashdata">
   <?php if ($this->session->flashdata('msg')) {
      echo "<h3>".$this->session->flashdata('msg')."</h3>";
    }
  ?>
    
  </div>
	<hr>
	<?php echo validation_errors(); ?>
    <?php echo form_open('Income/insertIncome'); ?>
	<div class="form-group">
	    <div class="input-group">
	      <div class="input-group-addon">$</div>
	      <input name="amount" type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
	      <div class="input-group-addon">.00</div>
	    </div>

		    <select name="income" class="form-control form-control-lg" id="income">
		    	<option value="" disabled selected>-Select Category-</option>
		    	<option value="Salary">Salary</option>
		    	<option value="Loan">Loan</option>
		    </select>

        <div id="date">
          
            <select name="year" class="form-control form-control-lg" id="year">
              <option value="" disabled selected>-YEAR-</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
          

          
            <select name="month" class="form-control" id="month">
              <option value="" disabled selected>-MONTH-</option>
              <option value="JAN">JAN</option>
              <option value="FEB">FEB</option>
              <option value="MAR">MAR</option>
              <option value="APR">APR</option>
              <option value="MAY">MAY</option>
              <option value="JUN">JUN</option>
              <option value="JUL">JUL</option>
              <option value="AUG">AUG</option>
              <option value="SEP">SEP</option>
              <option value="OCT">OCT</option>
              <option value="NOV">NOV</option>
              <option value="DEC">DEC</option>
            </select>
         
        </div>

         
		<label id="description">Description:</label>
		<textarea name="description" class="form-control" rows="2"></textarea>

		<input id="submit" class="btn btn-primary btn-lg active" type="submit" value="Submit">
		<input id="reset" class="btn btn-primary btn-lg active" type="reset" value="Reset">
		
  	</div>
  <?php echo form_close(); ?>

</div>

<div class="container">
   <div id="piechart_3d" style="padding: 50px; position: absolute; width: 600px; height: 340px; left: -35px; top: 310px;"></div>
</div>

</body>
	<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>