<style>
    header{
        background-color: #9EF26A;
        height: 164px;
    }
    h2{
        text-align: center;
        margin-top: 0;
        font-size: 42px;
        padding-top: 28px;
        margin-bottom: 43px;
    }
    .headerContents a{
        color: rgba(0,0,0,0.4);
        text-decoration: none;
    }
    .headerContents a:hover{
        color: rgba(0,0,0,1);
        text-decoration: none;
    }
    .headerContents{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
    }
    .headerContent{
        text-align: center;
    }
</style>
<header>
    <div class='header'>
        <?php
            $logo = 'Logo text';
            echo "<h2>$logo</h2>";
            $arr = array(
                array(
                    "title" => "HOME",
                    "link" => "top.php"
                ),
                array(
                    "title" => "旅情報",
                    "link" => ""
                ),
                array(
                    "title" => "留学",
                    "link" => "list.php"
                ),
                array(
                    "title" => "心理テスト",
                    "link" => ""
                ),
                array(
                    "title" => "マイル",
                    "link" => ""
                ));
            echo "<div class='headerContents'>";
            foreach($arr as $val){
                echo "<div class='henderContent'><a href='$val[link]'>$val[title]</a></div>";
            };
            echo "</div>";
        ?>
    </div>
</header>
