$(".default_option").click(function() {
    $(this).parent().toggleClass("active");
})

$(".select_ul li").click(function() {
    var currentele = $(this).html();
    $(this).parents(".select_wrap").removeClass("active");
})

$(".default_option_1").click(function() {
    $(this).parent().toggleClass("active-1");
})

$(".select_ul_1 li").click(function() {
    var currentele = $(this).html();
    $(this).parents(".select_wrap_1").removeClass("active-1");
})

$(".default_option_2").click(function() {
    $(this).parent().toggleClass("active-2");
})

$(".select_ul_2 li").click(function() {
    var currentele = $(this).html();
    $(this).parents(".select_wrap_2").removeClass("active-2");
})

$(".default_option_3").click(function() {
    $(this).parent().toggleClass("active-3");
})

$(".select_ul_3 li").click(function() {
    var currentele = $(this).html();
    $(this).parents(".select_wrap_3").removeClass("active-3");
})

$(".default_option_4").click(function() {
    $(this).parent().toggleClass("active-4");
})

$(".select_ul_4 li").click(function() {
    var currentele = $(this).html();
    $(this).parents(".select_wrap_4").removeClass("active-4");
})