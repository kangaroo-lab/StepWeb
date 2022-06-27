<?php
    session_start();
    $post = $_SESSION['old_post']['data'];
    $article = $_SESSION['old_post']['article'][0];
    $sumnail = $_SESSION['img']['sumnail'];
    $sub_sumnial = $_SESSION['img']['sub_sumnail'];
    unset($_SESSION['old_post']);
    unset($_SESSION['error']);
    unset($_SESSION['img']);
?>
<?php
    //ARTICLEの個数獲得
    // $local_sql = new mysqli("localhost","root","root","article");
        $hostname = 'us-cdbr-east-05.cleardb.net';
        $username = 'b530282c668619';
        $password = '96009105';
        $default = 'heroku_410d64a133afea6';

    $db = new mysqli($hostname,$username,$password,"Tables");
    if($db->connect_error){
        echo $db->connect_error;
        exit();
    }
    $sql = "SELECT * FROM posts";
    if($result = $db->query($sql)){
        $cnt = $result->num_rows+1;
        $posts_cnt = $cnt;
    }

    $details = "SELECT * FROM detail";
    if($result = $db->query($details)){
        $cnt = $result->num_rows;
        $detail_cnt = $cnt;
    }

    $db->close();
    try{
        $pdo = new PDO(
            // ホスト名、データベース名
            'mysql:host='.$hostname.';dbname=Tables;',
            // ユーザー名
            $username,
            // パスワード
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,]
        );
        $details = [];

        $i = 0;

        //detailの登録
        foreach($post as $elem){
            $detail_cnt+=1;
            $stmt = $pdo -> prepare('INSERT INTO detail(post_no,sumnail,subtitle,detail,url) VALUE(:post_no,:sumnail,:subtitle,:detail,:url)');
                $stmt->bindValue(':post_no',$posts_cnt);
                $stmt->bindValue(':sumnail',$sub_sumnial[$i]??null);
                $stmt->bindValue(':subtitle',$elem['subtitle']);
                $stmt->bindValue(':detail',$elem['detail']);
                $stmt->bindValue(':url',$elem['url']??null);
                var_dump($posts_cnt,$sub_sumnial[$i],$elem['subtitle'],$elem['detail'],$elem['url']);
            $stmt->execute();
            $details[$i] = $detail_cnt;
            $i+=1;
        }

        $json = json_encode($details);
        $formated_DATETIME = date('Y-m-d H:i:s');

        $stmt = $pdo -> prepare('INSERT INTO posts(category,date,genre,content,title,sumnail,sum,details,recommend,conclude) VALUE(:category,:date,:genre,:content,:title,:sumnail,:sum,:details,:recommend,:conclude)');
            $stmt->bindValue(
                ':category',
                $article['category']
            );
            $stmt->bindValue(
                ':date',
                $formated_DATETIME
            );
            $stmt->bindValue(
                ':genre',
                $article['genre']
            );
            $stmt->bindValue(
                ':content',
                $article['contents']
            );
            $stmt->bindValue(
                ':title',
                $article['title']
            );
            $stmt->bindValue(
                ':sumnail',
                $sumnail??null
            );
            $stmt->bindValue(
                ':sum',
                $article['sum']
            );
            $stmt->bindParam(
                ':details',
                $json
            );
            $stmt->bindValue(
                ':recommend',
                $article['recomend']
            );
            $stmt->bindValue(
                ':conclude',
                $article['conclude']
            );
            var_dump($formated_DATETIME,$article['genre'],$article['contents'],$article['title'],$sumnail,$article['sum'],$json,$article['conclude']);
        $stmt->execute();

        //postの登録

    }catch (PDOException $e) {
        // エラー発生
        echo $e->getMessage();
    } finally {
        // DB接続を閉じる
        $pdo = null;
    }
?>
<style>
    a{
        color: rgba(0,0,0,0.4);
        text-decoration: none;
        opacity:0.7
    }
    a :hover{
        color: rgba(0,0,0,0.9);
        text-decoration: none;
    }
    .inner{
        margin-bottom: 30px;
        margin-left: 10vw;
        margin-right: 10vw;
    }
    html{
        background-color: whitesmoke;
    }

</style>

<body>
    <?php include '../component/header.php'?>
    <div class='inner'>
        <a href="admin.php">編集画面に戻る</a>
    </div>
    <?php include '../component/footer.php'?>
</body>

<script>
    $(document).ready(function(){
        $('a').hover(function(){
            $(this).stop(true,true).animate({top:-2,opacity:1}, 150);
        }, function() {
            $(this).stop(true, true).animate({ top: 0,opacity:0.7}, 150);
        });
    });
</script>
