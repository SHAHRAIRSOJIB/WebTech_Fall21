<?php require_once dirname(__FILE__) . "/controller/ambregistrationcontroller.php" ?>

<?php header_page(" Ambulence Registration"); ?>

<?php primary_menu(); ?>

    <section class="main">

        <?php // aside_menu(); ?>

        <main class="main__content main__content--registration">
            <!-- <form class="main__content--registration__form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"> -->
            <form class="main__content--registration__form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>AMBULENCE REGISTRATION</legend>
                    <div>
                        <table>
                            <tr>
                                <td><label for="name">Driver Name</label></td>
                                <td>:<input type="text" name="name" id="name" value="<?php echo $name; ?>"></td>
                                <td class="error"><?php echo $err_name; ?></td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <td><label for="phoneno">Phone Number</label></td>
                                <td>:<input type="text" name="phoneno" id="phoneno" value="<?php echo $phoneno; ?>"></td>
                                <td class="error"><?php echo $err_phoneno; ?></td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <td><label for="username">User Name</label></td>
                                <td>:<input type="text" name="username" id="username" value="<?php echo $username; ?>"></td>
                                <td class="error"><?php echo $err_username; ?></td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <td><label for="password">Password</label></td>
                                <td>:<input type="password" name="password" id="password" value="<?php echo $password; ?>"></td>
                                <td class="error"><?php echo $err_password; ?></td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <td><label for="cpassword">Confirm Password</label></td>
                                <td>:<input type="password" name="cpassword" id="cpassword" value="<?php echo $cpassword; ?>"></td>
                                <td class="error"><?php echo $err_cpassword; ?></td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <td><label for="ambno">Abmbulence Number</label></td>
                                <td>:<input type="text" name="ambno" id="ambno" value="<?php echo $cpassword; ?>"></td>
                                <td class="error"><?php echo $err_ambno; ?></td>
                            </tr>
                        </table>
                        <hr>
    
                        <fieldset>
                            <legend>Joining Date</legend>
                            <input type="date" name="doj" value="<?php echo $doj; ?>" id="doj">
                            <span class="error"><?php echo $err_doj; ?></span>
                        </fieldset>
                    </div>
                    <div>
                        <input type="submit" name="registration" value="Submit">
                        <input type="reset" id="reset">
                        <span class="success"><?php echo $success_msg; ?></span>
                    </div>
                </fieldset>
            </form>
        </main>
    </section>

