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
        .listViewNA{
            margin-top: 50px;
            width: 50vw;
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
        .listViewButton{
            margin-top: 50px;
            display: flex;
            flex-direction: row;
        }
        .button{
            margin: 20px;
            box-shadow:  0 0 2px #666;
            text-align: center;
            padding: 5px;
            opacity: 0.4;
            border: none;
            background-color: transparent;
        }
        .button:hover,.buttonselected{
            margin: 20px;
            box-shadow:  0 0 2px #666;
            text-align: center;
            padding: 5px;
            opacity: 1;
        }
    }
    @media screen and (max-width: 769px){

    }
</style>

<div class='listViewNA'>
        <h3 class='listTitle'><?php echo $newArrive['content']?></h3>
        <div class='postListColumn'>
            <?php
                foreach($newArrive['posts'] as $post){
                    echo "<a href='$post[url]'><div class='listComponent'><img class='img'src=$post[sumnail]alt='Sumnail'><p class='postTitle'>$post[title]</p></div></a>";
                }
            ?>
        </div>
        <div class='listViewButton'>
                <button class="button"><</button>
                <div class="buttonselected"><p>1</p></div>
                <button class="button">></button>
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
