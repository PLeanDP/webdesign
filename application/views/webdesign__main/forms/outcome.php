



<div id="form_outcome">

	<fieldset class="form_container">
		<legend onclick="close_form(1,'http://localhost/webdesign__beta/index.php/webdesign')" title="Close">X</legend>
		<h1 id="form_outcome_title">Title - Status</h1>
		<div id="form_outcome_msg">
			msg
		</div>




</div>

	<?php
		$msg = $this->webdesign_model__main->form_validation__string_convert("out",$msg);
	?>

<script>
	form_outcome('<?=$outcome?>','<?=$title?>','<?=$msg?>');
</script>
