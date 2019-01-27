<?php require_once('header.inc.php') ?>

    <div class="container-page">
        <div class="shop">
            <h1 id="default">
                SHOP <br>
                <form class="form-shop" action="">
                    <input class="search-shop" type="search" placeholder="Search" oninput="setupShop()" onclick="setupShop()">
                    <input class="submit-shop" id="hide" type="submit" value="GO">
                </form>
                <i class="fas fa-search" id="hide"></i>
            </h1>
        </div>
    </div>

<?php require_once('footer.inc.php') ?>

<script>

    function setupShop(){
        let myPanel = document.querySelector("h1");
        let mySubmit = document.querySelector(".submit-shop");
        let mySearch = document.querySelector(".fa-search");
        let mySb = document.querySelector(".search-shop");
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
                mySearch.setAttribute("id", "clicked-search");
            }, 3000);
        else mySearch.setAttribute("id", "hide");
        return 0;
    }
</script>
