<?php
include '../view/header.php';

include 'getdbconnection.php';

    $conn = getDbConnection();

    $sql = "SELECT id,
               title,
               CONCAT(TRIM(SUBSTRING(content, 1, 40)), '...') AS 'teaser',
               DATE_FORMAT(published_at, '%d.%m.%Y %H:%i') AS 'published',
               nachname,
               vorname
            FROM formular
            WHERE published_at IS NOT NULL
            ORDER BY published_at DESC";

    $results = mysqli_query($conn, $sql);

    if (false === $results) {
        echo mysqli_error($conn);
    } else {
        $formulars = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
?>

<div class="container" id="cont2">
    <?php if (empty($formulars)) : ?>
        <p>No articles found.</p>
    <?php else : ?>
        <ul>
            <?php foreach ($formulars as $formular) : ?>
                <li>
                    <article>
                        <h2><a href="formular.php?id=<?= $formular['id']; ?>"><?= $formular['title']; ?></a></h2>
                        <p>Published: <strong><?= $formular['published']; ?></strong></p>
                        <p><?= $formular['teaser']; ?></p>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php require '../view/footer.php'; ?>