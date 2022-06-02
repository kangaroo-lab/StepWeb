<style>
    @media screen and (min-width: 769px){
        .articleView{
            margin-top: 50px;
            width: 50vw;
            margin-bottom: 10vh;
        }
        .map{
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
        .article{}
    }
    @media screen and (max-width: 769px){

    }
</style>
<div class='articleView'>
    <div class='titleView'>
        <h3 class='title'><?php echo $article['subtitle']?></h3>
    </div>
    <div class='articleView'>
        <p class='article'><?php echo $article['article']?></p>
    </div>
    <?php echo $article['url']?>
</div>
