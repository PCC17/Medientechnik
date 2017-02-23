<html>
<head>
  <title>Medientechnik</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <h3>Eingaben tätigen</h3>
  <form class="form-horizontal" action="index.php">
    <div class="form-group">
      <label class="control-label col-sm-1">Vorname:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" placeholder="Vorname eingeben" name="vn">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1">Nachname:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" placeholder="Nachname eingeben" name="nn">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1">Email-Adresse:</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" placeholder="Email-Adresse eingeben" name = "em">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="OK" >OK</button>
      </div>
    </div>
  </form>

  <div>
  <?php
    if(isset($_GET['OK']))
    {
      echo "<h3>Ihre Eingabe</h3>";
      echo "<p>";
      printTextWithLabel("Vorname", $_GET["vn"]);
      printTextWithLabel("Nachname", $_GET["nn"]);
      printTextWithLabel("Email", $_GET["em"]);
      echo "</p>";


    }

    function printTextWithLabel($label, $text)
    {
      echo"<form class='form-horizontal'>";
      echo "<div class='form-group'>";
      echo "<label class='control-label col-sm-1'>".$label.":</label>";
      echo "<div class='col-sm-4'>";
      echo $text;
      echo "</div>";
      echo "</div>";
      echo "</form>";
    }
   ?>
 </div>
</body>
</html>
