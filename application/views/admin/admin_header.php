<html>
<head>
<title>
  Admin Panel
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
      <a class="navbar-brand" href="<?php echo base_url('admin/index');?>">Admin Panel</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" role="search" >
        <div class="form-group">
          <input name="searchArticles" type="text" class="form-control" placeholder="Search the articles">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li>


            
              
        <a href="<?php echo base_url('admin/logout');?>" class="btn btn-md btn-info">logout</a>
     

        </li>
      </ul>
    </div>
    <h2>Hi, <?php $_POST=$this->session->userdata('POSTDATA'); echo $_POST['u']; ?> </h2>
  </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js">
</script>
<script src="<?php echo base_url("assets/js/bootstrap.js");  ?>"></script>
</body>
</html>