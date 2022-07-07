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
    @media screen and (min-width: 769px) {
        .listView{
            margin-top: 50px;
            width: 50vw;
            background-color: whitesmoke;
            padding-top: 10px;
            padding-bottom: 30px;
            display: flex;
            flex-direction: column;
            padding-left: 15px;
        }
        .subtitle{
            margin: 5px;
            margin-left: 10px;
            margin-right: 10px;
            padding: 3px;
            box-shadow:  0 1px 0 lightgray;
        }
        .subtitleText{
            margin-left: 10px;
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
        .subtitle{
            margin: 5px;
            margin-left: 10px;
            margin-right: 10px;
            padding: 3px;
            box-shadow:  0 1px 0 lightgray;
        }
        .subtitleText{
            margin-left: 10px;
        }
    }
</style>
<div class='listView'>
    <h4>目次</h4>
    <?php foreach($articles as $article):?>
    <a href="#<?= $article['subtitle']?>">
        <div class='subtitle'>
            <p class='subtitleText'><?= $article['subtitle']?></p>
        </div>
    </a>
    <?php endforeach;?>
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
