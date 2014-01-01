<div style="text-align: left;">
<form method="post" id="contact">
<input type="textarea" name="mail" placeholder="Your E-mail"/><br/>
<textarea name="text" cols="40" rows="4" placeholder="Your message"></textarea><br/>
<button type="submit" class="btn btn-primary" form="contact">Send</button>
</form>
</div>
<?php
if ((isset($_POST['mail'])) AND (isset($_POST['text'])))
	{
	if ((!isset($_COOKIE['msg'])) AND (!empty($_POST['mail'])) AND (!empty($_POST['text'])))
		{
		if (pms_contact_write($_POST['mail'], $_POST['text']))
			{
			echo "Message sent successfully!";
			setcookie("msg", $_POST['mail'], time()+86400, $pms_domain);
			}
		else
			{
			echo "Something bad happened and you message wasn't sent :/";
			}
		}
	elseif (isset($_COOKIE['msg']))
		{
		echo "You can send only one message per day!";
		}
	elseif ((empty($_POST['mail'])) OR (empty($_POST['text'])))
		{
		echo "You must fill in all forms!";
		}
	}
?>