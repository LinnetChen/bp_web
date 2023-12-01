var api = "";

const app = Vue.createApp({
    delimiters: ["%[", "]"],
    data() {
        return {
            sec03: {
                activityNum: {
                    numBao: 0,
                    numHero: 0,
                    numMeat: 0,
                },
            },
            sec02: {
                selectedCountry: "+886",
                phone: "",
                phonePro: "",
                privacyChecked: false,
            },
        };
    },
    methods: {
        async getSetting() {
            try {
                const response = await axios.post(api, {
                    type: "get",
                });

                if (response.status === 1) {
                    const numArray = response.num;

                    this.sec03.activityNum.numBao = numArray[0] || 0;
                    this.sec03.activityNum.numHero = numArray[1] || 0;
                    this.sec03.activityNum.numMeat = numArray[2] || 0;

                    // console.log("Data updated:", this.sec03.activityNum);
                } else {
                    console.error("Status is not 1:", response.data);
                }
            } catch (error) {
                console.error("Error:", error);
            }
        },
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
                        } else {
                            this.sec02.phonePro = phone;
                            this.phoneDateSubmit(country + this.sec02.phonePro);
                        }
                    } else if (phone.length == 10 && !isNaN(phone)) {
                        if (phone.substring(0, 1) != 0) {
                            // 跳窗 請填入正確格式
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
                    }
                }
            } else {
                //  跳窗 請勾選同意
            }
        },
        async phoneDateSubmit(mobileNum) {
            console.log("call api");
            console.log(mobileNum);

            try {
                const response = await axios.post(api, {
                    type: "phone",
                    mobile: mobileNum,
                });

                if (response.status == 1) {
                    // 跳窗 預約成功

                    this.$nextTick(() => {
                        $(".sec2_box5").html(`<div class="reserved"></div>`);
                    });
                } else if (response.status == -99) {
                    // 跳窗 此號碼已預約

                    this.$nextTick(() => {
                        $(".sec2_box5").html(`<div class="reserved"></div>`);
                    });

                } else if (response.status == -98) {
                    // 跳窗 長度錯誤或未勾
                }
            } catch (error) {
                console.error("Error:", error);
            }
        },
    },
    mounted() {
        // 在 mounted 钩子中调用1次 getSetting 方法
        this.getSetting();
    },
});


app.mount("#app");
