<?php require_once('header.inc.php') ?>

    <?php
    $page = $_GET['page'];

    $data = array(
        'i1' => array(
            'id'=>1,
            'name'=>'lancer de nains',
            'image'=>'idea.png',
            'link'=>'http://google.com',
            'content'=>"hahuhud ahahh hhh adhdh ahahahh sjs as j sjsshs shss shnshs shshsbss shshshsh shshshns sjshs sjhshs cc sssz",
            'likes'=>12,
        ),
        'i2' => array(
            'id'=>2,
            'name'=>'tournois de pq',
            'image'=>'events.png',
            'link'=>'http://google.com',
            'content'=>"hahuhud ahahh hhh adhdh ahahahh sjs as j sjsshs shss shnshs shshsbss shshshsh shshshns sjshs sjhshs cc sssz",
            'likes'=>4,
        ),
    );

    $name = $data[$page]['name'];
    $image = $data[$page]['image'];
    $link = $data[$page]['link'];
    $content = $data[$page]['content'];
    ?>
    <title><?php echo $name; ?></title>
    <div class="container-page">
        <div class="ideas" <?php
        if(is_file('/assets/upload/'.$image))
            echo 'style="background-image:url(../assets/upload/'.$image.')"';
        else
            echo 'style="background-image:url(../assets/upload/ideas.jpg)"';
        ?>>
            <h1><?php echo $name; ?></h1>
            <i class="fas fa-heart" onclick="heart()"></i>
        </div>
        <div class="events-content">
            <p1><?php echo $content; ?></p1>
        </div>
    </div>

<?php require_once('footer.inc.php') ?>

<script>
    function heart(){
        let myHeart = document.querySelector(".ideas > i");
        if(myHeart.id!="clicked-heart"){
            myHeart.setAttribute("id", "clicked-heart");
        }
        else myHeart.setAttribute("id", "");
        return 0;
    }
</script>
