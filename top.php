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
            opacity: 0.8;
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
        .headerContents a{
            color: rgba(0,0,0,0.5);
        }
        .headerContents a:hover{
            color: rgba(0,0,0,1);
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

        .header{
            position: relative;
            height: 100%;
        }
        .headerLogo{
            display: none;
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
            background-color: #fff;
            margin: 0;
            padding-bottom: 50px;
        }
        .topContents{
            margin-left: 101px;
            margin-right: 101px;
            display: flex;
            justify-content: space-between;
            flex-direction: row;
        }
        .topContent{
            position: relative;
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
            box-shadow:  0 0 10px #666;
            opacity: 0.7;
        }
        #topContentIcon{
            margin-top: 25px;
            flex:3;
            width: auto;
        }
        .topContentTextArea{
            margin-bottom: 7px;
        }
        .topContentTitle{
            margin-bottom: 0;
        }
        .topContentSub{
            font-size: 11px;
        }

        .aboutUs{
            background-image: url('img/map.jpeg');
            background-color:rgba(255,255,255,0.8);
            background-blend-mode:lighten;
            background-size: cover;
            margin-top: 30px;
            padding-top: 105px;
            padding-left: 180px;
            padding-right: 180px;
            height: 605px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .aboutUsTextArea{
            padding-left: 34px;
            height: 363px;
            width: 400px;
            align-self: center;
        }
        .aboutUsTitle{
            font-size: 29px;
        }
        .post{
            font-size: 22px;
            margin-bottom: 35px;
        }
        .button01 a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
            padding: 1em 2em;
            width: 210px;
            color: rgba(0,0,0,0.6);
            font-size: 18px;
            border: 1px solid rgba(0,0,0,0.6);
        }
        .button01 a::after {
            content: '';
            width: 5px;
            height: 5px;
            border-top: 3px solid rgba(0,0,0,0.6);
            border-right: 3px solid rgba(0,0,0,0.6);
            transform: rotate(45deg);
        }
        .button01 a:hover {
            color: #333333;
            text-decoration: none;
            background-color: rgba(255,255,255,0.8);
        }
        .button01 a:hover::after {
            border-top: 3px solid rgba(0,0,0,0.6);
            border-right: 3px solid rgba(0,0,0,0.6);
        }
        .aboutUsImg{
            align-self: center;
        }

        .recomendContents01,.recomendContents02{
            height: 640px;
            padding-bottom: 30px;
            padding-right: 160px;
            padding-left: 160px;
        }
        .recomendContents01{
            margin-top: 67px;
            padding-top: 34px;
        }
        .recomendContentTitle{
            text-align: center;
        }
        .recomendContentTypeAColumn{
            margin-top: 70px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }
        .recomendContentTypeARow{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        .recomendContentTypeA{
            box-shadow: 0 0 10px rgba(0,0,0,0.6);
            opacity:0.5;
            border: 1px solid rgba(0,0,0,0.6);
            width: 350px;
            height: 241px;
            text-align: center;
            background-color: #fff;
            margin-bottom: 42px;
            position: relative;
        }
        .recomendContentTypeAImg{
            height: 151px;
        }
        .recomendContentTypeAText{
            padding-top: 20px;
        }
        .sumnailImg{
            height: 151px;
            width: 350px;
            object-fit: cover;
        }

        .recomendContents02{
            margin-top: 32px;
            background-color: #666;
        }

        .newPost01{
            height: 740px;
        }

        .footer{
            margin: 0;
            margin-bottom: 0;
            background-color: #000;
        }
    </style>
    <script src="https://kit.fontawesome.com/b2f6772b40.js" crossorigin="anonymous"></script>
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
                        echo "<div class='henderContent'><a href='$val[link]'>$val[title]</a></div>";
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
                <video id='video'poster='img/sky_00165.jpeg'webkit-playsinline playsinline muted autoplay loop>
                    <source src='img/airplane.mp4' type="video/mp4">
                </video>
            </div>
        </div>


        <div class='inner'>
            <div class='topContents'>
                        <?php
                            $array = array(
                                array(
                                    "icon" =>"'fa-solid fa-person-walking-luggage fa-4x'",
                                    "ja" => "旅行",
                                    "eng" => "trip",
                                    "link" => ""
                                ),
                                array(
                                    "icon" => "'fa-solid fa-book fa-4x'",
                                    "ja" => "留学",
                                    "eng" => "study",
                                    "link" => ""
                                ),
                                array(
                                    "icon" => "'fa-solid fa-pen-clip fa-4x'",
                                    "ja" => "心理テスト",
                                    "eng" => "test",
                                    "link" => ""
                                ),
                                array(
                                    "icon" => "'fa-solid fa-user-graduate fa-4x'",
                                    "ja" => "豆知識",
                                    "eng" => "trivia",
                                    "link" => ""
                                ),
                            );
                            foreach($array as $val){
                                echo
                                "<a href='$val[link]'>
                                    <div class='topContent'>
                                        <i id='topContentIcon'class=$val[icon]></i>
                                        <div class='topContentTextArea'>
                                            <p class='topContentTitle'>$val[ja]</p>
                                            <p class='topContentSub'>$val[eng]</p>
                                        </div>
                                    </div>
                                </a>";
                            }
                        ?>
            </div>
            <div class='aboutUs'>
                <div class='aboutUsTextArea'>
                    <h2 class='aboutUsTitle'>About us</h2>
                    <?php
                        $text = 'ooooooooooooooooooooooooooooo<br/>oooooooooooooo<br/>ooooooooooooooooooooooooooooo<br/>oooooooooooooo';
                        echo "<p class='post'>$text</p>";
                    ?>
                    <div class='button01'>
                        <a href="">私たちについて</a>
                    </div>
                </div>
                <div class='aboutUsImg'>
                </div>
            </div>
            <?php
                $category = array(
                    "category" => "Category",
                    "contents" => array(
                    array(
                        "img" => "img/sky_00165.jpeg",
                        "title" => "ooooooooooooo1",
                        "link" => ""
                    ),
                    array(
                        "img" => "img/sky_00165.jpeg",
                        "title" => "ooooooooooooo2",
                        "link" => ""
                    ),
                    array(
                        "img" => "img/sky_00165.jpeg",
                        "title" => "ooooooooooooo3",
                        "link" => ""
                    ),
                    array(
                        "img" => "img/sky_00165.jpeg",
                        "title" => "ooooooooooooo4",
                        "link" => ""
                    ),
                    array(
                        "img" => "img/sky_00165.jpeg",
                        "title" => "ooooooooooooo5",
                        "link" => ""
                    ),
                    array(
                        "img" => "img/sky_00165.jpeg",
                        "title" => "ooooooooooooo6",
                        "link" => ""
                    )));
                $arr = array($category,$category,$category,$category);
                foreach($arr as $category){
                    echo "<div class='recomendContents01'>";
                    $i=0;
                    echo "<div class='recomendContentTitle'><h4>$category[category]</h4></div>";
                    echo "<div class='recomendContentTypeAColumn'><div class='recomendContentTypeARow'>";
                    foreach($category['contents'] as $val){
                        if($i==3){
                            echo "</div><div class='recomendContentTypeARow'>";
                            $i=0;
                        }
                        echo "
                        <a href=$val[link]>
                            <div class='recomendContentTypeA'>
                                <div class='recomendContentTypeAImg'>
                                    <img class='sumnailImg'src=$val[img] alt='sumnail of post'>
                                </div>
                                <div class='recomendContentTypeAText'>
                                    <p>$val[title]$i</p>
                                </div>
                            </div>
                        </a>
                        ";
                        $i+=1;
                    };
                    echo "</div></div>";
                echo "</div>";
                }
            ?>
            <!-- <div class='recomendContents01'>
                <?php
                    $arr = array(
                        "category" => "Category",
                        "contents" => array(
                        array(
                            "img" => "img/sky_00165.jpeg",
                            "title" => "ooooooooooooo1",
                            "link" => ""
                        ),
                        array(
                            "img" => "img/sky_00165.jpeg",
                            "title" => "ooooooooooooo2",
                            "link" => ""
                        ),
                        array(
                            "img" => "img/sky_00165.jpeg",
                            "title" => "ooooooooooooo3",
                            "link" => ""
                        ),
                        array(
                            "img" => "img/sky_00165.jpeg",
                            "title" => "ooooooooooooo4",
                            "link" => ""
                        ),
                        array(
                            "img" => "img/sky_00165.jpeg",
                            "title" => "ooooooooooooo5",
                            "link" => ""
                        ),
                        array(
                            "img" => "img/sky_00165.jpeg",
                            "title" => "ooooooooooooo6",
                            "link" => ""
                        )
                        )
                        );
                        echo "<div class='recomendContentTitle'><h4>$arr[category]</h4></div>";
                        echo "<div class='recomendContentTypeAColumn'><div class='recomendContentTypeARow'>";
                        $i=0;
                        foreach($arr['contents'] as $val){
                            if($i==3){
                                echo "</div><div class='recomendContentTypeARow'>";
                                $i=0;
                            }
                            echo "
                            <a href=$val[link]>
                                <div class='recomendContentTypeA'>
                                    <div class='recomendContentTypeAImg'>
                                        <img class='sumnailImg'src=$val[img] alt='sumnail of post'>
                                    </div>
                                    <div class='recomendContentTypeAText'>
                                        <p>$val[title]$i</p>
                                    </div>
                                </div>
                            </a>
                            ";
                            $i+=1;
                        };
                        echo "</div></div>";
                ?>
            </div> -->
            <!-- <div class='recomendContents02'></div>
            <div class='newPost01'></div>
            <div class='newPost01'></div> -->
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
        $('.headerLogo').fadeIn(3000);
        $(window).scroll(function(){
            var pos = $('.aboutUs').offset();
            if($(this).scrollTop() > pos.top ) {
                $('.aboutUsTextArea').fadeIn();
            }else{
                $('.aboutUsTextArea').fadeOut();
            }
        });
        $(document).ready(function(){
            $('.recomendContentTypeA').hover(function(){
                $(this).stop(true, true).animate({ top:-2,opacity:1}, 150);
            }, function() {
                $(this).stop(true, true).animate({ top: 0,opacity:0.5}, 150);
          });
        });
        $(document).ready(function(){
            $('.topContent').hover(function(){
                $(this).stop(true, true).animate({ top:-2,opacity:1}, 150);
            }, function() {
                $(this).stop(true, true).animate({ top: 0,opacity:0.7}, 150);
          });
        });
    </script>
</body>
</html>

