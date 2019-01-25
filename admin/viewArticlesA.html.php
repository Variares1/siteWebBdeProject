

<div class="container-page">
    <div class="events">
        <h1>ATICLES<br><p>ATICLES SHOP</p></h1>
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
                "name" => "OreoZ",
                "description" => "biscuits bons",
                "ay" => "ohohohoho",
            ),

            $e2 = array(
                "name" => "T-Shirt Exia",
                "description" => "T-shirt rouge et pas très original mais sympa",
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

