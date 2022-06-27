<?php
    try{
        $hostname = 'us-cdbr-east-05.cleardb.net';
        $username = 'b530282c668619';
        $password = '96009105';
        $default = 'heroku_410d64a133afea6';
        $pdo = new PDO(
            // ホスト名、データベース名
            'mysql:host='.$hostname.';dbname=Tables;',
            // ユーザー名
            $username,
            // パスワード
            $password,
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );

        $stmt = $pdo -> prepare('SELECT * FROM posts');
        $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }finally {
        $pdo = null;
    }

    $title = 'My Site Top';
    $description = '説明（トップページ）: ステップが行うwebサイトのHPこそこれだよ！！';
    $is_home = true; //トップページの判定用の変数
    include '../component/head.php';
?>
    <style type="text/css">

        body,html{
            height: 100vh;
        }
        p,h3{
            margin: 0;
        }
        body{
            margin: 0;
            padding: 0;
        }
        /* デスクトップ */
        @media screen and (min-width: 769px) {
            header{
                opacity: 0.8;
                position: fixed;
                top:0;
                width: 100%;
                background-color: #fff;
                height: 53px;
                z-index: 1;
            }
            .headerLogoFix{
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
            .henderContent{
                margin-top: 16px;
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
                width: 100%;
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

            /* top contents */
            .inner{
                z-index: 1;
                background-color: #fff;
                margin: 0;
                padding-bottom: 50px;
            }
            .topContents{
                margin-left: 8.5vh;
                margin-right: 8.5vh;
                display: flex;
                justify-content: center;
                flex-direction: row;
            }
            .topContentsRow{
                display: flex;
                flex-direction: row;
            }

            .topContent{
                margin-left: 2vw;
                position: relative;
                width: 35vh;
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

            /* aboutUs */
            .aboutUs{
                background-image: url('../img/map.jpeg');
                background-color:rgba(255,255,255,0.8);
                background-blend-mode:lighten;
                background-size: cover;
                margin-top: 30px;
                padding-top: 10vh;
                padding-left: 18vh;
                padding-right: 18vh;
                height: 80vh;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
            .aboutUsTextArea{
                margin-top: 5vh;
                padding-left: 34px;
                height: 70vh;
                width: 60vh;
            }
            .aboutUsTitle{
                font-size: 5vh;
            }
            .post{
                font-size: 3vh;
                margin-bottom: 35px;
                word-break:break-word;
            }
            .button01 a {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 0 auto;
                padding: 1em 2em;
                width: 25vh;
                color: rgba(0,0,0,0.6);
                font-size: 2vh;
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
                height: 80vh;
                padding-bottom: 30px;
                padding-right: 10vw;
                padding-left: 10vw;
            }
            .recomendContents01{
                margin-top: 67px;
                padding-top: 34px;
            }
            .recomendContentTitle{
                text-align: center;
                word-break:break-word;
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
                width: 24.3vw;
                height: 30vh;
                text-align: center;
                background-color: #fff;
                margin-bottom: 42px;
                position: relative;
            }
            .recomendContentTypeAText{
                padding-top: 2vh;
                word-break:break-word;
            }
            .sumnailImg{
                height: 20vh;
                width: 24.3vw;
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
                height: 143px;
            }
            .footerLogo{
                font-size: 26px;
                padding-top: 23px;
                padding-bottom: 20px;
                color:#fff;
                text-align: center;
            }
            .footerTextArea{

                display: flex;
                flex-direction: row;
                justify-content: space-around;
            }
            .footerTextArea a{
                color:#fff;
                text-align: center;
            }

            }

        /* スマホ画面 */
        @media screen and (max-width: 769px){
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
            }
            .headerContents{
                margin-left: 15vw;
                margin-right: 15vw;
                display: flex;
                flex-direction: row;
                justify-content: space-around;
            }
            .henderContent{
                margin-top: 16px;
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

            /* top contents */
            .inner{
                z-index: 1;
                background-color: #fff;
                margin: 0;
                padding-bottom: 50px;
            }
            .topContents{
                margin-left: 8.5vh;
                margin-right: 8.5vh;
                display: flex;
                justify-content: space-between;
                flex-direction: column;
            }
            .topContentsRow{
                display: flex;
                flex-direction: row;
                justify-content: space-around;
            }
            .topContent{
                position: relative;
                width: 20vh;
                height: 20vh;
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

            /* aboutUs */
            .aboutUs{
                background-image: url('../img/map.jpeg');
                background-color:rgba(255,255,255,0.8);
                background-blend-mode:lighten;
                background-size: cover;
                margin-top: 30px;
                padding-top: 10vh;
                padding-left: 18vh;
                padding-right: 18vh;
                height: 80vh;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
            .aboutUsTextArea{
                padding-left: 34px;
                height: 80vh;
                width: 40vh;
            }
            .aboutUsTitle{
                font-size: 5vh;
            }
            .post{
                font-size: 3vh;
                margin-bottom: 35px;
            }
            .button01 a {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 0 auto;
                padding: 1em 2em;
                width: 25vh;
                color: rgba(0,0,0,0.6);
                font-size: 2vh;
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
                height: 80vh;
                padding-bottom: 30px;
                padding-right: 10vw;
                padding-left: 10vw;
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
                width: 24.3vw;
                height: 30vh;
                text-align: center;
                background-color: #fff;
                margin-bottom: 42px;
                position: relative;
            }
            .recomendContentTypeAText{
                padding-top: 2vh;
            }
            .sumnailImg{
                height: 20vh;
                width: 24.3vw;
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
                height: 143px;
            }
            .footerLogo{
                font-size: 26px;
                padding-top: 23px;
                padding-bottom: 20px;
                color:#fff;
                text-align: center;
            }
            .footerTextArea{

                display: flex;
                flex-direction: row;
                justify-content: space-around;
            }
            .footerTextArea a{
                color:#fff;
                text-align: center;
            }
            }
    </style>
</head>
<body>
        <header>
            <div class='headerContents'>
                <h4 class='headerLogoFix'>Logo text</h4>
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
                    <div class='henderContent'>
                        <a href='<?= $val["title"]==="HOME"?"top.php":"list.php?category=$val[link]"?>'><?=$val["title"]?></a>
                    </div>
                <?php endforeach;?>
            </div>
        </header>

        <div class='header'>
            <?php
                $img = 'Logo Title';
                echo "<h1 class='headerLogo'>$img</h1>";
            ?>
            <div class='videoArea'>
                <video id='video'poster='../img/sky_00165.jpeg'webkit-playsinline playsinline muted autoplay loop>
                    <source src='../img/airplane.mp4' type="video/mp4">
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
                                    "link" => "trip"
                                ),
                                array(
                                    "icon" => "'fa-solid fa-user-graduate fa-4x'",
                                    "ja" => "留学",
                                    "eng" => "study",
                                    "link" => "study"
                                ),
                                array(
                                    "icon" => "'fa-solid fa-pen-clip fa-4x'",
                                    "ja" => "心理テスト",
                                    "eng" => "test",
                                    "link" => "test"
                                ),
                                array(
                                    "icon" => "'fa-solid fa-book fa-4x'",
                                    "ja" => "豆知識",
                                    "eng" => "trivia",
                                    "link" => "trivia"
                                ),
                            );
                            $i = 0;
                        ?>
                        <div class = 'topContentsRow'>
                        <?php foreach($array as $val):?>
                            <?php if($i==2):?>
                                </div>
                                <div class = 'topContentsRow'>
                            <?php endif;?>
                            <a href="list.php?category=<?=$val["link"]?>">
                                <div class='topContent'>
                                    <i id='topContentIcon'class=<?=$val["icon"]?>></i>
                                    <div class='topContentTextArea'>
                                        <p class='topContentTitle'><?=$val["ja"]?></p>
                                        <p class='topContentSub'><?=$val["eng"]?></p>
                                    </div>
                                </div>
                            </a>
                        <?php $i+=1;endforeach;?>
                        </div>
            </div>
            <div class='aboutUs'>
                <div class='aboutUsTextArea'>
                    <h2 class='aboutUsTitle'>About us</h2>
                    <div class='postView'>
                        <?php
                            $text = 'ooooooooooooooooooooooooooooo<br/>oooooooooooooo<br/>ooooooooooooooooooooooooooooo<br/>oooooooooooooo';
                            echo "<p class='post'>$text</p>";
                        ?>
                        <div class='button01'>
                            <a href="aboutUs.php">私たちについて</a>
                        </div>
                    </div>
                </div>
                <div class='aboutUsImg'>
                </div>
            </div>
            <?php
                $arr = [
                    "おすすめ"=>array(
                        "category" => "おすすめ",
                        "contents" => array()
                    ),
                    "最新記事"=>array(
                        "category" => "最新記事",
                        "contents" => array()
                    ),
                    "海外旅行"=>array(
                        "category" => "海外旅行",
                        "contents" => array()
                    ),
                    "国内旅行"=>array(
                        "category" => "国内旅行",
                        "contents" => array()
                    ),
                    "留学"=>array(
                        "category" => "留学",
                        "contents" => array()
                    )
                ];
                function pushData(array $data){
                    return
                        array(
                            'img' => "../img/sumnailImg/".$data['sumnail'],
                            'title' => $data['title'],
                            'link' => $data['id']
                        );
                }
                foreach ($stmt as $i => $row) {
                    array_push($arr["最新記事"]["contents"],
                        array(
                            'img' => "../img/sumnailImg/".$row['sumnail'],
                            'title' => $row['title'],
                            'link' => $row['id']
                        )
                    );
                    if($row['recommend']){
                        array_push($arr["おすすめ"]["contents"],pushData($row));
                    }
                    switch($row['category']){
                        case "海外旅行":
                            array_push($arr["海外旅行"]["contents"],pushData($row));
                            break;
                        case "国内旅行":
                            array_push($arr["国内旅行"]["contents"],pushData($row));
                            break;
                        case "留学":
                            array_push($arr["留学"]["contents"],pushData($row));
                            break;
                    }
                }
                $img = "../img/sky.jpeg";
                $reverse = array_reverse($test);
            ?>
            <?php foreach($arr as $category): $i = 0; $j = 0; $category['contents'] = array_reverse($category['contents'])?>
                <div class='recomendContents01'>
                    <div class='recomendContentTitle'>
                        <h4><?= $category["category"]?></h4>
                    </div>
                    <div class='recomendContentTypeAColumn'>
                        <div class='recomendContentTypeARow'>
                            <?php for($j = 0; $j < 6 ; $j+=1):?>
                                <?php if($i==3):$i=0;?>
                                    </div>
                                    <div class='recomendContentTypeARow'>
                                <?php endif;?>
                                <a href="post.php?category=<?=$category['category']?>&id=<?=$category['contents'][$j]["link"]?>">
                                <div class='recomendContentTypeA'>
                                    <div class='recomendContentTypeAImg'>
                                        <img class='sumnailImg'src='<?=$category['contents'][$j]["img"]?>' alt='sumnail of post'>
                                    </div>
                                    <div class='recomendContentTypeAText'>
                                        <p><?=$category['contents'][$j]["title"]??'null'.$i?></p>
                                    </div>
                                </div>
                                </a>
                                <?php $i+=1?>
                            <?php endfor;?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            <!-- <div class='recomendContents02'></div>
            <div class='newPost01'></div>
            <div class='newPost01'></div> -->
        </div>
    <?php include'../component/footer.php';?>
    <script>
        $('header').hide();
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

