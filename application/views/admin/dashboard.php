<?php include_once("admin_header.php");?>
<div class="container">
<div class="col-lg-12">
          <div class="col-lg-10">
                <?php if($feedback=$this->session->flashdata("feedback")): ?>
                <?php $feedback_class=$this->session->flashdata("feedback_class");?>
                  <div class="alert alert-dismissible <?= $feedback_class ?>">
                  <center><strong><?php echo $feedback; ?></strong></center> 
                </div>
                <?php endif; ?>
          </div>
          <div class="col-lg-2">
                <?= anchor('admin/addarticle','Add Article',['class'=> 'btn btn-lg btn-default pull-right']);?>
          </div>
</div>

<table class="table">
  <thead>
    <th>S.No</th>
    <th>Article Name</th>
   <th style="text-align:right">Actions</th> 
  </thead>
  <tbody>
    <?php if(count($art)>0): 
    $count=$this->uri->segment(3,0);//zero is here for giving the default value 0 at page for seaialing the articles
    ?>
    
    <?php foreach($art as $articles):?>
      <div class="col-lg-12">  
  <tr>
 <div class="col-lg-12">  
<div class="col-lg-4">  
    <td><?= ++$count; ?></td>
    </div>
    <div class="col-lg-4">  
    <td> <?php echo $articles['title'];?> </td>
    </div>  


    <td>
     
    <div class="col-lg-12">  
    <?php echo anchor("admin/edit_article/{$articles['id']}",'edit',['class'=>'btn btn-lg btn-primary pull-right']); ?>
    
    </div>
    </td>
   
    <td>
    <div class="col-lg-1">  
      <?php echo form_open('admin/delete_article');
      echo form_hidden('id',$articles['id']);
      echo form_submit(['name'=>'submit','value'=>'delete','class'=>'btn btn-lg btn-danger pull-left']);
      echo form_close();
      ?>
      </div>
     
    </td> 
        
 
</div>
</tr>
<?php endforeach;?>
<?php endif;?>
</tbody>
</table>
<center>
<?php echo $this->pagination->create_links();?>
</center>
<br>
<br>
<br>

</div>

<?php include_once("admin_footer.php");?>