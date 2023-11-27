// 錨點
$(document).ready(function () {
    $(".box3 img").on("click", function () {
        $("html,body").animate({ scrollTop: $("#section2").offset().top }, 500);
    });
    $(".top").on("click", function () {
        $("html,body").animate({ scrollTop: $("#section1").offset().top }, 500);
    });
});

tab_btn(0);

// 小狗介紹tab
function tab_btn(i) {
    switch (i) {
        case 0:
            value = char0;
            img = "char0";
            break;
        case 1:
            value = char1;
            img = "char1";
            break;
        case 2:
            value = char2;
            img = "char2";
            break;
        case 3:
            value = char3;
            img = "char3";
            break;
        case 4:
            value = char4;
            img = "char4";
            break;
        case 5:
            value = char5;
            img = "char5";
            break;
    }
    $(".text1_box .title").html(value.title1);
    $(".text1_box p").html(value.text1);
    $(".text2_box .title").html(value.title2);
    $(".text2_box p").html(value.text2);
    $(".sec4_box3 .imgBox").html('<img src="/img/front/sec4_' + img + '.png">');
}

// 預約按鈕
$(".reserve").on("click", function () {
    $(".sec2_box5").html(`<div class="reserved"></div>`);
});

// 輸入電話號碼

var selectValue = "";
selectValue = "+886";

$("#mobile_select").on("change", function () {
    selectValue = $(this).val();
    console.log(selectValue);
});

$("#mobile_input").on("input", function () {
    var input = document.getElementById("mobile_input");
    if (selectValue === "+886") {
        input.maxLength = 10;
    } else if (selectValue === "+852" || selectValue === "+853") {
        input.maxLength = 8;
    }
    var inputValue = $(this).val();
    console.log(inputValue);
});

// 同意框
var checkboxValue = $("#checkbox").val();
console.log(checkboxValue);

$("#checkbox").click(function () {
    var isChecked = $(this).is(":checked");
    checkboxValue = isChecked;
    console.log(isChecked);
    console.log(checkboxValue);
});



// section3 進度條
$('.line .white').attr('style','transform: translate(10%);')