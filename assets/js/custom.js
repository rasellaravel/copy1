$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

// $( document ).ready(function() {
//   alert(12312);
// });


$(function () {
  $(".show-sub-m").hover(
    function (event) {
      $(".sub-menu", this).slideDown(200);
      var relX = event.pageX - (event.pageX - $(this).offset().left);
      var win_w = $(window).width();
      var main_m_w = $(".main-menu").width();
      var lf_w = (win_w - main_m_w) / 2;
      var sub_w = $(this).find(".sub-menu").width();
      var right_w = win_w - relX;
      var n_left = right_w - lf_w;
      var left_sub;
      if (sub_w > main_m_w) {
        $(this)
          .find(".sub-menu")
          .width(main_m_w - 40);
        // sub_w = main_m_w-40;
      }
      if (n_left < sub_w) {
        left_sub = n_left - 40 - sub_w;
        $(this)
          .find(".sub-menu")
          .css("left", left_sub + "px");
      } else {
        $(this).find(".sub-menu").css("left", "0");
      }
      // console.log(left_sub);
      // console.log(relX);
      // console.log(win_w);
      // console.log(right_w);
    },
    function () {
      $(".sub-menu", this).hide();
    }
  );
  $(".single-product-show").hover(
    function (event) {
      $(this).find(".product-n").addClass("d-none");
      $(this).find(".product-h").removeClass("d-none");
      $(this).find(".button-group").removeClass("d-none");
    },
    function () {
      $(this).find(".product-h").addClass("d-none");
      $(this).find(".button-group").addClass("d-none");
      $(this).find(".product-n").removeClass("d-none");
    }
  );
  $(".sng-i-c").hover(
    function (event) {
      $(this).find(".product-n").addClass("d-none");
      $(this).find(".product-h").removeClass("d-none");
    },
    function () {
      $(this).find(".product-h").addClass("d-none");
      $(this).find(".product-n").removeClass("d-none");
    }
  );

  $(".sub-menu").hover(
    function (event) {
      $(this).parent().find(".nav-link").css("color", "#DB9A35");
      $(this).parent().find("span").addClass("d-none");
    },
    function () {
      $(this).parent().find(".nav-link").css("color", "#000");
      $(this).parent().find("span").removeClass("d-none");
    }
  );


  var a = 0,
    sub_m_width,
    x,
    inn,
    y;
  $(".sub-menu").each(function (i, v) {
    sub_m_width = 0;
    x = 0;
    a++;
    inn = 0;
    $(this).addClass("sub-menu" + a);
    $(".sub-menu" + a + " .inner-menu").each(function (i, v) {
      x = $(".inner-menu").width();
      sub_m_width = sub_m_width + x;
      inn++;
    });
    var main_m_w = $(".main-menu").width();
    // console.log(inn);
    if (inn >= 5 || main_m_w < sub_m_width) {
      y = $(".main-menu").width() - 40;
      $(".sub-menu" + a).width(y);
    } else {
      $(".sub-menu" + a).width(sub_m_width);
    }
  });

  $(window).resize(function () {
    a = 0;
    $(".sub-menu").each(function (i, v) {
      sub_m_width = 0;
      x = 0;
      a++;
      inn = 0;
      $(".sub-menu" + a + " .inner-menu").each(function (i, v) {
        x = $(".inner-menu").width();
        sub_m_width = sub_m_width + x;
        inn++;
      });
      // console.log(a);
      var main_m_w = $(".main-menu").width();
      if (inn >= 5 || main_m_w < sub_m_width) {
        y = $(".main-menu").width() - 40;
        $(".sub-menu" + a).width(y);
      } else {
        $(".sub-menu" + a).width(sub_m_width);
      }
    });
    if (
      $(".main-menu .navbar-nav").width() - 6 >
      $(".main-menu .navbar").width()
    ) {
      $(".main-menu .navbar-nav").css("left", 0);
      $(".main-menu > i.fa-angle-right").removeClass("d-none");
    } else {
      $(".main-menu .navbar-nav").css("left", 0);
      $(".main-menu > i").addClass("d-none");
    }
  });

  var win_srl_top = $(window).scrollTop();

  if (win_srl_top > 180) {
    $(".scroll-up").fadeIn(200);
  } else {
    $(".scroll-up").fadeOut(200);
  }
  $(window).scroll(function () {
    var win_srl_top = $(window).scrollTop();
    if (win_srl_top > 180) {
      $(".scroll-up").fadeIn(200);
    } else {
      $(".scroll-up").fadeOut(200);
    }
  });

  $(document).on("click", ".scroll-up", function () {
    // $("body").animate({scrollTop:0}, 500, 'swing');
    $("html, body").animate({ scrollTop: 0 }, 600, "swing");
  });
  $(document).on("click", ".show-btn", function () {
    $(".mbl-search-box").toggle();
  });
  $(document).on("click", ".pay-op", function () {
    $(".pay-op").removeClass("active");
    $(this).addClass("active");
  });
  $(document).on("click", ".p-icon", function () {
    $(this).parents().siblings(".f-in-ul").slideDown(500);
    $(this).parent().find(".m-icon").removeClass("d-none");
    $(this).addClass("d-none");
  });
  $(document).on("click", ".m-icon", function () {
    $(this).parents().siblings(".f-in-ul").slideUp(500);
    $(this).parent().find(".p-icon").removeClass("d-none");
    $(this).addClass("d-none");
  });
  // var sub_m_width1=0,x1,x2;
  // $('.nav-item').each(function(i, v){
  //     x1 = $(this).width();
  // 	sub_m_width1 = sub_m_width1+x1;
  // 	console.log(sub_m_width1);
  // });
  // x2 = $(".main-menu").width();
  // console.log(x2);

  $(document).on(
    "change",
    "[name=color], .sizes_input, [name=clasp], [name=surface_amber]",
    function (e) {
      ffFilter();
    }
  );
  $(document).on("click", ".price-sub", function (e) {
    ffFilter();
  });
  $(document).on("change", "[name=price]", function (e) {
    if ($("[name=price]:checked").val() == "custom") {
      $("[name=price-min]").removeAttr("readonly");
      $("[name=price-max]").removeAttr("readonly");
    } else {
      $("[name=price-min]").attr("readonly", "");
      $("[name=price-max]").attr("readonly", "");
      ffFilter();
    }
  });
  $(document).on("click", ".pagination a", function (e) {
    e.preventDefault();
    let page = $(this).attr("href").split("page=")[1];
    $(".hdnpageno").val(page);
    ffFilter();
  });
  $(document).on("click", ".see-more", function (e) {
    $(this).parent().find(".filter-area").removeClass("see-m-c-s");
    $(this).removeClass("see-more").addClass("less-more").html("less more");
  });
  $(document).on("click", ".less-more", function (e) {
    $(this).parent().find(".filter-area").addClass("see-m-c-s");
    $(this).addClass("see-more").removeClass("less-more").html("see more");
  });
  var swiper = new Swiper(".swiper-container1", {
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
  
  var swiper = new Swiper(".featured-container", {
    slidesPerView: 1,
    slidesPerGroup: 1,
    loopFillGroupWithBlank: true,
    navigation: {
      nextEl: ".featured-next",
      prevEl: ".featured-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: 1,
      },
      991: {
        slidesPerView: 2,
      },
    },
  });
  var swiper = new Swiper(".bestseller-container", {
    slidesPerView: 1,
    slidesPerGroup: 1,
    loopFillGroupWithBlank: true,
    navigation: {
      nextEl: ".bestseller-next",
      prevEl: ".bestseller-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: 1,
      },
      991: {
        slidesPerView: 2,
      },
    },
  });
  var swiper = new Swiper(".new-item-container", {
    slidesPerView: 1,
    slidesPerGroup: 1,
    loopFillGroupWithBlank: true,
    navigation: {
      nextEl: ".new-item-next",
      prevEl: ".new-item-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: 1,
      },
      991: {
        slidesPerView: 2,
      },
    },
  });
  var swiper = new Swiper(".top-product-container", {
    slidesPerView: 1,
    slidesPerGroup: 1,
    loopFillGroupWithBlank: true,
    navigation: {
      nextEl: ".top-product-next",
      prevEl: ".top-product-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: 1,
      },
      767: {
        slidesPerView: 2,
      },
    },
  });

  var swiper = new Swiper(".brand-logo-container", {
    slidesPerView: 6,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".brand-logo-next",
      prevEl: ".brand-logo-prev",
    },
    breakpoints: {
      575: {
        slidesPerView: 2,
      },
      767: {
        slidesPerView: 3,
      },
      991: {
        slidesPerView: 4,
      },
    },
  });

  $("#main-nav a").click(function () {
    var go_to_url = $("this").find(":href").val();

    document.location.href = go_to_url;
  });
});
function ffFilter() {
  let page = $(".hdnpageno").val();
  let url = $(".url-filter").val();
  let price = $("[name=price]:checked").val();
  let min_price = 0,
    max_price = 0;
  switch (price) {
    case "any":
      break;
    case "under_25":
      max_price = 25;
      break;
    case "25-50":
      min_price = 25;
      max_price = 50;
      break;
    case "50-100":
      min_price = 50;
      max_price = 100;
      break;
    case "over_100":
      min_price = 100;
      break;
    case "custom":
      min_price = $("[name=price-min]").val() ? $("[name=price-min]").val() : 0;
      max_price = $("[name=price-max]").val() ? $("[name=price-max]").val() : 0;
      break;

    default:
      break;
  }
  let color = [];
  $("[name=color]:checked").each(function (i) {
    color[i] = $(this).val();
  });
  let sizes = [];
  $(".size-filter-area").each(function (i) {
    sizes[i] = [];
    $("[name=sizes" + i + "]:checked").each(function (j) {
      sizes[i][j] = $(this).val();
    });
  });
  let clasp = [];
  $("[name=clasp]:checked").each(function (i) {
    clasp[i] = $(this).val();
  });
  let surface_amber = [];
  $("[name=surface_amber]:checked").each(function (i) {
    surface_amber[i] = $(this).val();
  });
  $.ajax({
    url: url + "/fetch-data?page=" + page,
    data: {
      url: url,
      min_price: min_price,
      max_price: max_price,
      color: color,
      sizes: sizes,
      clasp: clasp,
      surface_amber: surface_amber,
    },
    success: function (response) {
      // console.log(response);
      $(".pro-filter-area").html("");
      $(".pro-filter-area").html(response);
    },
    error: function (res) {
      // console.log(res);
    },
  });
}
let ms = 0;
if ($(".main-menu .navbar-nav").width() - 6 > $(".main-menu .navbar").width()) {
  $(".main-menu .navbar-nav").css("left", 0);
  $(".main-menu > i.fa-angle-right").removeClass("d-none");
  // if(($(".main-menu .navbar-nav").width() - 6) - $(".main-menu .navbar").width() == - $(".main-menu .navbar-nav").css('left')) {

  // }
  //   if ($(".main-menu .navbar-nav").css("left")) {
  //     $(".main-menu > i.fa-angle-left").removeClass("d-none");
  //   }
}
$(document).on("click", ".main-menu > i.fa-angle-right", function () {
  if (
    $(".main-menu .navbar-nav").width() - 6 - $(".main-menu .navbar").width() >
    ms
  ) {
    if (
      $(".main-menu .navbar-nav").width() -
        6 -
        $(".main-menu .navbar").width() >
      ms + 70
    ) {
      ms += 70;
    } else {
      ms =
        $(".main-menu .navbar-nav").width() -
        6 -
        $(".main-menu .navbar").width();
      $(".main-menu > i.fa-angle-right").addClass("d-none");
    }
  }
  $(".main-menu > i.fa-angle-left").removeClass("d-none");
  $(".main-menu .navbar-nav").css("left", "-" + ms + "px");
});
$(document).on("click", ".main-menu > i.fa-angle-left", function () {
  if (0 < ms) {
    if (0 < ms - 70) {
      ms -= 70;
    } else {
      ms = 0;
      $(".main-menu > i.fa-angle-left").addClass("d-none");
    }
  }
  $(".main-menu > i.fa-angle-right").removeClass("d-none");
  if (ms) {
    $(".main-menu .navbar-nav").css("left", "-" + ms + "px");
  } else {
    $(".main-menu .navbar-nav").css("left", ms + "px");
  }
});

// developer.js

function getColorsSize(color_id) {
  let pro_c_id = $('#select-by-color [value="' + color_id + '"]').attr(
    "ctm-p-id"
  );
  // console.log(pro_c_id);
  $.ajax({
    url: window.get_colors_size,
    method: "post",
    data: {
      color_id: color_id,
      pro_c_id: pro_c_id,
    },
    success: function (response) {
      // console.log(response);
      $("#selectBysize").html(response["color"]);
      $(".price-area").html(response["price"]);
      $(".price-areaIn").val(response["price"]);
    },
    error: function (res) {
      // console.log(res);
    },
  });
}
//delete cart
function deleteProductFromCart(pro_id) {
  $.ajax({
    url: window.delete_item_from_cart,
    method: "post",
    data: {
      pro_id: pro_id,
    },
    success: function (response) {
      $("#cartCounter").load(window.location.href + " #cartCounter");
      $("#cartItemBox").load(window.location.href + " #cartItemBox");
      $(".cartSection").load(window.location.href + " .cartSection");
      $("#choutPgItemCounter").load(
        window.location.href + " #choutPgItemCounter"
      );
    },
    error: function (res) {
      // console.log(res);
    },
  });
}

//delete favourite
function deleteProductFromFavourite(pro_id) {
  $.ajax({
    url: window.delete_item_from_favourite,
    method: "post",
    data: {
      pro_id: pro_id,
    },
    success: function (response) {
      $("#favouriteSection").load(window.location.href + " #favouriteSection");
      $("#favouriteCounter").load(window.location.href + " #favouriteCounter");
    },
    error: function (res) {
      // console.log(res);
    },
  });
}

function getThisProFrUpdateQun(pro_id) {
  $.ajax({
    url: window.update_quantity_from_cart,
    method: "post",
    data: {
      pro_id: pro_id,
    },
    success: function (response) {
      $(".mdl-title-for-update-pro").text(response.name);
      $("#updateQuantity").val(response.pro_info.quantity);
      $("#product_id").val(response.product_id);
      $("#updateColor").html(response.color);
      $("#updateSurfaceAmber").html(response.surface_amber);
      $("#updateClasp").html(response.clasp);
      $("#updateSize").html(response.size);
      $("#product_current_price").val(response.pro_info.price);
      $(".price.current .amount")
        .html(
          'Current Price: <span class="currencySymbol">$</span>' +
            response.pro_info.price
        )
        .css({ color: "black" });
    },
    error: function (res) {
      console.log(res);
    },
  });
}
// developer.js
function getPriceByFilter(id, price) {
  $(".price.current").removeClass("d-none");
  let sizes = [];
  $('select[name="size[]"] option:selected').each(function () {
    if ($(this).val() != "0") {
      sizes.push($(this).val());
    }
  });
  let error = 0;
  $("select").each(function () {
    if ($(this).val() == "0") {
      error = 1;
    }
  });
  if (error) {
    $(".price.current .amount")
      .html("Please select all filter")
      .css({ color: "red" });
    $("#product_current_price").val(price);
  } else {
    $.ajax({
      url: window.get_price_by_filter,
      method: "post",
      data: {
        id: id,
        sizes: sizes,
      },
      success: function (response) {
        if (response != 0) {
          $(".price.current .amount")
            .html(
              'Current Price: <span class="currencySymbol">$</span>' + response
            )
            .css({ color: "black" });
          $("[name='size[]']").css({ "border-color": "#ced4da" });
          $("#product_current_price").val(response);
        } else {
          $(".price.current .amount")
            .html("This size combination product not have in stock.")
            .css({ color: "red" });
          $("[name='size[]']").css({ "border-color": "red" });
          $("#product_current_price").val(price);
        }
      },
      error: function (res) {
        // console.log(res);
      },
    });
  }
}
function addToCartFromDtlPage(pro_id) {
  let is_cart_possible = $(".price.current .amount").html().trim();
  if (
    is_cart_possible == "Please select all filter" ||
    is_cart_possible == "This size combination product not have in stock."
  ) {
    $(".price.current .amount").css({ color: "red" });
    $(".price.current").removeClass("d-none");
  } else {
    swal({
      title: "Add to Busket!",
      text: "Do you want to add this product to your busket?",
      icon: "info",
      buttons: true,
      dangerMode: true,
    }).then((AdToCartFormDtls) => {
      if (AdToCartFormDtls) {
        var form = $("#product_filter_form")[0];
        var data = new FormData(form);
        data.append("pro_id", pro_id);
        $.ajax({
          url: window.adcart_from_dtls_url,
          method: "POST",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          success: function (response) {
            $("#cartSection").load(window.location.href + " #cartSection");
            $("#choutPgItemCounter").load(
              window.location.href + " #choutPgItemCounter"
            );
          },
          error: function (res) {
            console.log(res);
          },
        });
      }
    });
  }
}
function checkUpdatedField(e) {
  let is_cart_possible = $(".price.current .amount").html().trim();
  if (
    is_cart_possible == "Please select all filter" ||
    is_cart_possible == "This size combination product not have in stock."
  ) {
    e.preventDefault();
    $(".price.current .amount").css({ color: "red" });
    $(".price.current").removeClass("d-none");
  }
}
function logout(e) {
  e.preventDefault();
  $("#logout_form").submit();
}
