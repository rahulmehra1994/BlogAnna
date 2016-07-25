<?php include_once('public_header.php');?>


<div class="container">
<h1><center>Detailed Article         <?php echo $result->date ; ?>  </center></h1>
<hr>
<h2>
<?php echo $result->title ; ?>
</h2>
<?php if(!is_null($result->image_path)):?>
<img src="<?php echo $result->image_path;?>">
<?php endif;?>
<h4>
<?php echo $result->body ; ?>
</h4>
<hr>
</div>









<?php include_once('public_footer.php');?>