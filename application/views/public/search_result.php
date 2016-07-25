<?php include_once("public_header.php"); ?>

<div class="container">
<h1>Search Results</h1>
<hr>
<table class="table">
<thead>
<th>S.no</th>
<th>Article Title</th>
<th>Published On</th>
</thead>
<tbody>
 <?php if(count($search_results)>0): 
    $count=$this->uri->segment(4,0);//zero is here for giving the default value 0 at page for seaialing the articles
    ?>

    <?php foreach($search_results as $article):?>
<tr>
<td> <?= ++$count; ?></td>
<td>  <?php echo $article['title'];?></td>
<td>Date </td>
</tr>
<?php endforeach;?>
<?php endif;?>
</tbody>
</table>
<center>
<?php echo $this->pagination->create_links();?>
</center>


</div><?php //container div ?>


<?php include_once("public_footer.php"); ?>