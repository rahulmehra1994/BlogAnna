
<?php $this->load->view("admin/admin_header");?>

<div class="container">
  <center><legend>Edit Article</legend></center>
  <br>
  <br>
  <br>
  <br>
 
<?php echo form_open("admin/update_article/".$article->id);?>
<?php //echo form_hidden('user_id',$this->session->userdata('user_id'));  we dont need this in our edit page?>
  <fieldset>
    
    <div class="form-group">
    	<div class="col-lg-12">
    		<div class="col-lg-4" >
    		</div>

      <?php $this->load->library('form_validation');?>
      	<div class="col-lg-4">
        
    	<?php echo form_input(['name'=>'title','class'=>'form-control','id'=>'admin_title','placeholder'=>'Article Title','value'=>set_value('title',$article->title)]); ?>
      </div>
      <div class"col-lg-4">
        <?php //echo form_error('title',"<p class='text-danger'>","</p>");
        echo form_error('title');
         ?>
      </div>
      </div>

 		<div class="col-lg-12">
 				<div class="col-lg-4" >
    			</div>
					<div class="col-lg-4" >
     
      
    <?php echo form_textarea(['name'=>'body','class'=>'form-control','id'=>'admin_body','placeholder'=>'Article Body','value'=>set_value('body',$article->body)]); ?>
				</div>
        <div class"col-lg-4">
          <?php echo form_error("body");?>
          
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






