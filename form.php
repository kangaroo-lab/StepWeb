<?php
    class MySQLControl{
        private $dbname="";
        private $pdo="";
        private $details=[];
        private $posts_cnt = 0;

        public function setName(string $dbname):void
        {
            $this->dbname = $dbname;
        }

        public function getDb()
        {
            try{
                $this->pdo = new
                PDO('mysql:dbname='.$this->dbname.';host=localhost;charset=utf8','root','root');
                echo '接続完了';
            }catch(PDOException $e){
                echo 'DB接続エラー！: ' . $e->getMessage();
            }
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }

        public function addArticle(array $data,string $tableName)
        {
            try{

            $pdo = new
            PDO('mysql:dbname='.$this->dbname.';host=localhost;charset=utf8','root','root');

            //追加するデータをセット
            $date = new DateTime();
            $stmt = $pdo->prepare('INSERT INTO test (test) VALUES(1)');

                // $stmt->bindValue(':date',new DateTime());
                // $stmt->bindValue(':category',$data['category']);
                // $stmt->bindValue(':genre',$data['genre']);
                // $stmt->bindValue(':content',$data['content']);
                // $stmt->bindValue(':title',$data['title']);
                // $stmt->bindValue(':sumnail',$data['sumnail']);
                // $stmt->bindValue(':sum',$data['sum']);
                // $stmt->bindValue(':details',$this->details);

            $stmt->execute();
            echo 'DATA';
            }catch (PDOException $e) {
                // エラー発生
                echo $e->getMessage();

            }
        }

        //detailsに次のarticleのIDを付与する
        private function cntArticle(){
            $db = new mysqli("localhost","root","root","article");
            if($db->connect_error){
                echo $db->connect_error;
                exit();
            }
            $sql = "SELECT * FROM posts";
            if($result = $db->query($sql)){
                $cnt = $result->num_rows+1;
                $this->posts_cnt = $cnt;
            }
            $db->close();
        }

        public function addDetails(array $data,string $tableName)
        {
            try{
                $this->cntArticle();
                //追加するデータをセット
                // $stmt = $this->pdo::prepare('INSERT INTO'.$tableName.'VALUES(:post_no,:sumnail,:detail,:url)');
                //     $stmt->bindValue(':post_no',$this->posts_cnt);
                //     $stmt->bindValue(':sumnail',$data['sumnail']);
                //     $stmt->bindValue(':detail',$data['detail']);
                //     $stmt->bindValue(':url',$data['url']);
                // $stmt->exec();
            }catch(PDOException $e){
                // echo $e->getMessage();
            }
        }
    }
?>
