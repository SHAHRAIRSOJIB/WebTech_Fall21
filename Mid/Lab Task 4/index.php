<?php require_once "functions.php"; ?>
<?php

// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//     header("Location: dashboard.php");
//     exit();
// }

?>

<?php header_page("Public Home"); ?>

<?php primary_menu(); ?>

    <section class="main">

        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                aside_menu();
            }
        ?>

        <main class="main__content">
        <div class="h1index">
            <h1>Welcome to Emergency Medical Services </h1>
        </div>
        </main>
    </section>

