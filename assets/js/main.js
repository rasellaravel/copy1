$(function () {
  ('use strict');

  //lang hide show
  $('.igo_language').click(function (event) {
    $('.lang-show').show();
  });

  //Curency hide show
  $('.igo_curency').click(function (event) {
    $('.curency-show').show();
  });

  //resigter hide show
  $('.igoPopUp1').click(function (event) {
    $('.igo-inner1-tab').show();
    $('.icon-user').addClass('active');
  });

  //Cart hide show
  $('.igo-mhead-right-cart').click(function (event) {
    $('.igo-inner2-tab').show();
    $('.icon-shopping-cart').addClass('active');
  });

  $('.igo-mhead-left-inner').click(function () {
    $('.igo-main-menu-wrap').toggle();
  });

  //owl carouse

  function counter(event) {
    var element = event.target; // DOM element, in this example .owl-carousel
    var items = event.item.count; // Number of items
    var item = event.item.index + 1; // Position of the current item

    // it loop is true then reset counter from 1
    if (item > items) {
      item = item - items;
    }
    $(element)
      .parent()
      .find('.counter')
      .html(item + '/' + items);
  }

  // tab to top
  var btn = $('#igotabToTop');

  btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
  });

  setTimeout(function () {
    $('div.alert').remove();
  }, 5000);

  // mobile menu
  var $nav = $('#main-nav');
  var $toggle = $('.toggle');
  var data = {};
  var defaultData = {
    maxWidth: false,
    customToggle: $toggle,
    navTitle: 'Menu',
    levelTitles: true,
    insertClose: true,
    levelTitleAsBack: true,
    pushContent: '#container',
  };

  const initNav = function (conf) {
    var $old = $('.hc-offcanvas-nav');

    setTimeout(
      function () {
        if ($old.length) {
          $old.remove();
        }
      },
      $toggle.hasClass('toggle-open') ? 420 : 0
    );

    if ($toggle.hasClass('toggle-open')) {
      $toggle.click();
    }
    $toggle.off('click');
    $.extend(data, conf);
    $nav.clone().hcOffcanvasNav($.extend({}, defaultData, data));
  };
  initNav({});

  $('.actions')
    .find('a')
    .on('click', function (e) {
      // e.preventDefault();

      var $this = $(this).addClass('active');
      var $siblings = $this
        .parent()
        .siblings()
        .children('a')
        .removeClass('active');

      initNav(eval('(' + $this.data('demo') + ')'));
    });

  $('.actions')
    .find('input')
    .on('change', function () {
      var $this = $(this);
      var data = eval('(' + $this.data('demo') + ')');

      if ($this.is(':checked')) {
        initNav(data);
      } else {
        var removeData = {};
        $.each(data, function (index, value) {
          removeData[index] = false;
        });
        initNav(removeData);
      }
    });
  // end
});

// quantity
jQuery(
  '<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>'
).insertAfter('.quantity input');
jQuery('.quantity').each(function () {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function () {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find('input').val(newVal);
    spinner.find('input').trigger('change');
  });

  btnDown.click(function () {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find('input').val(newVal);
    spinner.find('input').trigger('change');
  });
});

// scroll menu
function menuScrollTo(e, cl, action) {
  if (action == 'up') {
    $('.' + cl).scrollTop($('.' + cl).scrollTop() - 100);
    $(e.currentTarget).parent().find('.down-scroll').removeClass('invisible');
    if ($('.' + cl).scrollTop() <= 0) {
      $(e.currentTarget).addClass('invisible');
    }
  } else {
    var menuScrollHeight = $('.' + cl).prop('scrollHeight');
    $(e.currentTarget).parent().find('.up-scroll').removeClass('invisible');
    $('.' + cl).scrollTop($('.' + cl).scrollTop() + 100);
    if (
      $('.' + cl).scrollTop() + $('.' + cl).innerHeight() >=
      menuScrollHeight
    ) {
      $(e.currentTarget).addClass('invisible');
    }
  }
}
function menuScrollGet(e, cl) {
  var menuScrollHeight = $('.' + cl).prop('scrollHeight');
  var top = $('.' + cl).scrollTop();
  if (top > 0) {
    console.log(top);
    $('.' + cl)
      .next()
      .find('.up-scroll')
      .removeClass('invisible');
  } else {
    $('.' + cl)
      .next()
      .find('.up-scroll')
      .addClass('invisible');
  }
  if ($('.' + cl).scrollTop() + $('.' + cl).innerHeight() >= menuScrollHeight) {
    $('.' + cl)
      .next()
      .find('.down-scroll')
      .addClass('invisible');
  } else {
    $('.' + cl)
      .next()
      .find('.down-scroll')
      .removeClass('invisible');
  }
  // if (action == 'up') {
  //   $('.' + cl).scrollTop($('.' + cl).scrollTop() - 100);
  //   $(e.currentTarget).parent().find('.down-scroll').removeClass('invisible');
  // } else {
  //   $(e.currentTarget).parent().find('.up-scroll').removeClass('invisible');
  //   $('.' + cl).scrollTop($('.' + cl).scrollTop() + 100);
  // }
}

//logout
function logout(e) {
  e.preventDefault();
  $('#logout_form').submit();
}
//add to favorite
function addToFvrtFromDtlPage(e, pro_id) {
  var _this = $(e.target).parents('a');

  $.ajax({
    url: window.add_to_favorite,
    method: 'POST',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      pro_id: pro_id,
    },
    success: function (response) {
      _this.find('i').addClass('active');
    },
    error: function (res) {
      console.log(res);
    },
  });
}
//add to cart
function addToCart(pro_id) {
  var custom_sizes = $("input[name='custom_sizes[]']")
    .map(function () {
      return $(this).val();
    })
    .get();
  var sizes = $('.color-select')
    .map(function () {
      return $(this).find('.dd-selected-value').val();
    })
    .get();
  var timber_frame = $("[name='timber_frame']:checked").val();
  var quantity = $("[name='quantity']").val();

  var data = new FormData();
  data.append('_token', $('meta[name="csrf-token"]').attr('content'));
  data.append('pro_id', pro_id);
  data.append('custom_sizes', JSON.stringify(custom_sizes));
  data.append('sizes', JSON.stringify(sizes));
  data.append('timber_frame', timber_frame);
  data.append('quantity', quantity);
  $.ajax({
    url: window.add_to_cart,
    method: 'POST',
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      $('#cart_box').load(window.location.href + ' #cart_box');
    },
    error: function (res) {
      console.log(res);
    },
  });
}
function getCartProduct(pro_id) {
  $.ajax({
    url: window.update_cart_item,
    method: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      pro_id: pro_id,
    },
    success: function (response) {
      $('#selected_cart_item').val(response['id']);
      $(
        "[name='quantity'] option[value='" + response['cart'].quantity + "']"
      ).prop('selected', true);
      $(
        "[name='timber_frame'][value='" + response['cart'].timber_frame + "']"
      ).prop('checked', true);
      $('.cart-filter-area').html(response['filter']);
      $('.demoBasic').each(function (index) {
        $('#demoBasic' + (index + 1)).ddslick({
          width: '100%',
          background: '#fff',
          imagePosition: 'left',
          selectText: 'Select your favorite social',
          onSelected: function (data) {
            // console.log(data);
          },
        });
      });
    },
    error: function (res) {
      console.log(res);
    },
  });
}
function updateCartById() {
  var pro_id = $('#selected_cart_item').val();
  var custom_sizes = $("input[name='custom_sizes[]']")
    .map(function () {
      return $(this).val();
    })
    .get();
  var sizes = $('.color-select')
    .map(function () {
      return $(this).find('.dd-selected-value').val();
    })
    .get();
  var timber_frame = $("[name='timber_frame']:checked").val();
  var quantity = $("[name='quantity']").val();
  var data = new FormData();
  data.append('_token', $('meta[name="csrf-token"]').attr('content'));
  data.append('pro_id', pro_id);
  data.append('custom_sizes', JSON.stringify(custom_sizes));
  data.append('sizes', JSON.stringify(sizes));
  data.append('timber_frame', timber_frame);
  data.append('quantity', quantity);
  $.ajax({
    url: window.update_cart_by_id,
    method: 'POST',
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      if (response == 'back') {
        location.reload();
      }
    },
    error: function (res) {
      console.log(res);
    },
  });
}
function readURL(id, input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#' + id).attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

// checkout page login form hide and show
$(document).on('change', '[name="is_login"]', function () {
  if ($(this).val() == 1) {
    $('#loginFormShow').removeClass('d-none');
    $('.igo-checkout-billing').addClass('d-none');
    $('.ch-div').addClass('d-none');
  } else {
    $('#loginFormShow').addClass('d-none');
    $('.igo-checkout-billing').removeClass('d-none');
    $('.ch-div').removeClass('d-none');
  }
});

$(document).on('click', '.is_payment', function () {
  $('.is_payment').removeClass('active');
  $(this).addClass('active');
  $('[name="payment_method"]').val($(this).attr('igo-payment').trim());
});

$('.igo-filter-bar-right').click(function () {
  $('.filter-short-by').show();
});

$(document).on('click', function (e) {
  if (
    !$(e.target).hasClass('igo-filter-bar-right') &&
    $(e.target).parents('.igo-filter-bar-right').length == 0
  ) {
    $('.filter-short-by').hide();
  }

  if (
    !$(e.target).hasClass('igo-main-menu-wrap') &&
    $(e.target).parents('.igo-main-menu-wrap').length == 0 &&
    !$(e.target).hasClass('igo-mhead-left-inner') &&
    $(e.target).parents('.igo-mhead-left-inner').length == 0 &&
    !$(e.target).hasClass('igo-summenu-wrap') &&
    $(e.target).parents('.igo-summenu-wrap').length == 0
  ) {
    $('.igo-main-menu-wrap').hide();
  }

  if (
    !$(e.target).hasClass('igo_language') &&
    $(e.target).parents('.igo_language').length == 0 &&
    !$(e.target).hasClass('lang-show') &&
    $(e.target).parents('.lang-show').length == 0
  ) {
    $('.lang-show').hide();
  }
  if (
    !$(e.target).hasClass('igo-search-result-wrap') &&
    $(e.target).parents('.igo-search-result-wrap').length == 0 &&
    !$(e.target).hasClass('ciupkim-search')
  ) {
    $('.igo-search-result-wrap').addClass('d-none');
  }

  if (
    !$(e.target).hasClass('igo_curency') &&
    $(e.target).parents('.igo_curency').length == 0 &&
    !$(e.target).hasClass('curency-show') &&
    $(e.target).parents('.curency-show').length == 0
  ) {
    $('.curency-show').hide();
  }

  if (
    !$(e.target).hasClass('igoPopUp1') &&
    $(e.target).parents('.igoPopUp1').length == 0 &&
    !$(e.target).hasClass('igo-inner1-tab') &&
    $(e.target).parents('.igo-inner1-tab').length == 0
  ) {
    $('.igo-inner1-tab').hide();
    $('.icon-user').removeClass('active');
  }

  if (
    !$(e.target).hasClass('igo-mhead-right-cart') &&
    $(e.target).parents('.igo-mhead-right-cart').length == 0 &&
    !$(e.target).hasClass('igo-inner2-tab') &&
    $(e.target).parents('.igo-inner2-tab').length == 0
  ) {
    $('.igo-inner2-tab').hide();
    $('.icon-shopping-cart').removeClass('active');
  }
});

$(function () {
  var lastScrollTop = 0,
    delta = 15;
  $(window).scroll(function (event) {
    var st = $(this).scrollTop();

    if (Math.abs(lastScrollTop - st) <= delta) return;
    if (st > lastScrollTop && lastScrollTop > 0) {
      // downscroll code
      $('.igo-app-header').css('transform', 'translateY(-60px)');
    } else {
      // upscroll code
      $('.igo-app-header').css('transform', 'translateY(0)');
    }
    lastScrollTop = st;
  });
});

window.tmp_menu = 0;

function toggleMainMenu(e, key) {
  if (window.tmp_menu != key) {
    window.tmp_menu = key;
    $('.igo-summenu-wrap').addClass('d-none');
    $('.igo-main-menu-wrap ul li').removeClass('active');
    $('[data-menu="menu-' + key + '"]').removeClass('d-none');
    $('[data-menu="menu-' + key + '"]')
      .find('.up-scroll')
      .addClass('invisible');
    $('.menu-inner-scroll-' + key).scrollTop(0);
    if (
      $('.menu-inner-scroll-' + key).prop('scrollHeight') ==
      $('.menu-inner-scroll-' + key).innerHeight()
    ) {
      $('[data-menu="menu-' + key + '"]')
        .find('.down-scroll')
        .addClass('invisible');
    } else {
      $('[data-menu="menu-' + key + '"]')
        .find('.down-scroll')
        .removeClass('invisible');
    }
    $(e.currentTarget).addClass('active');
  }
}

$(document).on('mouseover', function (e) {
  if (
    !$(e.target).hasClass('igo-main-menu-wrap') &&
    $(e.target).parents('.igo-main-menu-wrap').length == 0 &&
    !$(e.target).hasClass('igo-summenu-wrap') &&
    $(e.target).parents('.igo-summenu-wrap').length == 0
  ) {
    window.tmp_menu = -1;
    $('.igo-summenu-wrap').addClass('d-none');
    $('.igo-main-menu-wrap ul li').removeClass('active');
  }
});

var typingTimer; //timer identifier
var doneTypingInterval = 800;
var $input = $('.ciupkim-search');

$input.on('click', function () {
  if ($(this).val().length > 2) {
    $('.igo-search-result-wrap').removeClass('d-none');
  }
});
//on keyup, start the countdown
$input.on('keyup', function () {
  if ($(this).val().length > 2) {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(doneTyping, doneTypingInterval);
  } else {
    $('.igo-search-result-wrap').addClass('d-none');
  }
});

//on keydown, clear the countdown
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping() {
  $('.igo-search-result-wrap').removeClass('d-none');
  $.ajax({
    url: window.ciupkim_search,
    method: 'POST',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      src: $input.val(),
    },
    success: function (response) {
      $('.igo-search-result-wrap').html(response);
      console.log(response)
    },
    error: function (res) {
      console.log(res);
    },
  });
}

$('.igo-filter-bar-left').click(function () {
  $('.app-filter-1').show();
});
$('.filter-close-icon').click(function () {
  $('.app-filter-1').hide();
});

function openNav() {
  document.getElementById('mySidepanel').style.width = '250px';
}
function closeNav() {
  document.getElementById('mySidepanel').style.width = '0';
}

$(document).on('click', '.see-more', function (e) {
  $(this).parent().find('.igo-app-space-c').removeClass('app-see-m-ac');
  $(this)
    .removeClass('see-more')
    .addClass('less-more')
    .html('Less More <span><i class="far fa-chevron-up"></i></span>');
});
$(document).on('click', '.less-more', function (e) {
  $(this).parent().find('.igo-app-space-c').addClass('app-see-m-ac');
  $(this)
    .addClass('see-more')
    .removeClass('less-more')
    .html('More <span><i class="far fa-chevron-down"></i></span>');
});

// product details color select
$('.app-p-color-inner').on('click', function (e) {
  $check = $(this).prev();
  var checked = $check.prop('checked');

  $('input[name=color_select]').attr('checked', false);
  $('.app-p-color').removeClass('active');
  $active = $check.parent();
  if (checked) {
    $check.attr('checked', false);
    $active.removeClass('active');
  } else {
    $check.attr('checked', true);
    $active.addClass('active');
  }
});
// product details Size select
$('.app-p-size-inner').on('click', function (e) {
  $check = $(this).prev();
  var checked = $check.prop('checked');

  $('input[name=size_select]').attr('checked', false);
  $(e.currentTarget)
    .parent()
    .parent()
    .find('.app-p-size')
    .removeClass('active');
  $active = $check.parent();
  if (checked) {
    $check.attr('checked', false);
    $active.removeClass('active');
  } else {
    $check.attr('checked', true);
    $active.addClass('active');
  }
});
function onlyNumberKey(evt) {
  var ASCIICode = evt.which ? evt.which : evt.keyCode;
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false;
  return true;
}
$(document).on('change', '[name=price]', function (e) {
  if ($('[name=price]:checked').val() == 'custom') {
    $('[name=min_price]').removeAttr('readonly');
    $('[name=max_price]').removeAttr('readonly');
  } else {
    $('[name=min_price]').attr('readonly', '');
    $('[name=max_price]').attr('readonly', '');
    executeFilter();
  }
});
$(document).on('click', '#price_filter', function (e) {
  if ($('[name=price]:checked').val() == 'custom') {
    executeFilter();
  }
});
$(document).on('change', '[name=color], .sizes-input', function (e) {
  executeFilter();
});
$(document).on('click', '.app-filter-btn', function (e) {
  $('.app-filter-1').hide();
  executeFilter();
});

$(document).on('click', '.listing-product-area .pagination a', function (e) {
  e.preventDefault();
  let page = $(this).attr('href').split('page=')[1];
  executeFilter(page);
});

$(document).on('click', '.short-by', function () {
  var val = $(this).html();
  var data = $(this).attr('data-shortBy');

  $('.shot-by-title').html(val);
  $('.short-by-nput').val(data);
  executeFilter();
});

// execute filter
function executeFilter(pg = 1) {
  let page = pg;
  let url = window.location.href.split('#')[0];
  let price = $('[name=price]:checked').val();
  let sort_by = $('.short-by-nput').val();
  let min_price = 0,
    max_price = 0;
  switch (price) {
    case 'any':
      break;
    case 'custom':
      min_price = $('[name=min_price]').val() ? $('[name=min_price]').val() : 0;
      max_price = $('[name=max_price]').val() ? $('[name=max_price]').val() : 0;
      break;
    default:
      break;
  }
  let color = [];
  $('[name=color]:checked').each(function (i) {
    color[i] = $(this).val();
  });
  let sizes = [];
  $('.size-filter-area').each(function (i) {
    sizes[i] = [];
    $('[name=size_' + i + ']:checked').each(function (j) {
      sizes[i][j] = $(this).val();
    });
  });
  $.ajax({
    url: url + '?page=' + page,
    data: {
      url: url,
      min_price: min_price,
      max_price: max_price,
      color: color,
      sizes: sizes,
      sort_by: sort_by,
    },
    success: function (response) {
      // console.log(response);
      $('.listing-product-area').html('');
      $('.listing-product-area').html(response);
    },
    error: function (res) {
      // console.log(res);
    },
  });
}

// get price by filter
function getPriceByFilter(e, id, price) {
  let current_value = $(e.currentTarget).val();
  if (current_value != 0) {
    $(e.currentTarget).css({ 'border-color': '#ced4da' });
  } else {
    $(e.currentTarget).css({ 'border-color': 'red' });
  }
  let quantity = $('#product_filter_form .quantity1 input').val();
  let sizes = [];
  $('select[name="size[]"] option:selected').each(function () {
    if ($(this).val() != '0') {
      sizes.push($(this).val());
    }
  });
  let error = 0;
  $('select').each(function () {
    if ($(this).val() == '0') {
      error = 1;
    }
  });
  if (error) {
    $('.igo-p-price.calculate .select-all-filter').removeClass('d-none');
    $('.igo-p-price.calculate .amount').text(
      parseFloat(price * quantity).toFixed(2)
    );
    $('#product_current_price').val(parseFloat(price).toFixed(2));
  } else {
    $.ajax({
      url: window.get_price_by_filter,
      method: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
        sizes: sizes,
      },
      success: function (response) {
        if (response['price'] != 0) {
          $('.igo-p-price.calculate .text-danger').addClass('d-none');
          let total = response['price'] * quantity;

          $('.igo-p-price.calculate .amount').text(
            parseFloat(total).toFixed(2)
          );
          $('#product_current_price').val(
            parseFloat(response['price']).toFixed(2)
          );
        } else {
          $('.igo-p-price.calculate .text-danger').addClass('d-none');
          $('.igo-p-price.calculate .size-combination').removeClass('d-none');
          $('.igo-p-price.calculate .amount').text(
            parseFloat(price * quantity).toFixed(2)
          );
          $('#product_current_price').val(parseFloat(price).toFixed(2));
        }
      },
      error: function (res) {
        // console.log(res);
      },
    });
  }
}
//add to cart
function addToCart(pro_id) {
  let is_cart_possible = $('.igo-p-price.calculate .size-combination').hasClass(
    'd-none'
  );
  let error = 0;
  $('select').each(function () {
    if ($(this).val() == '0') {
      $(this).css({ 'border-color': 'red' });
      error = 1;
    }
  });

  console.log(is_cart_possible, error)
  if (!is_cart_possible || error) {
    
    $('.igo-p-price.calculate .select-all-filter').removeClass('d-none');
  } else {
    var form = $('#product_filter_form')[0];
    var data = new FormData(form);
    data.append('pro_id', pro_id);
    $.ajax({
      url: window.add_to_cart,
      method: 'POST',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        $('#cart_count').load(window.location.href + ' #cart_count_inr');
        $('#cart_popup').load(window.location.href + ' #cart_popup_inr');
        $('.igo-p-price.calculate .text-success.added').removeClass('d-none');
      },
      error: function (res) {
        console.log(res);
      },
    });
  }
}
function addToCartMbl(pro_id) {
  let is_cart_possible = $('.igo-p-price.calculate .size-combination').hasClass(
    'd-none'
  );
  let error = 0;
  $('.color-value').each(function () {
    if ($(this).val() == '') {
      error = 1;
    }
  });
  $('.size-value').each(function () {
    if ($(this).val() == '') {
      error = 1;
    }
  });
  if (!is_cart_possible || error) {
    $('.igo-p-price.calculate .select-all-filter').removeClass('d-none');
  } else {
    var form = $('#product_filter_form')[0];
    var data = new FormData(form);
    data.append('pro_id', pro_id);
    $.ajax({
      url: window.add_to_cart,
      method: 'POST',
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        $('#cart_count').load(window.location.href + ' #cart_count_inr');
        $('#cart_popup').load(window.location.href + ' #cart_popup_inr');
        $('.igo-p-price.calculate .text-success.added').removeClass('d-none');
      },
      error: function (res) {
        console.log(res);
      },
    });
  }
}
// update cart
function cartUpdate(pro_id, totalItemPrice) {
  $.ajax({
    url: window.update_cart_item,
    method: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      pro_id: pro_id,
      totalItemPrice: totalItemPrice,
    },
    success: function (response) {
      console.log(response);
      $('.modal-header .modal-title').text(response.name);
      $('#quantityUpdate').html(response.quantity);
      $('#sizeUpdate').html(response.size);
      $('#colorUpdate').html(response.color);
      $('#product_id').val(response.id);
      $('#product_current_price').val(response.price);
      $('.igo-p-price.calculate .amount').text(
        parseFloat(response.price).toFixed(2)
      );
    },
    error: function (res) {
      console.log(res);
    },
  });
}

//add to check cart update field
function checkUpdatedField(event) {
  let is_cart_possible = $('.igo-p-price.calculate .size-combination').hasClass(
    'd-none'
  );
  let error = 0;
  $('select').each(function () {
    if ($(this).val() == '0') {
      $(this).css({ 'border-color': 'red' });
      error = 1;
    }
  });
  if (!is_cart_possible || error) {
    event.preventDefault();
  }
}
// favourite add
function addToFavorite(event, pro_id) {
  $(event.currentTarget).find('.icon-heart').addClass('active');
  $.ajax({
    url: window.favorite_add,
    method: 'POST',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      pro_id: pro_id,
    },
    success: function (response) {
      $('#favorite_count').load(window.location.href + ' #favorite_count_inr');
      $('#favorite_view').load(window.location.href + ' #favorite_view_inr');
    },
    error: function (res) {
      console.log(res);
    },
  });
}
//delete favourite
function deleteFavorite(pro_id) {
  $.ajax({
    url: window.favorite_delete,
    method: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      pro_id: pro_id,
    },
    success: function (response) {
      $('#favorite_count').load(window.location.href + ' #favorite_count_inr');
      $('#favorite_view').load(window.location.href + ' #favorite_view_inr');
    },
    error: function (res) {
      // console.log(res);
    },
  });
}

// filter change
function filterChange(
  pro_id,
  price,
  color_id = null,
  color = null,
  evt = null,
  input = null
) {
  if (evt != null) {
    $('.' + evt).html(color);
    $('.' + input).val(color_id);
  }
  let error = 0;
  $('.color-value').each(function () {
    if ($(this).val() == '') {
      error = 1;
    }
  });
  $('.size-value').each(function () {
    if ($(this).val() == '') {
      error = 1;
    }
  });
  let quantity = $('#product_filter_form .quantity1 input').val();
  let sizes = [];
  $('input[name="size[]"]').each(function () {
    if ($(this).val() != '') {
      sizes.push($(this).val());
    }
  });
  if (error) {
    $('.igo-p-price.calculate .select-all-filter').removeClass('d-none');
    $('.igo-p-price.calculate .amount').text(
      parseFloat(price * quantity).toFixed(2)
    );
    $('#product_current_price').val(parseFloat(price).toFixed(2));
  } else {
    $.ajax({
      url: window.get_price_by_filter,
      method: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: pro_id,
        sizes: sizes,
      },
      success: function (response) {
        if (response['price'] != 0) {
          $('.igo-p-price.calculate .text-danger').addClass('d-none');
          let total = response['price'] * quantity;
          $('.igo-p-price.calculate .amount').text(
            parseFloat(total).toFixed(2)
          );
          $('#product_current_price').val(
            parseFloat(response['price']).toFixed(2)
          );
        } else {
          $('.igo-p-price.calculate .text-danger').addClass('d-none');
          $('.igo-p-price.calculate .size-combination').removeClass('d-none');
          $('.igo-p-price.calculate .amount').text(
            parseFloat(price * quantity).toFixed(2)
          );
          $('#product_current_price').val(parseFloat(price).toFixed(2));
        }
      },
      error: function (res) {
        // console.log(res);
      },
    });
  }
}

// select all checkbox

var selectAllItems = '#select-all';
var checkboxItem = '.cart-checkbox';

$(selectAllItems).click(function () {
  if (this.checked) {
    $(checkboxItem).each(function () {
      this.checked = true;
    });
  } else {
    $(checkboxItem).each(function () {
      this.checked = false;
    });
  }
});

//update shipping type
function updateShippingType() {
  var type_id = $('[name=shipping_type]').val();
  var type = $('[name=shipping_type] [value=' + type_id + ']')
    .text()
    .trim();
  var country_id = $('[name=country]').val();
  var country = $('[name=country] [value=' + country_id + ']')
    .text()
    .trim();
  $.ajax({
    url: window.update_shipping_type,
    method: 'post',
    data: {
      type_id: type_id,
      country_id: country_id,
    },
    success: function (response) {
      $('#shipping_cost').html(response['shipping_price']);
      $('#sub_total').html(response['sub_total']);
      $('#contact_body [name=shipping_price]').val(
        response['shipping_price'].replace('€', '')
      );
      $('#contact_body [name=shipping_type]').val(type);
      $('#contact_body [name=country]').val(country);
      if (
        response['shipping_price'] ==
          'Sorry, we are not available in your country.' ||
        response['shipping_price'] ==
          'Sorry, shipping type not available for your country.'
      ) {
        $('#contact_body').addClass('d-none');
        $('#shipping_cost').css({ color: 'red' });
      } else {
        $('#contact_body').removeClass('d-none');
        $('#shipping_cost').css({ color: 'black' });
      }
    },
    error: function (res) {
      console.log(res);
    },
  });
}
$(document).on('change', '#checkout_all', function (e) {
  let is_checked = ['demo'];
  if ($(this).is(':checked') == false) {
    $('.cart-checkbox').each(function () {
      $(this).prop('checked', false);
    });
  } else {
    $('.cart-checkbox').each(function () {
      $(this).prop('checked', true);
      is_checked.push($(this).attr('data-vendor'));
    });
  }
  let shipping_country = $('#shipping_country').val();
  let shipping_type = $('#shipping_type').val();
  $.ajax({
    url: window.filter_cart,
    method: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      is_checked: is_checked,
      shipping_country: shipping_country,
      shipping_type: shipping_type,
    },
    success: function (response) {
      $('#cart_partial').html('');
      $('#cart_partial').html(response.html);
      $('[name=country]').val(response.country);
    },
    error: function (res) {
      console.log(res);
    },
  });
});
function filterCartData() {
  let is_checked = ['demo'];
  let tmp = 0;
  $('.cart-checkbox').each(function () {
    if ($(this).is(':checked')) {
      is_checked.push($(this).attr('data-vendor'));
    } else {
      tmp = 1;
    }
  });
  if (tmp) {
    $('#checkout_all').prop('checked', false);
  } else {
    $('#checkout_all').prop('checked', true);
  }
  let shipping_country = $('#shipping_country').val();
  let shipping_type = $('#shipping_type').val();
  $.ajax({
    url: window.filter_cart,
    method: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      is_checked: is_checked,
      shipping_country: shipping_country,
      shipping_type: shipping_type,
    },
    success: function (response) {
      console.log(response);
      $('#cart_partial').html('');
      $('#cart_partial').html(response.html);
      $('[name=country]').val(response.country);
      $('[name=shipping_type]').val(response.type_name);
      $('[name=country_id]').val(response.country_id);
      $('[name=type_id]').val(response.type_id);
    },
    error: function (res) {
      console.log(res);
    },
  });
}

function showOrderData() {
  if ($('#orderDataTable').find('#orderDataTableInr').length !== 0) {
    $('#orderDataTable').find('#orderDataTableInr').removeAttr('id');
    setTimeout(() => {
      $('#ordersData').DataTable({
        aaSorting: [],
        responsive: true,

        columnDefs: [
          {
            responsivePriority: 1,
            targets: 0,
          },
          {
            responsivePriority: 2,
            targets: -1,
          },
        ],
      });
    }, 200);
  }
}

var swiper = new Swiper(".home-electronics-container", {
  slidesPerView: 5,
  spaceBetween: 20,
  slidesPerGroup: 1,
  loopFillGroupWithBlank: true,
  navigation: {
    nextEl: ".home-electronics-next",
    prevEl: ".home-electronics-prev",
  },
  breakpoints: {
    400: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 2,
    },
    767: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});

// $(".mid-li").hover(
//   function (event) {
//     $(this).find(".cart-item-show").slideDown(200);
//   },
//   function () {
//     $(this).find(".cart-item-show").slideUp(200);
//   }
// );

$(document).on('click','.mid-li',function(){
  $(this).find(".cart-item-show").show();
})

$("body").click(function() {
    $('.mid-li').find(".cart-item-show").hide(200);
});




$(document).on("click", ".log-li", function (e) {
  if (
    $(e.target).hasClass("log-form") ||
    $(e.target).parents(".log-form").length
  ) {
  } else {
    $(this).find(".log-form").slideToggle(200);
  }
});

$(document).on("click", function (e) {
  if (
    !$(e.target).hasClass("show-btn") &&
    $(e.target).parents(".mbl-search-box").length === 0
  ) {
    $(".mbl-search-box").hide();
  }
  if (
    !$(e.target).hasClass("log-li") &&
    $(e.target).parents(".log-li").length === 0
  ) {
    $(this).find(".log-form").slideUp(200);
  }
});

var swiper = new Swiper(".home-electronics-container", {
  slidesPerView: 5,
  spaceBetween: 20,
  slidesPerGroup: 1,
  loopFillGroupWithBlank: true,
  navigation: {
    nextEl: ".home-electronics-next",
    prevEl: ".home-electronics-prev",
  },
  breakpoints: {
    400: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 2,
    },
    767: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});


$(document).on("click", ".ctm-select-txt", function () {
  $(".ctm-select-txt").removeClass("active-ctm-s");
  $(this).addClass("active-ctm-s");
  $(".ctm-select-txt").each(function () {
    if ($(this).hasClass("active-ctm-s")) {
      if ($(this).hasClass("ctm-slct-hide")) {
        $(this).removeClass("ctm-slct-hide");
        $(this).parent().find(".ctm-option-box").hide();
      } else {
        $(this).addClass("ctm-slct-hide");
        $(this).parent().find(".ctm-option-box").show();
      }
    } else {
      $(this).removeClass("ctm-slct-hide");
      $(this).parent().find(".ctm-option-box").hide();
    }
  });
});
$(document).on("click", ".ctm-option", function () {
  var option_val = $(this).text();
  $(this).parents().find(".active-ctm-s .select-txt").text(option_val);
  $(".ctm-option-box").hide();
  $(".ctm-select .ctm-select-txt").removeClass("ctm-slct-hide");
  // console.log(option_val);
});


$(document).on("click", function (e) {
  if (
    !$(e.target).hasClass("ctm-select-txt") &&
    $(e.target).parents(".ctm-select-txt").length === 0 &&
    $(e.target).parents(".ctm-option-box").length === 0
  ) {
    $(".ctm-option-box").hide();
    $(".ctm-select-txt").removeClass("ctm-slct-hide");
  }
});