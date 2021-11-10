<?php require_once dirname(__FILE__) . "/controller/hosregistrationcontroller.php" ?>

<?php header_page(" Hospital Registration"); ?>

<?php primary_menu(); ?>

    <section class="main">

        <?php // aside_menu(); ?>

        <main class="main__content main__content--registration">
            <!-- <form class="main__content--registration__form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"> -->
            <form class="main__content--registration__form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend> HOSPITAL REGISTRATION</legend>
                    <div>
                        <table>
                            <tr>
                                <td><label for="name"> Hospital Name</label></td>
                                <td>:<input type="text" name="name" id="name" value="<?php echo $name; ?>"></td>
                                <td class="error"><?php echo $err_name; ?></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><label for="email">Email</label></td>
                                <td>:<input type="text" name="email" id="email" value="<?php echo $email; ?>"></td>
                                <td class="error"><?php echo $err_email; ?></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><label for="phoneno">Phone Number</label></td>
                                <td>:<input type="text" name="phoneno" id="phoneno" value="<?php echo $phoneno; ?>"></td>
                                <td class="error"><?php echo $err_phoneno; ?></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><label for="location">Location</label></td>
                                <td>:<input type="text" name="location" id="location" value="<?php echo $loc; ?>"></td>
                                <td class="error"><?php echo $err_loc; ?></td>
                            </tr>
                        </table>
                    <div>
                        <input type="submit" name="registration" value="Submit">
                        <input type="reset" id="reset">
                        <span class="success"><?php echo $success_msg; ?></span>
                    </div>
                </fieldset>
            </form>
        </main>
    </section>

