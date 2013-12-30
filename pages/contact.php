<form method="post">
  <input type="textarea" name="mail" placeholder="Your E-mail"/>
  <textarea name="text" cols="40" rows="4" placeholder="Your message"></textarea>
    <input class="ok" type="submit" 
            value="Send" />
    </form>
<?php
if ((isset($_POST['mail'])) AND (isset($_POST['text'])) AND (!isset($_COOKIE['msg'])))
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
elseif ((isset($_COOKIE['msg'])) AND (isset($_POST['mail'])) AND (isset($_POST['text'])))
	{
	echo "You can send only one message per day!";
	}
elseif ((isset($_POST['mail'])) AND (isset($_POST['text'])))
	{
	echo "You must fill in all forms!";
	}
?>