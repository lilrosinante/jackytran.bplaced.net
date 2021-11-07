<?php
require '../view/header.php';

require 'getdbconnection.php';

$conn = getMyDbConnection();

$formular = null;
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($id) && is_numeric($id)) {
    $sql = "SELECT *             
            FROM formular             
            WHERE id = $id";
    $results = mysqli_query($conn, $sql);

    if (false === $results) {
        echo mysqli_error($conn);
    } else {
        $formular = mysqli_fetch_assoc($results);
    }
} else {
    $formular = null;
}

?>

<div class="container" id="cont3">

    <h3><a href="booklist.php">Back To List</a></h3>
    <br>
    <?php if (null === $formular) : ?>
        <p>Formular not found.</p>
    <?php else : ?> <article>
        <h2><?= $formular['title']; ?></h2>
        <p><?= $formular['published_at']; ?></p>
        <p><?= $formular['content']; ?></p>
        <h4>Von:</h4>
        <h5><?= $formular['nachname']; ?> <?= $formular['vorname']; ?></h5>
        <p><?= $formular['strasse_hausnummer']; ?></p>
        <p><?= $formular['plz']; ?></p>
        <p><?= $formular['geschlecht']; ?></p>
        <form action="/model/purchase.php" method="post">
            <input type="hidden" name="title" value="<?= $formular['title'];?>">
        <button class="button buyButton" type="submit"><h3>Buy</h3></button>
        </form>
    </article> <?php endif; ?>
</div>
<?php require '../view/footer.php'; ?>