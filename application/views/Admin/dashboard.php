<?php include 'includes/header.php';

if ($this->session->flashdata('welcome')) {

      echo "<h3>".$this->session->flashdata('welcome')."</h3>";
    }

   
?>

<div class="container">
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <a href="<?php echo base_url('index.php/Income/index'); ?>"><img src="<?php echo base_url('image/3.jpg'); ?>" alt="Responsive image">
      <div class="caption">
        <h3><b>Income</b></h3>
        <p>You can add your incomes here</p>
        
      </div></a>
    </div>
  </div>

   <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <a href="<?php echo base_url('index.php/Expense/index'); ?>"><img src="<?php echo base_url('image/4.jpg'); ?>" alt="Responsive image">
      <div class="caption">
        <h3><b>Expense</b></h3>
        <p>You can add your expenses here</p>
        
      </div></a>
    </div>
  </div>

   <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <a href="<?php echo base_url('index.php/Category/index'); ?>"><img src="<?php echo base_url('image/5.jpg'); ?>" alt="Responsive image">
      <div class="caption">
        <h3><b>Category</b></h3>
        <p>You can add your catergories here</p>
        
      </div></a>
    </div>
  </div>

  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <a href="<?php echo base_url('index.php/Reports/index'); ?>"><img src="<?php echo base_url('image/2.jpg'); ?>" alt="Responsive image">
      <div class="caption">
        <h3><b>Reports</b></h3>
        <p>You can analyse your budget here</p>
        
      </div></a>
    </div>
  </div>

</div>

<div class="container">
  <div id="columnchart_material" style="padding: 0px; margin: 0px;  width: 800px; height: 500px;"></div>
  </div>


<?php include 'includes/footer.php'; ?>