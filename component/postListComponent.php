<style>
    a{
        text-align: center;
        color: rgba(0,0,0,0.4);
        text-decoration: none;
        opacity:0.7
    }
    a :hover{
        color: rgba(0,0,0,0.9);
        text-decoration: none;
    }
    @media screen and (min-width: 769px) {
        .listView{
            margin-top: 50px;
            width: 50vw;
            height: 55vh;
            background-color: whitesmoke;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .listTitle{
            font-size: 1.2em;
        }
        .postListColumn{
            margin-top: 2vh;
        }
        .listComponent{
            width: 45vw;
            height: 8vh;
            margin-top: 1vh;
            box-shadow:  0 0 5px #666;
            display: flex;
            flex-direction: row;
        }
        .img{
            margin: 0;
            height: 8vh;
            object-fit: cover;
            width: 5vw;
        }
        .postTitle{
            margin-left: 1em;
        }
    }
    @media screen and (max-width: 769px){
        .listView{
            margin-top: 50px;
            width: 80vw;
            height: 55vh;
            background-color: whitesmoke;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            align-content: center;
            margin-left: auto;
            margin-right: auto;
        }
        .listTitle{
            font-size: 1.2em;
            text-align: center;
        }
        .postListColumn{
            margin-top: 2vh;
        }
        .listComponent{
            width: 72vw;
            height: 8vh;
            margin-top: 1vh;
            box-shadow:  0 0 5px #666;
            display: flex;
            flex-direction: row;
        }
        .img{
            margin: 0;
            height: 8vh;
            object-fit: cover;
            width: 20vw;
        }
        .postTitle{
            margin-left: 10px;
        }
    }
</style>
<div class='listView'>
        <h3 class='listTitle'><?php echo $title?></h3>
        <div class='postListColumn'>
            <?php
                $arr = array_reverse($posts);
                for($i = 0; $i < 5; $i+=1):
            ?>
                <a href='post.php?category=<?=$choosen?>&id=<?=$arr[$i]['id']?>'>
                    <div class='listComponent'>
                        <img class='img'src="<?=$arr[$i]["sumnail"]?>"alt='Sumnail'><p class='postTitle'><?=$arr[$i]["title"]?></p>
                    </div>
                </a>
            <?php endfor;?>
        </div>
</div>
<script>
    $(document).ready(function(){
        $('a').hover(function(){
            $(this).stop(true,true).animate({top:-2,opacity:1}, 150);
        }, function() {
            $(this).stop(true, true).animate({ top: 0,opacity:0.7}, 150);
        });
    });
</script>
