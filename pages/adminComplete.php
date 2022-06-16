<?php
    session_start();
    $post = $_SESSION['old_post']['data'];
    $article = $_SESSION['old_post']['article'][0];
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
        $pdo = new
        PDO(
            'mysql:dbname=article;host=localhost;charset=utf8',
            'root',
            'root',
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
        echo '接続完了';
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

        echo '<br>どやんす';
        //postの登録

    }catch (PDOException $e) {
        // エラー発生
        echo $e->getMessage();
    } finally {
        // DB接続を閉じる
        $pdo = null;
    }
?>
