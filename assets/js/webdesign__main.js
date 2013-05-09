function select_designer(what_designer,label)
	{
	var designer_container = document.getElementById(what_designer);	

	if (label.innerHTML == "unselect designer")
		{
		label.innerHTML = "select designer";
		designer_container.style.borderColor = '#ffffff';
		
		delete_designer_from_list(what_designer);
		}
	else
		{
		label.innerHTML = "unselect designer";
		designer_container.style.borderColor = '#6ec1c9';
		
		add_designer_to_list(what_designer);
		}

	submit_request_toggle();
	}




function delete_designer_from_list(what_designer)
	{
	var chosen_designer_list = document.getElementById('chosen_designer_list');
			var chosen_designer_list_current = chosen_designer_list.innerHTML;

	var selected_designer = check_if_designer_is_on_list(chosen_designer_list_current,what_designer);
			
	if ( selected_designer == 1)
		{
		var solo = what_designer;
		var not_first = "," + what_designer;
		var has_next = what_designer + ",";


		if (chosen_designer_list_current.indexOf(not_first) > -1)
			{
			var rep_what = "," + what_designer;					
			}
		else if (chosen_designer_list_current.indexOf(has_next) > -1)
			{
			var rep_what = what_designer + "," ;				
			}
		else
			{
			var rep_what = what_designer;
			}
		
		var deleted_from_list = chosen_designer_list_current.replace(rep_what, "");
		chosen_designer_list.innerHTML = deleted_from_list;

		}
	}



function add_designer_to_list(what_designer)
	{
	var chosen_designer_list = document.getElementById('chosen_designer_list');
			var chosen_designer_list_current = chosen_designer_list.innerHTML;

	var selected_designer_on_list = check_if_designer_is_on_list(chosen_designer_list_current,what_designer);
	var designer_list_empty = check_if_designer_list_is_empty();


	if (selected_designer_on_list == 0)
		{
		if (designer_list_empty == 1)
			{
			chosen_designer_list.innerHTML = chosen_designer_list_current + what_designer;
			}
		else
			{
			chosen_designer_list.innerHTML = chosen_designer_list_current +  "," + what_designer;
			}
		}

	}





function check_if_designer_list_is_empty()
	{
	var chosen_designer_list = document.getElementById('chosen_designer_list');
		var chosen_designer_list_current = chosen_designer_list.innerHTML;

	if ( chosen_designer_list_current == "" )
		{
		return 1;		
		}
	else
		{
		return 0;
		}
	}



function submit_request_toggle()
	{
	var submit_request_btn = document.getElementById('submit_request_btn');
	var empty_list = check_if_designer_list_is_empty();

	if ( empty_list == 1 )
		{
		submit_request_btn.setAttribute("onclick", "");	
		}
	else
		{
		submit_request_btn.setAttribute("onclick", "open_form('sub');");
		}
	}



function check_if_designer_is_on_list(designer_list,what_designer)
	{
		if (designer_list.indexOf(what_designer) > -1)
			{
			return 1;
			}
		else
			{
			return 0;
			}
	}





function designer_list_to_hid()
		{
		var chosen_designer_list = document.getElementById('chosen_designer_list');
			var chosen_designer_list_current = chosen_designer_list.innerHTML;

		var hidden_designers = document.getElementById('des');
			hidden_designers.setAttribute("value", chosen_designer_list_current);
		}



function reg_new_designer_form(from, to)
	{
	reg_new_designer_form_change_label(to);

	var from = document.getElementById(from);
	var to = document.getElementById(to);

	from.style.display = "none";
	to.style.display = "inline";
	}
function reg_new_designer_form_change_label(to)
	{
	var label_1 = document.getElementById('reg_new_designer_form_lbl_1');
	var label_2 = document.getElementById('reg_new_designer_form_lbl_2');
	var label_3 = document.getElementById('reg_new_designer_form_lbl_3');

	switch(to)
		{
		case 'reg_new_designer_form__1':
					var label = label_1;
					break;
		case 'reg_new_designer_form__2':
					var label = label_2;
					break;
		case 'reg_new_designer_form__3':
					var label = label_3;
					reg_new_designer_form_3__add_site();
					break;
		}
		
	label_1.style.color = "#c0c6c3";
	label_2.style.color = "#c0c6c3";
	label_3.style.color = "#c0c6c3";	

	label.style.color = "#82918b";

	}


function reg_new_designer_form_reset()
	{
	var label_1 = document.getElementById('reg_new_designer_form_lbl_1');
	var label_2 = document.getElementById('reg_new_designer_form_lbl_2');
	var label_3 = document.getElementById('reg_new_designer_form_lbl_3');

	var part_1 = document.getElementById('reg_new_designer_form__1');
	var part_2 = document.getElementById('reg_new_designer_form__2');
	var part_3 = document.getElementById('reg_new_designer_form__3');

	part_1.style.display = "inline";
	part_2.style.display = "none";
	part_3.style.display = "none";

	label_1.style.color = "#82918b";
	label_2.style.color = "#c0c6c3";
	label_3.style.color = "#c0c6c3";

	reg_new_designer_form_3__add_site__reset();
	}


function  reg_new_designer_form_3__add_site__reset()
	{
	var site_count = document.getElementById('nd_site_count');
		site_count.value = "0";

	var body = document.getElementById('reg_new_designer_form__3_body');
		body.innerHTML = "";
	}

function  reg_new_designer_form_3__add_site()
	{
	var new_site_count =	reg_new_designer_form_3__add_site__site_count();
	reg_new_designer_form_3__add_site__create(new_site_count);
	}

function reg_new_designer_form_3__add_site__site_count()
	{
	var site_count_ = document.getElementById('nd_site_count');
		var site_count = site_count_.value;

	
	var new_site_count = site_count * 1;
			new_site_count = new_site_count + 1;
	
	site_count_.value = new_site_count;

	return new_site_count;
	}


function  reg_new_designer_form_3__add_site__create(new_site_count)
	{
	var body = document.getElementById('reg_new_designer_form__3_body');
	
	/*
		// easier way, but complicates users' life
	var new_site = "";
		new_site += "<div class='site'>";
		new_site += "<label class='first_row'>Site Preview</label>";
		new_site += "<label class='first_row'>Site Name</label><br>";
		new_site += "<input type='file' name='nd_site_shot_" + new_site_count + "' id='nd_site_shot_" + new_site_count +"' > ";
		new_site += "<input type='text' name='nd_site_name_" + new_site_count + "' id='nd_site_name_" + new_site_count +"' > ";
		new_site += "<textarea name='nd_site_desc_" + new_site_count + "' id='nd_site_desc_" + new_site_count +"' >Site Description</textarea>";
		new_site += "</div>";

	body.innerHTML += new_site;
	*/


		// longer code...and manual css..but makes user's life easier
	var container = document.createElement('div');
		container.setAttribute('class', 'site');
	
	var lbl_site_prev = document.createElement('label');
		lbl_site_prev.setAttribute('class', 'first_row');
		lbl_site_prev.setAttribute('style', "width:9.7em;");
		lbl_site_prev.innerHTML = "Site Preview";

	var lbl_site_name = document.createElement('label');
		lbl_site_name.setAttribute('class', 'first_row');
		lbl_site_name.setAttribute('style', "width:10em;margin-right:20em;");
		lbl_site_name.innerHTML = "Site Name";

		var site_prev_id = 'nd_site_shot_' + new_site_count;
	var site_prev = document.createElement('input');
		site_prev.setAttribute('type', 'file');
		site_prev.setAttribute('name', site_prev_id);
		site_prev.setAttribute('id', site_prev_id);
		site_prev.setAttribute('style', "margin-bottom:0.2em;width:8em;margin-right:0.4em;");


		var site_name_id = 'nd_site_name_' + new_site_count;
	var site_name = document.createElement('input');
		site_name.setAttribute('type', 'text');
		site_name.setAttribute('name', site_name_id);
		site_name.setAttribute('id', site_name_id);
		site_name.setAttribute('style', "margin-bottom:0em;width:34.5em;");

		
		var site_desc_id = 'nd_site_desc_' + new_site_count;
	var site_desc = document.createElement('textarea');
		site_desc.setAttribute('name', site_desc_id);
		site_desc.setAttribute('id', site_desc_id);
		site_desc.setAttribute('style', 'resize:none;height:5em;margin-bottom:0.4em;width:45em;');

		body.appendChild(container);
		container.appendChild(lbl_site_prev);
		container.appendChild(lbl_site_name) + "/n"; 
		container.appendChild(site_prev); 
		container.appendChild(site_name); 
		container.appendChild(site_desc); 
	
	}

