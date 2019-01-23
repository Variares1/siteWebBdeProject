<?php require_once('header.inc.php') ?>

    <div class="container-page">
        <div class="sign">
            <div class="sign-panel">
                <h3><i class="fas fa-sign-in-alt"></i> Connection</h3>

<!-- ----------------------------------------SIGN IN---------------------------------------- -->
                <form class="in" id="show" action="">
                    <p>Sign in</p> <br>
                    <input type="email" class="text" id="email" name="email" required="required" placeholder="Email address"><br>
                    <input type="password" class="text" id="password" name="password" required="required" placeholder="Password">
                    <input type="button" id="signUp" value="create an account" onclick="inToUp()">
                    <input type="submit" id="next" value="Submit">
                </form>

<!-- ----------------------------------------SIGN UP---------------------------------------- -->
                <form class="up" id="hide" action="">
                    <p>Sign up</p> <br>
                    <input type="text" class="upInput" id="name" name="name" required="required" placeholder="Last name">
                    <input type="text" class="upInput" id="firstName" name="firstName" required="required" placeholder="First name"><br>
                    <input type="email" class="text" id="email" name="email" required="required" placeholder="Email address"><br>
                    <input type="password" class="upInput" id="password" name="password" required="required" placeholder="Password">
                    <input type="password" class="upInput" id="confirmPassword" name="confirmPassword" required="required" placeholder="Confirm password">
                    <input type="button" id="signUp" value="create an account" onclick="inToUp()">
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
    </script>

<?php require_once('footer.inc.php') ?>