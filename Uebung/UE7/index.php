<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="margin:5%;">
<?php
$host = "localhost";
$dbname = "trackstar_own";
$user = "root";
$pass = "";
$db = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);

if(isset($_POST["submit"]))
{
    $db->query("UPDATE project SET title ='".$_POST["title"]."', description ='".$_POST["desc"]."', creationDate ='".$_POST["date"]."' WHERE id =".$_POST["id"]);
}

if(isset($_GET["deleteID"]))
{
    $db->query("DELETE FROM project WHERE id = ".$_GET["deleteID"]);
}
$res = $db->query("SELECT p.id,p.title,u.username,p.description,p.creationDate, p.state FROM project p JOIN user u ON u.id = p.user_id;");
$tmp = $res->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-bordered">

    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Creator</th>
        <th>Description</th>
        <th>Creation Date</th>
        <th>State</th>
        <th>Operations</th>
    </tr>
    </thead>

    <?php
        foreach ($tmp as $t) {
        echo "<tr>";
            foreach ($t as $i) {
                echo "<td>{$i}</td>";
            }
            echo'<td><a href="index.php?deleteID='.$t["id"].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="index.php?updateID='.$t["id"].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>';
            echo "</tr>";
        }
    ?>

    <?php
        if(isset($_GET["updateID"]))
        {
            $res = $db->query("SELECT p.id,p.title,u.username,p.description,p.creationDate, p.state FROM project p JOIN user u ON u.id = p.user_id WHERE p.id =".$_GET["updateID"]);
            $tmp = $res->fetchAll(PDO::FETCH_ASSOC);


            echo "<form action='index.php' method='post'>
        <div class=\"form-group\">
            <label for=\"n\">Name</label>
            <input type=\"text\" class=\"form-control\" name='title' value=\"".$tmp[0]["title"]."\">
        </div>
        <div class=\"form-group\">
            <label for=\"d\">Description</label>
            <input type=\"text\" class=\"form-control\" name='desc' value=\"".$tmp[0]["description"]."\">
        </div>
        <div class=\"form-group\">
            <label for=\"da\">Date</label>
            <input type=\"datetime-local\" class=\"form-control\" name='date' value=\"".$tmp[0]["creationDate"]."\">
        </div>
        <div class=\"form-group\">
            <label for=\"u\">Update</label>
            <input type=\"submit\" class=\"form-control\" name='submit' value=\"Update\">
            <input type=\"hidden\" name='id' value=\"".$tmp[0]["id"]."\">
        </div>
    </form>";
        }
    ?>


</table>
</body>
</html>