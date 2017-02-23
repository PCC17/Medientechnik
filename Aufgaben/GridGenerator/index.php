<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Paul Camerloher">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body style="margin: 4%;">
    <main>
        <h1>Grid Generator</h1>
        <form action="index.php" method="GET">
                <div class="checkbox">
                    <label><input type="checkbox" name="day[]" value="Montag">Montag</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="day[]" value="Dienstag">Dienstag</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="day[]" value="Mittwoch">Mittwoch</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="day[]" value="Donnerstag">Donnerstag</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="day[]" value="Freitag">Freitag</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="day[]" value="Samstag">Samstag</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="day[]" value="Sonntag">Sonntag</label>
                </div>
                <label>Felderanzahl: <input type="text" name="numoffields"></label>
                <br>
                <input type="submit" name="submit" value="GO!">
        </form>

        <?php
            if(isset($_GET['submit']))
            {
                echo "<table class = 'table table-striped table-bordered table-hover'>";
                echo "<thead><tr><th>Tag</th>";
                for($i = 1; $i <= $_GET['numoffields'];$i++)
                {
                    echo "<th>Event ".$i."</th>";
                }
                echo"</tr></thead><tbody>";
                foreach ($_GET['day'] as $i)
                {
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    for($j = 1; $j <= $_GET['numoffields']; $j++)
                    {
                        echo "<td>event 2.".$j."</td>";
                    }
                    echo"</tr>";
                }
                echo "</tbody></table>";
            }
        ?>
    </main>
</body>
</html>

