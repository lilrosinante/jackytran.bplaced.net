<?php
require '../view/header.php';

require 'redirectAndExit.php';
require 'getdbconnection.php';

    $errors = [];

    $nachname = '';
    $vorname = '';
    $strasse_hausnummer = '';
    $plz = '';
    $geschlecht = '';
    $title = '';
    $content = '';
    $published_at = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nachname = isset($_POST['person_nachname']) ? $_POST['person_nachname'] : '';
        $vorname = isset($_POST['person_vorname']) ? $_POST['person_vorname'] : '';
        $strasse_hausnummer = isset($_POST['person_strasse_und_hausnummer']) ? $_POST['person_strasse_und_hausnummer'] : '';
        $plz = isset($_POST['person_plz']) ? $_POST['person_plz'] : '';
        $geschlecht = isset($_POST['person_geschlecht']) ? $_POST['person_geschlecht'] : '';
        $title = isset($_POST['book_title']) ? $_POST['book_title'] : '';
        $content = isset($_POST['book_content']) ? $_POST['book_content'] : '';
        $published_at = isset($_POST['book_published_at']) ? $_POST['book_published_at'] : '';

        $conn = getMyDbConnection();

        $sql = "INSERT INTO formular
          (vorname, nachname, title,  published_at, content, strasse_hausnummer, plz, geschlecht)
         VALUES
           (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        if (false === $stmt) {
            echo mysqli_error($conn);
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                "ssssssis",
                $_POST['person_vorname'],
                $_POST['person_nachname'],
                $_POST['book_title'],
                $_POST['book_published_at'],
                $_POST['book_content'],
                $_POST['person_strasse_und_hausnummer'],
                $_POST['person_plz'],
                $_POST['person_geschlecht']
            );

            if (mysqli_stmt_execute($stmt)) {
                $id = mysqli_insert_id($conn);
                redirectAndExit("/model/formular.php?id=$id");
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
    ?>

    <!DOCTYPE html>

    <div class="container" id="cont1">

        <?php if (!empty($errors)) : ?>

            <?php foreach ($errors as $error) : ?>
                <li class="error"><i><?= $error ?><i></li>
            <?php endforeach; ?>

        <?php endif; ?>

        <form method="post">

            <fieldset class="form-group">

                <legend class="col-form-label"><h3>Personalien</h3></legend>

                <div class="form-group">
                    <label for="nachname">Nachname</label>
                    <input class="form-control" id="nachname" name="person_nachname" placeholder="Gustav" autofocus
                           required type="text" size="100" value="<?= htmlspecialchars($nachname) ?>">
                </div>

                <div class="form-group">
                    <label for="vorname">Vorname</label>
                    <input class="form-control" id="vorname" name="person_vorname" placeholder="Mohammad" required
                           type="text" size="100" value="<?= htmlspecialchars($vorname) ?>">
                </div>

                <div class="form-group">
                    <label for="strasse_und_hausnummer">Strasse und Hausnummer</label>
                    <input class="form-control" id="strasse_und_hausnummer" placeholder="Booleanstrasse 100"
                           name="person_strasse_und_hausnummer" required type="text" size="100"
                           value="<?= htmlspecialchars($strasse_hausnummer) ?>">
                </div>

                <div class="form-group">
                    <label for="plz">PLZ</label>
                    <input class="form-control" id="plz" placeholder="8953" name="person_plz" type="text" size="100"
                           value="<?= htmlspecialchars($plz) ?>">
                </div>

                <div class="form-check geschlecht">
                    <label name="geschlecht_label">Geschlecht</label>
                    <br>
                    <input class="form-check-input fci" type="radio" name="person_geschlecht"
                           value="maennlich" <?= $geschlecht == "maennlich" ? 'checked' : '' ?>>&emsp;&emsp;männlich
                    &emsp;&emsp;

                    <input class="form-check-input fci" type="radio" name="person_geschlecht"
                           value="weiblich" <?= $geschlecht == "weiblich" ? 'checked' : '' ?>>&emsp;&emsp;weiblich
                    &emsp;&emsp;

                    <input class="form-check-input fci" type="radio" name="person_geschlecht"
                           value="unbekannt" <?= $geschlecht == "unbekannt" ? 'checked' : '' ?>>&emsp;&emsp;keine Angabe
                    &emsp;&emsp;
                </div>

            </fieldset>
            <br>
            <fieldset>

                <legend><h3>Buch</h3></legend>

                <div class="form-group">
                    <label for="title">Titel</label>
                    <input class="form-control" id="title" placeholder="Hello World" name="book_title" type="text"
                           size="100" value="<?= $title ?>">
                </div>

                <div class="form-group">
                    <label for="content">Inhalt</label>
                    <input class="form-control" id="content" placeholder="Es war einmal..." name="book_content"
                           type="text" size="100" value="<?= $content ?>">
                </div>

                <div class="form-group">
                    <label for="published_at">Veröffentlicht am</label>
                    <input class="form-control" id="published_at" placeholder="dd.mm.YYYY" name="book_published_at"
                           type="date" size="100" value="<?= $published_at ?>">
                </div>

            </fieldset>
            <button class="btn btn-secondary" type="reset">Reset</button>
            <button class="btn btn-primary" type="submit">Senden</button>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php require '../view/footer.php'; ?>