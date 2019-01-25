

<div class="container-page">
    <div class="events">
        <h1>USERS<br><p>ID USERS</p></h1>
    </div>
    <div class="change-event">
        <!-- <img src="D:\EXIA\A2\prosit 2.4\site\assets\img\logo2.png" alt="logo" class="logo"/>
 -->
        <?php
        $ev = "";
        $idea = "";
        $comm = "";
        $art = "";

        $data = array(

            $e1 = array(
                "firstName" => "Zoro",
                "lastName" => "Roronora",
                "ay" => "ohohohoho",
            ),

            $e2 = array(
                "firstName" => "yolo",
                "lastName" => "swag",
                "ay" => "ohohohoho",
            ),


        );

        foreach ($data as $i => $value){


            echo '<input type="text" value="'.$value["firstName"].'">';
            echo '<input type="text" value="'.$value["lastName"].'">';

            echo "<br>";

        };

        ?>

        <ul>



            <input type="button" value="apply" onclick=""><br><br>

            <a href="http://localhost/siteWebBdeProject/admin/indexA.html.php">Back to Index</a><br><br>


        </ul>
    </div>

