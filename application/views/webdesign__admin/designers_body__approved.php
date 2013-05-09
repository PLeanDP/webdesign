<div id="partners_body">
my label, count ng rows

<?php foreach ($approved_designers as $designer){ ?>
<?php

$id = $designer['the_id'];
$alias = $designer['alias'];
	$alias_in = $this->webdesign_model__main->form_validation__string_convert("in",$alias);	
$thumbnail = $designer['thumbnail'];
$location = $designer['location'];

/*
$fname = $designer['fname'];
$mname = $designer['mname'];
$lname = $designer['lname'];
$contact_num = $designer['contact_num'];
$e_add = $designer['e_add'];
*/
?>

	<div class="partner_container" id="<?=$alias?>">
		<a href="webdesign_admin/designer_profile/<?=$alias_in?>"><div class="selection_bridge">show designer details</div></a>
		
		<img class="partner__img" src="<?=base_url();?>./designers_sites/<?=$thumbnail?>" />
		<!-- with fancybox		
		<a class="fancy_<?=$id;?>" href="<?=base_url() . 'designers_sites/'  . $thumbnail;?>"><img class="partner__img" src="<?=base_url();?>./designers_sites/<?=$thumbnail?>" /></a>		
		-->		
		<div class="partner__label">designs by<span class="name"><?=$alias?></span><span class="location"><?=$location?></span></div>
	</div>

	
<?php // sets fancy box for names
		$this->webdesign_model__main->set_fancybox_for_designers($id);
		?>


<?php }?>
	
	<?php
		/*
		for($count = 1; $count <= 6; $count++)
			{
			?>
			<div class="partner_container" id="des_<?=$count?>">
				<div class="selection_bridge" onclick="select_designer('des_<?=$count?>',this,'cb_des_<?=$count?>');">select designer</div>
				<img class="partner__img" src="<?=base_url();?>./images/1.jpg" />		
				<div class="partner__label">designs by<span class="name">des <?=$count?></span><span class="location">location</span></div>
			</div>
			<?php
			}
		*/
	?>

	
	<div style="clear:both"> </div>
</div>
