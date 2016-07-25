<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<div class="container">
  <legend><?php echo anchor('user/index','Go Homepage');?></legend><legend><center>Admin Login</center></legend>
  <br><br><br><br><br><br><br><br>

  <?php if($error=$this->session->flashdata("login_failed")): ?>
  <div class="alert alert-dismissible alert-danger">
  <center><strong><?php echo $error; ?></strong></center> 
</div>
<?php endif; ?>
<?php echo form_open('admin/admin_parser');?>
  <fieldset>
    
    <div class="form-group">
    	<div class="col-lg-12">
    		<div class="col-lg-4" >
    		</div>

      <?php $this->load->library('form_validation');?>
      	<div class="col-lg-4" id="ra">
        
    	<?php echo form_input(['name'=>'u','class'=>'form-control','id'=>'admin_email','placeholder'=>'Email','value'=>set_value('u')]); ?>
      </div>
      <div class"col-lg-4">
        <?php echo form_error('u',"<p class='text-danger'>","</p>"); ?>
      </div>
      </div>

 		<div class="col-lg-12">
 				<div class="col-lg-4" >
    			</div>
					<div class="col-lg-4" >
     
        			<input type="password" name="p" class="form-control" id="admin_pass" placeholder="Password">
				</div>
        <div class"col-lg-4">
          <?php echo form_error("p");?>
          
          </div><br><br>
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






