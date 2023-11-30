<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="《小狗英雄》事前預約 汪汪開跑!" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="《小狗英雄》事前預約 汪汪開跑!" />
    <meta property="og:url" content="《小狗英雄》事前預約 汪汪開跑!" />
    <meta property="og:site_name" content="" />
    <meta property="og:locale" content="zh_tw" />
    <meta property="article:author" content="" />
    <meta property="og:image" content="/img/front/share_bg.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="628" />
    <meta name="author" content="DiGeam" />
    <meta name="Resource-type" content="Document" />
    <link rel="icon" sizes="192x192" href="/img/front/favicon.png">
    {{-- <link rel="icon" sizes="192x192" href="/img/front/favicon.ico"> --}}
    <meta name="description" content="《小狗英雄》事前預約 汪汪開跑!" />
    <link rel="pingback" href="" />
    <title>《小狗英雄》事前預約 汪汪開跑!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper@8/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js.map"></script>


    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <link rel="stylesheet" href="css/front/style.css">
</head>

<body>
    <div class="overlay"></div>
    {{-- <div class="black-screen" id="blackScreen"></div> --}}
    <div class="allBg"></div>
    <div class="wrap" id="app">
        <div class="popup">
            <div class="popBox">
                <div class="info">
                    <div class="title"></div>
                    <div class="text"></div>
                    <div class="img"></div>

                </div>
            </div>
            <div onclick='closePopup()' class="xBtn">x</div>
        </div>

        <div class="slider">
            <div class="slideBarL">
                <div class="menu">
                    <ul class="menu_list">
                        <li class="menu_list_item"><a href="#section2">預約領獎勵</a></li>
                        <li class="menu_list_item"><a href="#section3">狗狗肉投票活動</a></li>
                        <li class="menu_list_item"><a href="#section4">狗狗介紹 ​</a></li>
                        <li class="menu_list_item"><a href="#section5">遊戲特色</a></li>
                    </ul>
                </div>
                <div class="button">
                    <div class="triangle"></div>
                </div>
            </div>
            <div class="slideBarR">
                <div class="bg">
                    <div class="btnBox">
                        <div class="fb"><a href="#"></a></div>
                        <div class="google"><a href="#"></a></div>
                        <div class="ios"><a href="#"></a></div>
                        <div class="top"><a href="#section1"></a></div>
                    </div>
                </div>
            </div>

            {{-- 手機版MENU --}}
            <div id="menuToggle">
                <input type="checkbox">
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <li class="menu_list_item"><a href="#section2">預約領獎勵</a></li>
                    <li class="menu_list_item"><a href="#section3">狗狗肉投票活動</a></li>
                    <li class="menu_list_item"><a href="#section4">狗狗介紹 ​</a></li>
                    <li class="menu_list_item"><a href="#section5">遊戲特色</a></li>
                </ul>
            </div>
            <div class="slideBarDown">
                <div class="bg">
                    <div class="btnBox">
                        <div class="empty"></div>
                        <div class="top"><a href="#section1"></a></div>
                        <div class="fb"><a href="#"></a></div>
                        {{-- <div class="google"><a href="#"></a></div> --}}
                        <div class="ios"><a href="#"></a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">




            {{-- sec1 --}}
            <div class="section section1" id="section1">
                <div class="LOGO"></div>
                <div class="box">
                    <div class="logoBox">
                        <div class="LOGO"></div>
                    </div>
                    <div class="box1">
                        <div class="sec01TitlePC"></div>
                    </div>
                    <div class="box2">
                        <div class="sec01dogM"></div>
                    </div>
                    <div class="box3">
                        <a href="#section2"><img class="scrollToNextSection" src="/img/front/start.png"></a>
                    </div>
                </div>
            </div>

            {{-- sec2 --}}
            <div class="section section2" id="section2">
                <div class="sec_box">
                    <div class="sec2_box1">
                        <img src="/img/front/sec02Title.png">
                    </div>
                    <div class="sec2_box2">
                        <div class="sec2_box3">
                            <div class="numberbox">
                                <select name="selected" class="select" id="mobile_select" @change="selectChange"
                                    v-model="sec02.selectedCountry">
                                    <option value="+886">台灣(+886)</option>
                                    <option value="+852">香港(+852)</option>
                                    <option value="+853">澳門(+853)</option>
                                </select>
                                <div class="inputbox">

                                    <input v-model="sec02.phone"placeholder="請填入正確的手機號碼" pattern="[0-9]*"
                                        @input="inputChange" @paste.prevent="preventPasteAndDrag" @dragover.prevent
                                        @drop.prevent maxlength=10 name="phone" id="mobile_input">

                                </div>
                            </div>
                            <div class="checkbox">
                                <input v-model="sec02.privacyChecked" type="checkbox" name="privacy" class="check"
                                    id="checkbox">
                                勾選即同意<a href="#" target="_blank">事前登錄相關隱私權條款</a>
                            </div>
                        </div>
                        <div class="sec2_box4">
                            <div class="slippersBox">
                                <img src="/img/front/slippers.png">
                            </div>
                            <div class="textBox">
                                <p class="slipperTitle">藍白拖</p>
                                <p class="slipperText">好穿便宜又能當武器的拖鞋，
                                    雖然外觀普通，用起來卻讓人
                                    愛不釋手！<br>
                                    <span>台港澳限定武器。<span>
                                </p>
                            </div>
                        </div>
                        <div class="sec2_box5">
                            <div class="reserve" @click="phoneDateWall"></div>
                        </div>
                    </div>
                </div>
            </div>




            {{-- sec3 --}}
            <div class="section3_boxPC">
                <div class="section section3" id="section3">
                    <div class="sec_box">
                        <div class="sec3_box1">
                            <img src="/img/front/sec03Title.png">
                        </div>
                        <div class="sec3_box2">
                            <div class="sec3_boxL">
                                <div class="activity_t">
                                    <div class="title">活動一</div>
                                    <div class="text">選出心儀小狗，票數最高開服即送！</div>
                                </div>
                                <div class="card_box">
                                    <div class="card cardL">
                                        <img src="/img/front/cardBao.png" onclick="pop('bao')">
                                        <p>當前獲得骨頭數<br><span>%[sec03.activityNum.numBao]</span></p>
                                    </div>
                                    <div class="card cardR">
                                        <img src="/img/front/cardHero.png" onclick="pop('hero')">
                                        <p>當前獲得骨頭數<br><span>%[sec03.activityNum.numHero]</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="sec3_boxR">
                                <div class="activity_t">
                                    <div class="title">活動二</div>
                                    <div class="text">投票同時餵食小狗，<br>吃得越飽就能加碼肉片獎勵！</div>
                                </div>
                                <div class="bowl">
                                    <img src="/img/front/dogBowl100.png">
                                </div>
                                <div class="line">
                                    <p>%[sec03.activityNum.numMeat]%</p>
                                    <div class="white">
                                    </div>
                                </div>
                                <div class="addMeatBox">
                                    <div class="meatBtn500">加碼<br>500肉片</div>
                                    <div class="meatBtn1000">加碼<br>1000肉片</div>
                                    <div class="meatBtn3000">加碼<br>3000肉片</div>
                                </div>

                            </div>
                        </div>
                        <div class="sec3_box3">
                            <div class="pointBox" onclick="pop('point_text')">
                                <p>注意事項</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section3_boxM">
                <div class="section section31" id="section3">
                    <div class="sec_box">
                        <div class="sec3_box1">
                            <img src="/img/front/sec03Title.png">
                        </div>
                        <div class="sec3_box2">
                            <div class="sec3_boxL">
                                <div class="activity_t">
                                    <div class="title">活動一</div>
                                    <div class="text">選出心儀小狗，票數最高開服即送！</div>
                                </div>
                                <div class="card_box">
                                    <div class="card cardL">
                                        <img src="/img/front/cardBao.png" onclick="pop('bao')">
                                        <p>當前獲得骨頭數<br><span>%[sec03.activityNum.numBao]</span></p>
                                    </div>
                                    <div class="card cardR">
                                        <img src="/img/front/cardHero.png" onclick="pop('hero')">
                                        <p>當前獲得骨頭數<br><span>%[sec03.activityNum.numHero]</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section section32" id="section3">
                    <div class="sec_box">
                        <div class="sec3_box1">
                            <img src="/img/front/sec03Title.png">
                        </div>
                        <div class="sec3_box2">
                            <div class="sec3_boxR">
                                <div class="activity_t">
                                    <div class="title">活動二</div>
                                    <div class="text">投票同時餵食小狗，<br>吃得越飽就能加碼肉片獎勵！</div>
                                </div>
                                <div class="bowl">
                                    <img src="/img/front/dogBowl100.png">
                                </div>
                                <div class="line">
                                    <p>%[sec03.activityNum.numMeat]%</p>
                                    <div class="white">
                                    </div>
                                </div>
                                <div class="addMeatBox">
                                    <div class="meatBtn500">加碼<br>500肉片</div>
                                    <div class="meatBtn1000">加碼<br>1000肉片</div>
                                    <div class="meatBtn3000">加碼<br>3000肉片</div>
                                </div>

                            </div>
                        </div>
                        <div class="sec3_box3">
                            <div class="pointBox">
                                <p>注意事項</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- sec4 --}}
            <div class="section section4" id="section4">
                <div class="sec_box">
                    <div class="sec4_box1">
                        <img src="/img/front/sec04Title.png">
                    </div>
                    <div class="sec4_box2">
                        <div class="sec4_box3">
                            <div class="imgBox">
                                <img src="/img/front/sec4_char0.png">
                            </div>
                            <div class="textBox">
                                <div class="text1_box">
                                    <div class="title"></div>
                                    <p></p>
                                </div>
                                <div class="text2_box">
                                    <div class="title"></div>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="sec4_box4">
                        </div>
                    </div>
                </div>
            </div>


            {{-- sec5 --}}
            <div class="section section5" id="section5">
                <div class="sec_box">
                    <div class="sec5_box1">
                        <img src="/img/front/sec05Title.png">
                    </div>
                    <div class="sec5_box2">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide swiper-slide--one"><img src="/img/front/img06.png"
                                        alt="">
                                </div>
                                <div class="swiper-slide swiper-slide--two"><img src="/img/front/img01.png"
                                        alt="">
                                </div>
                                <div class="swiper-slide swiper-slide--three"><img src="/img/front/img02.png"
                                        alt="">
                                </div>
                                <div class="swiper-slide swiper-slide--four"><img src="/img/front/img03.png"
                                        alt="">
                                </div>
                                <div class="swiper-slide swiper-slide--five"><img src="/img/front/img04.png"
                                        alt="">
                                </div>
                                <div class="swiper-slide swiper-slide--five"><img src="/img/front/img05.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <p class="swiper-button-prev swiper_btn"></p>
                        <p class="swiper-button-next swiper_btn"></p>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>



            <div class="section footer"></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/front/vue_data.js"></script>
    <script src="js/front/view.js"></script>
    <script src="js/front/swiper.js"></script>
    <script src="js/front/main.js"></script>
</body>

</html>
