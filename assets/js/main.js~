

function open_form(what_form)
	{	
	if (what_form == "sub")
		{
		var form = document.getElementById('chosen_designer');
		designer_list_to_hid();
		}
	else if (what_form == "outcome")
		{
		var form = document.getElementById('form_outcome');
		}
	else if (what_form == "reg")
		{
		var form = document.getElementById('reg_new_designer');
		reg_new_designer_form_reset();		
		}

	form.style.zIndex = "10";
	form.style.opacity = "1";

	form_toggle_body_scroll(0);
	}


function form_toggle_body_scroll(toggle)
	{
	var body = document.getElementsByTagName('body');

	if(toggle == 1)
		{
		body[0].style.overflowY = "auto";
		}
	else
		{
		body[0].style.overflowY = "hidden";
		}	
	}


function close_form(redirect, redirect_to)
		{
		var form_1 = document.getElementById('chosen_designer');	
		var form_2 = document.getElementById('reg_new_designer');	
		var frm_outcome = document.getElementById('form_outcome');

		form_toggle_body_scroll(1);

		form_1.style.zIndex = "-1";
		form_1.style.opacity = "0";
		form_2.style.zIndex = "-1";
		form_2.style.opacity = "0";
		frm_outcome.style.zIndex = "-1";
		frm_outcome.style.opacity = "0";

		if (redirect == 1)
			{
			var aa = setTimeout(function()
				{
				window.location = redirect_to;
				},300);
			}

		
		}



function form_outcome(outcome,title,msg)
	{
	open_form("outcome");	

	var the_title = document.getElementById('form_outcome_title');
	var the_msg = document.getElementById('form_outcome_msg');
	var the_status;

	if (outcome == 0)
		{
		the_status = "failed";
		}
	else
		{
		the_status = "passed";
		}

	the_title.innerHTML = title + " " + the_status;	
	the_msg.innerHTML = msg;
	}
