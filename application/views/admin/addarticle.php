
<?php $this->load->view("admin/admin_header");?>

<div class="container">
  <center><legend>Add Article</legend></center>
  <br><br><br><br>

<?php echo form_open_multipart('admin/store_article');?>

<?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>
  <fieldset>
    
    <div class="form-group">
    	<div class="col-lg-12">
    		<div class="col-lg-4" >
    		</div>

      <?php $this->load->library('form_validation');?>
      	<div class="col-lg-4">
        
    	<?php echo form_input(['name'=>'title','class'=>'form-control','id'=>'admin_title','placeholder'=>'Article Title','value'=>set_value('title')]); ?>
      </div>
      <div class"col-lg-4">
        <?php //echo form_error('title',"<p class='text-danger'>","</p>");
        echo form_error('title');
         ?>
      </div>
      </div>

 		<div class="col-lg-12">
 				<div class="col-lg-4"></div>
    			
				  <div class="col-lg-4" >
              <?php echo form_textarea(['name'=>'body','class'=>'form-control','id'=>'admin_body','placeholder'=>'Article Body','value'=>set_value('body')]); ?>
				  </div>
          
          <div class"col-lg-4">
          <?php echo form_error("body");?>
          </div>
          
          <br><br>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-4"></div>
          
          <div class="col-lg-4" >
          <?php echo form_upload(['name'=>'userfile','class'=>'form-control']); ?>
          </div>
          
          <div class"col-lg-4">
          <?php if(isset($upload_error)) 
                    echo $upload_error;?>
          </div>
          
          <br><br>
    </div>


</div>
  
           
    <div class="form-group">

      <div>
        <center>
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
       </center>
        
      </div>

    </div>
  </fieldset>
</form>

</div>

<br>
<br>

<?php $this->load->view("admin/admin_footer"); ?>






