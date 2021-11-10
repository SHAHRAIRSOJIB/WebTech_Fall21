<?php require_once dirname(__FILE__) . "/controller/change-passwordcontroller.php" ?>

<?php header_page("Change Password"); ?>

<?php primary_menu(); ?>

    <section class="main">

        <?php aside_menu(); ?>

        <main class="main__content main__content--change-pass">
            <form class="main__content--change-pass__form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>CHANGE PASSWORD</legend>
                    <div>
                        <table>
                            <tr>
                                <td><label for="currentpass">Current Password</label></td>
                                <td>: <input type="password" name="currentpass" id="currentpass" value="<?php echo $currentpass; ?>"></td>
                                <td><span class="error"><?php echo $err_currentpass; ?></span></td>
                            </tr>
                            <tr>
                                <td><label for="newpass" style="color: green;">New Password</label></td>
                                <td>: <input type="password" name="newpass" id="newpass" value="<?php echo $newpass; ?>"></td>
                                <td><span class="error"><?php echo $err_newpass; ?></span></td>
                            </tr>
                            <tr>
                                <td><label for="retypepass" style="color: red;">Retype New Password</label></td>
                                <td>: <input type="password" name="retypepass" id="retypepass" value="<?php echo $retypepass; ?>"></td>
                                <td><span class="error"><?php echo $err_retypepass; ?></span></td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <div>
                        <input type="submit" name="changepassword" value="Submit">
                        <span class="success"><?php echo $success_msg; ?></span>
                    </div>
                </fieldset>
            </form>
        </main>
    </section>

