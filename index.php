
<!DOCTYPE html>
<html lang="de">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/neuste.css">
    <link rel="stylesheet" href="css/beitraege.css">
    <link rel="stylesheet" href="css/schreiben.css">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<title>Startseite</title>
	<meta charset="utf-8">

</head>

<body>

    <?php 
        $page = $_GET['page'] ?? 'home';
        include 'views/' . $page . '.view.php';

        /*
        include 'views/schreiben.view.php'; 
        include 'views/neuste.view.php'; 
        include '/views/beitraege.view.php'; 
       */

    ?>
 

    <div id = "nav1">
        <a href="index.php">
        <img id=logo src="bilder\logo.png" alt="Logo">
        </a>
        <nav>
            <ul>
                <li><a href="index.php">Startseite</a>
                </li>
                <li><a href="index.php?page=beitraege">Beiträge</a>
                </li>
                <li><a href="index.php?page=schreiben">Beitrag schreiben</a>
                </li>
            </ul>
        </nav>
    </div>

    <div id = "nav2">
        <nav>
            <ul>
                <li id = "k1"><a href='index.php?page=beitraege'>Alle Beiträge</a>
                </li>
                <li id = "k2"><a href='index.php?page=neuste'>Neuste Beiträge</a>
                <ul id = "neuste">
                    <?php
                        $dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
                        $stmt = $dbConnection->query("SELECT * FROM (SELECT * FROM beitraege ORDER BY id DESC LIMIT 3 ) sub ORDER BY id DESC");
                        foreach($stmt->fetchAll() as $x) {
                            echo ('<li> <a href="index.php?page=neuste#bt' . $x["ID"] . '">' . $x["theme"] . '</a> </li>');
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
        
        if ($stmt->execute()) {
            include 'views/nav3.view.php';
        }
        else {
        echo    
            '<div id = "nav3">
                <nav>
                    <ul>
                        <li id = "n3k1"><a href=\'#\'>Alle BLJ Seiten</a>
                            <ul>
                                <li><p><a>-----------</a></p>
                                </li>
                                <li><p><a>-----------</a></p>
                                </li>
                                <li><p><a>-----------</a></p>
                                </li>
                                <li><p><a>-----------</a></p>
                                </li>
                                <li><p><a>-----------</a></p>
                                </li>
                                <li><p><a>-----------</a></p>
                                </li>
                                <li><p><a>-----------</a></p>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>';
        }
    
    ?>


</body>
</html>