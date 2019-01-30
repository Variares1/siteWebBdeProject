<?php

include("Curl.php");

?>

<div class="container-page">
    <div>
        <h1>USERS<br><p>ID USERS</p></h1>
    </div>
    <div class="change-event">
        <!-- <img src="D:\EXIA\A2\prosit 2.4\site\assets\img\logo2.png" alt="logo" class="logo"/>
 -->


        <?php

        if (isset($_SESSION["session"]))
            $try = $curl->getT('users','',$_SESSION["token"]);

        $data = json_decode($try, true);

//        $data = array(
//
//            $e1 = array(
//                "firstName" => "Zoro",
//                "lastName" => "Roronora",
//                "ay" => "ohohohoho",
//            ),
//
//            $e2 = array(
//                "firstName" => "Luffy",
//                "lastName" => "TheD",
//                "ay" => "ehehehehe",
//            ),


//        );
        if (isset($_GET['key']))
            var_dump($_GET['key']);

        foreach ($data as $key => $value) {
            if (isset($_POST['firstName']) && isset($_GET['key'])) {
                $data[$_GET['key']]['firstName'] = $_POST["firstName"];
                $data[$_GET['key']]['lastName'] = $_POST["lastName"];
                $data[$_GET['key']]['ay'] = $_POST["ay"];

            }
        }

        foreach ($data as $key => $value){

            echo '<form action="viewUsersA.html.php?key='.$key.'" method="post">';
            $curl->delete('/users', 'id');

            echo '<input type="text" name="firstName" value="'.$value["firstName"].'">';
            echo '<input type="text" name="lastName" value="'.$value["lastName"].'">';
            echo '<input type="text" name="ay" value="'.$value["ay"].'">';
            echo "<br>";
            echo "<input type='submit' value='apply'>";

            echo "<td><input type='submit' value='delete' name='delete' /></td>";


            echo'</form>';


        };

        ?>

        <ul>


            <a href="http://localhost/siteWebBdeProject/admin/indexA.html.php">Back to Index</a><br><br>


        </ul>
    </div>

