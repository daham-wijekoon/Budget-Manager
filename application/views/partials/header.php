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

  h2{
    color: #eee;
  }

  label{
    color: #eee;
  }

</style>

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
        <li><a href="#">Dashboard</a></li>
        
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('index.php/Welcome/register'); ?>">Sign in</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Contacts</a></li>
            <li><a href="#">About us</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Help</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>