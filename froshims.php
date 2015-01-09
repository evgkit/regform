<?php
/**
 * Created by PhpStorm.
 * User: e
 */

// array of dorms
$DORMS = array(
    "Apley Court",
    "Canaday",
    "Grays",
    "Greenough",
    "Hollis",
    "Holworthy",
    "Hurlbut",
    "Lionel",
    "Matthews",
    "Mower",
    "Pennypacker",
    "Stoughton",
    "Straus",
    "Thayer",
    "Weld",
    "Wigglesworth"
);

// if form was actually submitted, check for error
if (isset($_POST["action"])) {
    if (empty($_POST["name"]) || empty($_POST["gender"]) || empty($_POST["dorm"]))
        $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Frosh IMs</title>
</head>
<body>
<div align="center">
    <h1>Register for Frosh IMs</h1>
    <? if (isset($error)): ?>
        <div style="color: red;">You must fill out the form!</div>
    <? endif ?>
    <br/><br/>
    <form action="register.php" method="post">
        <table style="border: 0; margin-left: auto; margin-right: auto; text-align: left">
            <tr>
                <td>Name:</td>
                <td><input name="name" type="text" value="<? if (isset($_POST["name"])) echo htmlspecialchars($_POST["name"]) ?>"/></td>
            </tr>
            <tr>
                <td>Captain:</td>
                <td><input name="captain" type="checkbox" <? if (isset($_POST["captain"])) echo 'checked'?>/></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input name="gender" type="radio" value="F" <? if ($_POST["gender"] === "F") echo "checked"?>/> F
                    <input name="gender" type="radio" value="M" <? if ($_POST["gender"] === "M") echo "checked"?>/> M
                </td>
            </tr>
            <tr>
                <td>Dorm:</td>
                <td>
                    <select name="dorm">
                        <option value=""></option>
                        <?
                        foreach ($DORMS as $dorm)
                        {
                            if (isset($_POST["dorm"]) && $_POST["dorm"] == $dorm)
                                echo "<option selected='selected' value='$dorm'>$dorm</option>";
                            else
                                echo "<option value='$dorm'>$dorm</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <br><br>
        <input name="action" type="submit" value="Register!">
    </form>
</div>
</body>
</html>