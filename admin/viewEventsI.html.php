

<div class="container-page">
    <div>
        <h1>Idee to Event <br></h1>
    </div>
    <div class="change-event">
        <!-- <img src="D:\EXIA\A2\prosit 2.4\site\assets\img\logo2.png" alt="logo" class="logo"/>
 -->
        <?php
        $data = array(

            'e1' => array(
                "name" => "Laser game",
                "description" => "Fun & sports",
                "date" => "30/01/2019",
                "place" => "Aix en Provence",
                "like" => "10",
                "price" => "10€",
                "dplace" => "5",
            ),

           'e2' => array(
                "name" => "Bowling",
                "description" => "You must be the best",
                "date" => "25/02/2019",
                "place" => "Plan ce Campagne",
                "like" => "15",
                "price" => "8€",
                "dplace" => "25"
            ),
        );
        if (isset($_GET['key']))
            var_dump($_GET['key']);

        foreach ($data as $key => $value) {
            if (isset($_POST['name']) && isset($_GET['key'])) {
                $data[$_GET['key']]['name'] = $_POST["name"];
                $data[$_GET['key']]['description'] = $_POST["description"];
                $data[$_GET['key']]['place'] = $_POST["place"];
                $data[$_GET['key']]['date'] = $_POST["date"];
                $data[$_GET['key']]['like'] = $_POST["like"];
                $data[$_GET['key']]['price'] = $_POST["price"];
                $data[$_GET['key']]['dplace'] = $_POST["dplace"];
            }
        }

        foreach ($data as $key => $value){

            echo '<form action="viewEventsI.html.php?key='.$key.'" method="post">';

            echo '<input type="text" name="name" value="'.$value["name"].'">';
            echo '<input type="text" name="description" value="'.$value["description"].'">';
            echo '<input type="text" name="date" value="'.$value["date"].'">';
            echo '<input type="text" name="place" value="'.$value["place"].'">';
            echo '<input type="text" name="like" value="'.$value["like"].'">';
            echo '<input type="text" name="price" value="'.$value["price"].'">';
            echo '<input type="text" name="dplace" value="'.$value["dplace"].'">';
            echo "<br>";
            echo "<input type='submit' value='apply'>";

            echo'</form>';

        };

        ?>
        <ul>


            <a href="http://localhost/Admin/admin/indexA.html.php">Back to Index</a><br><br>


        </ul>
    </div>

