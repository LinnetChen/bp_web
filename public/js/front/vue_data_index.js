var api = "/api/prereg";

const app = Vue.createApp({
    delimiters: ["%[", "]"],
    data() {
        return {
            loading: true,
            isClickable: true,

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
                visible: false,
                // visible: true,
                title: "標題",
                time: "2024-01-10 18:00:00",
                // text: "這邊全部是內文",
                text: "這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文這邊全部是內文",
            },
        };
    },
    methods: {
        getCurrentTabData(key) {
            this.sec02Index.currentTab = key;
            console.log(key);
            console.log(this.sec02Index.currentTab);
        },

        getTextId(id) {
            console.log(id);
            this.popupIndex.visible = true;
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

        window.addEventListener("scroll", this.handleScroll);
        this.detectDevice();
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    },
});

app.mount("#app");
