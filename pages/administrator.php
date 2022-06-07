<?php
    $title='管理者ページ';
    $is_home = false; //トップページの判定用の変数
    $description='お疲れ様です！
    ここからページを追加してもらいます。

    今はオープンなんですけど、これからパスワードを追加していく予定です。';
    include '../component/head.php';
    require_once('../form.php');

    $MySql = new MySQLControl();
    $MySql->setName('article');
    $pdo = $MySql->getDb();
    $arr = $_POST['data'];
    if(count($arr)>0){
        echo'入力ずみ';
    }else{
        echo'入力前';
    }
?>
<style>
    html{
        background-color: whitesmoke;
    }
    .inner{
        margin-bottom: 30px;
        margin-left: 10vw;
        margin-right: 10vw;
    }
    .chooseBox{
        display: flex;
        flex-direction: row;
    }
    p{
        margin-left: 5vw;
        margin-bottom: 2vh;
        align-self: start;
    }

    select,option{
        background:transparent;
        border: none;
        border-bottom: 1px solid rgba(0,0,0, 0.3);
        width: 10vw;
        text-align: center;
    }
    select:focus{
        outline: none;
    }
    .title,.subtitle{
        width: 70vw;
        background:transparent;
        border: none;
        border-bottom: 1px solid rgba(0,0,0, 0.3);
        font-size: 16px;
    }
    .title:focus,.subtitle:focus{
        border-bottom: 1px solid rgba(0,0,0, 0.8);
        box-shadow: 0 1px 0 0 rgba(255,153,0,1);
        outline: 0;
        font-size: 16px;
    }
    .sum{
        width: 70vw;
        height: 10vh;
    }
    .newArticleView{
        height: auto;
    }
    .detail{
        width: 70vw;
        height: 30vh;
    }
    .map{
        width: 70vw;
    }
    .conclude{
        width: 70vw;
        height: 10vh;
    }
    .plus{
        background: transparent;
        border:  1px solid rgba(0,0,0, 0.3);
        border-radius: 100px;
        width: 2vw;
        height: 2vw;
    }
</style>
</head>
<body>
<?php include '../component/header.php'?>
    <div class='inner'>
    <form action="administrator.php"method="post"name="newArticle">
        <div>
            <h2>カテゴリーを選択してください！</h2>
            <div class='chooseBox'>
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
        </div>
        <div class='articleInput'>
            <h2>タイトルを決めてください！</h2>
            <div>
            <p>タイトル : <br><input class='title'type="text"name="title"value=""></p>
            <p>要約 : <br><textarea class='sum'type="text"name="sum"value=""></textarea></p>
            <p>サムネイル : <br><input class='img'type="file"name="sumnail"accept='image/jpeg,image/png'></p>
        </div>
        </div>
        <div id='newArticleView'>
            <h2>本文</h2>
            <div class='articleInput'>
                <p>サブタイトル : <br><input class='subtitle'type="text"name="data[0][subtitle]"value=""></p>
                <p>文章 : <br><textarea class='detail'type="text"name="data[0][detail]"value=""></textarea></p>
                <p>地図URL : <br><input class='map'type="text"name="data[0][map]"value=""></p>
                <p>写真 : <br><input class='img'type="file"name="data[0][img]"accept='image/jpeg, image/png'></p>
            </div>
            <button class='plus'type="button"onclick='addTextbox()'>+</button>
        </div>
        <div>
            <h2>まとめを書いてください！</h2>
            <div class='articleInput'>
                <p>まとめ : <br><textarea class='conclude'type="text"name="conclude"value=""></textarea></p>
            </div>
        </div>
        <button class='submit'type='submit'>送信</button>
    </form>
    </div>
    <?php include '../component/footer.php'?>
</body>


<script type="text/javascript">
    const tripContent = [{title:'ランキング'},{title:'豆知識'},{title:'お得情報'},{title:'交通情報'},{title:'コース'},{title:'おすすめ情報'},{title:'体験記'},{title:'その他'}];
    const studyContent = [{title:'ランキング'},{title:'豆知識'},{title:'お得情報'},{title:'交通情報'},{title:'コース'},{title:'おすすめ情報'},{title:'体験記'},{title:'その他'}];
    const tripContent2 = [{title:'ランキング'},{title:'豆知識'},{title:'お得情報'},{title:'交通情報'},{title:'コース'},{title:'おすすめ情報'},{title:'体験記'},{title:'その他'}];
    const contents = [tripContent,tripContent2,studyContent];
    const trip1 = [
        {title:'北海道',content:0},
        {title:'青森県',content:0},
        {title:'岩手県',content:0},
        {title:'宮城県',content:0},
        {title:'秋田県',content:0},
        {title:'山形県',content:0},
        {title:'福島県',content:0},
        {title:'茨城県',content:0},
        {title:'栃木県',content:0},
        {title:'群馬県',content:0},
        {title:'埼玉県',content:0},
        {title:'千葉県',content:0},
        {title:'東京都',content:0},
        {title:'神奈川県',content:0},
        {title:'新潟県',content:0},
        {title:'富山県',content:0},
        {title:'石川県',content:0},
        {title:'福井県',content:0},
        {title:'山梨県',content:0},
        {title:'長野県',content:0},
        {title:'岐阜県',content:0},
        {title:'静岡県',content:0},
        {title:'愛知県',content:0},
        {title:'三重県',content:0},
        {title:'滋賀県',content:0},
        {title:'京都',content:0},
        {title:'大阪府',content:0},
        {title:'兵庫県',content:0},
        {title:'奈良県',content:0},
        {title:'和歌山県',content:0},
        {title:'鳥取県',content:0},
        {title:'島根県',content:0},
        {title:'岡山県',content:0},
        {title:'広島県',content:0},
        {title:'山口県',content:0},
        {title:'徳島県',content:0},
        {title:'香川県',content:0},
        {title:'愛媛県',content:0},
        {title:'高知県',content:0},
        {title:'福岡県',content:0},
        {title:'佐賀県',content:0},
        {title:'長崎県',content:0},
        {title:'熊本県',content:0},
        {title:'大分県',content:0},
        {title:'宮崎県',content:0},
        {title:'鹿児島県',content:0},
        {title:'沖縄県',content:0}
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


    const array = [
        {title:'サブタイトル : ',name:'subtitle',type:'text',flag:false,accept:''},
        {title:'文章 : ',name:'detail',type:'text',flag:false,accept:''},
        {title:'地図URL : ',name:'map',type:'text',flag:false,accept:''},
        {title:'写真 : ',name:'img',type:'file',flag:true,accept:'image/jpeg, image/png'},
    ]

    let i = 1;
    function addTextbox(){
        const newArticle = document.createElement('div');
        const removeButton = document.createElement('button')
        removeButton.setAttribute('id',i);
        removeButton.setAttribute('type','button');
        removeButton.setAttribute('onclick','removeArticle(this.id)');
        removeButton.setAttribute('class','plus')
        removeButton.append(document.createTextNode('X'));
        newArticle.append(removeButton)
        array.forEach((elem)=>{
            const br = document.createElement("br")
            const newParagraph = document.createElement('p');
            const newText = document.createTextNode(elem.title);
            newParagraph.append(newText);
            newParagraph.append(br);
            if(elem.name=='detail'){
                const newInput = document.createElement('textarea');
                newInput.setAttribute('type',elem.type);
                newInput.setAttribute('name',`data[${i}][${elem.name}]`);
                newInput.setAttribute('class',elem.name);
                newInput.setAttribute('value','');
                newParagraph.append(newInput);
                newArticle.appendChild(newParagraph);
            }else{
                const newInput = document.createElement('input');
                newInput.setAttribute('type',elem.type);
                newInput.setAttribute('name',`data[${i}][${elem.name+i}]`);
                newInput.setAttribute('class',elem.name);
                newInput.setAttribute('value','');
                newParagraph.append(newInput);
                newArticle.appendChild(newParagraph);
            }
        });
        newArticle.setAttribute('id',i);
        newArticle.setAttribute('class','articleInput')
        const articleView = document.getElementById('newArticleView')
        articleView.appendChild(newArticle)
        i+=1
    }

    function removeArticle(id){
        console.log('remove',id);
        const article = document.getElementById(id);
        article.remove()
    }


    function makeData(){

    }

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
