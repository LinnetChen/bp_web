var api = "/api/content";

const app = Vue.createApp({
    delimiters: ["%{", "}"],
    data() {
        return {
            loading: true,
            isClickable: true,

            currentPage: 1,
            totalPages: 1,
            span: ["系統", "系統", "系統", "系統", "系統"],
            title: [
                "標題很長很長的話",
                "標題很長很長的話",
                "標題很長很長的話",
                "標題很長很長的話",
                "標題很長很長的話",
            ],
            time: [
                "2024/01/10",
                "2024/01/10",
                "2024/01/10",
                "2024/01/10",
                "2024/01/10",
            ],
            id: [1, 2, 3, 4, 5],

            sec02Index: {
                currentTab: "new",
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

            popupIndex: {
                id: "",
                visible: false,
                // visible: true,
                title: "標題很長很長的話",
                time: "2024-01-10 18:00:00",
                // text: "這邊全部是內文",
                text: "這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文",
            },
        };
    },
    methods: {
        async getCurrentTabData(key) {
            this.sec02Index.currentTab = key;
            console.log(key);
            console.log(this.sec02Index.currentTab);

            try {
                const response = await axios.post(api, {});

                if (response.data.status == 1) {
                    // this.span = response.data.span;
                    // this.title = response.data.title;
                    // this.time = response.data.time;
                    // this.id = response.data.id;
                } else {
                    console.error("Status is not 1:", response.data);
                }
            } catch (error) {
                console.error("Error:", error);
            }
        },

        async getTextId(id) {
            console.log(id);
            this.popupIndex.id = id;

            try {
                const response = await axios.post(api, {
                    id: this.popupIndex.id,
                });
                if (response.data.status == 1) {
                    this.popupIndex.title = response.data.title;
                    this.popupIndex.time = response.data.time;
                    this.popupIndex.text = response.data.content;

                    this.popupIndex.visible = true;
                } else {
                    console.error("Status is not 1:", response.data);
                }
            } catch (error) {
                console.error("Error:", error);
            }
        },

        async page(num) {
            console.log(num);
            console.log(this.sec02Index.currentTab);

            // try {
            //     const response = await axios.post(api, {
            //         pageType: this.sec02Index.currentTab,
            //         pageNum: num,
            //     });

            //     if (response.data.status == 1) {
            //         this.span = response.data.span;
            //         this.title = response.data.title;
            //         this.time = response.data.time;
            //         this.id = response.data.id;
            //     } else {
            //         console.error("Status is not 1:", response.data);
            //     }
            // } catch (error) {
            //     console.error("Error:", error);
            // }
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

        popupIndexShowShow() {
            document.documentElement.style.overflow = "hidden";
            this.popupIndex.visible = true;
        },
        closePopup() {
            document.documentElement.style.overflow = "auto";
            this.popupIndex.visible = false;
        },
    },
    mounted() {
        setTimeout(() => {
            this.loading = false;
        }, 2000);

        // this.getCurrentTabData("new");

        window.addEventListener("scroll", this.handleScroll);
        this.detectDevice();
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    },
});

app.mount("#app");
// const vm = app.mount("#app");
