<?php require_once('header.inc.php') ?>

    <div class="container-page">
        <div class="events">
            <h1>EVENTS <br><p>Our latest activities !</p></h1>
        </div>
        <div class="events-content">
            <div class="events-parent">
                <?php $data = array(
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
                ); ?>

                <?php foreach ($data as $key => $value) {
                    ?>
                    <div class="events-box">
                        <?php if(is_file('/assets/upload/'.$value['image'])){ ?>
                            <a href="<?php echo $value['link']; ?>"><img src="../assets/upload/<?php echo $value['image']; ?>" alt="events"></a><br>
                        <?php }else{ ?>
                            <a href="<?php echo $value['link']; ?>" target="_blank"><img src="../assets/upload/events.png" alt="events"></a><br><?php } ?>
                        <br>
                        <?php $value['name'] = str_replace('<em>&gt;</em>', '<i class="caret-size orange fas fa-angle-right"></i>', $value['name']);
                        echo $value['name'];?><br>
                        <p>
                            <?php
                            $value['content'] = str_replace(["&nbsp;",'<em>&gt;</em>'], [" " ,'<i class="caret-size orange fas fa-angle-right"></i>'], $value['content']);
                            $value['content'] = substr($value['content'], 0, 100);
                            echo $value['content'];
                            ?>
                            ...
                        </p>
                        <br>
                        <a href="./viewTemplateEvent.html.php?page=<?php echo $key; ?>">+ View more</a>
                    </div>
            <?php } ?>
            </div>
        </div>
    </div>

<?php require_once('footer.inc.php') ?>
<?php include_once('../cookie/cookie.php') ?>
