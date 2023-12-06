// var swiper = new Swiper(".swiper", {
//     effect: "coverflow",
//     grabCursor: true,
//     centeredSlides: true,
//     coverflowEffect: {
//       rotate: 0,
//       stretch: 0,
//       depth: 100,
//       modifier: 3,
//       slideShadows: true,
//     },
//     keyboard: {
//       enabled: true,
//     },
//     mousewheel: {
//       thresholdDelta: 70,
//     },
//     loop: true,
//     pagination: {
//       el: ".swiper-pagination",
//       clickable: true,
//     },
//     breakpoints: {
//       640: {
//         slidesPerView: 1,
//       },
//       768: {
//         slidesPerView: 1,
//       },
//       900: {
//         slidesPerView: 1,
//       },
//       901: {
//         slidesPerView: 3,
//       },
//       1386: {
//         slidesPerView: 3,
//       },
//       1560: {
//         slidesPerView: 3,
//       },
//       1920: {
//         slidesPerView: 3,
//       },
//     },
// });

var a = "這是個分隔線";

const swiper = new Swiper(".swiper", {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    breakpoints: {
        576: {
            slidesPerView: 1,
            slidesPerGroup: 1,
        },
        // 768: {
        //     slidesPerView: 1,
        //     slidesPerGroup: 1,
        // },
        900: {
            slidesPerView: 2,
            slidesPerGroup: 1,
        },
        901: {
            slidesPerView: 3,
            slidesPerGroup: 1,
        },
    },
    prevButton: '.swiper-button-prev',
    nextButton: '.swiper-button-next',
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
