

//function to show permission divs on Add/Edit Roles
function ShowPermissionDiv (div_id)
{
	
	div = document.getElementById(div_id);
	if (div.style.display == 'block')
		div.style.display = 'none';
	else
		div.style.display = 'block';
}








//Check if user has rated any question before submitting review or no?
function check (questions)
{

	questions = questions.substr (0, questions.length -1);
	questions = questions.split (',');

	
	
	for (i=0; i<questions.length; i++)
	{
		//question = "question"+questions[i];
		//var selection = document.getElementsByName('question'+qs[i]);
		//alert (selection.length);
		
		for (j=0; j<=5; j++)
		{
			var question = document.getElementById('question'+questions[i]+"_"+j);
			//alert (selection.value);
			if (question.checked == true && question.value > 0)
			{
				return true;
			}				
		}
		
	}	
	
	alert ('You can\'t rate N/A in all questions');
	return false;
}

//This function calculates average rating and show that on left div while user is reviewing.
function UpdateAverage (qs)
{
	qs = qs.substr (0, qs.length -1);
	qs = qs.split (',');
	
	var rating = 0;
	count = 0;
	
	
		
	for (i=0; i<qs.length; i++)
	{
		//question = "question"+questions[i];
		//var selection = document.getElementsByName('question'+qs[i]);
		//alert (selection.length);
		
		for (j=0; j<=5; j++)
		{
			var question = document.getElementById('question'+qs[i]+"_"+j);
			//alert (selection.value);
			if (question.checked == true && question.value > 0)
			{
				rating = parseFloat(rating) + parseInt(question.value);
				count++;
			}				
		}
		
	}
	if (count > 0)
	{
		rating = Math.round ((rating/count)*100)/100;
		document.getElementById ('rate-content').innerHTML = '<font size="2" color="#ffffff">Avg. Rating</font><br>'+rating;
	}
	else
		document.getElementById ('rate-content').innerHTML = '<font size="2" color="#ffffff">Avg. Rating</font><br>0.0';
	
}