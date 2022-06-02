<style>
    @media screen and (min-width: 769px){
        .header{
            background-color: #9EF26A;
            height: 164px;
        }
        h2{
            text-align: center;
            margin-top: 0;
            font-size: 42px;
            padding-top: 28px;
            margin-bottom: 43px;
        }
        .headerContents a{
            color: rgba(0,0,0,0.4);
            text-decoration: none;
        }
        .headerContents a:hover{
            color: rgba(0,0,0,1);
            text-decoration: none;
        }
        .headerContents{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .headerContent{
            text-align: center;
        }

        header{
                opacity: 0.8;
                position: fixed;
                top:0;
                width: 100%;
                background-color: #fff;
                height: 53px;
            }
        .headerLogoFixHide{
                padding-right: 200px;
                margin-top: 16px;
        }
        .headerContentsHide{
            margin-left: 15vw;
            margin-right: 15vw;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .henderContentHide{
            margin-top: 16px;
            border-width: thick;
        }
        .headerContentsHide a{
            color: rgba(0,0,0,0.5);
        }
        .headerContentsHide a:hover{
            color: rgba(0,0,0,1);
        }
    }
    @media screen and (max-width: 769px){
    }
</style>

    <div class='header'>
        <?php
            $logo = 'Logo text';
            echo "<h2>$logo</h2>";
            $arr = array(
                array(
                    "title" => "HOME",
                    "link" => "top.php"
                ),
                array(
                    "title" => "旅情報",
                    "link" => ""
                ),
                array(
                    "title" => "留学",
                    "link" => "list.php"
                ),
                array(
                    "title" => "心理テスト",
                    "link" => ""
                ),
                array(
                    "title" => "マイル",
                    "link" => ""
                ));
            echo "<div class='headerContents'>";
            foreach($arr as $val){
                echo "<div class='henderContent'><a href='$val[link]'>$val[title]</a></div>";
            };
            echo "</div>";
        ?>
    </div>

<header>
    <div class='headerContentsHide'>
        <h4 class='headerLogoFixHide'>Logo text</h4>
            <?php
                $array = array(
                    array(
                        "title" => "HOME",
                        "link" => "top.php"
                    ),
                    array(
                        "title" => "旅情報",
                        "link" => ""
                    ),
                    array(
                        "title" => "留学",
                        "link" => "list.php"
                    ),
                    array(
                        "title" => "心理テスト",
                        "link" => ""
                    ),
                    array(
                        "title" => "マイル",
                        "link" => ""
                    ));
                    foreach($array as $val){
                        echo "<div class='henderContentHide'><a href='$val[link]'>$val[title]</a></div>";
                    }
            ?>
    </div>
</header>

<script>
$('header').hide();
$(window).scroll(function () {
    var pos = $('.header').offset();
        if ($(this).scrollTop() > pos.top) {
            $('header').fadeIn();
        } else {
            $('header').fadeOut();
        }
    });

</script>
