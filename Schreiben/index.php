<?php
$errors = [];
$firstname = '';
$lastname = '';
$f_email = '';
$f_text = '';
$f_theme = '';
$abgeschickt = false;

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //var_dump($_POST);
    //echo '<hr>';
    $firstname = trim($_POST['f_firstname']) ?? '';
    $lastname = trim($_POST['f_lastname']) ?? '';
    $f_email = trim($_POST)['f_email'];
    $f_text = trim($_POST['f_text']) ?? '';
    $f_theme = trim($_POST['f_theme']) ?? '';

  if ($firstname === '') {
    array_push($errors, "Bitte geben Sie Ihren Vornamen ein.");
  }
  if ($lastname === '') {
    array_push($errors, "Bitte geben Sie Ihren Nachnamen ein.");
  }
  if ($f_theme === '') {
    array_push($errors, "Bitte geben Sie ein Thema ein.");
  }
  if ($f_text === '') {
    array_push($errors, "Bitte geben Sie etwas ein.");
  }

    if (empty($errors)) {
        $dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $dbConnection->exec("INSERT INTO beitraege (first_name, last_name, email, theme, text, creation_date) VALUES ('$firstname', '$lastname', '$f_email', '$f_theme', '$f_text', now())");
        $abgeschickt = true; 
    }

}
?>
<!DOCTYPE html>
<html lang="de">
<head>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
	<link rel="stylesheet" href="css\style.css">
	<title>Startseite</title>
	<meta charset="utf-8">

</head>

<body>
    <h1 id = "title">Beitrag schreiben</h1>

    <div id = "nav1">
        <a href="..\index.php">
        <img id=logo src="..\bilder\logo.png" alt="Logo">
        </a>
        <nav>
            <ul>
                <li><a href="..\index.php">Startseite</a>
                </li>
                <li><a href="..\beitraege\index.php">Beiträge</a>
                </li>
                <li><a href="index.php">Beitrag scheiben</a>
                </li>
            </ul>
        </nav>
    </div>

    <div id = "nav2">
        <nav>
            <ul>
                <li id = "k1"><a href='..\beitraege\index.php'>Alle Beiträge</a>
                </li>
                <li id = "k2"><a href='..\neuste\index.php'>Neuste Beiträge</a>
                    <ul id = "neuste">
                        <?php
                            $dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
                            $stmt = $dbConnection->query("SELECT * FROM (SELECT * FROM beitraege ORDER BY id DESC LIMIT 3 ) sub ORDER BY id DESC");
                            foreach($stmt->fetchAll() as $x) {
                                echo ('<li> <a href="..\neuste\index.php#bt' . $x["ID"] . '">' . $x["theme"] . '</a> </li>');
                            }
                        ?>
                    </ul>
                </li>
                <li id = "k3"><a href='#'>----------</a>
                    <ul>
                        <li><a href=''>------------</a>
                        </li>
                        <li><a href=''>---------</a>
                        </li>
                        <li><a href=''>----------</a>
                        </li>
                    </ul>
                </li>
                <li id = "k4"><a href='#'>...</a>
                    <ul>
                        <li><a href=''>------------</a>
                        </li>
                        <li><a href=''>---------</a>
                        </li>
                        <li><a href=''>----------</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    <?php
    $dbconnection = new PDO('mysql:host=10.20.16.102;dbname=ipadressen','DB_BLJ','BLJ12345l');
    $stmt = $dbconnection->query("SELECT ip,home FROM t_ipadress order by ID");
    $ipArray = $stmt -> fetchAll();
    ?>

<div id = "nav3">
    <nav>
        <ul>
            <li id = "n3k1"><a href='#'>Alle BLJ Seiten</a>
                <ul>
                    <li><p><a href="http://<?php echo $ipArray[2][0]?><?php echo $ipArray[2][1] ?>">Fynnus Blogus</a></p>
                    </li>
                    <li><p><a href="http://<?php echo $ipArray[1][0]?><?php echo $ipArray[1][1] ?>">Carolina's Blog</a></p>
                    </li>
                    <li><p><a href="http://<?php echo $ipArray[7][0]?><?php echo $ipArray[7][1] ?>">RBWS</a></p>
                    </li>
                    <li><p><a href="http://<?php echo $ipArray[0][0]?><?php echo $ipArray[0][1] ?>">Ein Blog der dein Leben verändert</a></p>
                    </li>
                    <li><p><a href="http://<?php echo $ipArray[4][0]?><?php echo $ipArray[4][1] ?>">Jennifers Blog</a></p>
                    </li>
                    <li><p><a href="http://<?php echo $ipArray[5][0]?><?php echo $ipArray[5][1] ?>">Timons Blog</a></p>
                    </li>
                    <li><p><a href="http://<?php echo $ipArray[6][0]?><?php echo $ipArray[6][1] ?>">Bjoerns Blog</a></p>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
    
    <?php if (!empty($errors)) { ?>
        <div id="errorbox">
            <ul class="errors">
                <?php foreach ($errors as $error) { ?>
                    <li><?= $error ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <?php if ($abgeschickt == true) { ?>
        <li id = "f_meldung">Ihr Beitrag wurde erfolgreich gesendet. Sie finden ihn jetzt unter "Beiträge"</li>
    <?php } ?>

    <form action="index.php" method="post">

        <div id = "bsformularbox">
            <ul id = "bsformular" class = "form-group">
                <li>
                    <label class="form-label" for="f_firstname">Vorname:</label>
                    <input class="form-control" type="text" id="f_firstname" name="f_firstname" value="<?php if (isset($_POST['f_firstname'])) echo htmlspecialchars($_POST['f_firstname']); ?>">
                </li>
                <li>
                    <label class="form-label" for="f_lastname">Nachname:</label>
                    <input class="form-control" type="text" id="f_lastname" name="f_lastname" value="<?php if (isset($_POST['f_lastname'])) echo htmlspecialchars($_POST['f_lastname']); ?>">
                </li>
                <li>
                    <label for="f_email">E-Mail:</label>
                    <input class="form-control" type="email" id="f_email" name="f_email" value="<?php if (isset($_POST['f_email'])) echo htmlspecialchars($_POST['f_email']); ?>">
                    <p>(Email ist optional und wird nicht angezeigt)</p>
                </li>
                <hr>
                <li>
                    <label class="form-label" for="f_theme">Thema:</label>
                    <input class="form-control" type="text" id="f_theme" name="f_theme" value="<?php if (isset($_POST['f_theme'])) echo htmlspecialchars($_POST['f_theme']); ?>">
                    <p>(Max. 25 Zeichen)</p>
                </li>
                <li>
                    <textarea class="form-control" name="f_text" id="f_text" cols="96" rows="14"><?php if (isset($_POST['f_text'])) echo htmlspecialchars($_POST['f_text']); ?></textarea>
                </li>
                <div class="form-actions" id = "post_button">
                    <input class="btn btn-primary" type="submit" value="Posten">
                </div>
            </ul>
        </div>
    </form>
</body>
</html>
