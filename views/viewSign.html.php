<?php require_once('header.inc.php') ?>

    <div class="container-page">
        <div class="sign">
            <div class="sign-panel">
                <h3><i class="fas fa-sign-in-alt"></i> Connection</h3>

<!-- ----------------------------------------SIGN IN---------------------------------------- -->
                <form class="in" id="show" action="signIn.php" method="post">
                    <p>Sign in</p> <br>
                    <input type="email" class="text" id="email" name="email" required="required" placeholder="Email address"><br>
                    <input type="password" class="text" id="password" name="password" required="required" placeholder="Password">
                    <input type="button" id="signUp" value="create an account" onclick="inToUp()">
                    <input type="submit" id="next" value="Submit">
                </form>

<!-- ----------------------------------------SIGN UP---------------------------------------- -->
                <form action="signUp.php" class="up" id="hide" method="post">
                    <p><i class="fas fa-user-plus"></i> Sign up</p> <br>
                    <input type="text" class="upInput" id="name" name="name" required="required" placeholder="Last name">
                    <input type="text" class="upInput" id="firstName" name="firstName" required="required" placeholder="First name"><br>
                    <input type="email" class="text" id="email" name="email" required="required" placeholder="Email address"><br>
                    <input type="password" class="upInput" id="password" name="password" required="required" placeholder="Password">
                    <input type="password" class="upInput" id="confirmPassword" name="confirmPassword" required="required" placeholder="Confirm password">

                    <label for="center">Choose a center:</label>
                    <select id="center" name="center">
                        <option value="Nice">Nice</option>
                        <option value="Aix-en-Provence">Aix-en-Provence</option>
                        <option value="Montpellier">Montpellier</option>
                        <option value="Toulouse">Toulouse</option>
                        <option value="Pau">Pau</option>
                        <option value="Bordeaux">Bordeaux</option>
                        <option value="Angoulême">Angoulême</option>
                        <option value="La Rochelle">La Rochelle</option>
                        <option value="Nantes">Nantes</option>
                        <option value="Saint Nazaire">Saint Nazaire</option>
                        <option value="Orléans">Orléans</option>
                        <option value="Le Mans">Le Mans</option>
                        <option value="Brest">Brest</option>
                        <option value="Paris Nanterre">Paris Nanterre</option>
                        <option value="Reims">Reims</option>
                        <option value="Caen">Caen</option>
                        <option value="Rouen">Rouen</option>
                        <option value="Arras">Arras</option>
                        <option value="Lille">Lille</option>
                        <option value="Nancy">Nancy</option>
                        <option value="Strasbourg">Strasbourg</option>
                        <option value="Dijon">Dijon</option>
                        <option value="Grenoble">Grenoble</option>
                        <option value="Alger">Alger</option>
                    </select><br>

                    <input type="button" id="signUp" value="go to login page" onclick="inToUp()">
                    <input type="submit" id="next" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <script>
        function inToUp() {
            let myIn = document.querySelector(".in");
            let myUp = document.querySelector(".up");
            if(myIn.id=="show"){
                myIn.setAttribute("id", "hide");
                myUp.setAttribute("id", "show");
            }
            else if(myIn.id=="hide"){
                myIn.setAttribute("id", "show");
                myUp.setAttribute("id", "hide");
            }
            return 0;
        }

        function signIn() {
            "use strict";

            $(document).ready(function () {
                $('.in').submit(function () {
                    $.ajax({
                        'url': $(this).attr('action'),
                        'method': $(this).attr('method'),
                        'data': $(this).serialize()
                    }).done(function (data) {
                        if (data.success){

                        }
                        else {
                            // data.message
                        }
                    }).fail(function () {

                    });
                    return false;
                });
            })
        }
    </script>

<?php require_once('footer.inc.php') ?>