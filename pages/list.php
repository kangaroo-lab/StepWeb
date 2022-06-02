<?php
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
        $post = array(
            "title" => "oooooooooooo",
            "sumnail" => "'../img/sky_00165.jpeg'",
            "url" => "post.php"
        );
        $contents = array(
            "content" => "ランキング",
            "posts" => array($post,$post,$post,$post,$post)
        );
        $genres = array(
            "genre" => "北海道",
            "sumnail" => "../img/sky_00165.jpeg",
            "sum"=>"oooooooooooooooooooooooooooooooooooooo<br>ooooooooooooooooooo",
            "contents" => array($contents,$contents,$contents,$contents,$contents)
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
    ?>
    </div>
    <?php include '../component/footer.php';?>
</body>
</html>
