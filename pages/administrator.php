<?php
    $title='管理者ページ';
    $description='お疲れ様です！
    ここからページを追加してもらいます。

    今はオープンなんですけど、これからパスワードを追加していく予定です。';
    include '../component/head.php';
?>
<style>

</style>
</head>
<body>
    <form action="administrator.php"method="post"name="newArticle">
        <div>
            <h2>カテゴリーを選択してください！</h2>
            <p>カテゴリー :
                <select name="category" id="category">
                    <option value="">未選択</option>
                </select>
            </p>
            <p>ジャンル :
                <select name="genre" id="genre" disabled>
                    <option value="">未選択</option>
                </select>
            </p>
            <p>コンテンツ :
                <select name="contents" id="contents" disabled>
                    <option value="">未選択</option>
                </select>
            </p>
            <p>おすすめ :
                <select name="recomend" id="recomend">
                    <option value=true>おすすめする</option>
                    <option value=false>普通の記事にする</option>
                </select>
            </p>
        </div>
        <div>
            <h2>タイトルを決めてください！</h2>
            <p>タイトル : <input type="text"name="title"value=""></p>
            <p>要約 : <input type="text"name="sum"value=""></p>
            <p>サムネイル : <input type="image"name="sumnail"value="写真を選択"></p>
        </div>
        <div>
            <h2>本文</h2>
            <p>サブタイトル : <input type="text"name="subtitle"value=""></p>
            <p>文章 : <input type="text"name="subtitle"value=""></p>
            <p>地図URL : <input type="text"name="map"value=""></p>
            <p>写真 : <input type="image"name="img"value="写真を選択"></p>
        </div>
        <div>
            <h2>まとめを書いてください！</h2>
            <p>まとめ : <input type="text"name="conclude"value=""></p>
        </div>
        <button type='submit'>送信</button>
    </form>
</body>


<script type="text/javascript">
    const tripContent = [{title:'ランキング'},{title:'豆知識'},{title:'コース'},{title:'おすすめ情報'},{title:'体験記'}];
    const studyContent = [{title:'ランキング'},{title:'豆知識'},{title:'コース'},{title:'おすすめ情報'},{title:'体験記'}];
    const tripContent2 = [{title:'ランキング'},{title:'豆知識'},{title:'コース'},{title:'おすすめ情報'},{title:'体験記'}];
    const contents = [tripContent,tripContent2,studyContent];
    const trip1 = [
        {title:'北海道',contents:0},
        {title:'青森県',contents:0},
        {title:'岩手県',contents:0},
        {title:'宮城県',contents:0},
        {title:'秋田県',contents:0},
        {title:'山形県',contents:0},
        {title:'福島県',contents:0},
        {title:'茨城県',contents:0},
        {title:'栃木県',contents:0},
        {title:'群馬県',contents:0},
        {title:'埼玉県',contents:0},
        {title:'千葉県',contents:0},
        {title:'東京都',contents:0},
        {title:'神奈川県',contents:0},
        {title:'新潟県',contents:0},
        {title:'富山県',contents:0},
        {title:'石川県',contents:0},
        {title:'福井県',contents:0},
        {title:'山梨県',contents:0},
        {title:'長野県',contents:0},
        {title:'岐阜県',contents:0},
        {title:'静岡県',contents:0},
        {title:'愛知県',contents:0},
        {title:'三重県',contents:0},
        {title:'滋賀県',contents:0},
        {title:'京都',contents:0},
        {title:'大阪府',contents:0},
        {title:'兵庫県',contents:0},
        {title:'奈良県',contents:0},
        {title:'和歌山県',contents:0},
        {title:'鳥取県',contents:0},
        {title:'島根県',contents:0},
        {title:'岡山県',contents:0},
        {title:'広島県',contents:0},
        {title:'山口県',contents:0},
        {title:'徳島県',contents:0},
        {title:'香川県',contents:0},
        {title:'愛媛県',contents:0},
        {title:'高知県',contents:0},
        {title:'福岡県',contents:0},
        {title:'佐賀県',contents:0},
        {title:'長崎県',contents:0},
        {title:'熊本県',contents:0},
        {title:'大分県',contents:0},
        {title:'宮崎県',contents:0},
        {title:'鹿児島県',contents:0},
        {title:'沖縄県',contents:0}
    ];
    const trip2 = [
        {title:'アメリカ',content:1},
        {title:'カナダ',content:1},
        {title:'イギリス',content:1},
        {title:'ニュージーランド',content:1},
        {title:'オーストラリア',content:1},
        {title:'フィリピン',content:1},
        {title:'タイ',content:1},
        {title:'台湾',content:1},
        {title:'シンガポール',content:1},
        {title:'韓国',content:1},
        {title:'中国',content:1},
        {title:'ドイツ',content:1},
        {title:'その他',content:1},
    ]
    const study = [
        {title:'アメリカ',content:2},
        {title:'カナダ',content:2},
        {title:'イギリス',content:2},
        {title:'ニュージーランド',content:2},
        {title:'オーストラリア',content:2},
        {title:'フィリピン',content:2},
        {title:'タイ',content:2},
        {title:'台湾',content:2},
        {title:'シンガポール',content:2},
        {title:'韓国',content:2},
        {title:'中国',content:2},
        {title:'ドイツ',content:2},
        {title:'その他',content:2},
    ];
    const test = []
    const genre = [trip1,trip2,study,test]
    const category = [{title:'国内旅行',genre:0},{title:'海外旅行',genre:1},{title:'留学',genre:2},{title:'心理テスト',genre:3}];

    function setOption(id,list){
        const select=document.getElementById(id);
        if(select.disabled){
            select.disabled=false;
        }
        list.forEach(elem=>{
            const option=document.createElement('option');
            option.value=elem.title;
            option.textContent=elem.title;
            select.appendChild(option);
        });
    };

    setOption('category',category)

    function getCategoryIndex(){
        const category = document.newArticle.category;
        const index = category.selectedIndex;
        return index-1;
    };

    function getGenreIndex(){
        const genre = document.newArticle.genre;
        const index = genre.selectedIndex;
        return index-1;
    };

</script>
<script>
    let n = 0;
    $(document).ready(function(){
        $('#category').change(function(){
            const num = getCategoryIndex();
            n=num
            setOption('genre',genre[category[num].genre]);
        });
        $('#genre').change(function(){
            const num = getGenreIndex();
            setOption('contents',contents[genre[category[n].genre][num].content])
        });
    });
</script>
