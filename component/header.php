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
                z-index: 1;
            }
        .headerLogoFixHide{
                padding-right: 200px;
                margin-top: 16px;
        }
        .globalMenuSp{
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
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
            margin-left: 3vw;
        }
        .headerContentsHide a{
            color: rgba(0,0,0,0.5);
        }
        .headerContentsHide a:hover{
            color: rgba(0,0,0,1);
        }
    }
    @media screen and (max-width: 769px){
        .headerContentsHide{
                z-index : 3;
                opacity: 0.8;
                position: fixed;
                top:0;
                width: 100%;
                background-color: #fff;
                height: 53px;
                text-align: center;
            }
            .hamburger {
                display : block;
                position: fixed;
                z-index : 3;
                right : 20px;
                top   : 10px;
                width : 42px;
                height: 42px;
                cursor: pointer;
                text-align: center;
            }
            span {
                display : block;
                position: absolute;
                width   : 30px;
                height  : 2px ;
                left    : 6px;
                background : #BBBBBB;
                -webkit-transition: 0.3s ease-in-out;
                -moz-transition   : 0.3s ease-in-out;
                transition        : 0.3s ease-in-out;
            }
            span:nth-child(1) {
                top: 10px;
            }
            span:nth-child(2) {
                top: 20px;
            }
            span:nth-child(3) {
                top: 30px;
            }
            .hamburger.active span:nth-child(1) {
            top : 16px;
            left: 6px;
            background :#fff;
            -webkit-transform: rotate(-45deg);
            -moz-transform   : rotate(-45deg);
            transform        : rotate(-45deg);
            }

            .hamburger.active span:nth-child(2),
            .hamburger.active span:nth-child(3) {
            top: 16px;
            background :#fff;
            -webkit-transform: rotate(45deg);
            -moz-transform   : rotate(45deg);
            transform        : rotate(45deg);
            }

            /* メニュー背景　*/
            nav.globalMenuSp {
            position: fixed;
            z-index : 2;
            top  : 0;
            left : 0;
            color: #fff;
            background: rgba( 71,70,73,0.9 );
            text-align: center;
            width: 100%;
            height: 100%;
            transform: translateX(-100%);
            transition: all 0.6s;
            }

            nav.globalMenuSp ul {
            margin: 0 auto;
            padding: 0;
            width: 100%;
            }

            nav.globalMenuSp ul li {
            list-style-type: none;
            padding: 0;
            width: 100%;
            transition: .4s all;
            }
            nav.globalMenuSp ul li:last-child {
            padding-bottom: 0;
            }
            nav.globalMenuSp ul li:hover{
            background :#ddd;
            }

            nav.globalMenuSp ul li a {
            display: block;
            color: #fff;
            padding: 1em 0;
            text-decoration :none;
            }

            /* クリックでjQueryで追加・削除 */
            nav.globalMenuSp.active {
            opacity: 100;
            display: block;
            transform: translateX(0%);
            }
            .headerLogoFixHide{
                padding-right: 200px;
                margin-top: 16px;
            }
            .headerContents{
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
            a{
                text-align: center;
                color: rgba(0,0,0,0.4);
                text-decoration: none;
            }
            a :hover{
                color: rgba(0,0,0,0.9);
                text-decoration: none;
            }
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
                    "link" => "trip"
                ),
                array(
                    "title" => "留学",
                    "link" => "study"
                ),
                array(
                    "title" => "心理テスト",
                    "link" => "test"
                ),
                array(
                    "title" => "マイル",
                    "link" => "mile"
                ));
            echo "<div class='headerContents'>";
            foreach($arr as $val):
        ?>
            <div class='henderContent'>
                <a href='<?= $val["title"]==="HOME"?"top.php":"list.php?category=$val[link]"?>'><?=$val["title"]?></a>
            </div>
        <?php endforeach;?>
        </div>
    </div>

<header>
    <div class='headerContentsHide'>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <h4 class='headerLogoFixHide'>Logo text</h4>
        <nav class='globalMenuSp'>
            <?php
                $array = array(
                    array(
                        "title" => "HOME",
                        "link" => "top.php"
                    ),
                    array(
                        "title" => "旅情報",
                        "link" => "trip"
                    ),
                    array(
                        "title" => "留学",
                        "link" => "study"
                    ),
                    array(
                        "title" => "心理テスト",
                        "link" => "test"
                    ),
                    array(
                        "title" => "マイル",
                        "link" => "mile"
                    ));
                    foreach($array as $val):
            ?>
                <div class='henderContentHide'><a href='<?= $val["title"]==="HOME"?"top.php":"list.php?category=$val[lint]"?>'><?=$val["title"]?></a></div>
            <?php endforeach;?>
                    </nav>
    </div>
</header>

<script>
    var windowSize = $(window).width();
    if (windowSize < 768) {
        $('.header').hide();
        $(function() {
            $('.hamburger').click(function() {
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) {
                    $('.globalMenuSp').addClass('active');
                } else {
                    $('.globalMenuSp').removeClass('active');
                    }

                });
        });
        //メニュー内を閉じておく
        $(function() {
            $('.globalMenuSp a[href]').click(function() {
                $('.globalMenuSp').removeClass('active');
            $('.hamburger').removeClass('active');

            });
        });
    } else {
        $('header').hide();
        $(window).scroll(function () {
            var pos = $('.header').offset();
                if ($(this).scrollTop() > pos.top) {
                    $('header').fadeIn();
                } else {
                    $('header').fadeOut();
                }
            });
    }


</script>
