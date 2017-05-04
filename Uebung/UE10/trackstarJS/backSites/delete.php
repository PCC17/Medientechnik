<?php
    if(isset($_POST["deletePID"])) {
        //$statement = "DELETE FROM project WHERE id="$_POST["deletePID"];
        //$res = $db->query($statement);
        //$tmp = $res->fetchAll(PDO::FETCH_ASSOC);
        echo $_POST["deletePID"];
    }
?>