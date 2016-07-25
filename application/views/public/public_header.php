<html>
<head>
<title>
</title>
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('user/index');?>">Blog Anna</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">About us</a></li>

      </ul>
      
      <?php echo form_open('user/search',['class'=>"navbar-form navbar-left",'role'=>"search"]);?>
      <?php echo form_error('query',"<p class='navbar-text text-danger navbar-right'>",'</p>'); ?>
        <div class="form-group">
          <input name="query" type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      <?php echo form_close();?>
      
      <ul class="nav navbar-nav navbar-right">
        <li>
        
         <?php echo anchor('admin/index','Login'); ?>
        </li>
      </ul>

    </div>
  </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
<script src="<?php echo base_url("assets/js/bootstrap.js");  ?>"></script>
</body>
</html>