document.getElementById("menu-toggle").addEventListener("click", function (event) {

    //Stop hyperlink navigation
    event.preventDefault();

    //Toggle (add/remove) CSS class on the menu
    document.getElementById("main-menu").classList.toggle("show");

});

$(".cart").click(function() {
    $( ".dropdown-content" ).toggleClass("show");
});

$("#theme").change(function() {
    $("#formTheme").submit();
})