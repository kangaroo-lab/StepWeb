<style>
        .footer{
            margin: 0;
            margin-bottom: 0;
            background-color: #000;
            height: 143px;
        }
        .footerLogo{
            font-size: 26px;
            padding-top: 23px;
            padding-bottom: 20px;
            color:#fff;
            text-align: center;
        }
        .footerTextArea{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .footerTextArea a{
            text-decoration: none;
            color:#fff;
            text-align: center;
        }
</style>

<div class='footer'>
    <h3 class='footerLogo'>LOGO</h3>
    <?php
        $arr = array(
            array(
                "title" => "HOME",
                "link" => "top.php"
            ),
            array(
                "title" => "About Us",
                "link" => "aboutUs.php"
            ),
            array(
                "title" => "contact",
                "link" => ""
            ),
            array(
                "title" => "色々",
                "link" => ""
            ),
            array(
                "title" => "管理者ページ",
                "link" => "../pages/admin.php"
            )
        );
        echo "<div class='footerTextArea'>";
        foreach($arr as $val){
            echo "<a href=$val[link]>$val[title]</a>";
        };
        echo "</div>";
    ?>
</div>
