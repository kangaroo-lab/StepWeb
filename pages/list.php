<?php
    try{
        $hostname = 'us-cdbr-east-05.cleardb.net';
        $username = 'b530282c668619';
        $password = '96009105';
        $default = 'heroku_410d64a133afea6';
        $pdo = new PDO(
            // ホスト名、データベース名
            'mysql:host='.$hostname.';dbname='.$default.';',
            // ユーザー名
            $username,
            // パスワード
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,]
        );

        $stmt = $pdo -> prepare('SELECT * FROM posts');
        $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }finally {
        $pdo = null;
    }


    $title = 'My Site List';
    $description = 'postのリスト';
    include '../component/head.php';
?>
<style>
    .container{
        margin-bottom: 30px;
        margin-left: 10vw;
        margin-right: 10vw;
    }
</style>
</head>
<body>
    <?php include '../component/header.php';?>
    <div class='container'>
    <?php
        $choosen = $_GET["category"];
        function getData($data,array $categories){
            $result = [];
            foreach($data as $i => $row){
                if(in_array('豆知識',$categories)&&$row['content']=='豆知識'){
                    array_push($result,$row);
                }
                else if(in_array($row['category'],$categories)){
                    array_push($result,$row);
                }
            }
            return $result;
        }
        $post = [];
        switch($choosen){
            case 'trip':
                array_push($post,getData($stmt,array('国内旅行','海外旅行')));
                break;
            case 'study':
                array_push($post,getData($stmt,array('留学')));
                break;
            case 'test':
                array_push($post,getData($stmt,array('心理テスト')));
                break;
            case 'mile':
                break;
            case 'trivia':
                array_push($post,getData($stmt,array('豆知識')));
                break;
        }
        $ranking = array(
            'content' => 'ランキング',
            'posts' => array()
        );
        $corse = array(
            'content' => 'おすすめコース',
            'posts' => array()
        );
        $recommend = array(
            'content' => 'おすすめ記事',
            'posts' => array()
        );
        $newArrive = array(
            'content' => '新着記事',
            'posts' => array()
        );
        foreach($post[0] as $elem){
            $data = array(
                'id' => $elem['id'],
                'title' => $elem['title'],
                'sumnail' => '../img/sumnailImg/'.$elem['sumnail'],
                'url' => $elem['details']
            );
            if($elem['content']=='ランキング'){
                array_push($ranking['posts'],$data);
            }
            if($elem['content']=='コース'){
                array_push($corse['posts'],$data);
            }
            if($elem['recommend']){
                array_push($recommend['posts'],$data);
            }
            array_push($newArrive['posts'],$data);
        }
        $genres = array(
            "genre" => $choosen,
            "sumnail" => "../img/sky_00165.jpeg",
            "sum"=>"oooooooooooooooooooooooooooooooooooooo<br>ooooooooooooooooooo",
            "contents" => array($ranking,$corse,$recommend)
        );
        $sumnail = $genres["sumnail"];
        $title = $genres["genre"];
        $sum = $genres["sum"];
        include '../component/sumnail.php';
        foreach($genres["contents"] as $contents){
            $title = $contents["content"];
            $posts = $contents["posts"];
            include '../component/postListComponent.php';
        }
        include '../component/newArriveBox.php'
    ?>
    </div>
    <?php include '../component/footer.php';?>
</body>
</html>
