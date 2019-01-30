<?php require_once('header.inc.php') ?>

<?php
$page = $_GET['page'];

$try = $curl->get('products/common');

$data = json_decode($try, true);

$name = $data[$page]['name'];
//    $image = $data[$page]['image'];
//    $link = $data[$page]['link'];
$content = $data[$page]['description'];
$likes = $data[$page]['price'];

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
    echo 'style="background-image:url(../assets/upload/item.jpg);background-color: aquamarine;"';
    ?>>
        <h1><?php echo $name; ?></h1>
        <input id="likes-button" type="button" value="<?php echo $likes; ?> €"">
    </div>
    <div class="events-content">
        <p1><?php echo $content; ?></p1>
    </div>
</div>

<?php require_once('footer.inc.php') ?>
<?php include_once('../cookie/cookie.php') ?>
