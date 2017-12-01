    <?php include 'Models/schreiben.model.php'; 
    ?>
    
    <h1 id = "title">Beitrag schreiben</h1>

    

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

    <form action="index.php?page=schreiben" method="post">

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
                    <input class="form-control" type="text" id="f_email" name="f_email" value="<?php if (isset($_POST['f_email'])) echo htmlspecialchars($_POST['f_email']); ?>">
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