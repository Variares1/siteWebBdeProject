

    <div class="container-page">
        <div class="events">
            <h1>EVENTS <br><p>Our last activities !</p></h1>
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
                        "Event" => $ev,
                        "Idea" => $idea,
                        "commentaire" => $comm,
                        "article" => $art,

                );

                var_dump($data);

                $ideas = "http://localhost/siteWebBdeProject/views/viewIdeas.html.php";
                $events = "http://localhost/siteWebBdeProject/views/viewEvents.html.php";
                $shop = "http://localhost/siteWebBdeProject/views/viewShop.html.php";
                $sign = "http://localhost/siteWebBdeProject/views/viewSign.html.php";
            ?>

            <ul>

                <button> <a href = "http://localhost/siteWebBdeProject/admin/viewCSV.html.php">CréerCSV</a></button><br><br>

                <a href="http://localhost/siteWebBdeProject/admin/viewEventsA.html.php">Modifier Events</a><br><br>

                <a href="http://localhost/siteWebBdeProject/admin/viewArticlesA.html.php">Modifier Articles</a><br><br>

                <a href="http://localhost/siteWebBdeProject/admin/viewIdeasA.html.php">Modifier Ideas</a><br><br>

                <a href="http://localhost/siteWebBdeProject/admin/viewUsersA.html.php">Modifier Users</a><br><br>

            </ul>
    </div>

