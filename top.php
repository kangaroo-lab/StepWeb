<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StepTop</title>
    <style type="text/css">
        body,html{
            height: 100%;
        }
        p,h3{
            margin: 0;
        }
        body{
            margin: 0;
            padding: 0;
        }

        header{
            position: fixed;
            top:0;
            width: 100%;
            background-color: #fff;
            height: 53px;
        }
        .headerLogoFix{
            padding-right: 200px;
            margin-top: 16px;
            width: 200px;
        }
        .headerContents{
            margin-left: 210px;
            margin-right: 210px;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .henderContent{
            margin-top: 16px;
            width: 200px;
            border-width: thick;
        }
        .headerContentText{
            text-align: center;
        }

        .header{
            position: relative;
            height: 100%;
        }
        .headerLogo{
            /*要素の配置*/
            position:absolute;
            /*要素を天地中央寄せ*/
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
            /*見た目の調整*/
            color:#fff;
            text-shadow: 0 0 15px #666;
        }
        .videoArea{
            position: fixed;
            z-index: -1;/*最背面に設定*/
            top: 0;
            right:0;
            left:0;
            bottom:0;
            overflow: hidden;
        }
        #video{
            /*天地中央配置*/
            position: absolute;
            z-index: -1;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /*縦横幅指定*/
            width: 177.77777778vh; /* 16:9 の幅→16 ÷ 9＝ 177.77% */
            height: 56.25vw; /* 16:9の幅 → 9 ÷ 16 = 56.25% */
            min-height: 100%;
            min-width: 100%;
        }

        .inner{
            z-index: 1;
            height: 100%;
            background-color: #fff;
            margin: 0;
        }
        .img{
            margin: 0;
            height: 423px;
            width: 100%;
            object-fit: cover;
        }
        .topContents{
            margin-left: 101px;
            margin-right: 101px;
            display: flex;
            justify-content: space-between;
            flex-direction: row;
        }
        .topContent{
            width: 280px;
            height: 174px;
            margin-top: 48px;
            border-style: solid;
            border-radius: 44px;
            border-width: 1px;
            border-color: lightgray;
            text-align: center;
            display: flex;
            flex-direction: column;
            box-shadow:  0 0 10px lightblue;
        }
        .topContentIcon{
            flex:5;
            width: auto;
        }
        .topContentTitle{
            margin-bottom: 0;
        }
        .topContentSub{
            font-size: 11px;
        }
        .footer{
            margin: 0;
            background-color: #000;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
        <header>
            <div class='headerContents'>
                <h4 class='headerLogoFix'>Logo text</h4>
                <?php
                $array = array(
                    array(
                        "title" => "HOME",
                        "link" => ""
                    ),
                    array(
                        "title" => "旅情報",
                        "link" => ""
                    ),
                    array(
                        "title" => "留学",
                        "link" => ""
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
                        echo "<div class='henderContent'><p class='headerContentText'>$val[title]</p></div>";
                    }
                ?>
            </div>
        </header>

        <div class='header'>
            <?php
                $img = 'Logo Title';
                echo "<h1 class='headerLogo'>$img</h1>";
            ?>
            <div class='videoArea'>
                <video id='video'poster='sky_00165.jpeg'webkit-playsinline playsinline muted autoplay loop>
                    <source src='airplane.mp4' type="video/mp4">
                </video>
            </div>
        </div>


        <div class='inner'>
            <div class='topContents'>
                        <?php
                            $array = array(
                                array(
                                    "ja" => "旅行",
                                    "eng" => "trip",
                                    "link" => ""
                                ),
                                array(
                                    "ja" => "留学",
                                    "eng" => "study",
                                    "link" => ""
                                ),
                                array(
                                    "ja" => "心理テスト",
                                    "eng" => "test",
                                    "link" => ""
                                ),
                                array(
                                    "ja" => "豆知識",
                                    "eng" => "trivia",
                                    "link" => ""
                                ),
                            );
                            foreach($array as $val){
                                echo
                                "<div class='topContent'>
                                    <p class='topContentIcon'>Icon</p>
                                    <div class='topContentTextArea'>
                                        <p class='topContentTitle'>$val[ja]</p>
                                        <p class='topContentSub'>$val[eng]</p>
                                    </div>
                                </div>";
                            }
                        ?>
            </div>
            <div class='aboutUs'>
                <div class='aboutUsTextArea'>
                    <h2 class='aboutUsTitle'>About us</h2>
                    <?php
                        $text = 'ooooooooooooooooooooooooooooo<br/>oooooooooooooo';
                        echo "<p class=`post`>$text</p>";
                    ?>
                    <button type='button'>私たちについて</button>
                </div>
                <div class='aboutUsImg'>
                    <p>ImgArea</p>
                </div>
            </div>
            <div class='recomendContents'></div>
        </div>


        <div class='footer'>
            <h3>LOGO</h3>
            <?php
                $arr = array(
                    array(
                        "title" => "HOME",
                        "link" => ""
                    ),
                    array(
                        "title" => "About Us",
                        "link" => ""
                    ),
                    array(
                        "title" => "contact",
                        "link" => ""
                    ),
                    array(
                        "title" => "色々",
                        "link" => ""
                    ),
                );
                foreach($arr as $val){
                    echo "<p class footerText>$val[title]</p>";
                };
            ?>
        </div>
    <script>
        $(window).scroll(function () {
            var pos = $('.inner').offset();
            if ($(this).scrollTop() > pos.top) {
                $('header').fadeIn();
            } else {
                $('header').fadeOut();
            }
        });
    </script>
</body>
</html>

