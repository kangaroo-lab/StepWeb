<style>
    @media screen and (min-width: 769px){
        .articleView{
            margin-top: 50px;
            width: 50vw;
            margin-bottom: 10vh;
        }
        iframe{
            width: 50vw;
            height: 30vw;
        }
        .titleView{
            text-align: center;
            box-shadow:  0 0 5px #666;
            padding-top:  24px;
            padding-bottom: 24px;
            margin-bottom: 10px;
        }
        .title{}
        .articleView{
            word-break:break-word;
        }
        .article{
            overflow-wrap: break-word;
        }
    }
    @media screen and (max-width: 769px){
        .articleView{
            margin-top: 50px;
            width: 80vw;
            margin-bottom: 10vh;
        }
        iframe{
            width: 80vw;
            height: 60vw;
        }
        .titleView{
            text-align: center;
            box-shadow:  0 0 5px #666;
            padding-top:  24px;
            padding-bottom: 24px;
            margin-bottom: 10px;
        }
        .title{}
        .articleView{
            word-break:break-word;
        }
        .article{
            overflow-wrap: break-word;
        }
    }
</style>
<div class='articleView'id=<?= $article['subtitle']?>>
    <div class='titleView'>
        <h3 class='title'><?php echo $article['subtitle']?></h3>
    </div>
    <div class='articleView'>
        <p class='article'><?php echo $article['article']?></p>
    </div>
    <?php if($article['url']!==""):?>
        <?= $article['url']?>
    <?php endif;?>
    <?php if($article['subSumnail']!==""):?>
        <img class = 'img'src = "<?= $article['subSumnail']?>">
    <?php endif;?>
</div>
