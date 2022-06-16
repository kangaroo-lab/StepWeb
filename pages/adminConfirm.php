<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location : administrator.php");
    }

    $_SESSION['errors'] = [];
    $_SESSION['old_post'] = array(
        'data' => $_POST['data'],
        'article' => $_POST['article']
    );
    foreach($_POST['article'] as $elem){
        if($elem['title']==''){
            array_push($_SESSION['errors'],'title');
        }
        if($elem['category']==''||$elem['genre']==''||$elem['contents']==''){
            array_push($_SESSION['errors'],'category');
        }
        if($elem['sum']==''){
            array_push($_SESSION['errors'],'sum');
        }
        if($elem['conclude']==''){
            array_push($_SESSION['errors'],'conclude');
        }
    }
    foreach($_POST['data'] as $elem){
        if($elem['subtitle']==''){
            array_push($_SESSION['errors'],'subtitle');
        }
        if($elem['detail']==''){
            array_push($_SESSION['errors'],'detail');
        }
    }
    if(!empty($_SESSION['errors'])){
        header("Location:admin.php");
        die();
    }
?>
<?php
    $title='管理者ページ';
    $is_home = false; //トップページの判定用の変数
    $description='お疲れ様です！
    ここからページを追加してもらいます。

    今はオープンなんですけど、これからパスワードを追加していく予定です。';
    include '../component/head.php';
?>
<style>
    html{
        background-color: whitesmoke;
    }
    .inner{
        margin-bottom: 30px;
        margin-left: 10vw;
        margin-right: 10vw;
    }
    .chooseBox{
        display: flex;
        flex-direction: row;
    }
    p{
        margin-left: 5vw;
        margin-bottom: 2vh;
        align-self: start;
    }

    select,option{
        background:transparent;
        border: none;
        border-bottom: 1px solid rgba(0,0,0, 0.3);
        width: 10vw;
        text-align: center;
    }
    select:focus{
        outline: none;
    }
    .title,.subtitle{
        width: 70vw;
        background:transparent;
        border: none;
        border-bottom: 1px solid rgba(0,0,0, 0.3);
        font-size: 16px;
    }
    .title:focus,.subtitle:focus{
        border-bottom: 1px solid rgba(0,0,0, 0.8);
        box-shadow: 0 1px 0 0 rgba(255,153,0,1);
        outline: 0;
        font-size: 16px;
    }
    .sum{
        width: 70vw;
        height: 10vh;
    }
    .newArticleView{
        height: auto;
    }
    .detail{
        width: 70vw;
        height: 30vh;
    }
    .map{
        width: 70vw;
    }
    .conclude{
        width: 70vw;
        height: 10vh;
    }
    .plus{
        background: transparent;
        border:  1px solid rgba(0,0,0, 0.3);
        border-radius: 100px;
        width: 2vw;
        height: 2vw;
    }
</style>
</head>
<body>
    <?php include '../component/header.php'?>
        <div class='inner'>
            <form action="adminComplete.php"method="post">
                <?php foreach($_POST['article'] as $elem):?>
                    <p>カテゴリー：<?=$elem['category']?></p>
                    <p>ジャンル：<?=$elem['genre']?></p>
                    <p>コンテンツ：<?=$elem['contents']?></p>
                    <p>おすすめ：<?=$elem['recomend']=='true' ? 'おすすめする':'おすすめしない' ?></p>
                    <p>タイトル：<?=$elem['title']?></p>
                    <p>要約：<?=$elem['sum']?></p>
                    <p>サムネ：<?=$elem['sumnail']?></p>
                    <p>本文</p>
                    <?php foreach($_POST['data'] as $post):?>
                        <p>サブタイトル：<?=$post['subtitle']?></p>
                        <p>記事：<?=$post['detail']?></p>
                    <?php endforeach;?>
                    <p>まとめ：<?=$elem['conclude']?></p>
                <?php endforeach;?>
                <button type="submit">完了</button>
                <a href="admin.php"><button type='button'>編集</button></a>
            </form>
        </div>
    <?php include '../component/footer.php'?>
</body>
