<?php
    session_start();
    $post = $_SESSION['old_post']['data'];
    $article = $_SESSION['old_post']['article'][0];
    unset($_SESSION['old_post']);
    unset($_SESSION['error']);
?>
<?php
    //ARTICLEの個数獲得
    $db = new mysqli("localhost","root","root","article");
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
        $user_image = $_POST['image_name'];
        file_put_contents('../img/'.$user_image,$_SESSION['img']);
        $pdo = new
        PDO(
            'mysql:dbname=article;host=localhost;charset=utf8',
            'root',
            'root',
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
        $details = [];

        $i = 0;
        //detailの登録
        foreach($post as $elem){
            $detail_cnt+=1;
            $stmt = $pdo -> prepare('INSERT INTO detail(post_no,sumnail,subtitle,detail,url) VALUE(:post_no,:sumnail,:subtitle,:detail,:url)');
                $stmt->bindValue(':post_no',$posts_cnt);
                $stmt->bindValue(':sumnail',$elem['sumnail']??null);
                $stmt->bindValue(':subtitle',$elem['subtitle']);
                $stmt->bindValue(':detail',$elem['detail']);
                $stmt->bindValue(':url',$elem['url']??null);
            $stmt->execute();
            $details[$i] = $detail_cnt;
            $i+=1;
        }

        $json = json_encode($details);
        $formated_DATETIME = date('Y-m-d H:i:s');

        $stmt = $pdo -> prepare('INSERT INTO posts(category,date,genre,content,title,sumnail,sum,details,recommend) VALUE(:category,:date,:genre,:content,:title,:sumnail,:sum,:details,:recommend)');
            $stmt->bindValue(':category',$article['category']);
            echo 'a';
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
                $article['sumnail']??null
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
                $article['recomend']=='true'?true:false
            );
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
