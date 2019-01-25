

<div class="container-page">
    <div class="events">
        <h1>IDEAS <br><p>BOUX BOUX IDEA</p></h1>
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
                "name" => "karting",
                "description" => " .....",
                "ay" => "ohohohoho",
            ),

            $e2 = array(
                "name" => "yolo",
                "description" => " .....",
                "ay" => "ohohohoho",
            ),


        );

        foreach ($data as $i => $value){


            echo '<input type="text" value="'.$value["name"].'">';
            echo '<input type="text" value="'.$value["description"].'">';

            echo "<br>";

        };

        ?>

        <ul>



            <input type="button" value="apply" onclick=""><br><br>

            <a href="http://localhost/siteWebBdeProject/admin/indexA.html.php">Back to Index</a><br><br>


        </ul>
    </div>

