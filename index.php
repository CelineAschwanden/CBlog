<!DOCTYPE html>
<html lang="de">
<head>

    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
	<link rel="stylesheet" href="css\style.css">
	<title>Startseite</title>
	<meta charset="utf-8">

</head>

<body>

    <h1 id = "title">Wilkommen auf CBlog!</h1>


    <img class="displayed" src="bilder\blog-intro.jpg" alt="Blog-Titelbild">


    <div id = "nav1">
        <a href="index.php">
        <img id=logo src="bilder\logo.png" alt="Logo">
        </a>
        <nav>
            <ul>
                <li><a href="index.php">Startseite</a>
                </li>
                <li><a href="beitraege\index.php">Beiträge</a>
                </li>
                <li><a href="schreiben\index.php">Beitrag scheiben</a>
                </li>
            </ul>
        </nav>
    </div>

    <div id = "nav2">
        <nav>
            <ul>
                <li id = "k1"><a href='beitraege\index.php'>Alle Beiträge</a>
                </li>
                <li id = "k2"><a href='neuste\index.php'>Neuste Beiträge</a>
                <ul id = "neuste">
                    <?php
                        $dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
                        $stmt = $dbConnection->query("SELECT * FROM (SELECT * FROM beitraege ORDER BY id DESC LIMIT 3 ) sub ORDER BY id DESC");
                        foreach($stmt->fetchAll() as $x) {
                            echo ('<li> <a href="neuste\index.php#bt' . $x["ID"] . '">' . $x["theme"] . '</a> </li>');
                        }
                    ?>
                </ul>
                </li>
                <li id = "k3"><a href='#'>-----------</a>
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

</body>
</html>
