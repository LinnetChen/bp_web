<!DOCTYPE html>
<html lang="zh-TW">

<link rel="stylesheet" href="css/front/style.css?v=1.8">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="《小狗英雄》官網" />
    <meta property="og:type" content="website" />
    <meta property="og:description"
        content="最可愛的放置手機遊戲《小狗英雄》，收集可愛小狗拯救世界，友好的放置系統，無須手動操作，多種離線獎勵即可自動成長，讓你從新手小狗成長為打倒魔王的英雄戰士狗！" />
    <meta property="og:url" content="《小狗英雄》官網" />
    <meta property="og:site_name" content="" />
    <meta property="og:locale" content="zh_tw" />
    <meta property="article:author" content="" />
    <meta property="og:image" content="/img/front/FB_share.jpg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="628" />
    <meta name="author" content="DiGeam" />
    <meta name="Resource-type" content="Document" />
    <link rel="icon" sizes="192x192" href="/img/front/dog.ico">
    <meta name="description" content="《小狗英雄》官網" />
    <link rel="pingback" href="" />
    <title>《小狗英雄》官網</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper@8/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js.map"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>


    <link rel="stylesheet" href="css/front/styleIndex.css?v=1.0.7">
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PB8RXNM');
    </script>
</head>

<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PB8RXNM" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>


    {{-- <div class="overlay"></div> --}}
    <div class="allBg"></div>
    <div class="wrap" id="app">
        <div class="loading" v-if="loading">
            <div class="dancing-lao">
                <div class="left-dots">
                    <div class="dot dot-1"></div>
                    <div class="dot dot-2"></div>
                    <div class="circle-dot"></div>
                </div>
                <div class="right-dots">
                    <div class="dot dot-1"></div>
                    <div class="dot dot-2"></div>
                    <div class="circle-dot"></div>
                </div>
                <img class="dog" src="/img/front/dog.png" alt="">
            </div>
        </div>



        <div v-if="popupIndex.visible" class="popupIndex">
            <div class="popBox">
                <div class="info">
                    <div class="titleBox">
                        <div class="title" v-html="popupIndex.title"></div>
                        <div class="time" v-html="popupIndex.time"></div>
                    </div>
                    <div class="line"></div>
                    <div class="text" v-html="popupIndex.text"></div>
                    {{-- <table class="table tab1Table">
                        <thead>
                            <tr>
                                <th>獎勵道具</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in tab1Table">
                                <td class="left" v-html="item.img + item.name"></td>
                            </tr>
                        </tbody>
                    </table> --}}
                    <div @click="closePopup" class="close">x</div>
                </div>
                <div @click="closePopup" class="mask2"></div>
            </div>
            <div @click="closePopup" class="mask2"></div>
        </div>




        <div class="container">

            <div class="slider">
                <div class="slideBarL">
                    <div class="menu">
                        <ul class="menu_list">
                            <li class="menu_list_item" @click="addActive(2)"><a href="#section2"
                                    :class="{ 'active': menu.activeTab === 2 }">遊戲公告</a></li>
                            <li class="menu_list_item" @click="addActive(4)"><a href="#section4"
                                    :class="{ 'active': menu.activeTab === 4 }">狗狗介紹​</a></li>
                            <li class="menu_list_item" @click="addActive(5)"><a href="#section5"
                                    :class="{ 'active': menu.activeTab === 5 }">遊戲特色</a></li>
                        </ul>
                    </div>
                    <div class="line"></div>
                    <div class="button">
                        <div class="triangle"></div>
                    </div>
                </div>
                <div class="slideBarR">
                    <div class="bg">
                        <div class="btnBox">
                            <a class="fb" target="_blank"
                                href="https://www.facebook.com/profile.php?id=61553615279273"></a>
                            <a class="google"
                                href="https://play.google.com/store/apps/details?id=com.digeam.a.bptw"></a>
                            <a class="ios" href="https://apps.apple.com/TW/app/id6470368870"></a>
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
                        <li class="menu_list_item"><a href="#section2">遊戲公告</a></li>
                        <li class="menu_list_item"><a href="#section4">狗狗介紹</a></li>
                        <li class="menu_list_item"><a href="#section5">遊戲特色</a></li>
                    </ul>
                </div>
                <div class="slideBarDown">
                    <div class="bg">
                        <div class="btnBox">
                            <div class="empty"></div>
                            <div class="top"><a href="#section1"></a></div>
                            <a class="fb" target="_blank"
                                href="https://www.facebook.com/profile.php?id=61553615279273"></a>
                            <a v-if="menu.isAndroid" class="google"
                                href="https://play.google.com/store/apps/details?id=com.digeam.a.bptw"></a>
                            <a v-if="menu.isiOS" class="ios"
                                href="https://apps.apple.com/TW/app/id6470368870"></a>
                        </div>
                    </div>
                </div>
            </div>



            {{-- sec1 --}}
            <div class="section section1" id="section1">
                <div class="LOGO"></div>
                <div class="box">
                    <div class="logoBox">
                        <div class="LOGO"></div>
                    </div>
                    <div class="box1">
                        <div class="sec01TitlePC"></div>
                        <div class="btnBoxPC" v-if="!menu.isAndroid && !menu.isiOS">
                            <a class="google"
                                href="https://play.google.com/store/apps/details?id=com.digeam.a.bptw"><img
                                class="google" src="/img/front/sec01Google.png"></a>
                            <a class="ios" href="https://apps.apple.com/TW/app/id6470368870"><img
                                class="ios" src="/img/front/sec01Ios.png"></a>
                        </div>
                        <div class="btnBoxM" v-if="menu.isAndroid || menu.isiOS">
                            <a v-if="menu.isAndroid" class="google"
                                href="https://play.google.com/store/apps/details?id=com.digeam.a.bptw"><img
                                class="google" src="/img/front/sec01Google.png"></a>
                            <a v-if="menu.isiOS" class="ios"
                                href="https://apps.apple.com/TW/app/id6470368870"><img
                                class="ios" src="/img/front/sec01Ios.png"></a>
                        </div>
                    </div>
                    <div class="box2">
                        <div class="sec01dogM"></div>
                    </div>
                </div>
            </div>

            {{-- sec2 --}}
            <div class="section section2" id="section2">
                <div class="sec_box">
                    <div class="sec2_box1">
                        <img src="/img/front/sec02TitleIndex.png">
                    </div>

                    <div class="sec2_box2">
                        <img class="thumbtack" src="/img/front/thumbtack.png">
                        <div class="slickBox">
                            @foreach ($images as $value)
                                <div class="slickImg"><img src="{{ $value->file_name }}"></div>
                            @endforeach
                            {{-- <div class="slickImg"><img src="/img/front/BN630X430.jpg"></div>
                            <div class="slickImg"><img src="/img/front/BN630X430.jpg"></div>
                            <div class="slickImg"><img src="/img/front/BN630X430.jpg"></div> --}}
                        </div>
                        <div class="news">
                            <div class="newsTab">
                                <button class="newsBtn" v-for="(value, key) in sec02Index.newsTab"
                                    :class="{ 'active': sec02Index.currentTab == key }"
                                    @click="getCurrentTabData(key)">%{ value }</button>
                            </div>

                            <div class="newsContainer">
                                <div class="text">
                                    <ul>
                                        <li v-if="sec02Index.currentTab == 'new' ">
                                            <div class="textBox" v-for="(item, index) in span" :key="index"
                                                :id="id[index]" @click="getTextId(id[index])">
                                                <div class="textTitle">
                                                    <span>【%{item }】</span>%{ title[index] }
                                                </div>
                                                <div class="textTime">%{ time[index] }</div>
                                            </div>
                                        </li>
                                        <li v-if="sec02Index.currentTab == 'activity' ">
                                            <div class="textBox" v-for="(item, index) in span" :key="index"
                                                :id="id[index]" @click="getTextId(id[index])">
                                                <div class="textTitle">
                                                    <span>【%{item }】</span>%{ title[index] }
                                                </div>
                                                <div class="textTime">%{ time[index] }</div>
                                            </div>
                                        </li>
                                        <li v-if="sec02Index.currentTab == 'system' ">
                                            <div class="textBox" v-for="(item, index) in span" :key="index"
                                                :id="id[index]" @click="getTextId(id[index])">
                                                <div class="textTitle">
                                                    <span>【%{item }】</span>%{ title[index] }
                                                </div>
                                                <div class="textTime">%{ time[index] }</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="pagination">
                                    <li class="page-item" @click="page(currentPage - 1)"
                                        :disabled="currentPage === 1"> &lt; </li>
                                    <li class="page-item" v-for="pageNumber in displayedPages" :key="pageNumber"
                                        :class="{ 'active': currentPage === pageNumber }" @click="page(pageNumber)">
                                        %{ pageNumber }
                                    </li>
                                    <li class="page-item" @click="page(currentPage + 1)"
                                        :disabled="currentPage === totalPages"> &gt; </li>
                                </ul>
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

            <footer class="section footer">
                <div class="footerbox_logo">
                    <a href="https://www.digeam.com/index" target="_blank"><img class="logo_digeam"
                            src="/img/front/footer/LOGO.png"></a>
                    <img class="FIX_CI" src="/img/front/footer/FIX_CI.png">
                </div>
                <div class="spec">
                    <a href="https://www.digeam.com/terms" target="_blank">會員服務條款</a>
                    <a href="https://www.digeam.com/terms2" target="_blank">隱私條款</a>
                    <a href="https://www.digeam.com/cs" target="_blank">客服中心</a>
                    <p class="Copyright">Copyright © DiGeam Corporation. All Rights Reserved.</p>
                </div>
                <div class="classlavel">
                    <img src="/img/front/footer/0plus.png" alt="普遍級">
                    <ul>
                        <li>本遊戲為免費使用，遊戲內另提供購買虛擬遊戲幣、物品等付費服務。</li>
                        <li>請注意遊戲時間，避免沉迷。</li>
                        <li>本遊戲服務區域包含台灣、香港、澳門。</li>
                    </ul>
                </div>
            </footer>



        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/front/vue_data_index.js?v=1.4"></script>
    <script src="js/front/view.js?v=1.2"></script>
    <script src="js/front/swiper.js?v=1.1"></script>
    <script src="js/front/main.js?v=1.1"></script>
</body>

</html>
