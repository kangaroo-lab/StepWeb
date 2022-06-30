<?php
    $post_id = $_GET['id'];
    try{
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = "heroku_410d64a133afea6";

        $pdo = new PDO(
          'mysql:host=' . $server . ';dbname=' . $db . ';charset=utf8mb4',
          $username,
          $password,
          [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
          ]
        );

        $pdo = $local;
        $sql_post = ('SELECT * FROM posts WHERE id='.$post_id);
        $sql_detail = ('SELECT * FROM detail WHERE post_no='.$post_id);
        $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $stmt_post = $pdo -> query("SET NAMES utf8;");
        $stmt_post = $pdo -> prepare($sql_post);
        $stmt_post -> execute();
        $stmt_detail = $pdo -> query("SET NAMES utf8;");
        $stmt_detail = $pdo -> prepare($sql_detail);
        $stmt_detail -> execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }finally {
        $pdo = null;
    }

    $title = 'First Step Topページ';
    $description = 'post';
    include '../component/head.php';
    $post = array();
    foreach($stmt_post as $elem){
        $post = array(
                    "title" => $elem['title'],
                    "sumnail" => "../img/sumnailImg/".$elem['sumnail'],
                    "sum" => $elem['sum'],
                    "conclusion" => $elem['conclude'],
                    "articles" => []
                );
    }
    $articles=array();
    foreach($stmt_detail as $elem){
        array_push($articles,array(
            "subtitle" => $elem['subtitle'],
            "article" => $elem['detail'],
            "url" => $elem['url']??"",
            "subSumnail" => "../img/subImg/".$elem['sumnail']??""
        ));
    }
    $post["articles"]=$articles;
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
            // $article = array(
            //     "subtitle" => "subtitle",
            //     "article" => "oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo",
            //     "url" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118005.76960123466!2d-114.54907618792483!3d62.47495038909791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x53d1f12ca34682c9%3A0xb4c137244371ef81!2z44Kr44OK44OAIOODjuODvOOCueOCpuOCp-OCueODiOODu-ODhuODquODiOODquODvOOCuiDjgqTjgqjjg63jg7zjg4rjgqTjg5U!5e0!3m2!1sja!2sjp!4v1654147662497!5m2!1sja!2sjp" class="map"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            // );
            // $post = array(
            //     "title" => "Title",
            //     "sumnail" => "../img/roadTrip.jpeg",
            //     "sum"=>"ooooooooooooooooooooooooooooooooo",
            //     "conclusion" => "oooooooooooooooooooooooooooooo",
            //     "articles" => array($article,$article,$article)
            // );
            $sumnail=$post["sumnail"];
            $sum=$post["sum"];
            $articles = $post['articles'];
            include '../component/sumnail.php';
            include '../component/postIndex.php';
            foreach($post["articles"] as $article){
                include '../component/eachArticleComponent.php';
            }
            $conclude=$post['conclusion'];
            include '../component/conclude.php';
        ?>
    </div>
    <?php include '../component/footer.php';?>
</body>
</html>
