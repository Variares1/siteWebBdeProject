<?php require_once('header.inc.php') ?>

    <div class="container-page">
        <div class="ideas">
            <h1>
                IDEAS BOX
                <br>
                <p>Your purposes, your votes, your project : our project !</p>
            </h1>
        </div>
        <div class="events-content">
            <div class="events-parent">
                <?php $data = array(
                    'i1' => array(
                        'id'=>1,
                        'name'=>'lancer de nains',
                        'image'=>'idea.png',
                        'link'=>'http://google.com',
                        'content'=>"hahuhud ahahh hhh adhdh ahahahh sjs as j sjsshs shss shnshs shshsbss shshshsh shshshns sjshs sjhshs cc sssz",
                    ),
                    'i2' => array(
                        'id'=>2,
                        'name'=>'tournois de pq',
                        'image'=>'events.png',
                        'link'=>'http://google.com',
                        'content'=>"hahuhud ahahh hhh adhdh ahahahh sjs as j sjsshs shss shnshs shshsbss shshshsh shshshns sjshs sjhshs cc sssz",
                    ),
                ); ?>

                <?php foreach ($data as $key => $value) {
                    ?>
                    <div class="events-box">
                        <?php if(is_file('/assets/upload/'.$value['image'])){ ?>
                            <a href="<?php echo $value['link']; ?>"><img src="../assets/upload/<?php echo $value['image']; ?>" alt="ideas"></a><br>
                        <?php }else{ ?>
                            <a href="<?php echo $value['link']; ?>" target="_blank"><img src="../assets/upload/ideas.jpg" alt="ideas"></a><br><?php } ?>
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
                        <a href="./viewTemplateIdea.html.php?page=<?php echo $key; ?>">+ View more</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php require_once('footer.inc.php') ?>