<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>

        <div id="container" class="container">

            <h1>Login</h1>

            <div class=" col-md-4 well">
                <table>
                    <?php
                    echo form_open('main/login_validation');
                    
                    echo "<tr>";
                    echo "<td>Gebruikersnaam:</td>";
                    echo "<td>";
                    echo form_input('gebruikersnaam');
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Wachtwoord:</td>";
                    echo "<td>";
                    echo form_password('wachtwoord');
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td>";
                    echo form_submit('login_submit', 'Inloggen');
                    echo "</td>";
                    echo "</tr>";
                    
                    echo form_close();
                    ?>
                </table>
            </div>
        </div>

    </body>
</html>