<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/plugins.js"></script>
       
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    </head>

    <?php
    
    require("/includes/connect.php");

    $statement = "SELECT p.id,p.title,u.username,p.description,p.creationDate, p.state FROM project p JOIN user u ON u.id = p.user_id ;";
    $res = $db->query($statement);
    $tmp = $res->fetchAll(PDO::FETCH_ASSOC);
    ?>


    <body>
    <span id="successMsg" style="background-color:green;" hidden = true>Erfolgreich</span>
    <div id="container">
        <div class="col-md-offset-1 col-md-10">
            <h2>Project Trackstar</div>
        </div>
        <div class="col-md-offset-1 col-md-10">
            <table class="table table-bordered maintable">

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
                    echo "<tr id='".$t['id']."'>";
                    foreach ($t as $i) {
                        echo "<td>{$i}</td>";
                    }
                    echo'
                    <td>
                    <span data-pid="'.$t['id'].'" class="glyphicon glyphicon-trash trashicon" aria-hidden="true"></span>
                    <span data-pid="'.$t['id'].'" class="glyphicon glyphicon-pencil editicon" aria-hidden="true"></span>
                    </td>';
                    echo "</tr>";
                }
                ?>
        </table>
        </div>
    <div>
    </body>
</html>
<div id="delete-dialog" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Projekt löschen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Sind Sie sichs sicher, dass Sie das Projekt löschen wollen?</p>
      </div>
      <div class="modal-footer">
        <button id="delete-project-button" type="button" class="btn btn-primary">Löschen</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
      </div>
    </div>
  </div>
</div>
 <script src="js/main.js"></script>