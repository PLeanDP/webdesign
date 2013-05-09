<div id="reg_new_designer">

	<fieldset class="form_container">
		<legend onclick="close_form()" title="Close">X</legend>
			<h1>REGISRATION FORM</h1>
			
		<div class="steps_bridge"> 
			<li style="color:#82918b;" id="reg_new_designer_form_lbl_1">Personal Information</li>
			<li id="reg_new_designer_form_lbl_2">Account Information</li>		
			<li id="reg_new_designer_form_lbl_3">Sample Work</li>
		</div>

		<!--
			personal information
				name
					first name -- middle name -- last name
				location				
				contact number
				email address
								
			account
				desired nickname (note as: this will be the name displayed on this site. this will also serve as youre username. please use appropriate names; do not use names such as "cutegirl69" "chickboi" or other informal names, such cases will be immediately be discarded)
				desired password 
					(note as: your account would be activated upon approval. you will recieve an email to notify as to you account's status )					
			
			sample works
				(note as: this will help showcase your skills as a webdesigner. please use your own works, using other's work may be subjected to infringement and may be punishable by law)
		

		-->

		<?php
				echo form_open_multipart('webdesign__submit_form__new_designer');
		?>
			<div id="reg_new_designer_form__1">
				<div class="names">
					<label>First Name</label>
					<label>Middle Name</label>
					<label>Last Name</label>

					<input type="text" name="nd_fname" id="nd_fname" onkeyup="reg_new_designer__checl_name_availability()" />
					<input type="text" name="nd_mname" id="nd_mname" />
					<input type="text" name="nd_lname" id="nd_lname" />
				</div>

				<label>City / Location</label><input type="text" name="nd_loc" /><br>
				<label>Contact Number</label><input type="text" name="nd_num" /><br>	
				<label>Email Address</label><input type="text" name="nd_email" /><br>
		
				<div class="submit_bridge">
					<input type="button" value="next" onclick="reg_new_designer_form('reg_new_designer_form__1','reg_new_designer_form__2')">
				</div>
			</div>


			<div id="reg_new_designer_form__2">
				<label>Desired Alias</label><input type="text" name="nd_username" /><br>
				<label>Desired Password</label><input type="text" name="nd_password" /><br>
		
				<div class="submit_bridge">
					<input type="button" value="next" onclick="reg_new_designer_form('reg_new_designer_form__2','reg_new_designer_form__3')">
					<input type="button" value="Previous" onclick="reg_new_designer_form('reg_new_designer_form__2','reg_new_designer_form__1')">
				</div>
			</div>

			
			<div id="reg_new_designer_form__3">
				<input type="hidden" value="0" name="nd_site_count" id="nd_site_count" />	
			
				<div id="reg_new_designer_form__3_body"></div>

				<div>
					<a onclick="reg_new_designer_form_3__add_site();" style="cursor:pointer;">add another site</a>
				</div>

				<div class="submit_bridge">
					<input type="submit" value="Submit">
					<input type="button" value="Previous" onclick="reg_new_designer_form('reg_new_designer_form__3','reg_new_designer_form__2')">
				</div>
			</div>


		</form>
		
		
	</fieldset>


</div>
