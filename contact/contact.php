<?php

require_once('../mysqli_connect.php');

/* Set e-mail recipient */
$myemail  = "vamsitron.bohr@gmail.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['vname'], "Vamsi krishna");
$email    = check_input($_POST['vemail']);
$subject  = check_input($_POST['vsub'], "Write a subject");
$message = check_input($_POST['vmsg'], "Write your comments");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

$query="INSERT INTO contacts (name,email,subject,feedback) VALUES ('$name','$email','$subject','$message')" ;

if (mysqli_query($DBC,$query)) {
  echo "Feedback received successfully";
} else {
  echo "ERROR:" . mysqli_connect_error();
}

mysqli_close($DBC);

/* Redirect visitor to the thank you page */
header('Location: index.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>
