<?php
    $title = 'My Site Post';
    $description = 'post';
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
            $article = array(
                "subtitle" => "subtitle",
                "article" => "oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo",
                "url" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118005.76960123466!2d-114.54907618792483!3d62.47495038909791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x53d1f12ca34682c9%3A0xb4c137244371ef81!2z44Kr44OK44OAIOODjuODvOOCueOCpuOCp-OCueODiOODu-ODhuODquODiOODquODvOOCuiDjgqTjgqjjg63jg7zjg4rjgqTjg5U!5e0!3m2!1sja!2sjp!4v1654147662497!5m2!1sja!2sjp" class="map"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            );
            $post = array(
                "title" => "Title",
                "sumnail" => "../img/roadTrip.jpeg",
                "sum"=>"ooooooooooooooooooooooooooooooooo",
                "conclusion" => "oooooooooooooooooooooooooooooo",
                "articles" => array($article,$article,$article)
            );
            $sumnail=$post["sumnail"];
            $sum=$post["sum"];
            include '../component/sumnail.php';
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
