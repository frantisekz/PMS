<div style="text-align: left;">
<form method="post" id="contact">
<table>
<tr>
<td>
<strong>Your E-mail: </strong></form></td>
<td><textarea name="mail" cols="40" rows="1" placeholder="Your E-mail"></textarea></td></tr>
<tr><td><strong>Your Message: </strong></td><td><textarea name="text" cols="40" rows="4" placeholder="Your message"></textarea></td></tr>
</table>
<button type="submit" class="btn btn-primary" form="contact">Send</button>
</form>
</div>
<?php
if ((isset($_POST['mail'])) AND (isset($_POST['text'])))
{
	if ((!isset($_SESSION['msg'])) AND (!empty($_POST['mail'])) AND (!empty($_POST['text'])))
	{
		if (pms_contact_write($_POST['mail'], $_POST['text']))
		{
			echo "Message sent successfully!";
			$_SESSION['msg'] = 1;
		}
		else
		{
			echo "Something bad happened and you message wasn't sent :/";
		}
	}
	elseif (isset($_SESSION['msg']))
	{
		echo "You must wait before sending another message!";
	}
	elseif ((empty($_POST['mail'])) OR (empty($_POST['text'])))
	{
		echo "You must fill in all forms!";
	}
}
?>