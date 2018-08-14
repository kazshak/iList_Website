$("#homeSection").load("homePage.html");
$("#faqSection").load("faq.html");
$("#aboutSection").load("about.html");
$("#pricingSection").load("pricingOptions.html");
$("#featuredSection").load("featuredListings.html");

$(document).ready(function() {
  $("body").removeClass("d-none");
  var selected = new Array("#homeSection");
  location.hash = "#home";
  $("#topNav").on("click", "li", function() {
    var itemId = "";
    switch ($(this).attr("id")) {
      case "navHome":
        itemId = "#homeSection";
        break;
      case "navFaq":
        itemId = "#faqSection";
        break;
      case "navAbout":
        itemId = "#aboutSection";
        break;
      case "navPricing":
        itemId = "#pricingSection";
        break;
      case "navFeatured":
        itemId = "#featuredSection";
    }
    $("#test").html("<h1>" + itemId + "</h1>" + (itemId == selected[selected.length-1]));
    if (itemId != selected[selected.length-1]) {
      $("#topNav li.active a i")
        .removeClass("fa-square")
        .addClass("fa-square-o")
        .css("color", "inherit");
      $("#topNav li.active")
        .removeClass("font-weight-bold")
        .removeClass("active");
      $(this)
        .toggleClass("active")
        .addClass("font-weight-bold");
      $(this)
        .children("a")
        .children("i")
        .removeClass("fa-square-o")
        .addClass("fa-square")
        .css("color", "#D70023");
      $(selected[selected.length-1]).addClass("d-none");
      $(itemId).removeClass("d-none")
      selected.push(itemId);
    }
  });
  window.onhashchange = function() {
    switch (location.hash) {
      case "#home":
        $("#navHome").click();
        break;
      case "#faq":
        $("#navFaq").click();
        break;
      case "#about":
        $("#navAbout").click();
        break;
      case "#pricing":
        $("#navPricing").click();
        break;
      case "#featured":
        $("#navFeatured").click();
        break;
      case "#search":
        $("#midSearch").click();
    }
  };
  $("#midAbout").on("click", function(){
    $("#navAbout").click();
  });
});
