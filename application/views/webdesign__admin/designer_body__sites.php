<?php foreach ($designer_sites as $designer_sites){ ?>
<?php
$file_name = $designer_sites['file_name'];
$site_name = $designer_sites['image_name'];
$site_desc = $designer_sites['image_desc'];
?>

<img src="<?=base_url()?>designers_sites/<?=$file_name?>" >









<?php }?>
