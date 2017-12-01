<!DOCTYPE html>
<html lang="de">
<head>

  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
	<link rel="stylesheet" href="css\style.css">
	<title>Beiträge</title>
	<meta charset="utf-8">

</head>

<body>

    <h1 id = "title">Neuste Beiträge</h1>

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
                <li><a href="..\schreiben\index.php">Beitrag schreiben</a>
                </li>
            </ul>
        </nav>
    </div>

    <div id = "nav2">
        <nav>
            <ul>
                <li id = "k1"><a href='..\beitraege\index.php'>Alle Beiträge</a>
                </li>
                <li id = "k2"><a href='index.php'>Neuste Beiträge</a>
                    <ul id = "neuste">
                        <?php
                            $dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
                            $stmt = $dbConnection->query("SELECT * FROM (SELECT * FROM beitraege ORDER BY id DESC LIMIT 3 ) sub ORDER BY id DESC");
                            foreach($stmt->fetchAll() as $x) {
                                echo ('<li> <a href="index.php#bt' . $x["ID"] . '">' . $x["theme"] . '</a> </li>');
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
        $dbconnection = new PDO('mysql:host=10.20.16.107;dbname=ipadressen','DB_BLJ','BLJ12345l');
        $stmt = $dbconnection->query("SELECT ip,home FROM t_ipadress order by ID");
        $ipArray = $stmt -> fetchAll();
    ?>
    <?php if ($dbconnection !=false) {

    echo ('<div id = "nav3">
        <nav>
            <ul>
                <li id = "n3k1"><a href=\'#\'>Alle BLJ Seiten</a>
                    <ul>
                        <li><p><a href="http://<?php echo $ipArray[2][0]?><?php echo $ipArray[2][1] ?>">Fynnus Blogus</a></p>
                        </li>
                        <li><p><a href="http://<?php echo $ipArray[1][0]?><?php echo $ipArray[1][1] ?>">Carolina\'s Blog</a></p>
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
    </div>');

    } else {

        echo ('<div id = "nav3">
        <nav>
            <ul>
                <li id = "n3k1"><a href=\'#\'>Alle BLJ Seiten</a>
                    <ul>
                        <li><p><a>----------</a></p>
                        </li>
                        <li><p><a>----------</a></p>
                        </li>
                        <li><p><a>----------</a></p>
                        </li>
                        <li><p><a>----------</a></p>
                        </li>
                        <li><p><a>----------</a></p>
                        </li>
                        <li><p><a>----------</a></p>
                        </li>
                        <li><p><a>----------</a></p>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>');

    } 
    ?>


<div id = "beitraege">
    <?php
        $dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $stmt = $dbConnection->query("SELECT * FROM beitraege ORDER BY ID desc");
        foreach($stmt->fetchAll() as $x) {
            echo '<div class = "beitraege" id = "bt' . $x["ID"] . '">' . '<p id = "p_username">' . $x["first_name"] . ' ' . $x["last_name"] . ':</p>' . '<p id = "p_time">' . $x["creation_date"] . '</p><hr>' . '<p id = "p_theme">' . $x["theme"] . '</p>' . '<p id = "text">' . $x["text"] . '</p>' . '</div>';
        }
    ?>
    </div>


</body>
</html>