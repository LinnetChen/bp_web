var api = "/api/prereg";

const app = Vue.createApp({
    delimiters: ["%[", "]"],
    data() {
        return {
            loading: true,
            isClickable: true,

            sec02Index: {
                currentTab:"new",
                newsTab: {
                    new: "一般",
                    activity: "活動",
                    system: "系統",
                },
            },

            menu: {
                activeTab: 0,
                isAndroid: false,
                isiOS: false,
            },

            popup2: {
                visible: false,
                text: "",
                img: "",
                currentCard: null, // 保存當前點擊的卡片資料
                bao: {
                    text: "點擊確定支持籠包汪!",
                    imgUrl: "/img/front/cardBao2.png",
                },
                hero: {
                    text: "點擊確定支持英雄汪!",
                    imgUrl: "/img/front/cardHero2.png",
                },
            },

            popupEmpty: {
                visible: false,
                // visible: true,
                title: "",
                text: "",
            },
        };
    },
    methods: {
        getCurrentTabData(key) {
            this.sec02Index.currentTab = key;
            console.log(key);
            console.log(this.sec02Index.currentTab);
        },

        // menu
        addActive(tabNumber) {
            this.menu.activeTab = tabNumber;
        },
        handleScroll() {
            const currentScroll = window.scrollY;
            const offset = 100; // 設定的偏移值

            document.querySelectorAll(".section").forEach((section, index) => {
                const sectionId = `section${index + 1}`;
                const sectionElement = document.getElementById(sectionId);

                if (sectionElement) {
                    const sectionTop = sectionElement.offsetTop - offset;
                    const sectionBottom =
                        sectionTop + sectionElement.offsetHeight + 2 * offset;

                    if (
                        currentScroll >= sectionTop &&
                        currentScroll < sectionBottom
                    ) {
                        this.menu.activeTab = index + 1;
                    }
                }
            });
        },

        // 偵測ios / android  /pc
        detectDevice() {
            const ua = navigator.userAgent;
            this.menu.isAndroid =
                ua.indexOf("Android") > -1 || ua.indexOf("Adr") > -1;
            this.menu.isiOS = !!ua.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
        },

        // 狗投票選擇跳窗
        pop2(type) {
            switch (type) {
                case "bao":
                    this.popup2.text = this.popup2.bao.text;
                    this.popup2.img = this.popup2.bao.imgUrl;
                    this.popup2.currentCard = "bao";
                    break;
                case "hero":
                    this.popup2.text = this.popup2.hero.text;
                    this.popup2.img = this.popup2.hero.imgUrl;
                    this.popup2.currentCard = "hero";
                    break;
            }
            document.documentElement.style.overflow = "hidden";
            this.popup2.visible = true;
        },
        async chaVoteClick(cha) {
            if (this.isClickable) {
                this.popup2.visible = false;

                try {
                    const response = await axios.post(api, {
                        type: "vote",
                        choose: cha,
                    });

                    if (response.data.status == 1) {
                        // 跳窗 投票成功!
                        this.popupEmpty.title = "投票成功";
                        this.popupEmpty.text = "雙方票數於每日0:00更新";
                        this.popupEmptyShow();
                    } else if (response.data.status == -99) {
                        // 跳窗 您已投過票
                        this.popupEmpty.title = "您已經投過票了~";
                        this.popupEmpty.text = "雙方票數於每日0:00更新";
                        this.popupEmptyShow();
                    }
                } catch (error) {}

                setTimeout(() => {
                    this.isClickable = true;
                }, 500);
            }
        },
        popupEmptyShow() {
            this.popupEmpty.visible = true;
            document.documentElement.style.overflow = "hidden";
        },
        closePopup() {
            document.documentElement.style.overflow = "auto";
            this.popup2.visible = false;
            this.popupEmpty.visible = false;
        },
    },
    mounted() {
        setTimeout(() => {
            this.loading = false;
        }, 2000);

        window.addEventListener("scroll", this.handleScroll);
        this.detectDevice();
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    },
});

app.mount("#app");
