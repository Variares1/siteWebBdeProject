<?php require_once('header.inc.php') ?>

    <?php
    $page = $_GET['page'];

    $try = $curl->getT('events','',$_SESSION["token"]);

    $data = json_decode($try, true);

//    $data = array(
//        'i1' => array(
//            'id'=>1,
//            'name'=>'lancer de nains',
//            'image'=>'idea.png',
//            'link'=>'http://google.com',
//            'content'=>"hahuhud ahahh hhh adhdh ahahahh sjs as j sjsshs shss shnshs shshsbss shshshsh shshshns sjshs sjhshs cc sssz",
//            'likes'=>12,
//        ),
//        'i2' => array(
//            'id'=>2,
//            'name'=>'tournois de pq',
//            'image'=>'events.png',
//            'link'=>'http://google.com',
//            'content'=>"hahuhud ahahh hhh adhdh ahahahh sjs as j sjsshs shss shnshs shshsbss shshshsh shshshns sjshs sjhshs cc sssz",
//            'likes'=>4,
//        ),
//    );

    $name = $data[$page]['name'];
//    $image = $data[$page]['image'];
//    $link = $data[$page]['link'];
    $content = $data[$page]['description'];
    $likes = $data[$page]['like'];

//    if ($_POST['likes'] != null){
//        $likes = $_POST["likes"];
//        $data[$page]['likes'] = $likes;
//    }

    ?>
    <title><?php echo $name; ?></title>
    <div class="container-page">
        <div class="ideas" <?php
//        if(is_file('/assets/upload/'.$image))
//            echo 'style="background-image:url(../assets/upload/'.$image.')"';
//        else
            echo 'style="background-image:url(../assets/upload/ideas.jpg)"';
        ?>>
            <h1><?php echo $name; ?></h1>
            <label for="likes-button">
            <i class="fas fa-heart" ></i>
            </label>
            <input id="likes-button" type="button" value="<?php echo $likes; ?>" onclick="heart()">
        </div>
        <div class="events-content">
            <p1><?php echo $content; ?></p1>
        </div>
    </div>

<?php require_once('footer.inc.php') ?>
<?php include_once('../cookie/cookie.php') ?>

<script>

    let likes = <?php echo $likes; ?>;

    function heart(){
        let myHeart = document.querySelector(".ideas > label > i");
        let myButton = document.getElementById('likes-button');
        let toPrint = "";
        if(myHeart.id!="clicked-heart"){
            myHeart.setAttribute("id", "clicked-heart");
            likes+=1;
            toPrint = likes;
        }
        else {
            myHeart.setAttribute("id", "");
            likes-=1;
            toPrint = likes;
        }
        myButton.value = toPrint;
        return 0;
    }
</script>
