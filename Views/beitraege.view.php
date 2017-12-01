<h1 id = "title">Alle Beiträge</h1>

<div id = "beitraege">
    <?php
        $dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $stmt = $dbConnection->query("SELECT * FROM beitraege ORDER BY ID desc");
        foreach($stmt->fetchAll() as $x) {
            echo '<div class = "beitraege" id = "bt' . $x["ID"] . '">'
            . '<p id = "p_username">' . $x["first_name"] . ' ' . $x["last_name"] . ':</p>' 
            . '<p id = "p_time">' . $x["creation_date"] . '</p>
            <hr>' 
            . '<p id = "p_theme">' . $x["theme"] . '</p>' 
            . '<p id = "text">' . $x["text"] . '</p>' 
            . '</div><div id = "bt_bewertung">            
            <div id = "stern_bewertung" class="stars">
                <form action="">
                    <input class="star star-5" id="star-5" type="radio" name="star"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" name="star"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" name="star"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" name="star"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" name="star"/>
                    <label class="star star-1" for="star-1"></label>
                </form>
            </div>
            <button id = "s_b_button" name="stars_submit" type="submit">Bewerten</button>
            </div>';
        }
    ?>
</div>