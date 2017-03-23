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
    if(!$_POST["id"]=="") {
        $db->query("UPDATE project SET title ='" . $_POST["title"] . "', description ='" . $_POST["desc"] . "', creationDate ='" . $_POST["date"] . "' WHERE id =" . $_POST["id"]);
    }
    else
    {
        $var = "INSERT INTO project (title, description, creationDate, user_id) VALUES ('".$_POST["title"]."', '".$_POST["desc"]."', '".$_POST["date"]."', 1)";
        ///echo $var;
        var_dump($db->query($var));
    }
}

if(isset($_GET["deleteID"]))
{
    $db->query("DELETE FROM project WHERE id = ".$_GET["deleteID"]);
}
if(!isset($_GET['side']))
{
    $_GET['side'] = 1;
}
$count = 0;
$statement = "SELECT count(*) FROM project";
$res = $db->query($statement);
$tmp = $res->fetchAll(PDO::FETCH_NUM);
$count = $tmp[0][0];
$statement = "SELECT p.id,p.title,u.username,p.description,p.creationDate, p.state FROM project p JOIN user u ON u.id = p.user_id LIMIT ".(($_GET['side']-1) * 20).", 20;";
$res = $db->query($statement);
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
    <div>
        <?php

        if(!isset($_GET['side']))
        {
            $_GET['side'] = 1;
        }

        $num1 = 1;
        $num2 = 1;
        $offset = 0;
        if($count % 20 != 0)
        {
            $offset = 1;
        }


        if($_GET['side'] <= 1)
        {
            $num1 = 1;
        }
        else{
        $num1 = $_GET['side']-1;}


        if($_GET['side'] >= $count / 20 + $offset)
        {
            $num2 = $count / 20 + $offset;
        }
        else
        {
            $num2 = $_GET['side']+1;
        }

        echo "<ul class = 'pagination'>";
        echo "<li class='Previous'><a href = 'index.php?side=" . ($num1) . "&amount=20' aria-label=\"Previous\">
        <span aria-hidden=\"true\">&laquo;</span>
      </a></li>";

        for($i = 1; $i < $count / 20 + $offset; $i++) {
            echo "<li><a href = 'index.php?side=" . $i . "&amount=20'>" . $i . " </a></li>";
        }
        echo "<li class='Next'><a href = 'index.php?side=" . ($num2) . "&amount=20' aria-label=\"Next\">
        <span aria-hidden=\"true\">&raquo;</span>
      </a></li>";
        echo "</ul>";

        ?>
    </div>

    <?php
    echo "<a href = 'index.php'><button>Add</button></a>";
/*$title ="";
        $description = "";
        $creationDate = "";
        $id = "";
        $button = "Add";*/
        if(isset($_GET["updateID"])) {
            $res = $db->query("SELECT p.id,p.title,u.username,p.description,creationDate, p.state FROM project p JOIN user u ON u.id = p.user_id WHERE p.id =" . $_GET["updateID"] . ";");
            $tmp = $res->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($tmp);
         /*   $title = $tmp[0]['title'];
            $description = $tmp[0]['description'];
            $creationDate = $tmp[0]['creationDate'];
            $id = $tmp[0]['id'];
            $button = "Update";*/
            PrintFormFull($tmp[0]['title'],$tmp[0]['description'],$tmp[0]['creationDate'],$tmp[0]['id'],"Update");
        }
        else
        {PrintForm();}
        function PrintForm()
        {
            PrintFormFull("","","","","");
        }
function PrintFormFull($title,$description,$creationDate,$id,$button)
{ 
            echo "<form action='index.php' method='post'>
        <div class=\"form-group\">
            <label for=\"n\">Name</label>
            <input type=\"text\" class=\"form-control\" name='title' value=\"".$title."\">
        </div>
        <div class=\"form-group\">
            <label for=\"d\">Description</label>
            <input type=\"text\" class=\"form-control\" name='desc' value=\"".$description."\">
        </div>";
    if($creationDate == "")
    {
    echo "
        <div class=\"form-group\">
            <label for=\"da\">Date</label>
            <input type=\"date\" class=\"form-control\" name='date' value=\"".$creationDate."\">
        </div>";}
    echo "
        <div class=\"form-group\">
            <label for=\"u\">Update</label>
            <input type=\"submit\" class=\"form-control\" name='submit' value=\"".$button."\">
            <input type=\"hidden\" name='id' value=\"".$id."\">
        </div>
    </form>";
}
    ?>


</table>
</body>
</html>