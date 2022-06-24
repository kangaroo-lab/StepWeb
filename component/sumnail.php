<style>
    @media screen and (min-width: 769px) {
        .sumnail{
            margin-top: 80px;
            background-image: url(<?php echo $sumnail;?>);
            background-size: cover;
            width: 50vw;
            height: 30vw;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .title{
            align-self: center;
        }
        .sum{
            margin-top: 20px;
        }
    }
    @media screen and (max-width: 769px){

    }
</style>
<div class = 'sumnail'>
    <h1 class='title'><?= $choosen?></h1>
</div>
<div class='sum'>
    <p><?php echo $sum?></p>
</div>
