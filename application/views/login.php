<?php include 'partials/header.php'?>

<div class="container">
	<h2>LOGIN</h2>
	<?php if ($this->session->flashdata('errmsg')) {
      echo "<h3>".$this->session->flashdata('errmsg')."</h3>";
    }
  ?>
	<hr>

	<?php echo validation_errors(); ?>
  <?php echo form_open('Login/loginUser'); ?>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Enter Email" name="email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Enter Password" name="pword">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">LOGIN</button>
    </div>
  </div>
<?php echo form_close(); ?>
</div>


<?php include 'partials/footer.php'?>