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
            width: 72vh;
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
        }
        .postTitle{
            margin-left: 10px;
        }
    }
    @media screen and (max-width: 769px){

    }
</style>
<div class='listView'>
        <h3 class='listTitle'><?php echo $title?></h3>
        <div class='postListColumn'>
            <?php
                foreach($posts as $post){
                    echo "<a href='$post[url]'><div class='listComponent'><img class='img'src=$post[sumnail]alt='Sumnail'><p class='postTitle'>$post[title]</p></div></a>";
                }
            ?>
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
