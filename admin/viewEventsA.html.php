

    <div class="container-page">
        <div class="events">
            <h1>EVENTS <br><p>Our lastest activities !</p></h1>
        </div>
        <div class="change-event">
            <!-- <img src="D:\EXIA\A2\prosit 2.4\site\assets\img\logo2.png" alt="logo" class="logo"/>
     -->
            <?php
            $data = array(

                'e1' => array(
                    "name" => "bowling",
                    "description" => " .....",
                    "ay" => "ohohohoho",
                ),

                'e2' => array(
                    "name" => "accrobranche",
                    "description" => " .....",
                    "ay" => "ohohohoho",
                ),


            );

            if ($_POST['name'] != null){
                $name = $_POST["name"];
                $data['e1']['name'] = $name;
            }

                foreach ($data as $i => $value){

                    echo '<form action="" method="post">';

                    echo '<input type="text" name="name" value="'.$value["name"].'">';
                    echo "<br>";

                    echo "<input type='submit' value='apppppply'>";

                    echo'</form>';
                };

            ?>

            <ul>



                <input type="button" value="apply" onclick=""><br><br>

                <a href="http://localhost/siteWebBdeProject/admin/indexA.html.php">Back to Index</a><br><br>


            </ul>
    </div>

