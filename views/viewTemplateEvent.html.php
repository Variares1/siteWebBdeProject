<?php require_once('header.inc.php') ?>

    <?php
        $page = $_GET['page'];

        $data = array(
            'e1' => array(
                'id'=>1,
                'name'=>'karting',
                'image'=>'events.png',
                'link'=>'http://google.com',
                'content'=>"c'était génial wow",
            ),
            'e2' => array(
                'id'=>2,
                'name'=>'aqua poney',
                'image'=>'events.png',
                'link'=>'http://google.com',
                'content'=>"c'était encore + génial wow",
            ),
            'e3' => array(
                'id'=>3,
                'name'=>'leek wars',
                'image'=>'events.png',
                'link'=>'http://google.com',
                'content'=>"c'était encore encore + génial wow",
            ),
            'e4' => array(
                'id'=>4,
                'name'=>'bouteille',
                'image'=>'events.png',
                'link'=>'http://google.com',
                'content'=>"c'était encore encore encore + génial wow",
            ),
        );

        $name = $data[$page]['name'];
        $image = $data[$page]['image'];
        $link = $data[$page]['link'];
        $content = $data[$page]['content'];
    ?>
    <title><?php echo $name; ?></title>
    <div class="container-page">
        <div class="events" <?php
        if(is_file('/assets/upload/'.$image))
            echo 'style="background-image:url(../assets/upload/'.$image.')"';
        else
            echo 'style="background-image:url(../assets/upload/events.png)"';
        ?>>
            <h1><?php echo $name; ?></h1>
        </div>
        <div class="events-content">
            <p1><?php echo $content; ?></p1>
        </div>
    </div>

<?php require_once('footer.inc.php') ?>
<?php include_once('../cookie/cookie.php') ?>
