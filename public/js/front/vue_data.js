// var api = "http://192.168.0.41:9001/api/prereg";

const app = Vue.createApp({
    delimiters: ["%[", "]"],
    data() {
        return {

            sec03: {
                activityNum: {
                    numBao: 0,
                    numHero: 0,
                    numMeat: 80,
                },
                bowlImgUrl: "",
            },
            whiteStyle: {},
            sec02: {
                selectedCountry: "+886",
                phone: "",
                phonePro: "",
                privacyChecked: false,
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
    watch: {
        "sec03.activityNum.numMeat": "calculateTransform",
    },
    methods: {
        // 進畫面設定
        async getSetting() {
            // try {
            //     const response = await axios.post(api, {
            //         type: "access",
            //     });

            //     if (response.data.status == 1) {
            //         const numArray = response.data.num;

            //         this.sec03.activityNum.numBao = numArray[0] || 0;
            //         this.sec03.activityNum.numHero = numArray[1] || 0;
            //         this.sec03.activityNum.numMeat = numArray[2] || 0;

            if (this.sec03.activityNum.numMeat >= 20) {
                if (this.sec03.activityNum.numMeat >= 50) {
                    if (this.sec03.activityNum.numMeat == 100) {
                        this.sec03.bowlImgUrl = "/img/front/dogBowl100.png";
                    } else {
                        this.sec03.bowlImgUrl = "/img/front/dogBowl50.png";
                    }
                } else {
                    this.sec03.bowlImgUrl = "/img/front/dogBowl20.png";
                }
            }

            //     } else {
            //         console.error("Status is not 1:", response.data);
            //     }
            // } catch (error) {
            //     console.error("Error:", error);
            // }
        },

        // sec02
        selectChange() {
            console.log("國家代碼", this.sec02.selectedCountry);
            console.log("條款", this.sec02.privacyChecked);
        },
        getMaxLength() {
            return this.sec02.selectedCountry === "+886" ? 10 : 8;
        },
        inputChange() {
            console.log("手機號碼：", this.sec02.phone);
            if (this.sec02.phone.length > this.getMaxLength()) {
                // 如果超過，截斷字符串
                this.sec02.phone = this.sec02.phone.slice(
                    0,
                    this.getMaxLength()
                );
            }
        },
        preventPasteAndDrag(event) {
            event.preventDefault();
        },

        phoneDateWall() {
            const country = this.sec02.selectedCountry;
            const check = this.sec02.privacyChecked;
            const phone = this.sec02.phone;

            if (check == true) {
                if (country == "+886") {
                    if (phone.length == 9 && !isNaN(phone)) {
                        if (phone.substring(0, 1) !== 9) {
                            // 跳窗 請填入正確格式
                            this.popupEmpty.title = `請填寫正確手機號碼​​`;
                            this.popupEmpty.text = `台灣區，不含特殊符號的半形數字10碼​<br>
                            港/澳區，不含特殊符號的半形數字8碼​`;
                            this.popupEmptyShow();
                        } else {
                            this.sec02.phonePro = phone;
                            this.phoneDateSubmit(country + this.sec02.phonePro);
                        }
                    } else if (phone.length == 10 && !isNaN(phone)) {
                        if (phone.substring(0, 1) != 0) {
                            // 跳窗 請填入正確格式
                            this.popupEmpty.title = `請填寫正確手機號碼​​`;
                            this.popupEmpty.text = `台灣區，不含特殊符號的半形數字10碼​<br>
                            港/澳區，不含特殊符號的半形數字8碼​`;
                            this.popupEmptyShow();
                        } else {
                            this.sec02.phonePro = phone.substring(1, 10);
                            console.log(this.sec02.phonePro);
                            this.phoneDateSubmit(country + this.sec02.phonePro);
                        }
                    }
                } else if (country == "+852" || country == "+853") {
                    if (phone.length == 8 && !isNaN(phone)) {
                        this.sec02.phonePro = phone;
                        this.phoneDateSubmit(country + this.sec02.phonePro);
                    } else {
                        // 跳窗 請填入正確格式
                        this.popupEmpty.title = `請填寫正確手機號碼​​`;
                        this.popupEmpty.text = `台灣區，不含特殊符號的半形數字10碼​<br>
                        港/澳區，不含特殊符號的半形數字8碼​`;
                        this.popupEmptyShow();
                    }
                }
            } else {
                //  跳窗 請勾選同意
                this.popupEmpty.title = "請勾選同意事前登錄相關隱私權條款";
                this.popupEmptyShow();
            }
        },
        async phoneDateSubmit(mobileNum) {
            try {
                const response = await axios.post(api, {
                    type: "phone",
                    mobile: mobileNum,
                });

                if (response.data.status == 1) {
                    // 跳窗 預約成功
                    this.popupEmpty.title = "恭喜預約成功";
                    this.popupEmpty.text = `已完成預約​<br>
                    撿到【骨頭】，前往下頁活動，送給心儀汪汪​`;
                    this.popupEmptyShow();

                    this.$nextTick(() => {
                        $(".sec2_box5").html(`<div class="reserved"></div>`);
                    });
                } else if (response.data.status == -99) {
                    // 跳窗 此號碼已預約
                    this.popupEmpty.title = "該門號已參加過事前預約";
                    this.popupEmpty.text = `已完成預約​<br>
                    撿到【骨頭】，前往下頁活動，送給心儀汪汪​`;
                    this.popupEmptyShow();

                    this.$nextTick(() => {
                        $(".sec2_box5").html(`<div class="reserved"></div>`);
                    });
                } else if (response.data.status == -98) {
                    // 跳窗 長度錯誤或未勾
                    this.popupEmpty.title = `請填寫正確手機號碼​​`;
                    this.popupEmpty.text = `台灣區，不含特殊符號的半形數字10碼​<br>
                    港/澳區，不含特殊符號的半形數字8碼​`;
                    this.popupEmptyShow();
                }
            } catch (error) {
                console.error("Error:", error);
            }
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
                    this.popupEmptyShow();
                }
            } catch (error) {}
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

        // 進度條
        calculateTransform() {
            const whitePercentage = this.sec03.activityNum.numMeat;
            this.whiteStyle.transform = `translateX(${whitePercentage}%)`;
        },
    },
    mounted() {
        // 在 mounted 钩子中调用1次 getSetting 方法
        this.getSetting();
        window.addEventListener("scroll", this.handleScroll);
        this.detectDevice();
        this.calculateTransform();
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    },
});

app.mount("#app");
