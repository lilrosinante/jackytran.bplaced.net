<?php
require '../view/header.php';
require 'getdbconnection.php';

$conn = getMy2DbConnection();

$user = $_SESSION['benutzer'];
$bookCount = 0;
$price = 0;

$sql = "SELECT *             
            FROM bookorder             
            WHERE user='$user'";
$results = mysqli_query($conn, $sql);

if (false === $results) {
    echo mysqli_error($conn);
} else {
    $books = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

?>

<form action="../model/payaction.php" method="post">
    <div class="container" id="payment_container">
        <h2>Payment</h2>
        <h3>Ordered Books:</h3>
        <?php if (empty($books)) : ?>
            <p>No articles found.</p>
        <?php else : ?>
            <ul>
                <?php foreach ($books as $book) : ?>
                    <li>
                        <article>
                            <?php $price = $price + $book['price'] ?>
                            <?php $bookCount = $bookCount + 1 ?>
                            <h4><?= $book['book']; ?></h4>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>
            <br>
            <br>
        <?php endif; ?>
        <?php echo "<h3>Price: $price</h3>" ?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php if ($bookCount != 0) {?>
        <input type="submit" class="button alt" name="btn_pay" id="btn_pay" value="&nbsp; Pay &nbsp;">
    <?php } ?>
</form>
<?php require '../view/footer.php';
?>
