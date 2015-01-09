<?
/**
 * Created by PhpStorm.
 * User: e
 */

// validate submission
if (empty($_POST["name"]) || empty($_POST["gender"]) || empty($_POST["dorm"]))
{
    header("Location: http://localhost/cs75/src/froshims/froshims.php");
    exit;
}

// connect to database
mysql_connect("localhost", "jharvard", "crimson");
mysql_select_db("jharvard_froshims");

// scrub inputs
$name = mysql_real_escape_string($_POST["name"]);
$captain = $_POST["captain"] ? 1 : 0;
$gender = mysql_real_escape_string($_POST["gender"]);
$dorm = mysql_real_escape_string($_POST["dorm"]);

// prepare query
$sql = "INSERT INTO registrants (name, captain, gender, dorm)
     VALUES('$name', $captain, '$gender', '$dorm')";

// execute query
mysql_query($sql);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Frosh IMs</title>
</head>
<body>
You are registered!
</body>
</html>