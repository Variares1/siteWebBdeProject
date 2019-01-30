<?php require_once('header.inc.php') ?>

    <?php
        $try = $curl->get('products/common');

        $data = json_decode($try, true);
    ?>

    <div class="container-page">
        <div class="shop">
            <h1 id="default">
                SHOP <br>
                <form class="form-shop" action="">
                    <input class="search-shop" type="search" placeholder="Search" oninput="setupShop()" onclick="setupShop()">
                    <input class="submit-shop" id="hide" type="submit" value="GO">
                </form>
                <div class="items" id="hide">
                <?php

                    foreach ($data as $key => $value){
                        echo '<div class="item">';
                        echo $value['name'];
                        echo '<br><p>Description :';
                        echo $value['description'].'</p>';
                        echo '<br><p>Price :';
                        echo $value['price'].' €</p>';
                        echo '<br>';
                        echo '</div>';

                    }

                ?>
                </div>

                <i class="fas fa-search" id="hide"></i>
            </h1>
        </div>
    </div>

<?php require_once('footer.inc.php') ?>
<?php include_once('../cookie/cookie.php') ?>

<script>

    function setupShop(){
        let myPanel = document.querySelector("h1");
        let mySubmit = document.querySelector(".submit-shop");
        let mySearch = document.querySelector(".fa-search");
        let mySb = document.querySelector(".search-shop");
        let myItems = document.querySelector(".items");
        if(myPanel.id=="default"){
            myPanel.setAttribute("id", "clicked-panel");
            setTimeout(function(){
                mySubmit.setAttribute("id", "show");
                setTimeout(function(){
                    mySubmit.setAttribute("id", "clicked-submit");
                }, 1000);
            }, 3000);

        }
        if (mySb.value == '')
            setTimeout(function(){
                myItems.setAttribute("id", "hide");
                mySearch.setAttribute("id", "clicked-search");
            }, 3000);
        else {
            mySearch.setAttribute("id", "hide");
            myItems.setAttribute("id", "showFlex");
        }
        return 0;
    }
</script>
