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
                        <option value="1">Nice</option>
                        <option value="2">Aix-en-Provence</option>
                        <option value="3">Montpellier</option>
                        <option value="4">Toulouse</option>
                        <option value="5">Pau</option>
                        <option value="6">Bordeaux</option>
                        <option value="7">Angoulême</option>
                        <option value="8">La Rochelle</option>
                        <option value="9">Nantes</option>
                        <option value="10">Saint Nazaire</option>
                        <option value="11">Orléans</option>
                        <option value="12">Le Mans</option>
                        <option value="13">Brest</option>
                        <option value="14">Paris Nanterre</option>
                        <option value="15">Reims</option>
                        <option value="16">Caen</option>
                        <option value="17">Rouen</option>
                        <option value="18">Arras</option>
                        <option value="19">Lille</option>
                        <option value="20">Nancy</option>
                        <option value="21">Strasbourg</option>
                        <option value="22">Dijon</option>
                        <option value="23">Grenoble</option>
                        <option value="24">Alger</option>
                    </select><br>

                    <input type="button" id="signUp" value="go to login page" onclick="inToUp()">
                    <input type="submit" id="next" value="Submit">
                </form>
            </div>
        </div>
    </div>

<?php require_once('footer.inc.php') ?>
<?php include_once('../cookie/cookie.php') ?>

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
