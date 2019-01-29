<?php

require("Curl.php");

?>

    <div class="container-page">
        <div>
            <h1>EVENTS <br><p>Events from the website</p></h1>
        </div>
        <div class="change-event">
            <!-- <img src="D:\EXIA\A2\prosit 2.4\site\assets\img\logo2.png" alt="logo" class="logo"/>
     -->
            <?php
            $data = array(

                'e1' => array(
                    "name" => "bowling",
                    "description" => "description1",
                    "ay" => "test1",
                ),

                'e2' => array(
                    "name" => "accrobranche",
                    "description" => "description2",
                    "ay" => "test2",
                ),

                'e3' => array(
                    "name" => "karting",
                    "description" => "description3",
                    "ay" => "test2",
                ),


            );
            if (isset($_GET['key']))
                var_dump($_GET['key']);

            foreach ($data as $key => $value) {
                if (isset($_POST['name']) && isset($_GET['key'])) {
                    $data[$_GET['key']]['name'] = $_POST["name"];
                    $data[$_GET['key']]['description'] = $_POST["description"];
                    $data[$_GET['key']]['ay'] = $_POST["ay"];
                }
            }

            foreach ($data as $key => $value){

                echo '<form action="viewEventsA.html.php?key='.$key.'" method="post">';
                $curl->delete('/users', 'id');

                echo '<input type="text" name="name" value="'.$value["name"].'">';
                echo '<input type="text" name="description" value="'.$value["description"].'">';
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

