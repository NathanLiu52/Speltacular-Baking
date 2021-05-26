$(document).ready(function() {
    //Prepend button to each list element
    $(".directions li").prepend("<button class=\"hide-direction\" aria-label=\"Hide step\"><span aria-hidden=\"true\">&#10004;</span></button>");
    //Add hidden to li className to hide element
    $(".hide-direction").on("click", function() {
        $(this).parent().addClass("hidden");
    })
})