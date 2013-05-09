<?php
	foreach ($designer_details as $designer_details)
	{
	$id = $designer_details;
	$status = $designer_details['des_status'];
	$alias = $this->webdesign_model__main->form_validation__string_convert("in",$alias);
	}
?>


<div id="partners_bigger_bridge">
	<!--	
	<img style="width:65em;" src="<?php echo base_url();?>/images/getstartedimg.png">
	-->
	<div id="partners_bridge">
		
		<!--	
		<img src="<?php echo base_url();?>/images/ocpheadr.png" style="margin-top:0.7em;">
		-->
		<a href="../../webdesign_admin/logout" title=""><div class="button">admin logout</div></a>
		<a href="../../webdesign_admin" title=""><div class="button">back</div></a>

		<?php
			if($status == 0)
				{
				?>
				<a href="<?=$alias?>/broadcast" title=""><div class="button">broadcast designer's account</div></a>
				<?php
				}
			else
				{
				?>
				<a href="<?=$alias?>/to_pending" title=""><div class="button">move designer's account to pending list</div></a>
				<?php
				}
		?>
		<a href="<?=$alias?>/delete" title=""><div class="button">delete designer's account</div></a>
		
	</div>
</div>
