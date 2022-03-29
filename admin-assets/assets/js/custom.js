$(function () {
  $(document).on('click', function (e) {
    if ($(e.target).parents('#modal-13').length === 0) {
      // console.log($(e.target).hasClass('modal-backdrop'));
      if ($(e.target).hasClass('modal-backdrop')) {
        $('#modal-13').modal('hide');
      }
    }
  });
  // $('[id^=userRoleEdit]').keypress(validateNumber);
  $('#proDes').on('input', function () {
    var scroll_height = $('#proDes').get(0).scrollHeight;
    $('#proDes').css('height', scroll_height + 'px');
  });

  if (
    $('.md-modal .well').height() + $('.md-modal .bg-dark').height() + 75 <=
    $(window).height()
  ) {
    $('.md-modal').height(
      $('.md-modal .well').height() + $('.md-modal .bg-dark').height() + 75
    );
  }
});

// insert menu main description

function insertMMDescription() {
  var description_en = $('#mm_description_en').val();
  var description_lt = $('#mm_description_lt').val();
  var description_rus = $('#mm_description_rus').val();
  $.ajax({
    url: window.insert_mm_description,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      description_en: description_en,
      description_lt: description_lt,
      description_rus: description_rus,
    },
    success: function (response) {
      $('.ck-mmd').click();
    },
  });
}
function appendItem(e) {
  if ($(e.target).parents('.append-size').find('.input-group').length == 1) {
    $(e.target)
      .parents('.append-size')
      .find('.input-group-prepend button')
      .addClass('btn-info');
  }
  $(e.target)
    .parents('.append-size')
    .append(
      '<div class="input-group mb-3">' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-info" type="button" onclick="removeItem(event)">' +
        '<i class="fa fa-minus"></i>' +
        '</button>' +
        '</div>' +
        '<input type="text" class="form-control" name="size_en[]" placeholder="Size En">' +
        '<input type="text" class="form-control" name="size_lt[]" placeholder="Size Lt">' +
        '<input type="text" class="form-control" name="size_rus[]" placeholder="Size Rus">' +
        '<div class="input-group-append">' +
        '<button class="btn btn-info" type="button" onclick="appendItem(event)">' +
        '<i class="fa fa-plus"></i>' +
        '</button>' +
        '</div>' +
        '</div>'
    );
}
function appendItemW(e) {
  if ($(e.target).parents('.append-size').find('.input-group').length == 1) {
    $(e.target)
      .parents('.append-size')
      .find('.input-group-prepend button')
      .addClass('btn-info');
  }
  $(e.target)
    .parents('.append-size')
    .append(
      '<div class="input-group mb-3">' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-info" type="button" onclick="removeItem(event)">' +
        '<i class="fa fa-minus"></i>' +
        '</button>' +
        '</div>' +
        '<input type="text" class="form-control" name="max_weight[]" placeholder="Maximum Weight">' +
        '<input type="text" class="form-control" name="price[]" placeholder="Price">' +
        '<div class="input-group-append">' +
        '<button class="btn btn-info" type="button" onclick="appendItemW(event)">' +
        '<i class="fa fa-plus"></i>' +
        '</button>' +
        '</div>' +
        '</div>'
    );
}
function appendItemP(e, id_c, cp) {
  let target = $(e.target);
  let price, id;
  if (cp == 'cpriceE') {
    id = $('#last_menu_id').val();
    price = $('#priceE').val();
  } else {
    id = $('#last_menu_idI').val();
    price = $('#price').val();
  }

  if ($(e.target).parents('.append-size').find('.input-group').length == 1) {
    $(e.target)
      .parents('.append-size')
      .find('.input-group-prepend button')
      .addClass('btn-info');
  }

  $.ajax({
    url: window.get_color_size_apnd_content,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
      id_c: id_c,
      cp: cp,
      price: price,
    },
    success: function (response) {
      // console.log($("#priceE").val());
      // console.log(cp);
      target.parents('.append-size').append(response);
    },
  });
}
function removeItem(e) {
  if ($(e.target).parents('.append-size').find('.input-group').length > 1) {
    if ($(e.target).parents('.append-size').find('.input-group').length == 2) {
      $(e.target)
        .parents('.append-size')
        .find('.input-group-prepend button')
        .removeClass('btn-info');
    }
    $(e.target).parents('.input-group').remove();
  }
}
// insert Custom Size
$('#custom_size_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);

  var size_name = $(event.currentTarget).find('#size_name_en').val().trim();
  var sizes = $(event.currentTarget)
    .find("[name='size_en[]']")
    .map(function () {
      if ($(this).val()) {
        return $(this).val();
      }
    })
    .get();
  if (size_name && sizes.length) {
    $.ajax({
      url: window.insert_custom_size,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        console.log(response);
        $('#custom_size_form').trigger('reset');
        $('.append-size').html(
          '<div class="input-group mb-3">' +
            '<div class="input-group-prepend">' +
            '<button class="btn" type="button" onclick="removeItem(event)">' +
            '<i class="fa fa-minus"></i>' +
            '</button>' +
            '</div>' +
            '<input type="text" class="form-control" name="size_en[]" placeholder="Size En">' +
            '<input type="text" class="form-control" name="size_lt[]" placeholder="Size Lt">' +
            '<input type="text" class="form-control" name="size_rus[]" placeholder="Size Rus">' +
            '<input type="text" class="form-control" name="size_pt[]" placeholder="Size Pt">' +
            '<input type="text" class="form-control" name="size_es[]" placeholder="Size Es">' +
            '<div class="input-group-append">' +
            '<button class="btn btn-info" type="button" onclick="appendItem(event)">' +
            '<i class="fa fa-plus"></i>' +
            '</button>' +
            '</div>' +
            '</div>'
        );
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Custom Size Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert all required fields at least in English.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});

// edit Custom Size
function editCustomSize(id, td) {
  $('.append-size').html(
    '<div class="input-group mb-3">' +
      '<div class="input-group-prepend">' +
      '<button class="btn" type="button" onclick="removeItem(event)">' +
      '<i class="fa fa-minus"></i>' +
      '</button>' +
      '</div>' +
      '<input type="text" class="form-control" name="size_en[]" placeholder="Size En">' +
      '<input type="text" class="form-control" name="size_lt[]" placeholder="Size Lt">' +
      '<input type="text" class="form-control" name="size_rus[]" placeholder="Size Rus">' +
      '<div class="input-group-append">' +
      '<button class="btn btn-info" type="button" onclick="appendItem(event)">' +
      '<i class="fa fa-plus"></i>' +
      '</button>' +
      '</div>' +
      '</div>'
  );
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_custom_size,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response['data'].id);
      $('.append-size-exist').html(response['html']);
      $('#size_name_enEdit').val(response['data'].name_en);
      $('#size_name_ltEdit').val(response['data'].name_lt);
      $('#size_name_rusEdit').val(response['data'].name_rus);
      $('#size_name_ptEdit').val(response['data'].name_pt);
      $('#size_name_esEdit').val(response['data'].name_es);
      $('.tdNuber').val(td);
    },
  });
}

//update SizeItem
function updateSizeItem(e, id) {
  let size_en = $(e.target)
    .parents('.input-group')
    .find('.size-old-en')
    .val()
    .trim();
  let size_lt = $(e.target)
    .parents('.input-group')
    .find('.size-old-lt')
    .val()
    .trim();
  let size_rus = $(e.target)
    .parents('.input-group')
    .find('.size-old-rus')
    .val()
    .trim();
  let size_pt = $(e.target)
    .parents('.input-group')
    .find('.size-old-pt')
    .val()
    .trim();
  let size_es = $(e.target)
    .parents('.input-group')
    .find('.size-old-es')
    .val()
    .trim();
  $.ajax({
    url: window.update_size_item,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
      size_en: size_en,
      size_lt: size_lt,
      size_rus: size_rus,
      size_pt: size_pt,
      size_es: size_es,
    },
    success: function (response) {
      $('.tr-' + $('.tdNuber').val())
        .find('.td-size-' + $('.tdNuber').val())
        .html(response);
    },
  });
}

//delete SizeItem
function deleteSizeItem(e, id) {
  $(e.target).parents('.input-group').remove();
  $.ajax({
    url: window.delete_size_item,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('.tr-' + $('.tdNuber').val())
        .find('.td-size-' + $('.tdNuber').val())
        .html(response);
    },
  });
}

// update Custom Size
function updateCustomSize() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);

  var size_name = $('#update_form').find('#size_name_enEdit').val().trim();
  var prev_sizes = $('#update_form').find(
    '.append-size-exist .input-group'
  ).length;
  if (!prev_sizes) {
    var sizes = $('#update_form')
      .find("[name='size_en[]']")
      .map(function () {
        if ($(this).val()) {
          return $(this).val();
        }
      })
      .get();
    prev_sizes = sizes.length;
  }
  if (size_name && prev_sizes) {
    $.ajax({
      url: window.update_custom_size,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Custom Size Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert all required field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Custom Size
function deleteCustomSize(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_custom_size,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Custom Size Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}

// insert Custom Color
$('#custom_color_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  var color = $(event.currentTarget).find('#color_en').val().trim();

  if (color) {
    $.ajax({
      url: window.insert_custom_color,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#custom_color_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Custom Color Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert color field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});

// edit Custom Color
function editCustomColor(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_custom_color,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#color_enEdit').val(response.color_en);
      $('#color_ltEdit').val(response.color_lt);
      $('#color_rusEdit').val(response.color_rus);
      $('#color_ptEdit').val(response.color_pt);
      $('#color_esEdit').val(response.color_es);
      $('#codeEdit').val(response.code);
      $('.tdNuber').val(td);
    },
  });
}

// update Custom Color
function updateCustomColor() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  var color = $('#update_form').find('#color_enEdit').val().trim();

  if (color) {
    $.ajax({
      url: window.update_custom_color,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Custom Color Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert color field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Custom Color
function deleteCustomColor(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_custom_color,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Custom Color Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}

// insert Yarn Color
$('#yarn_color_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  var color = $(event.currentTarget).find('#color_en').val().trim();

  if (color) {
    $.ajax({
      url: window.insert_yarn_color,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#yarn_color_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Yarn Color Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert color field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});

// edit Yarn Color
function editYarnColor(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_yarn_color,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#color_enEdit').val(response.color_en);
      $('#color_ltEdit').val(response.color_lt);
      $('#color_rusEdit').val(response.color_rus);
      $('#color_ptEdit').val(response.color_pt);
      $('#color_esEdit').val(response.color_es);
      $('#codeEdit').val(response.code);
      $('.tdNuber').val(td);
    },
  });
}

// update Yarn Color
function updateYarnColor() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  var color = $('#update_form').find('#color_enEdit').val().trim();

  if (color) {
    $.ajax({
      url: window.update_yarn_color,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Yarn Color Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert color field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Yarn Color
function deleteYarnColor(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_yarn_color,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Yarn Color Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}

// insert Specification
$('#specification_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  var name = $(event.currentTarget).find('#name_en').val().trim();

  if (name) {
    $.ajax({
      url: window.insert_specification,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#specification_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Specification Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert name field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});

// edit Specification
function editSpecification(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_specification,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#name_enEdit').val(response.name_en);
      $('#name_ltEdit').val(response.name_lt);
      $('#name_rusEdit').val(response.name_rus);
      $('#name_ptEdit').val(response.name_pt);
      $('#name_esEdit').val(response.name_es);
      $('.tdNuber').val(td);
    },
  });
}

// update Specification
function updateSpecification() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  var name = $('#update_form').find('#name_enEdit').val().trim();

  if (name) {
    $.ajax({
      url: window.update_specification,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Specification Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert name field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Specification
function deleteSpecification(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_specification,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Specification Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}
// edit Country
function editCountry(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_country,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#nameEdit').val(response.name);
      $('#codeEdit').val(response.code);
      if (response.status == 1) {
        $('#statusE').prop('checked', true);
      } else {
        $('#statusE').prop('checked', false);
      }
      $('.tdNuber').val(td);
    },
  });
}

// update Country
function updateCountry() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  var name = $('#update_form').find('#nameEdit').val().trim();
  var code = $('#update_form').find('#codeEdit').val().trim();

  if (name && code) {
    $.ajax({
      url: window.update_country,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Country Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert all field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Country
function deleteCountry(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_country,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Country Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}
// insert Shipping Type
$('#shipping_type_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  var type = $(event.currentTarget).find('#type').val().trim();

  if (type) {
    $.ajax({
      url: window.insert_shipping_type,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#shipping_type_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Shipping Type Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert type field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});
// edit Shipping Type
function editShippingType(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_shipping_type,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#typeEdit').val(response.type);
      if (response.status == 1) {
        $('#statusE').prop('checked', true);
      } else {
        $('#statusE').prop('checked', false);
      }
      $('.tdNuber').val(td);
    },
  });
}

// update Shipping Type
function updateShippingType() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  var type = $('#update_form').find('#typeEdit').val().trim();

  if (type) {
    $.ajax({
      url: window.update_shipping_type,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Shipping Type Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert type field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Shipping Type
function deleteShippingType(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_shipping_type,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Shipping Type Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}
// insert Shipping Category
$('#shipping_category_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  var name = $(event.currentTarget).find('#name').val().trim();

  if (name) {
    $.ajax({
      url: window.insert_shipping_category,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#shipping_category_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Shipping Category Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert category field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});
// edit Shipping Category
function editShippingCategory(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_shipping_category,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#nameEdit').val(response.name);
      if (response.status == 1) {
        $('#statusE').prop('checked', true);
      } else {
        $('#statusE').prop('checked', false);
      }
      $('.tdNuber').val(td);
    },
  });
}

// update Shipping Category
function updateShippingCategory() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  var name = $('#update_form').find('#nameEdit').val().trim();

  if (name) {
    $.ajax({
      url: window.update_shipping_category,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Shipping Category Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert category field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Shipping Category
function deleteShippingCategory(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_shipping_category,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Shipping Category Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}
// insert Shipping
$('#shipping_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  var country = $(event.currentTarget).find('#country').val();
  var type = $(event.currentTarget).find('#type').val();
  var category = $(event.currentTarget).find('#category').val();
  var price = $(event.currentTarget).find('#price').val();
  var additional_price = $(event.currentTarget).find('#additional_price').val();
  var max_weight = $(event.currentTarget).find('#max_weight').val();
  var additional_weight_price = $(event.currentTarget)
    .find('#additional_weight_price')
    .val();
  var max_price = $(event.currentTarget).find('#max_price').val();
  var vendor = $(event.currentTarget).find('#vendor').val();

  if (
    country.length != 0 &&
    type != 0 &&
    category != 0 &&
    additional_price.length != 0 &&
    price.length != 0 &&
    max_weight.length != 0 &&
    additional_weight_price.length != 0 &&
    max_price.length != 0 &&
    vendor.length != 0
  ) {
    $.ajax({
      url: window.insert_shipping,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#shipping_form').trigger('reset');
        $('.dt-responsive').html(response['html']);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Shipping Successfully Inserted.' + response['error'];
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert all field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});
// edit Shipping
function editShipping(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_shipping,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $("#countryEdit option[value='" + response.country_id + "']").prop(
        'selected',
        true
      );
      $("#typeEdit option[value='" + response.shipping_type_id + "']").prop(
        'selected',
        true
      );
      $(
        "#categoryEdit option[value='" + response.shipping_category_id + "']"
      ).prop('selected', true);
      $(
        "#processing_timeEdit option[value='" + response.processing_time + "']"
      ).prop('selected', true);
      $(
        "#delivery_fromEdit option[value='" + response.delivery_from + "']"
      ).prop('selected', true);
      $("#delivery_toEdit option[value='" + response.delivery_to + "']").prop(
        'selected',
        true
      );
      $("#vendorEdit option[value='" + response.vendor_id + "']").prop(
        'selected',
        true
      );
      $('#priceEdit').val(parseFloat(response.price).toFixed(2));
      $('#additional_priceEdit').val(
        parseFloat(response.additional_price).toFixed(2)
      );
      $('#max_weightEdit').val(parseFloat(response.max_weight).toFixed(2));
      $('#additional_weight_priceEdit').val(
        parseFloat(response.additional_weight_price).toFixed(2)
      );
      $('#max_priceEdit').val(parseFloat(response.max_price).toFixed(2));
      $('.tdNuber').val(td);
    },
  });
}

// update Shipping
function updateShipping() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  var country = $('#update_form').find('#countryEdit').val();
  var type = $('#update_form').find('#typeEdit').val();
  var category = $('#update_form').find('#categoryEdit').val();
  var processing_time = $('#update_form').find('#processing_timeEdit').val();
  var delivery_from = $('#update_form').find('#delivery_fromEdit').val();
  var delivery_to = $('#update_form').find('#delivery_toEdit').val();
  var price = $('#update_form').find('#priceEdit').val().trim();
  var additional_price = $('#update_form')
    .find('#additional_priceEdit')
    .val()
    .trim();
  var max_weight = $('#update_form').find('#max_weightEdit').val().trim();
  var additional_weight_price = $('#update_form')
    .find('#additional_weight_priceEdit')
    .val()
    .trim();
  var max_price = $('#update_form').find('#max_priceEdit').val().trim();
  var vendor = $('#update_form').find('#vendorEdit').val();
  if (
    country.length != 0 &&
    type != 0 &&
    category != 0 &&
    processing_time != 0 &&
    delivery_from != 0 &&
    delivery_to != 0 &&
    vendor != 0 &&
    price != '' &&
    additional_price != '' &&
    max_weight != '' &&
    additional_weight_price != '' &&
    max_price != ''
  ) {
    $.ajax({
      url: window.update_shipping,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('#update_form').trigger('reset');
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          $('#modal-13').modal('hide');
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Shipping Successfully Updated.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert all field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Shipping
function deleteShipping(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_shipping,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Shipping Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}
// insert Shipping Setting
$('#shipping_setting_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  $.ajax({
    url: window.insert_shipping_setting,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Shipping Setting Successfully Updated.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
});
// insert Setting
$('#setting_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  $.ajax({
    url: window.insert_setting,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Setting Successfully Updated.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
});
// insert Custom Clasp
$('#custom_clasp_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  var clasp = $(event.currentTarget).find('#name_en').val().trim();

  if (clasp) {
    $.ajax({
      url: window.insert_custom_clasp,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#custom_clasp_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Custom Clasp Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert clasp field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});

// edit Custom Clasp
function editCustomClasp(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_custom_clasp,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#name_enEdit').val(response.name_en);
      $('#name_ltEdit').val(response.name_lt);
      $('#name_rusEdit').val(response.name_rus);
      $('#name_ptEdit').val(response.name_pt);
      $('#name_esEdit').val(response.name_es);
      $('.tdNuber').val(td);
    },
  });
}

// update Custom Clasp
function updateCustomClasp() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  var clasp = $('#update_form').find('#name_enEdit').val().trim();
  if (clasp) {
    $.ajax({
      url: window.update_custom_clasp,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Custom Clasp Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert clasp field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Custom Clasp
function deleteCustomClasp(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_custom_clasp,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();

          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Custom Clasp Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}
// insert Vendor
$('#vendor_form').on('submit', function (event) {
  event.preventDefault();
  var _this = $(event.currentTarget);
  var error = 0;
  var form = $(this)[0];
  var formdata = new FormData(form);
  var name = _this.find('#name').val().trim();
  var email = _this.find('#email').val().trim();
  var password = _this.find('#password').val().trim();
  var password_confirm = _this.find('#password_confirm').val().trim();
  if (!name) {
    error = 1;
    _this.find('#name').addClass('is-invalid');
    _this
      .find('#name')
      .parent()
      .find('.invalid-feedback')
      .removeClass('d-none');
    _this
      .find('#name')
      .parent()
      .find('.invalid-feedback strong')
      .html('The name field is required.');
  } else {
    _this.find('#name').removeClass('is-invalid');
    _this.find('#name').parent().find('.invalid-feedback').addClass('d-none');
  }
  if (!email) {
    error = 1;
    _this.find('#email').addClass('is-invalid');
    _this
      .find('#email')
      .parent()
      .find('.invalid-feedback')
      .removeClass('d-none');
    _this
      .find('#email')
      .parent()
      .find('.invalid-feedback strong')
      .html('The email field is required.');
  } else {
    _this.find('#email').removeClass('is-invalid');
    _this.find('#email').parent().find('.invalid-feedback').addClass('d-none');
  }
  if (!password) {
    error = 1;
    _this.find('#password').addClass('is-invalid');
    _this
      .find('#password')
      .parent()
      .find('.invalid-feedback')
      .removeClass('d-none');
    _this
      .find('#password')
      .parent()
      .find('.invalid-feedback strong')
      .html('The password field is required.');
  } else {
    if (password != password_confirm) {
      error = 1;
      _this.find('#password').addClass('is-invalid');
      _this
        .find('#password')
        .parent()
        .find('.invalid-feedback')
        .removeClass('d-none');
      _this
        .find('#password')
        .parent()
        .find('.invalid-feedback strong')
        .html('The password confirmation does not match.');
    } else {
      _this.find('#password').removeClass('is-invalid');
      _this
        .find('#password')
        .parent()
        .find('.invalid-feedback')
        .addClass('d-none');
    }
  }

  if (!error) {
    $.ajax({
      url: window.insert_vendor,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.error) {
          _this.find('#email').addClass('is-invalid');
          _this
            .find('#email')
            .parent()
            .find('.invalid-feedback')
            .removeClass('d-none');
          _this
            .find('#email')
            .parent()
            .find('.invalid-feedback strong')
            .html(response.error);
        } else {
          _this.find('#email').removeClass('is-invalid');
          _this
            .find('#email')
            .parent()
            .find('.invalid-feedback')
            .addClass('d-none');
          $('#vendor_form').trigger('reset');
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();

          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Vendor Successfully Inserted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert all required filed.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});
// delete Vendor
function deleteVendor(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_vendor,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();

          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Vendor Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}
// insert page
$('#page_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  var title = $(event.currentTarget).find('#title_en').val().trim();
  var content = $(event.currentTarget).find('#content_en').val().trim();
  // console.log(content);
  if (title && content) {
    $.ajax({
      url: window.insert_page,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#page_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#content_en').code('');
        $('#content_lt').code('');
        $('#content_rus').code('');
        $('#content_pt').code('');
        $('#content_es').code('');

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Page Successfully Created.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert all required fields at least in english.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});

// edit Page
function editPage(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_page,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#title_enEdit').val(response.title_en);
      $('#title_ltEdit').val(response.title_lt);
      $('#title_rusEdit').val(response.title_rus);
      $('#title_ptEdit').val(response.title_pt);
      $('#title_esEdit').val(response.title_es);
      $('#content_enE').code(response.content_en);
      $('#content_ltE').code(response.content_lt);
      $('#content_rusE').code(response.content_rus);
      $('#content_ptE').code(response.content_pt);
      $('#content_esE').code(response.content_es);
      $('#content_enE').val(response.content_en);
      $('#content_ltE').val(response.content_lt);
      $('#content_rusE').val(response.content_rus);
      $('#content_ptE').val(response.content_pt);
      $('#content_esE').val(response.content_es);
      $('.tdNuber').val(td);
    },
  });
}

// update Page
function updatePage() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  var title = $('#update_form').find('#title_enEdit').val().trim();
  var content = $('#update_form').find('#content_enE').code();
  if (title && content) {
    $.ajax({
      url: window.update_page,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#content_enE').code('');
        $('#content_ltE').code('');
        $('#content_rusE').code('');
        $('#content_ptE').code('');
        $('#content_esE').code('');
        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Page Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert all required fields at least in english.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Page
function deletePage(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_page,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Page Successfully Deleted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  }
}
// insert api
$('#api_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  $.ajax({
    url: window.insert_api,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      $('#api_form').trigger('reset');
      $('.dt-responsive').html(response['html']);
      $('#simpletable').DataTable();
      $('#api_key').val(response['token']);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Api Successfully Created.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
});
// delete Api
function deleteApi(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_api,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Api Successfully Deleted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  }
}
// insert Surface Amber
$('#surface_amber_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  var surface_amber = $(event.currentTarget).find('#name_en').val().trim();

  if (surface_amber) {
    $.ajax({
      url: window.insert_surface_amber,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#surface_amber_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Surface Amber Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert surface amber field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});

// edit Surface Amber
function editSurfaceAmber(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_surface_amber,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#name_enEdit').val(response.name_en);
      $('#name_ltEdit').val(response.name_lt);
      $('#name_rusEdit').val(response.name_rus);
      $('#name_ptEdit').val(response.name_pt);
      $('#name_esEdit').val(response.name_es);
      $('.tdNuber').val(td);
    },
  });
}

// update Surface Amber
function updateSurfaceAmber() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);

  var surface_amber = $('#update_form').find('#name_enEdit').val().trim();

  if (surface_amber) {
    $.ajax({
      url: window.update_surface_amber,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Surface Amber Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert surface amber field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Surface Amber
function deleteSurfaceAmber(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_surface_amber,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();

          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Surface Amber Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}

// insert Menu
$('#menu_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];
  var formdata = new FormData(form);
  var menu = $(event.currentTarget).find('#menu_name_en').val().trim();

  if (menu) {
    $.ajax({
      url: window.insert_menu,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        //   console.log(response);
        $('#description_en').code('');
        $('#description_lt').code('');
        $('#description_rus').code('');
        $('#description_pt').code('');
        $('#description_es').code('');
        $('#menu_form').trigger('reset');
        $('#img_show').html('');
        $('#icon_show').html('');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        $('.select2-selection__choice').remove();
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Menu Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert menu field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});

// edit Menu
function editMenu(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_menu,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('.js-example-tokenizer2 option').prop('selected', false);
      $.each(response['selected_size'], function (i, e) {
        $(".js-example-tokenizer2 option[value='" + e + "']").prop(
          'selected',
          true
        );
      });
      $('.js-example-tokenizer2').select2();
      $('.js-example-tokenizer2-spec option').prop('selected', false);
      $.each(response['specification'], function (i, e) {
        $(".js-example-tokenizer2-spec option[value='" + e + "']").prop(
          'selected',
          true
        );
      });
      $('.js-example-tokenizer2-spec').select2();
      $('#description_enE').val(response['menu'].menu_info.description_en);
      $('#description_ltE').val(response['menu'].menu_info.description_lt);
      $('#description_rusE').val(response['menu'].menu_info.description_rus);
      $('#description_ptE').val(response['menu'].menu_info.description_pt);
      $('#description_esE').val(response['menu'].menu_info.description_es);
      $('#description_enE').code(response['menu'].menu_info.description_en);
      $('#description_ltE').code(response['menu'].menu_info.description_lt);
      $('#description_rusE').code(response['menu'].menu_info.description_rus);
      $('#description_ptE').code(response['menu'].menu_info.description_pt);
      $('#description_esE').code(response['menu'].menu_info.description_es);
      $('#img_showE').html(response['img']);
      $('#icon_showE').html(response['icon']);
      $('#menu_enEdit').val(response['menu'].menu_en);
      $('#menu_ltEdit').val(response['menu'].menu_lt);
      $('#menu_rusEdit').val(response['menu'].menu_rus);
      $('#menu_ptEdit').val(response['menu'].menu_pt);
      $('#menu_esEdit').val(response['menu'].menu_es);
      $('#url_enE').val(response['menu'].url_en);
      $('#url_ltE').val(response['menu'].url_lt);
      $('#url_rusE').val(response['menu'].url_rus);
      $('#url_ptE').val(response['menu'].url_pt);
      $('#url_esE').val(response['menu'].url_es);
      $('#idedit').val(response['menu'].id);
      $('.tdNuber').val(td);
    },
  });
}

// update Menu
function updateMenu() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);

  var menu = $('#update_form').find('#menu_enEdit').val().trim();

  if (menu) {
    $.ajax({
      url: window.update_menu,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Menu Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert menu field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Menu
function deleteMenu(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_menu,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();

          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Menu Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}
$(document).on('change', '.js-example-tokenizer', function () {
  let val = $(this).val();
  $('.js-example-tokenizer option').prop('selected', false);
  $.each(val, function (i, e) {
    $(".js-example-tokenizer option[value='" + e + "']").prop('selected', true);
  });
  if ($(this).hasClass('en')) {
    $('.js-example-tokenizer.lt').select2();
    $('.js-example-tokenizer.rus').select2();
    $('.js-example-tokenizer.pt').select2();
    $('.js-example-tokenizer.es').select2();
  } else if ($(this).hasClass('lt')) {
    $('.js-example-tokenizer.en').select2();
    $('.js-example-tokenizer.rus').select2();
    $('.js-example-tokenizer.pt').select2();
    $('.js-example-tokenizer.es').select2();
  } else if ($(this).hasClass('rus')) {
    $('.js-example-tokenizer.en').select2();
    $('.js-example-tokenizer.lt').select2();
    $('.js-example-tokenizer.pt').select2();
    $('.js-example-tokenizer.es').select2();
  } else if ($(this).hasClass('pt')) {
    $('.js-example-tokenizer.en').select2();
    $('.js-example-tokenizer.lt').select2();
    $('.js-example-tokenizer.rus').select2();
    $('.js-example-tokenizer.es').select2();
  } else if ($(this).hasClass('es')) {
    $('.js-example-tokenizer.en').select2();
    $('.js-example-tokenizer.lt').select2();
    $('.js-example-tokenizer.pt').select2();
    $('.js-example-tokenizer.rus').select2();
  }
});
$(document).on('change', '.js-example-tokenizer-spec', function () {
  let val = $(this).val();
  $('.js-example-tokenizer-spec option').prop('selected', false);
  $.each(val, function (i, e) {
    $(".js-example-tokenizer-spec option[value='" + e + "']").prop(
      'selected',
      true
    );
  });
  if ($(this).hasClass('en')) {
    $('.js-example-tokenizer-spec.lt').select2();
    $('.js-example-tokenizer-spec.rus').select2();
    $('.js-example-tokenizer-spec.pt').select2();
    $('.js-example-tokenizer-spec.es').select2();
  } else if ($(this).hasClass('lt')) {
    $('.js-example-tokenizer-spec.en').select2();
    $('.js-example-tokenizer-spec.rus').select2();
    $('.js-example-tokenizer-spec.pt').select2();
    $('.js-example-tokenizer-spec.es').select2();
  } else if ($(this).hasClass('rus')) {
    $('.js-example-tokenizer-spec.en').select2();
    $('.js-example-tokenizer-spec.lt').select2();
    $('.js-example-tokenizer-spec.pt').select2();
    $('.js-example-tokenizer-spec.es').select2();
  } else if ($(this).hasClass('pt')) {
    $('.js-example-tokenizer-spec.en').select2();
    $('.js-example-tokenizer-spec.lt').select2();
    $('.js-example-tokenizer-spec.rus').select2();
    $('.js-example-tokenizer-spec.es').select2();
  } else if ($(this).hasClass('es')) {
    $('.js-example-tokenizer-spec.en').select2();
    $('.js-example-tokenizer-spec.lt').select2();
    $('.js-example-tokenizer-spec.pt').select2();
    $('.js-example-tokenizer-spec.rus').select2();
  }
});
$(document).on('change', '.js-example-tokenizer-c', function () {
  let val = $(this).val();
  $('.js-example-tokenizer-c option').prop('selected', false);
  $.each(val, function (i, e) {
    $(".js-example-tokenizer-c option[value='" + e + "']").prop(
      'selected',
      true
    );
  });
  if ($(this).hasClass('en')) {
    $('.js-example-tokenizer-c.lt').select2();
    $('.js-example-tokenizer-c.rus').select2();
    $('.js-example-tokenizer-c.pt').select2();
    $('.js-example-tokenizer-c.es').select2();
  } else if ($(this).hasClass('lt')) {
    $('.js-example-tokenizer-c.en').select2();
    $('.js-example-tokenizer-c.rus').select2();
    $('.js-example-tokenizer-c.pt').select2();
    $('.js-example-tokenizer-c.es').select2();
  } else if ($(this).hasClass('rus')) {
    $('.js-example-tokenizer-c.en').select2();
    $('.js-example-tokenizer-c.lt').select2();
    $('.js-example-tokenizer-c.pt').select2();
    $('.js-example-tokenizer-c.es').select2();
  } else if ($(this).hasClass('pt')) {
    $('.js-example-tokenizer-c.en').select2();
    $('.js-example-tokenizer-c.lt').select2();
    $('.js-example-tokenizer-c.rus').select2();
    $('.js-example-tokenizer-c.es').select2();
  } else if ($(this).hasClass('es')) {
    $('.js-example-tokenizer-c.en').select2();
    $('.js-example-tokenizer-c.lt').select2();
    $('.js-example-tokenizer-c.pt').select2();
    $('.js-example-tokenizer-c.rus').select2();
  }
});
$(document).on('change', '.js-example-tokenizer-sa', function () {
  let val = $(this).val();
  $('.js-example-tokenizer-sa option').prop('selected', false);
  $.each(val, function (i, e) {
    $(".js-example-tokenizer-sa option[value='" + e + "']").prop(
      'selected',
      true
    );
  });
  if ($(this).hasClass('en')) {
    $('.js-example-tokenizer-sa.lt').select2();
    $('.js-example-tokenizer-sa.rus').select2();
    $('.js-example-tokenizer-sa.pt').select2();
    $('.js-example-tokenizer-sa.es').select2();
  } else if ($(this).hasClass('lt')) {
    $('.js-example-tokenizer-sa.en').select2();
    $('.js-example-tokenizer-sa.rus').select2();
    $('.js-example-tokenizer-sa.pt').select2();
    $('.js-example-tokenizer-sa.es').select2();
  } else if ($(this).hasClass('rus')) {
    $('.js-example-tokenizer-sa.en').select2();
    $('.js-example-tokenizer-sa.lt').select2();
    $('.js-example-tokenizer-sa.pt').select2();
    $('.js-example-tokenizer-sa.es').select2();
  } else if ($(this).hasClass('pt')) {
    $('.js-example-tokenizer-sa.en').select2();
    $('.js-example-tokenizer-sa.lt').select2();
    $('.js-example-tokenizer-sa.rus').select2();
    $('.js-example-tokenizer-sa.es').select2();
  } else if ($(this).hasClass('es')) {
    $('.js-example-tokenizer-sa.en').select2();
    $('.js-example-tokenizer-sa.lt').select2();
    $('.js-example-tokenizer-sa.pt').select2();
    $('.js-example-tokenizer-sa.rus').select2();
  }
});
$(document).on('change', '.js-example-tokenizer2', function () {
  let val = $(this).val();
  $('.js-example-tokenizer2 option').prop('selected', false);
  $.each(val, function (i, e) {
    $(".js-example-tokenizer2 option[value='" + e + "']").prop(
      'selected',
      true
    );
  });
  if ($(this).hasClass('en')) {
    $('.js-example-tokenizer2.lt').select2();
    $('.js-example-tokenizer2.rus').select2();
    $('.js-example-tokenizer2.pt').select2();
    $('.js-example-tokenizer2.es').select2();
  } else if ($(this).hasClass('lt')) {
    $('.js-example-tokenizer2.en').select2();
    $('.js-example-tokenizer2.rus').select2();
    $('.js-example-tokenizer2.pt').select2();
    $('.js-example-tokenizer2.es').select2();
  } else if ($(this).hasClass('rus')) {
    $('.js-example-tokenizer2.en').select2();
    $('.js-example-tokenizer2.lt').select2();
    $('.js-example-tokenizer2.pt').select2();
    $('.js-example-tokenizer2.es').select2();
  } else if ($(this).hasClass('pt')) {
    $('.js-example-tokenizer2.en').select2();
    $('.js-example-tokenizer2.lt').select2();
    $('.js-example-tokenizer2.rus').select2();
    $('.js-example-tokenizer2.es').select2();
  } else if ($(this).hasClass('es')) {
    $('.js-example-tokenizer2.en').select2();
    $('.js-example-tokenizer2.lt').select2();
    $('.js-example-tokenizer2.pt').select2();
    $('.js-example-tokenizer2.rus').select2();
  }
});
$(document).on('change', '.js-example-tokenizer2-spec', function () {
  let val = $(this).val();
  $('.js-example-tokenizer2-spec option').prop('selected', false);
  $.each(val, function (i, e) {
    $(".js-example-tokenizer2-spec option[value='" + e + "']").prop(
      'selected',
      true
    );
  });
  if ($(this).hasClass('en')) {
    $('.js-example-tokenizer2-spec.lt').select2();
    $('.js-example-tokenizer2-spec.rus').select2();
    $('.js-example-tokenizer2-spec.pt').select2();
    $('.js-example-tokenizer2-spec.es').select2();
  } else if ($(this).hasClass('lt')) {
    $('.js-example-tokenizer2-spec.en').select2();
    $('.js-example-tokenizer2-spec.rus').select2();
    $('.js-example-tokenizer2-spec.pt').select2();
    $('.js-example-tokenizer2-spec.es').select2();
  } else if ($(this).hasClass('rus')) {
    $('.js-example-tokenizer2-spec.en').select2();
    $('.js-example-tokenizer2-spec.lt').select2();
    $('.js-example-tokenizer2-spec.pt').select2();
    $('.js-example-tokenizer2-spec.es').select2();
  } else if ($(this).hasClass('pt')) {
    $('.js-example-tokenizer2-spec.en').select2();
    $('.js-example-tokenizer2-spec.lt').select2();
    $('.js-example-tokenizer2-spec.rus').select2();
    $('.js-example-tokenizer2-spec.es').select2();
  } else if ($(this).hasClass('es')) {
    $('.js-example-tokenizer2-spec.en').select2();
    $('.js-example-tokenizer2-spec.lt').select2();
    $('.js-example-tokenizer2-spec.pt').select2();
    $('.js-example-tokenizer2-spec.rus').select2();
  }
});
$(document).on('change', '.js-example-tokenizer-c2', function () {
  let val = $(this).val();
  $('.js-example-tokenizer-c2 option').prop('selected', false);
  $.each(val, function (i, e) {
    $(".js-example-tokenizer-c2 option[value='" + e + "']").prop(
      'selected',
      true
    );
  });
  if ($(this).hasClass('en')) {
    $('.js-example-tokenizer-c2.lt').select2();
    $('.js-example-tokenizer-c2.rus').select2();
    $('.js-example-tokenizer-c2.pt').select2();
    $('.js-example-tokenizer-c2.es').select2();
  } else if ($(this).hasClass('lt')) {
    $('.js-example-tokenizer-c2.en').select2();
    $('.js-example-tokenizer-c2.rus').select2();
    $('.js-example-tokenizer-c2.pt').select2();
    $('.js-example-tokenizer-c2.es').select2();
  } else if ($(this).hasClass('rus')) {
    $('.js-example-tokenizer-c2.en').select2();
    $('.js-example-tokenizer-c2.lt').select2();
    $('.js-example-tokenizer-c2.pt').select2();
    $('.js-example-tokenizer-c2.es').select2();
  } else if ($(this).hasClass('pt')) {
    $('.js-example-tokenizer-c2.en').select2();
    $('.js-example-tokenizer-c2.lt').select2();
    $('.js-example-tokenizer-c2.rus').select2();
    $('.js-example-tokenizer-c2.es').select2();
  } else if ($(this).hasClass('es')) {
    $('.js-example-tokenizer-c2.en').select2();
    $('.js-example-tokenizer-c2.lt').select2();
    $('.js-example-tokenizer-c2.pt').select2();
    $('.js-example-tokenizer-c2.rus').select2();
  }
});
$(document).on('change', '.js-example-tokenizer-sa2', function () {
  let val = $(this).val();
  $('.js-example-tokenizer-sa2 option').prop('selected', false);
  $.each(val, function (i, e) {
    $(".js-example-tokenizer-sa2 option[value='" + e + "']").prop(
      'selected',
      true
    );
  });
  if ($(this).hasClass('en')) {
    $('.js-example-tokenizer-sa2.lt').select2();
    $('.js-example-tokenizer-sa2.rus').select2();
    $('.js-example-tokenizer-sa2.pt').select2();
    $('.js-example-tokenizer-sa2.es').select2();
  } else if ($(this).hasClass('lt')) {
    $('.js-example-tokenizer-sa2.en').select2();
    $('.js-example-tokenizer-sa2.rus').select2();
    $('.js-example-tokenizer-sa2.pt').select2();
    $('.js-example-tokenizer-sa2.es').select2();
  } else if ($(this).hasClass('rus')) {
    $('.js-example-tokenizer-sa2.en').select2();
    $('.js-example-tokenizer-sa2.lt').select2();
    $('.js-example-tokenizer-sa2.pt').select2();
    $('.js-example-tokenizer-sa2.es').select2();
  } else if ($(this).hasClass('pt')) {
    $('.js-example-tokenizer-sa2.en').select2();
    $('.js-example-tokenizer-sa2.lt').select2();
    $('.js-example-tokenizer-sa2.rus').select2();
    $('.js-example-tokenizer-sa2.es').select2();
  } else if ($(this).hasClass('es')) {
    $('.js-example-tokenizer-sa2.en').select2();
    $('.js-example-tokenizer-sa2.lt').select2();
    $('.js-example-tokenizer-sa2.pt').select2();
    $('.js-example-tokenizer-sa2.rus').select2();
  }
});
$(document).on('change', '.js-example-tokenizer2-c', function () {
  let val = $(this).val();
  $('.js-example-tokenizer2-c option').prop('selected', false);
  $.each(val, function (i, e) {
    $(".js-example-tokenizer2-c option[value='" + e + "']").prop(
      'selected',
      true
    );
  });
  if ($(this).hasClass('en')) {
    $('.js-example-tokenizer2-c.lt').select2();
    $('.js-example-tokenizer2-c.rus').select2();
    $('.js-example-tokenizer2-c.pt').select2();
    $('.js-example-tokenizer2-c.es').select2();
  } else if ($(this).hasClass('lt')) {
    $('.js-example-tokenizer2-c.en').select2();
    $('.js-example-tokenizer2-c.rus').select2();
    $('.js-example-tokenizer2-c.pt').select2();
    $('.js-example-tokenizer2-c.es').select2();
  } else if ($(this).hasClass('rus')) {
    $('.js-example-tokenizer2-c.en').select2();
    $('.js-example-tokenizer2-c.lt').select2();
    $('.js-example-tokenizer2-c.pt').select2();
    $('.js-example-tokenizer2-c.es').select2();
  } else if ($(this).hasClass('pt')) {
    $('.js-example-tokenizer2-c.en').select2();
    $('.js-example-tokenizer2-c.lt').select2();
    $('.js-example-tokenizer2-c.rus').select2();
    $('.js-example-tokenizer2-c.es').select2();
  } else if ($(this).hasClass('es')) {
    $('.js-example-tokenizer2-c.en').select2();
    $('.js-example-tokenizer2-c.lt').select2();
    $('.js-example-tokenizer2-c.pt').select2();
    $('.js-example-tokenizer2-c.rus').select2();
  }
});
$(document).on('change', '.js-example-tokenizer2-sa', function () {
  let val = $(this).val();
  $('.js-example-tokenizer2-sa option').prop('selected', false);
  $.each(val, function (i, e) {
    $(".js-example-tokenizer2-sa option[value='" + e + "']").prop(
      'selected',
      true
    );
  });
  if ($(this).hasClass('en')) {
    $('.js-example-tokenizer2-sa.lt').select2();
    $('.js-example-tokenizer2-sa.rus').select2();
    $('.js-example-tokenizer2-sa.pt').select2();
    $('.js-example-tokenizer2-sa.es').select2();
  } else if ($(this).hasClass('lt')) {
    $('.js-example-tokenizer2-sa.en').select2();
    $('.js-example-tokenizer2-sa.rus').select2();
    $('.js-example-tokenizer2-sa.pt').select2();
    $('.js-example-tokenizer2-sa.es').select2();
  } else if ($(this).hasClass('rus')) {
    $('.js-example-tokenizer2-sa.en').select2();
    $('.js-example-tokenizer2-sa.lt').select2();
    $('.js-example-tokenizer2-sa.pt').select2();
    $('.js-example-tokenizer2-sa.es').select2();
  } else if ($(this).hasClass('pt')) {
    $('.js-example-tokenizer2-sa.en').select2();
    $('.js-example-tokenizer2-sa.lt').select2();
    $('.js-example-tokenizer2-sa.rus').select2();
    $('.js-example-tokenizer2-sa.es').select2();
  } else if ($(this).hasClass('es')) {
    $('.js-example-tokenizer2-sa.en').select2();
    $('.js-example-tokenizer2-sa.lt').select2();
    $('.js-example-tokenizer2-sa.pt').select2();
    $('.js-example-tokenizer2-sa.rus').select2();
  }
});
//get Custom Size From Menu
function getCtmSizeFM(e, s_id) {
  let id = $(e.target).val();
  $.ajax({
    url: window.get_custom_size_from_menu,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('.' + s_id + '.en').html(response['en']);
      $('.' + s_id + '.lt').html(response['lt']);
      $('.' + s_id + '.rus').html(response['rus']);
      $('.' + s_id + '.pt').html(response['pt']);
      $('.' + s_id + '.es').html(response['es']);
      $('.' + s_id + '-spec.en').html(response['spec_en']);
      $('.' + s_id + '-spec.lt').html(response['spec_lt']);
      $('.' + s_id + '-spec.rus').html(response['spec_rus']);
      $('.' + s_id + '-spec.pt').html(response['spec_pt']);
      $('.' + s_id + '-spec.es').html(response['spec_es']);
      $('.' + s_id + '-c.en').html(response['cen']);
      $('.' + s_id + '-c.lt').html(response['clt']);
      $('.' + s_id + '-c.rus').html(response['crus']);
      $('.' + s_id + '-c.pt').html(response['cpt']);
      $('.' + s_id + '-c.es').html(response['ces']);
      $('.' + s_id + '-sa.en').html(response['saen']);
      $('.' + s_id + '-sa.lt').html(response['salt']);
      $('.' + s_id + '-sa.rus').html(response['sarus']);
      $('.' + s_id + '-sa.pt').html(response['sapt']);
      $('.' + s_id + '-sa.es').html(response['saes']);
    },
  });
}
//get Custom Size From Sub Menu
function getCtmSizeFSM(e, s_id) {
  let _this = $(e.target);
  let id = $(e.target).val();
  if (id) {
    $.ajax({
      url: window.get_custom_size_from_sub_menu,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        $('.' + s_id + '.en').html(response['en']);
        $('.' + s_id + '.lt').html(response['lt']);
        $('.' + s_id + '.rus').html(response['rus']);
        $('.' + s_id + '.pt').html(response['pt']);
        $('.' + s_id + '.es').html(response['es']);
        $('.' + s_id).select2();
        $('.' + s_id + '-spec.en').html(response['spec_en']);
        $('.' + s_id + '-spec.lt').html(response['spec_lt']);
        $('.' + s_id + '-spec.rus').html(response['spec_rus']);
        $('.' + s_id + '-spec.pt').html(response['spec_pt']);
        $('.' + s_id + '-spec.es').html(response['spec_es']);
        $('.' + s_id + '-spec').select2();
      },
    });
  }
}

// insert Sub Menu
$('#sub_menu_form').on('submit', function (event) {
  event.preventDefault();
  let menu_id = $(".menu_s[name='menu_id']").val().trim();
  let sub_menu = $('#sub_menu_name_en').val().trim();
  if (menu_id && sub_menu) {
    var form = $(this)[0];
    var formdata = new FormData(form);
    $.ajax({
      url: window.insert_sub_menu,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#description_en').code('');
        $('#description_lt').code('');
        $('#description_rus').code('');
        $('#description_pt').code('');
        $('#description_es').code('');
        $('#img_show').html('');
        $('#sub_menu_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        $('.select2-selection__choice').remove();
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Sub Menu Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please select menu and insert submenu field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});
// edit Sub Menu
function editSubMenu(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_sub_menu,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
       console.log(response);
      $('.js-example-tokenizer2.en').html(response['selecte_option']['en']);
      $('.js-example-tokenizer2.lt').html(response['selecte_option']['lt']);
      $('.js-example-tokenizer2.rus').html(response['selecte_option']['rus']);
      $('.js-example-tokenizer2.pt').html(response['selecte_option']['pt']);
      $('.js-example-tokenizer2.es').html(response['selecte_option']['es']);
      $('.js-example-tokenizer2 option').prop('selected', false);
      $.each(response['selected_size'], function (i, e) {
        $(".js-example-tokenizer2 option[value='" + e + "']").prop(
          'selected',
          true
        );
      });
      $('.js-example-tokenizer2').select2();
      $('.js-example-tokenizer2-spec.en').html(response['specification']['en']);
      $('.js-example-tokenizer2-spec.lt').html(response['specification']['lt']);
      $('.js-example-tokenizer2-spec.rus').html(
        response['specification']['rus']
      );
      $('.js-example-tokenizer2-spec.pt').html(response['specification']['pt']);
      $('.js-example-tokenizer2-spec.es').html(response['specification']['es']);
      $('.js-example-tokenizer2-spec option').prop('selected', false);
      $.each(response['specifications'], function (i, e) {
        $(".js-example-tokenizer2-spec option[value='" + e + "']").prop(
          'selected',
          true
        );
      });
      $('.js-example-tokenizer2-spec').select2();
      $('#idedit').val(response['sub_menu'].id);
      $('.menu_s_m [value="' + response['sub_menu'].menu_id + '"]').prop(
        'selected',
        true
      );
      $('#subMenu_enEdit').val(response['sub_menu'].sub_menu_en);
      $('#subMenu_ltEdit').val(response['sub_menu'].sub_menu_lt);
      $('#subMenu_rusEdit').val(response['sub_menu'].sub_menu_rus);
      $('#subMenu_ptEdit').val(response['sub_menu'].sub_menu_pt);
      $('#subMenu_esEdit').val(response['sub_menu'].sub_menu_es);
      $('#url_enE').val(response['sub_menu'].url_en);
      $('#url_ltE').val(response['sub_menu'].url_lt);
      $('#url_rusE').val(response['sub_menu'].url_rus);
      $('#url_ptE').val(response['sub_menu'].url_pt);
      $('#url_esE').val(response['sub_menu'].url_es);
      $('#description_enE').val(
        response['sub_menu'].sub_menu_info.description_en
      );
      $('#description_ltE').val(
        response['sub_menu'].sub_menu_info.description_lt
      );
      $('#description_rusE').val(
        response['sub_menu'].sub_menu_info.description_rus
      );
      $('#description_ptE').val(
        response['sub_menu'].sub_menu_info.description_pt
      );
      $('#description_esE').val(
        response['sub_menu'].sub_menu_info.description_es
      );
      $('#description_enE').code(
        response['sub_menu'].sub_menu_info.description_en
      );
      $('#description_ltE').code(
        response['sub_menu'].sub_menu_info.description_lt
      );
      $('#description_rusE').code(
        response['sub_menu'].sub_menu_info.description_rus
      );
      $('#description_ptE').code(
        response['sub_menu'].sub_menu_info.description_pt
      );
      $('#description_esE').code(
        response['sub_menu'].sub_menu_info.description_es
      );
      $('#img_showE').html(response['img']);
      $('.tdNuber').val(td);
    },
  });
}

// update Sub Menu
function updateSubMenu() {
  var form = $('#update_form')[0];

  var formdata = new FormData(form);
  let menu_id = $(".menu_s_m[name='menu_id']").val().trim();
  let sub_menu = $('#subMenu_enEdit').val().trim();
  if (menu_id && sub_menu) {
    $.ajax({
      url: window.update_sub_menu,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
         console.log(response);
        $('#update_form').trigger('reset');
        //   $("#description_enE").code("");
        //   $("#description_ltE").code("");
        //   $("#description_rusE").code("");
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();

        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Sub Menu Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please select menu and insert submenu field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
}

// delete Sub Menu
function deleteSubMenu(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_sub_menu,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();

          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Data Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}

// insert Inner Menu
$('#inner_menu_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];

  var formdata = new FormData(form);
  let menu_id = $(".menu_s[name='menu_id']").val();
  let submenu_id = $(".sub_menu_s[name='sub_menu_id']").val();
  let inner_menu_en = $('#inner_menu_name_en').val();
  if (menu_id && submenu_id && inner_menu_en) {
    $.ajax({
      url: window.insert_inner_menu,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        $('#inner_menu_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#description_en').code('');
        $('#description_lt').code('');
        $('#description_rus').code('');
        $('#description_pt').code('');
        $('#description_es').code('');
        $('#img_show').html('');

        $('.select2-selection__choice').remove();
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Inner Menu Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please select menu, submenu and insert innermenu field.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});
// edit Inner Menu
function editInnerMenu(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_inner_menu,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      // console.log(response);
      $('.js-example-tokenizer2.en').html(response['selecte_option']['en']);
      $('.js-example-tokenizer2.lt').html(response['selecte_option']['lt']);
      $('.js-example-tokenizer2.rus').html(response['selecte_option']['rus']);
      $('.js-example-tokenizer2.pt').html(response['selecte_option']['pt']);
      $('.js-example-tokenizer2.es').html(response['selecte_option']['es']);
      $('.js-example-tokenizer2 option').prop('selected', false);
      $.each(response['selected_size'], function (i, e) {
        $(".js-example-tokenizer2 option[value='" + e + "']").prop(
          'selected',
          true
        );
      });
      $('.js-example-tokenizer2').select2();
      $('.js-example-tokenizer2-spec.en').html(response['specification']['en']);
      $('.js-example-tokenizer2-spec.lt').html(response['specification']['lt']);
      $('.js-example-tokenizer2-spec.rus').html(
        response['specification']['rus']
      );
      $('.js-example-tokenizer2-spec.pt').html(response['specification']['pt']);
      $('.js-example-tokenizer2-spec.es').html(response['specification']['es']);
      $('.js-example-tokenizer2-spec option').prop('selected', false);
      $.each(response['specifications'], function (i, e) {
        $(".js-example-tokenizer2-spec option[value='" + e + "']").prop(
          'selected',
          true
        );
      });
      $('.js-example-tokenizer2-spec').select2();
      $('.menu_s_m [value="' + response['innermenu'].menu_id + '"]').prop(
        'selected',
        true
      );
      $('#subMenuIdEn').html(response['submenu']['en']);
      $('#subMenuIdLt').html(response['submenu']['lt']);
      $('#subMenuIdRus').html(response['submenu']['rus']);
      $('#subMenuIdPt').html(response['submenu']['pt']);
      $('#subMenuIdEs').html(response['submenu']['es']);
      $('#innerMenu_enEdit').val(response['innermenu'].inner_menu_en);
      $('#innerMenu_ltEdit').val(response['innermenu'].inner_menu_lt);
      $('#innerMenu_rusEdit').val(response['innermenu'].inner_menu_rus);
      $('#innerMenu_ptEdit').val(response['innermenu'].inner_menu_pt);
      $('#innerMenu_esEdit').val(response['innermenu'].inner_menu_es);
      $('#url_enE').val(response['innermenu'].url_en);
      $('#url_ltE').val(response['innermenu'].url_lt);
      $('#url_rusE').val(response['innermenu'].url_rus);
      $('#url_ptE').val(response['innermenu'].url_pt);
      $('#url_esE').val(response['innermenu'].url_es);
      $('#description_enE').val(
        response['innermenu'].inner_menu_info.description_en
      );
      $('#description_ltE').val(
        response['innermenu'].inner_menu_info.description_lt
      );
      $('#description_rusE').val(
        response['innermenu'].inner_menu_info.description_rus
      );
      $('#description_ptE').val(
        response['innermenu'].inner_menu_info.description_pt
      );
      $('#description_esE').val(
        response['innermenu'].inner_menu_info.description_es
      );
      $('#description_enE').code(
        response['innermenu'].inner_menu_info.description_en
      );
      $('#description_ltE').code(
        response['innermenu'].inner_menu_info.description_lt
      );
      $('#description_rusE').code(
        response['innermenu'].inner_menu_info.description_rus
      );
      $('#description_ptE').code(
        response['innermenu'].inner_menu_info.description_pt
      );
      $('#description_esE').code(
        response['innermenu'].inner_menu_info.description_es
      );
      $('#img_showE').html(response['img']);
      $('.tdNuber').val(td);
      $('#idedit').val(id);
    },
  });
}

// update Inner Menu
function updateInnerMenu() {
  var form = $('#update_form')[0];

  var formdata = new FormData(form);
  let menu_id = $(".menu_s_m[name='menu_id']").val();
  let submenu_id = $(".sub_menu_s_m[name='sub_menu_id']").val();
  let inner_menu_en = $('#innerMenu_enEdit').val();
  let inner_menu_lt = $('#innerMenu_ltEdit').val();
  let inner_menu_rus = $('#innerMenu_rusEdit').val();
  if (
    menu_id &&
    submenu_id &&
    inner_menu_en &&
    inner_menu_lt &&
    inner_menu_rus
  ) {
    $.ajax({
      url: window.update_inner_menu,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#update_form').trigger('reset');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        $('#modal-13').modal('hide');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Inner Menu Successfully Updated.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  }
}

// delete Inner Menu
function deleteInnerMenu(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_inner_menu,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        $('.data').html(response);
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Data Successfully Deleted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  }
}
$(document).on('click', '.menu_s', (e) => {
  let menu_id = $(e.target).val();
  $('.menu_s [value="' + menu_id + '"]').prop('selected', true);
});
$(document).on('click', '.sub_menu_s', (e) => {
  let menu_id = $(e.target).val();
  $('.sub_menu_s [value="' + menu_id + '"]').prop('selected', true);
});
$(document).on('click', '.inner_menu_s_m', (e) => {
  let menu_id = $(e.target).val();
  $('.inner_menu_s_m [value="' + menu_id + '"]').prop('selected', true);
});
$(document).on('click', '.custom_size_s', (e) => {
  let menu_id = $(e.target).val();
  $('.custom_size_s [value="' + menu_id + '"]').prop('selected', true);
});

$(document).on('change', '.gsm', (e) => {
  let class_n = $(e.target).attr('class').split(' ');
  let id_c = class_n[1] == 'menu_s' ? 'menu_id_en' : 'menuIdEn';
  $.ajax({
    url: window.get_sub_menu_by_menu,
    method: 'POST',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: $(e.target).val(),
      id_c: id_c,
      class_n: class_n[1],
    },
    success: function (response) {
      let otn = '';
      if (class_n[1] == 'menu_s') {
        $('#sub_menu_id_en').html(otn + response['submenu'].en);
        $('#sub_menu_id_lt').html(otn + response['submenu'].lt);
        $('#sub_menu_id_rus').html(otn + response['submenu'].rus);
        $('#sub_menu_id_pt').html(otn + response['submenu'].pt);
        $('#sub_menu_id_es').html(otn + response['submenu'].es);
        $('#inner_menu_id_en').html('');
        $('#inner_menu_id_lt').html('');
        $('#inner_menu_id_rus').html('');
        $('#inner_menu_id_pt').html('');
        $('#inner_menu_id_es').html('');
        $('.append-size.ins').html('');
        $('.product-spec-en').html('');
        $('.product-spec-lt').html('');
        $('.product-spec-rus').html('');
        $('.product-spec-pt').html('');
        $('.product-spec-es').html('');

        if (response.isNotSubMenu) {
          $('.append-size.ins').html(response.filter.size);
          $('.product-spec-en').html(response.filter.specification_en);
          $('.product-spec-lt').html(response.filter.specification_lt);
          $('.product-spec-rus').html(response.filter.specification_rus);
          $('.product-spec-pt').html(response.filter.specification_pt);
          $('.product-spec-es').html(response.filter.specification_es);
          $('#last_menu_idI').val(response.filter.last_menu_id);
        }
        if (window.c_page == 'inner_sub_category') {
          $('.js-example-tokenizer.en').html(response['size'].en);
          $('.js-example-tokenizer.lt').html(response['size'].lt);
          $('.js-example-tokenizer.rus').html(response['size'].rus);
          $('.js-example-tokenizer.pt').html(response['size'].pt);
          $('.js-example-tokenizer.es').html(response['size'].es);
          $('.js-example-tokenizer').select2();
          $('.js-example-tokenizer-spec.en').html(response['specification'].en);
          $('.js-example-tokenizer-spec.lt').html(response['specification'].lt);
          $('.js-example-tokenizer-spec.rus').html(
            response['specification'].rus
          );
          $('.js-example-tokenizer-spec.pt').html(response['specification'].pt);
          $('.js-example-tokenizer-spec.es').html(response['specification'].es);
          $('.js-example-tokenizer-spec').select2();
        }
      } else {
        $('#subMenuIdEn').html(otn + response['submenu'].en);
        $('#subMenuIdLt').html(otn + response['submenu'].lt);
        $('#subMenuIdRus').html(otn + response['submenu'].rus);
        $('#subMenuIdPt').html(otn + response['submenu'].pt);
        $('#subMenuIdEs').html(otn + response['submenu'].es);
        $('#innerMenuIdEn').html('');
        $('#innerMenuIdLt').html('');
        $('#innerMenuIdRus').html('');
        $('#innerMenuIdPt').html('');
        $('#innerMenuIdEs').html('');

        $('.append-size.ins2').html('');
        $('.product-spec-enE').html('');
        $('.product-spec-ltE').html('');
        $('.product-spec-rusE').html('');
        $('.product-spec-ptE').html('');
        $('.product-spec-esE').html('');

        if (response.isNotSubMenu) {
          $('.append-size.ins2').html(response.filter.size);
          $('.product-spec-enE').html(response.filter.specification_en);
          $('.product-spec-ltE').html(response.filter.specification_lt);
          $('.product-spec-rusE').html(response.filter.specification_rus);
          $('.product-spec-ptE').html(response.filter.specification_pt);
          $('.product-spec-esE').html(response.filter.specification_es);
          $('#last_menu_id').val(response.filter.last_menu_id);
        }
        if (window.c_page == 'inner_sub_category') {
          $('.js-example-tokenizer2.en').html(response['size'].en);
          $('.js-example-tokenizer2.lt').html(response['size'].lt);
          $('.js-example-tokenizer2.rus').html(response['size'].rus);
          $('.js-example-tokenizer2.pt').html(response['size'].pt);
          $('.js-example-tokenizer2.es').html(response['size'].es);
          $('.js-example-tokenizer2').select2();
          $('.js-example-tokenizer2-spec.en').html(
            response['specification'].en
          );
          $('.js-example-tokenizer2-spec.lt').html(
            response['specification'].lt
          );
          $('.js-example-tokenizer2-spec.rus').html(
            response['specification'].rus
          );
          $('.js-example-tokenizer2-spec.pt').html(
            response['specification'].pt
          );
          $('.js-example-tokenizer2-spec.es').html(
            response['specification'].es
          );
          $('.js-example-tokenizer2-spec').select2();
          if (response['clasp']) {
            $('.js-example-tokenizer-c2.en').html(response['clasp'].en);
            $('.js-example-tokenizer-c2.lt').html(response['clasp'].lt);
            $('.js-example-tokenizer-c2.rus').html(response['clasp'].rus);
            $('.js-example-tokenizer-c2.pt').html(response['clasp'].pt);
            $('.js-example-tokenizer-c2.es').html(response['clasp'].es);
            $('.js-example-tokenizer-c2').select2();
          }
        }
      }
    },
  });
});
$(document).on('change', '.gssm', (e) => {
  alert(0);
  let target = $(e.target);
  let class_n = $(e.target).attr('class').split(' ');
  let id_c = class_n[1] == 'sub_menu_s' ? 'sub_menu_id_en' : 'subMenuIdEn';
  $.ajax({
    url: window.get_inner_menu_by_sub_menu,
    method: 'POST',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: $(e.target).val(),
      id_c: id_c,
      class_n: class_n[1],
    },
    success: function (response) {
      // console.log(response);
      let otn = '';
      if (window.c_page == 'product') {
        otn += '<option value="">Select</option>';
      }
      if (class_n[1] == 'sub_menu_s') {
        $('#inner_menu_id_en').html(otn + response.innermenu.en);
        $('#inner_menu_id_lt').html(otn + response.innermenu.lt);
        $('#inner_menu_id_rus').html(otn + response.innermenu.rus);
        $('#inner_menu_id_pt').html(otn + response.innermenu.pt);
        $('#inner_menu_id_es').html(otn + response.innermenu.es);

        if (response.isNotInnerMenu) {
          $('.append-size.ins').html(response.filter.size);
          $('.product-spec-en').html(response.filter.specification_en);
          $('.product-spec-lt').html(response.filter.specification_lt);
          $('.product-spec-rus').html(response.filter.specification_rus);
          $('.product-spec-pt').html(response.filter.specification_pt);
          $('.product-spec-es').html(response.filter.specification_es);
          $('#last_menu_idI').val(response.filter.last_menu_id);
        }
      } else {
        $('#innerMenuIdEn').html(otn + response.innermenu.en);
        $('#innerMenuIdLt').html(otn + response.innermenu.lt);
        $('#innerMenuIdRus').html(otn + response.innermenu.rus);
        $('#innerMenuIdPt').html(otn + response.innermenu.pt);
        $('#innerMenuIdEs').html(otn + response.innermenu.es);

        if (response.isNotInnerMenu) {
          $('.append-size.ins2').html(response.filter.size);
          $('.product-spec-enE').html(response.filter.specification_en);
          $('.product-spec-ltE').html(response.filter.specification_lt);
          $('.product-spec-rusE').html(response.filter.specification_rus);
          $('.product-spec-ptE').html(response.filter.specification_pt);
          $('.product-spec-esE').html(response.filter.specification_es);
          $('#last_menu_id').val(response.filter.last_menu_id);
        }
      }
    },
  });
});
$(document).on('change', '.gsim', (e) => {
  let class_n = $(e.target).attr('class').split(' ');
  let target = $(e.target);
  let id_c =
    class_n[1] == 'inner_menu_s' ? 'inner_menu_id_en' : 'innerMenuIdEn';
  $.ajax({
    url: window.get_custom_size_by_inner_menu,
    method: 'POST',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: $(e.target).val(),
      id_c: id_c,
      class_n: class_n[1],
    },
    success: function (response) {
      target.parents('form').find('.mso').html(response.en);
      target.parents('form').find('.cmso').html(response.cen);
      if (class_n[1] == 'inner_menu_s') {
        $('.append-size.ins').html(response.size);
        $('.product-spec-en').html(response.specification_en);
        $('.product-spec-lt').html(response.specification_lt);
        $('.product-spec-rus').html(response.specification_rus);
        $('.product-spec-pt').html(response.specification_pt);
        $('.product-spec-es').html(response.specification_es);
        $('#last_menu_idI').val(response.last_menu_id);
      } else {
        $('.append-size.ins2').html(response.size);
        $('.product-spec-enE').html(response.specification_en);
        $('.product-spec-ltE').html(response.specification_lt);
        $('.product-spec-rusE').html(response.specification_rus);
        $('.product-spec-ptE').html(response.specification_pt);
        $('.product-spec-esE').html(response.specification_es);
        $('#last_menu_id').val(response.last_menu_id);
      }
    },
  });
});

$(document).on('click', '.menu_s_m', (e) => {
  let menu_id = $(e.target).val();
  $('.menu_s_m [value="' + menu_id + '"]').prop('selected', true);
});
$(document).on('click', '.sub_menu_s_m', (e) => {
  let menu_id = $(e.target).val();
  $('.sub_menu_s_m [value="' + menu_id + '"]').prop('selected', true);
});
$(document).on('click', '.custom_size_s_m', (e) => {
  let menu_id = $(e.target).val();
  $('.custom_size_s_m [value="' + menu_id + '"]').prop('selected', true);
});
$(document).on('click', '.inner_menu_s', (e) => {
  let menu_id = $(e.target).val();
  $('.inner_menu_s [value="' + menu_id + '"]').prop('selected', true);
});

// insert Secondary Menu
$('#scd_menu_form').on('submit', (event) => {
  event.preventDefault();
  var form = $(this)[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.insert_scd_menu,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      $('#scd_menu_form').trigger('reset');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Secondary Menu Successfully Inserted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
});

// edit Secondary Menu
function editScdMenu(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_scd_menu,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#menu_enEdit').val(response.menu_en);
      $('#menu_ltEdit').val(response.menu_lt);
      $('#menu_rusEdit').val(response.menu_rus);
      $('#url_enE').val(response.url_en);
      $('#url_ltE').val(response.url_lt);
      $('#url_rusE').val(response.url_rus);
      $('.img-v img').attr('src', window.base_url + '/scdMenu/' + response.img);
      $('.tdNuber').val(td);
    },
  });
}

// update Secondary Menu
function updateScdMenu() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  $.ajax({
    url: window.update_scd_menu,
    type: 'post',
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      $('#update_form').trigger('reset');
      $('.data').html(response);
      $('#modal-13').modal('hide');
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Secondary Menu Successfully Updated.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
}

// delete Secondary Menu
function deleteScdMenu(id) {
  $.ajax({
    url: window.delete_scd_menu,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Secondary Menu Successfully Deleted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
}

// insert Secondary Sub Menu
$('#scd_sub_menu_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.insert_scd_sub_menu,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      $('#scd_sub_menu_form').trigger('reset');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Secondary Sub Menu Successfully Inserted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
});

// edit Secondary Sub Menu
function editScdSubMenu(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_scd_sub_menu,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      // console.log(response);
      $('#idedit').val(response.id);
      $('#menuId [value="' + response.menu_id + '"]').prop('selected', true);
      $('#subMenu_enEdit').val(response.sub_menu_en);
      $('#subMenu_ltEdit').val(response.sub_menu_lt);
      $('#subMenu_rusEdit').val(response.sub_menu_rus);
      $('#url_enE').val(response.url_en);
      $('#url_ltE').val(response.url_lt);
      $('#url_rusE').val(response.url_rus);
      $('.tdNuber').val(td);
    },
  });
}

// update Secondary Sub Menu
function updateScdSubMenu() {
  var form = $('#update_form')[0];
  var formdata = new FormData(form);
  $.ajax({
    url: window.update_scd_sub_menu,
    type: 'post',
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      $('#update_form').trigger('reset');
      $('.data').html(response);
      $('#modal-13').modal('hide');
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Secondary Sub Menu Successfully Updated.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
}

// delete Secondary Sub Menu
function deleteScdSubMenu(id) {
  $.ajax({
    url: window.delete_scd_sub_menu,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Data Successfully Deleted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
}

// Horizontal Click and Drag Scrolling with JS
var slider = document.querySelector('.table-responsive');
var isDown = false;
var startX;
var scrollLeft;
if (slider) {
  slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });
  slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
  });
  slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
  });
  slider.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    var x = e.pageX - slider.offsetLeft;
    var walk = (x - startX) * 3; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
  });
}
// insert Main Slider

$('#slider_upload_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.insert_slider,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(data);
      $('#slider_upload_form').trigger('reset');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Slider Successfully Inserted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
});

// edit Main Slider
function editSlider(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_slider,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('.sdr-img-v img').attr(
        'src',
        window.base_url + '/uploads/sliders/main/' + response.slider
      );

      $('#titleEn').val(response.title_en);
      $('#titleLt').val(response.title_lt);
      $('#titleRus').val(response.title_rus);

      $('#description_enE').val(response.description_en);
      $('#description_ltE').val(response.description_lt);
      $('#description_rusE').val(response.description_rus);
      $('#urlE').val(response.url);
      $('#btnName_enE').val(response.btn_name_en);
      $('#btnName_ltE').val(response.btn_name_lt);
      $('#btnName_rusE').val(response.btn_name_rus);
      // $("#descriptionE").height(
      //   document.getElementById("descriptionE").scrollHeight
      // );
      $('.tdNuber').val(td);
    },
  });
}

// Update Main Slider
function updateSlider() {
  var form = $('#update_form')[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.update_slider,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      $('#update_form').trigger('reset');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Slider Successfully Updated.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
      $('#modal-13').modal('hide');
    },
  });
}

// delete Slider
function deleteSlider(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_slider,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        $('.data').html(response);
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Data Successfully Deleted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  }
}
// insert Second Slider

$('#second_slider_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.insert_sslider,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(data);
      $('#second_slider_form').trigger('reset');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Slider Successfully Inserted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
});

// edit Second Slider
function editSSlider(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_sslider,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('.sdr-img-v img').attr(
        'src',
        window.base_url + '/secondSlider/' + response.img
      );
      $('.tdNuber').val(td);
    },
  });
}

// Update Second Slider
function updateSSlider() {
  var form = $('#update_form')[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.update_sslider,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      $('#update_form').trigger('reset');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Slider Successfully Updated.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
      $('#modal-13').modal('hide');
    },
  });
}

// delete Second Slider
function deleteSSlider(id) {
  $.ajax({
    url: window.delete_sslider,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Data Successfully Deleted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
}

// update certificate

$('#certificate_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];

  var formdata = new FormData(form);
  if (formdata.get('file')['name'] && formdata.get('price')) {
    var validImageTypes = [
      'image/gif',
      'image/jpeg',
      'image/png',
      'application/pdf',
    ];
    if ($.inArray(formdata.get('file')['type'], validImageTypes) < 0) {
      var x = document.getElementById('snackbar');
      x.style.background = 'red';
      x.innerHTML = 'Please upload image or pdf file.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    } else {
      $.ajax({
        url: window.update_certificate,
        method: 'POST',
        data: formdata,
        // dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
          $('#file_area').removeClass('invisible');
          $('#file_area .file-name').html(response.file);
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Certificate Successfully Updated.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        },
      });
    }
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please insert all fields.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 7000);
  }
});
// insert Partner

$('#partner_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.insert_partner,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(data);
      $('#partner_form').trigger('reset');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Slider Successfully Inserted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
});

// edit Partner
function editPartner(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_partner,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('.sdr-img-v img').attr(
        'src',
        window.base_url + '/partners/' + response.img
      );
      $('.tdNuber').val(td);
    },
  });
}

// Update Partner
function updatePartner() {
  var form = $('#update_form')[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.update_partner,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      $('#update_form').trigger('reset');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Slider Successfully Updated.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
      $('#modal-13').modal('hide');
    },
  });
}

// delete Partner
function deletePartner(id) {
  $.ajax({
    url: window.delete_partner,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Data Successfully Deleted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
}
// insert About

$('#about_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.insert_about,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Slider Successfully Inserted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
});
// insert homee Blog
// $('#home_blog_form #menu_id').change(function() {
//     if($(this).val() == 0) {
//         $(this).css({'border' : '1px solid red'});
//     }else {
//         $(this).css({'border' : '1px solid rgba(0,0,0,.15)'});
//     }
// });
// $('#home_blog_form #sub_menu_id').change(function() {
//     if($(this).val() == 0) {
//         $(this).css({'border' : '1px solid red'});
//     }else {
//         $(this).css({'border' : '1px solid rgba(0,0,0,.15)'});
//     }
// });
$('#home_blog_form #title_en').change(function () {
  if ($(this).val().trim().length == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});
$('#home_blog_form #title_lt').change(function () {
  if ($(this).val().trim().length == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});
$('#home_blog_form #title_rus').change(function () {
  if ($(this).val().trim().length == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});

$('#home_blog_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0],
    formdata = new FormData(form),
    // menu_id = $(this).find('#menu_id').val(),
    // sub_menu_id = $(this).find('#sub_menu_id').val(),
    title_en = $(this).find('#title_en').val(),
    title_lt = $(this).find('#title_lt').val(),
    title_rus = $(this).find('#title_rus').val(),
    error = 0;

  // if(menu_id == 0) {
  //     $(this).find('#menu_id').css({'border' : '1px solid red'});
  //     error++;
  // }else {
  //     $(this).find('#menu_id').css({'border' : '1px solid rgba(0,0,0,.15)'});
  // }

  // if($(this).find('#sub_menu_id option').length > 1) {
  //     if(sub_menu_id == 0) {
  //         $(this).find('#sub_menu_id').css({'border' : '1px solid red'});
  //         error++;
  //     }else {
  //         $(this).find('#sub_menu_id').css({'border' : '1px solid rgba(0,0,0,.15)'});
  //     }
  // }else {
  //     $(this).find('#sub_menu_id').css({'border' : '1px solid rgba(0,0,0,.15)'});
  // }
  if (title_en.trim().length == 0) {
    $(this).find('#title_en').css({ border: '1px solid red' });
    error++;
  } else {
    $(this).find('#title_en').css({ border: '1px solid rgba(0,0,0,.15)' });
  }
  if (title_lt.trim().length == 0) {
    $(this).find('#title_lt').css({ border: '1px solid red' });
    error++;
  } else {
    $(this).find('#title_lt').css({ border: '1px solid rgba(0,0,0,.15)' });
  }
  if (title_rus.trim().length == 0) {
    $(this).find('#title_rus').css({ border: '1px solid red' });
    error++;
  } else {
    $(this).find('#title_rus').css({ border: '1px solid rgba(0,0,0,.15)' });
  }
  if (error == 0) {
    $.ajax({
      url: window.insert_home_blog,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      xhr: function () {
        $('#home_blog_form #saveF input').addClass('d-none');
        $('#home_blog_form #saveF img').removeClass('d-none');
        var xhr = $.ajaxSettings.xhr();
        return xhr;
      },
      success: function (response) {
        // console.log(response);
        $('#blog_form').trigger('reset');
        $('#description_en').code('');
        $('#description_lt').code('');
        $('#description_rus').code('');
        $('.data').html(response);
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Blog Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);

        $('#home_blog_form #saveF input').removeClass('d-none');
        $('#home_blog_form #saveF img').addClass('d-none');
      },
      error: function (res) {
        console.log(res);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'Red';
    x.innerHTML = 'Please Insert All Information.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 5000);
  }
});

// edit home  Blog
function editHomeBlog(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_home_blog,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#title_enE').val(response.title_en);
      $('#title_ltE').val(response.title_lt);
      $('#title_rusE').val(response.title_rus);
      $('#description_enE').val(response.description_en);
      $('#description_ltE').val(response.description_lt);
      $('#description_rusE').val(response.description_rus);
      $('#description_enE').code(response.description_en);
      $('#description_ltE').code(response.description_lt);
      $('#description_rusE').code(response.description_rus);
      $('.sdr-img-v img').attr(
        'src',
        window.base_url + '/homeBlog/' + response.img
      );
      $('.tdNuber').val(td);
    },
  });
}

// Update home  Blog
function updateHomeBlog() {
  var form = $('#update_form')[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.update_home_blog,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      $('#update_form').trigger('reset');
      $('#description_enE').code('');
      $('#description_ltE').code('');
      $('#description_rusE').code('');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Blog Successfully Updated.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
      $('#modal-13').modal('hide');
    },
  });
}

// delete home  Blog
function deleHometeBlog(id) {
  $.ajax({
    url: window.delete_home_blog,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Blog Successfully Deleted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
}
// end home blog

// insert Blog
$('#blog_form #menu_id').change(function () {
  if ($(this).val() == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});
$('#blog_form #sub_menu_id').change(function () {
  if ($(this).val() == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});
$('#blog_form #title_en').change(function () {
  if ($(this).val().trim().length == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});
$('#blog_form #title_lt').change(function () {
  if ($(this).val().trim().length == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});
$('#blog_form #title_rus').change(function () {
  if ($(this).val().trim().length == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});

$('#blog_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0],
    formdata = new FormData(form),
    title = $(this).find('#title').val(),
    description = $(this).find('#description').val();

  if (title && description) {
    $.ajax({
      url: window.insert_blog,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        $('#blog_form').trigger('reset');
        $('#description').code('');
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Blog Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
        $('.image-area').removeClass('d-none');
        $('.video-area').addClass('d-none');
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'Red';
    x.innerHTML = 'Please Insert All Information.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 5000);
  }
});

// edit  Blog
function editBlog(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_blog,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      // console.log(response);
      $('#idedit').val(response.id);
      $('#titleE').val(response.title);
      $('#descriptionE').val(response.description);
      $('#descriptionE').code(response.description);
      if (response.video) {
        $('#isVideoE').prop('checked', true);
        $('.image-areaE').addClass('d-none');
        $('.video-areaE').removeClass('d-none');
        $('#videoE').val(response.video);
        $('.sdr-video-v').html(
          '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' +
            response.video +
            '"></iframe>'
        );
      } else {
        $('#isVideoE').prop('checked', false);
        $('#videoE').val('');
        $('.image-areaE').removeClass('d-none');
        $('.video-areaE').addClass('d-none');
        if (response.img) {
          $('.sdr-img-v').html(
            '<img src="' +
              window.base_url +
              '//uploads/blogs/' +
              response.img +
              '" alt="img">'
          );
        } else {
          $('.sdr-img-v').html('');
        }
      }
      $('.tdNuber').val(td);
    },
  });
}

// Update Blog
function updateBlog() {
  var form = $('#update_form')[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.update_blog,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      $('#update_form').trigger('reset');
      $('#description_enE').code('');
      $('#description_ltE').code('');
      $('#description_rusE').code('');
      $('.dt-responsive').html(response['html']);
      $('#simpletable').DataTable();
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Blog Successfully Updated.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
      $('#modal-13').modal('hide');
    },
  });
}

// delete  Blog
function deleteBlog(id) {
  $.ajax({
    url: window.delete_blog,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('.dt-responsive').html(response);
      $('#simpletable').DataTable();
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Blog Successfully Deleted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
}

// insert Product
$('#product_form .menu_s').change(function () {
  if ($(this).val() == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});
$('#product_form .sub_menu_s').change(function () {
  if ($(this).val() == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});
$('#product_form .inner_menu_s').change(function () {
  if ($(this).val() == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});
$('#product_form #title_en').change(function () {
  if ($(this).val().trim().length == 0) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});
$('#product_form #price').change(function () {
  if (
    $(this).val().trim() == 0 ||
    $(this).val().trim() == null ||
    $(this).val().trim() == ''
  ) {
    $(this).css({ border: '1px solid red' });
  } else {
    $(this).css({ border: '1px solid rgba(0,0,0,.15)' });
  }
});

$('#product_form').on('submit', function (event) {
  $('#create_product .nav-tabs [href="#lenEn"]').click();
  event.preventDefault();
  var form = $(this)[0],
    formdata = new FormData(form),
    menu_id = $(this).find('.menu_s').val(),
    sub_menu_id = $(this).find('.sub_menu_s').val(),
    inner_menu_id = $(this).find('.inner_menu_s').val(),
    title = $(this).find('#title_en').val(),
    price = $(this).find('#price').val(),
    error = 0;
  if (menu_id) {
    $(this).find('.menu_s').css({ border: '1px solid rgba(0,0,0,.15)' });
  } else {
    $(this).find('.menu_s').css({ border: '1px solid red' });
    error++;
  }
  if (sub_menu_id || sub_menu_id != null) {
    if (
      $(this).find('#sub_menu_id_en option').length > 1 &&
      sub_menu_id.length == 0
    ) {
      $(this).find('.sub_menu_s').css({ border: '1px solid red' });
      error++;
    } else {
      $(this).find('.sub_menu_s').css({ border: '1px solid rgba(0,0,0,.15)' });
    }
  } else {
    if ($(this).find('#sub_menu_id_en option').length > 1) {
      $(this).find('.sub_menu_s').css({ border: '1px solid red' });
      error++;
    } else {
      $(this).find('.sub_menu_s').css({ border: '1px solid rgba(0,0,0,.15)' });
    }
  }
  if (inner_menu_id || inner_menu_id != null) {
    if (
      $(this).find('#inner_menu_id_en option').length > 1 &&
      inner_menu_id.length == 0
    ) {
      $(this).find('.inner_menu_s').css({ border: '1px solid red' });
      error++;
    } else {
      $(this)
        .find('.inner_menu_s')
        .css({ border: '1px solid rgba(0,0,0,.15)' });
    }
  } else {
    if ($(this).find('#inner_menu_id_en option').length > 1) {
      $(this).find('.inner_menu_s').css({ border: '1px solid red' });
      error++;
    } else {
      $(this)
        .find('.inner_menu_s')
        .css({ border: '1px solid rgba(0,0,0,.15)' });
    }
  }
  if (title.length == 0) {
    $(this).find('#title_en').css({ border: '1px solid red' });
    error++;
  } else {
    $(this).find('#title_en').css({ border: '1px solid rgba(0,0,0,.15)' });
  }
  if (price == 0 || price == null || price == '') {
    $(this).find('#price').css({ border: '1px solid red' });
    error++;
  } else {
    $(this).find('#price').css({ border: '1px solid rgba(0,0,0,.15)' });
  }

  if (error == 0) {
    $.ajax({
      url: window.insert_product,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      xhr: function () {
        $('#product_form #saveF input').addClass('d-none');
        $('#product_form #saveF img').removeClass('d-none');
        var xhr = $.ajaxSettings.xhr();
        return xhr;
      },
      success: function (response) {
        if (response['error']) {
          $('#product_form #saveF input').removeClass('d-none');
          $('#product_form #saveF img').addClass('d-none');
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('#product_form .append-size .input-group').each(function (i, e) {
            if (i != 0) {
              $(this).remove();
            } else {
              $(this).find('.mso').html('');
              $(this).find('.mso').select2();
            }
          });
          $('#product_form').trigger('reset');
          $('.sub_menu_s').html('<option value="0">Select Sub Menu</option>');
          // $(".inner_menu_s").html('<option value="0">Select Inner Menu</option>');
          $('#description_en').code('');
          $('#description_lt').code('');
          $('#description_rus').code('');
          $('#description_pt').code('');
          $('#description_es').code('');
          $('#delivery_en').code('');
          $('#delivery_lt').code('');
          $('#delivery_rus').code('');
          $('#delivery_pt').code('');
          $('#delivery_es').code('');
          $('#specification_en').code('');
          $('#specification_lt').code('');
          $('#specification_rus').code('');
          $('#specification_pt').code('');
          $('#specification_es').code('');
          $('#others').code('');
          $('#main_img_show').html('');
          $('#alt_img_show').html('');
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          $('.multi-slt').select2();
          $('#new_s').prop('checked', false);
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Product Successfully Inserted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
          $('#product_form #saveF input').removeClass('d-none');
          $('#product_form #saveF img').addClass('d-none');
        }
      },
      error: function (res) {
        console.log(res);
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please Insert All Required Information.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 5000);
  }
});

// Get Sub Menu By Menu

function getSubMenuByMenu(id, show_id) {
  $.ajax({
    url: window.get_sub_menu_by_menu,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      // console.log(response);
      $(show_id).html(response);
      $(show_id).css({ border: '1px solid rgba(0,0,0,.15)' });
    },
  });
}

// update product color single
function updateProductSize(e, id) {
  let sizes = [];
  $('select[name="product_size2[' + id + '][size][]"] option:selected').each(
    function () {
      sizes.push($(this).val());
    }
  );
  let price = $(e.target).parents('.input-group').find('.cpricepE').val();
  // console.log(sizes);
  $.ajax({
    url: window.update_product_size_single,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
      sizes: sizes,
      price: price,
    },
    success: function (response) {
      // console.log(response);
    },
  });
}

// delete product color single
function deleteProductSize(e, id) {
  if (confirm('Are you sure?')) {
    $(e.target).parents('.input-group').remove();
    $.ajax({
      url: window.delete_product_size_single,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {},
    });
  }
}

// edit Product
function editProduct(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $('#product_color_addE').removeClass('d-none');
  $.ajax({
    url: window.edit_product,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (r) {
      $('.menu_s_m option[value=' + r['product'].menu_id + ']').prop(
        'selected',
        true
      );

      $(
        '#shipping_category_idEditsct option[value=' +
          r['product'].shipping_category_id +
          ']'
      ).prop('selected', true);
      
      $.each(r.csCategories, function (index, val){
        $(
          '#shipping_category_idEditsct option[value=' +
          val.shipping_category_id +
            ']'
        ).prop('selected', true);
      })
      
      $('.editsCat').select2();


      // $(".editsCat option[value='" + r['product'].shipping_category_id + "']").prop(
      //   'selected',
      //   true
      // );


      $('#vendorEdit option[value=' + r['product'].vendor_id + ']').prop(
        'selected',
        true
      );
      $('.js-example-tokenizer-c2').select2();
      $('.js-example-tokenizer-clr2').html(r['color']);
      $('.js-example-tokenizer-clr2 option').prop('selected', false);
      if (r['product'].product_price) {
        $.each(r['product'].product_price.custom_colors, function (i, e) {
          // console.log(e.id);
          $(".js-example-tokenizer-clr2 option[value='" + e.id + "']").prop(
            'selected',
            true
          );
        });
      }
      $('.js-example-tokenizer-clr2').select2();
      $('#subMenuIdEn').html(r['submenu']['en']);
      $('#subMenuIdLt').html(r['submenu']['lt']);
      $('#subMenuIdRus').html(r['submenu']['rus']);
      $('#subMenuIdPt').html(r['submenu']['pt']);
      $('#subMenuIdEs').html(r['submenu']['es']);
      $('#innerMenuIdEn').html(r['innermenu']['en']);
      $('#innerMenuIdLt').html(r['innermenu']['lt']);
      $('#innerMenuIdRus').html(r['innermenu']['rus']);
      $('#innerMenuIdPt').html(r['innermenu']['pt']);
      $('#innerMenuIdEs').html(r['innermenu']['es']);
      $('#idedit').val(r['product'].id);
      $('#last_menu_id').val(r['last_menu_id']);
      $('#title_enE').val(r['product'].title_en);
      $('#title_ltE').val(r['product'].title_lt);
      $('#title_rusE').val(r['product'].title_rus);
      $('#title_ptE').val(r['product'].title_pt);
      $('#title_esE').val(r['product'].title_es);
      $('#url_enE').val(r['product'].url_en);
      $('#url_ltE').val(r['product'].url_lt);
      $('#url_rusE').val(r['product'].url_rus);
      $('#url_ptE').val(r['product'].url_pt);
      $('#url_esE').val(r['product'].url_es);
      $('#description_enE').val(r['product'].description_en);
      $('#description_ltE').val(r['product'].description_lt);
      $('#description_rusE').val(r['product'].description_rus);
      $('#description_ptE').val(r['product'].description_pt);
      $('#description_esE').val(r['product'].description_es);
      $('#description_enE').code(r['product'].description_en);
      $('#description_ltE').code(r['product'].description_lt);
      $('#description_rusE').code(r['product'].description_rus);
      $('#description_ptE').code(r['product'].description_pt);
      $('#description_esE').code(r['product'].description_es);
      $('#delivery_enE').val(r['product'].delivery_en);
      $('#delivery_ltE').val(r['product'].delivery_lt);
      $('#delivery_rusE').val(r['product'].delivery_rus);
      $('#delivery_ptE').val(r['product'].delivery_pt);
      $('#delivery_esE').val(r['product'].delivery_es);
      $('#delivery_enE').code(r['product'].delivery_en);
      $('#delivery_ltE').code(r['product'].delivery_lt);
      $('#delivery_rusE').code(r['product'].delivery_rus);
      $('#delivery_ptE').code(r['product'].delivery_pt);
      $('#delivery_esE').code(r['product'].delivery_es);
      $('#specification_enE').val(r['product'].specification_en);
      $('#specification_ltE').val(r['product'].specification_lt);
      $('#specification_rusE').val(r['product'].specification_rus);
      $('#specification_ptE').val(r['product'].specification_pt);
      $('#specification_esE').val(r['product'].specification_es);
      $('#specification_enE').code(r['product'].specification_en);
      $('#specification_ltE').code(r['product'].specification_lt);
      $('#specification_rusE').code(r['product'].specification_rus);
      $('#specification_ptE').code(r['product'].specification_pt);
      $('#specification_esE').code(r['product'].specification_es);
      $('#codeE').val(r['product'].code);
      if (r['product'].weight) {
        $('#weightE').val(r['product'].weight.toFixed(2));
      } else {
        $('#weightE').val(r['product'].weight);
      }
      if (r['product'].product_price) {
        if (r['product'].product_price.price) {
          $('#priceE').val(r['product'].product_price.price.toFixed(2));
          $('#discountE').val(r['product'].product_price.discount);
        }
      } else {
        $('#priceE').val('');
        $('#discountE').val('');
      }
      $('#othersE').val(r['product'].others);
      $('#othersE').code(r['product'].others);
      $('#urlE').val(r['product'].url);
      $('#product_color_addE').html(r['pro_color']);
      $('#update_form .append-size.ins2').html(r['append_item']);
      $('.msoE').select2();
      $('.mso').select2();
      $('#main_img_showE').html(r['main_img']);
      $('#alt_img_showE').html(r['alt_img']);
      if (r['product'].new_s == 1) {
        $('#new_sE').prop('checked', true);
      } else {
        $('#new_sE').prop('checked', false);
      }
      if (r['product'].is_stock == 1) {
        $('#id_stockE').prop('checked', true);
      } else {
        $('#id_stockE').prop('checked', false);
      }
      if (r['product'].is_top_product == 1) {
        $('#is_top_proE').prop('checked', true);
      } else {
        $('#is_top_proE').prop('checked', false);
      }
      if (r['product'].is_free_shipping == 1) {
        $('#is_free_shippingE').prop('checked', true);
      } else {
        $('#is_free_shippingE').prop('checked', false);
      }
      if (r['product'].is_certificate == 1) {
        $('#is_certificateE').prop('checked', true);
      } else {
        $('#is_certificateE').prop('checked', false);
      }
      $('#alt_imgE').attr(
        'onchange',
        "showAltImg(event, '#alt_img_showE', 'pro_alt_temp_imgE', " +
          r['product'].id +
          ')'
      );
      $('.product-spec-enE').html(r.specification_en);
      $('.product-spec-ltE').html(r.specification_lt);
      $('.product-spec-rusE').html(r.specification_rus);
      $('.product-spec-ptE').html(r.specification_pt);
      $('.product-spec-esE').html(r.specification_es);
      if (r['product'].product_specifications) {
        $.each(r['product'].product_specifications, function (i, e) {
          var space_name = e.specification.name_en
            .toLowerCase()
            .replace(/\ /g, '_');
          $('#' + space_name + '_enEdit').val(e.text_en);
          $('#' + space_name + '_ltEdit').val(e.text_lt);
          $('#' + space_name + '_rusEdit').val(e.text_rus);
          $('#' + space_name + '_ptEdit').val(e.text_pt);
          $('#' + space_name + '_esEdit').val(e.text_es);
        });
      }
      $('.tdNuber').val(td);
    },
  });
}
// duplicate Product
function duplicateProduct(event, id) {
  $('html, body').animate(
    {
      scrollTop: $('#create_product').offset().top,
    },
    800
  );
  $.ajax({
    url: window.duplicate_product,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (r) {
      // console.log(r);
      $('.menu_s option[value=' + r['product'].menu_id + ']').prop(
        'selected',
        true
      );
      $(
        '#shipping_category_id option[value=' +
          r['product'].shipping_category_id +
          ']'
      ).prop('selected', true);
      
      $.each(r.csCategories, function (index, val){
        $(
          '#shipping_category_id option[value=' +
          val.shipping_category_id +
            ']'
        ).prop('selected', true);
      })
      alert(0);
      
      $('.copysCat').select2();

      $('#vendor_id option[value=' + r['product'].vendor_id + ']').prop(
        'selected',
        true
      );
      $('.js-example-tokenizer-c').select2();
      $('.js-example-tokenizer-clr').html(r['color']);
      $('.js-example-tokenizer-clr option').prop('selected', false);
      if (r['product'].product_price) {
        $.each(r['product'].product_price.custom_colors, function (i, e) {
          // console.log(e.id);
          $(".js-example-tokenizer-clr option[value='" + e.id + "']").prop(
            'selected',
            true
          );
        });
      }
      $('.js-example-tokenizer-clr').select2();
      $('#sub_menu_id_en').html(r['submenu']['en']);
      $('#sub_menu_id_lt').html(r['submenu']['lt']);
      $('#sub_menu_id_rus').html(r['submenu']['rus']);
      $('#sub_menu_id_pt').html(r['submenu']['pt']);
      $('#sub_menu_id_es').html(r['submenu']['es']);
      $('#inner_menu_id_en').html(r['innermenu']['en']);
      $('#inner_menu_id_lt').html(r['innermenu']['lt']);
      $('#inner_menu_id_rus').html(r['innermenu']['rus']);
      $('#inner_menu_id_pt').html(r['innermenu']['pt']);
      $('#inner_menu_id_es').html(r['innermenu']['es']);
      $('#title_en').val(r['product'].title_en);
      $('#title_lt').val(r['product'].title_lt);
      $('#title_rus').val(r['product'].title_rus);
      $('#title_pt').val(r['product'].title_pt);
      $('#title_es').val(r['product'].title_es);
      $('#url_en').val(r['product'].url_en);
      $('#url_lt').val(r['product'].url_lt);
      $('#url_rus').val(r['product'].url_rus);
      $('#url_pt').val(r['product'].url_pt);
      $('#url_es').val(r['product'].url_es);
      $('#description_en').val(r['product'].description_en);
      $('#description_lt').val(r['product'].description_lt);
      $('#description_rus').val(r['product'].description_rus);
      $('#description_pt').val(r['product'].description_pt);
      $('#description_es').val(r['product'].description_es);
      $('#description_en').code(r['product'].description_en);
      $('#description_lt').code(r['product'].description_lt);
      $('#description_rus').code(r['product'].description_rus);
      $('#description_pt').code(r['product'].description_pt);
      $('#description_es').code(r['product'].description_es);
      $('#delivery_en').val(r['product'].delivery_en);
      $('#delivery_lt').val(r['product'].delivery_lt);
      $('#delivery_rus').val(r['product'].delivery_rus);
      $('#delivery_pt').val(r['product'].delivery_pt);
      $('#delivery_es').val(r['product'].delivery_es);
      $('#delivery_en').code(r['product'].delivery_en);
      $('#delivery_lt').code(r['product'].delivery_lt);
      $('#delivery_rus').code(r['product'].delivery_rus);
      $('#delivery_pt').code(r['product'].delivery_pt);
      $('#delivery_es').code(r['product'].delivery_es);
      $('#specification_en').val(r['product'].specification_en);
      $('#specification_lt').val(r['product'].specification_lt);
      $('#specification_rus').val(r['product'].specification_rus);
      $('#specification_pt').val(r['product'].specification_pt);
      $('#specification_es').val(r['product'].specification_es);
      $('#specification_en').code(r['product'].specification_en);
      $('#specification_lt').code(r['product'].specification_lt);
      $('#specification_rus').code(r['product'].specification_rus);
      $('#specification_pt').code(r['product'].specification_pt);
      $('#specification_es').code(r['product'].specification_es);
      $('.product-spec-en').html(r.specification_en);
      $('.product-spec-lt').html(r.specification_lt);
      $('.product-spec-rus').html(r.specification_rus);
      $('.product-spec-pt').html(r.specification_pt);
      $('.product-spec-es').html(r.specification_es);
      $('#last_menu_idI').val(r.last_menu_id);
      if (r['product'].product_specifications) {
        $.each(r['product'].product_specifications, function (i, e) {
          var space_name = e.specification.name_en
            .toLowerCase()
            .replace(/\ /g, '_');
          $('#' + space_name + '_en').val(e.text_en);
          $('#' + space_name + '_lt').val(e.text_lt);
          $('#' + space_name + '_rus').val(e.text_rus);
          $('#' + space_name + '_pt').val(e.text_pt);
          $('#' + space_name + '_es').val(e.text_es);
        });
      }
      if (r['product'].weight) {
        $('#weight').val(r['product'].weight.toFixed(2));
      } else {
        $('#weight').val(r['product'].weight);
      }
      if (r['product'].product_price) {
        if (r['product'].product_price.price) {
          $('#price').val(r['product'].product_price.price.toFixed(2));
          $('#discount').val(r['product'].product_price.discount);
        }
      } else {
        $('#price').val('');
        $('#discount').val('');
      }
      $('#others').val(r['product'].others);
      $('#others').code(r['product'].others);
      $('.append-size.ins').html(r['append_item']);
      if (r['product'].new_s == 1) {
        $('#new_s').prop('checked', true);
      } else {
        $('#new_s').prop('checked', false);
      }
      if (r['product'].is_top_product == 1) {
        $('#is_top_pro').prop('checked', true);
      } else {
        $('#is_top_pro').prop('checked', false);
      }
      if (r['product'].is_free_shipping == 1) {
        $('#is_free_shipping').prop('checked', true);
      } else {
        $('#is_free_shipping').prop('checked', false);
      }
      if (r['product'].is_certificate == 1) {
        $('#is_certificate').prop('checked', true);
      } else {
        $('#is_certificate').prop('checked', false);
      }
    },
  });
}

// Main Image Upload
function showMainImg(e, show_id, main_img = null) {
  var c_p = $(e.target).attr('id');
  // console.log(c_p);
  if (window.File && window.FileList && window.FileReader) {
    var files = e.target.files,
      filesLength = files.length;

    for (var i = 0; i < filesLength; i++) {
      var f = files[i];
      var fileReader = new FileReader();
      fileReader.onload = function (e) {
        var file = e.target;
        var html = '<span class="pip">';
        html += '<img class="imageThumb" src="' + e.target.result + '">';
        html += '<br/>';
        html +=
          '<span class="remove-m" onclick="deleteMainImg(event, \'' +
          show_id +
          "', '" +
          c_p +
          "', '" +
          main_img +
          '\')">Remove</span>';
        html += '</span>';
        $(show_id).html(html);
      };
      fileReader.readAsDataURL(f);
    }
  } else {
    alert("Your browser doesn't support to File API");
  }
}

// Delete Main Image
function deleteMainImg(e, show_id, c_p, main_img) {
  // console.log(main_img);
  $('#' + c_p).val(null);
  $(e.currentTarget).parent('.pip').remove();
  if (main_img != 'null') {
    var html =
      '<span class="pip">' +
      '<img class="imageThumb" src="' +
      main_img +
      '">' +
      '</span>';
    $(show_id).html(html);
  }
}

// Delete Alt Image By Id
function deleteAltImgById(e, id) {
  $(e.currentTarget).parent('.pip').remove();
  $.ajax({
    method: 'POST',
    url: window.delete_alt_img_by_id,
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (result) {
      // console.log(result);
    },
  });
}

// Alt Image Upload
function showAltImg(e, show_id, ssn_id, pro_id = null) {
  let image_upload = new FormData();
  let TotalImages = $(e.currentTarget)[0].files.length; //Total Images
  let images = $(e.currentTarget)[0];
  var c_p = $(e.target);

  for (let i = 0; i < TotalImages; i++) {
    image_upload.append('images' + i, images.files[i]);
  }
  // console.log(TotalImages);
  image_upload.append('TotalImages', TotalImages);
  image_upload.append('_token', $('meta[name="csrf-token"]').attr('content'));
  image_upload.append('ssn_id', ssn_id);
  image_upload.append('pro_id', pro_id);
  $.ajax({
    method: 'POST',
    url: window.alt_tmp_img_up,
    data: image_upload,
    contentType: false,
    cache: false,
    processData: false,
    success: function (images) {
      // console.log(images);
      $(show_id).html(images);
      c_p.val(null);
    },
    error: function () {
      console.log('fail');
    },
  });
}

// Alt Image Remove
function deleteAltImg(e, ssn_id) {
  var img_name = e.target.id;
  $(e.target).closest('span.pip').remove();
  $.ajax({
    method: 'POST',
    url: window.alt_tmp_img_remove,
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      img_name: img_name,
      ssn_id: ssn_id,
    },
    success: function (result) {
      // console.log(result);
    },
  });
}

// Update Product Price
function updateProductPrice(e, id) {
  var size = $(e.currentTarget).parent().find('.size_u').val();
  var price = $(e.currentTarget).parent().find('.price_u').val();

  $.ajax({
    url: window.update_product_price,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
      size: size,
      price: price,
    },
    success: function (r) {
      // console.log(r);
    },
  });
}

// Delete Product Price
function deleteProductPrice(e, id) {
  if (confirm('Are you sure?')) {
    $(e.currentTarget).parent().remove();
    $.ajax({
      url: window.delete_product_price,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (r) {},
    });
  }
}

// Update Product
function updateProduct() {
  var form = $('#update_form')[0],
    formdata = new FormData(form),
    menu_id = $('#update_form').find('.menu_s_m').val(),
    sub_menu_id = $('#update_form').find('.sub_menu_s_m').val(),
    inner_menu_id = $('#update_form').find('.inner_menu_s_m').val(),
    title_lt = $('#update_form').find('#title_ltE').val(),
    price = $('#update_form').find('#priceE').val(),
    error = 0;
  if (menu_id) {
    $('#update_form')
      .find('.menu_s_m')
      .css({ border: '1px solid rgba(0,0,0,.15)' });
  } else {
    $('#update_form').find('.menu_s_m').css({ border: '1px solid red' });
    error++;
  }
  if (sub_menu_id || sub_menu_id != null) {
    if (
      $(this).find('#subMenuIdEn option').length > 1 &&
      sub_menu_id.length == 0
    ) {
      $('#update_form').find('.sub_menu_s_m').css({ border: '1px solid red' });
      error++;
    } else {
      $('#update_form')
        .find('.sub_menu_s_m')
        .css({ border: '1px solid rgba(0,0,0,.15)' });
    }
  } else {
    if ($(this).find('#subMenuIdEn option').length > 1) {
      $('#update_form').find('.sub_menu_s_m').css({ border: '1px solid red' });
      error++;
    } else {
      $('#update_form')
        .find('.sub_menu_s_m')
        .css({ border: '1px solid rgba(0,0,0,.15)' });
    }
  }
  if (inner_menu_id || inner_menu_id != null) {
    if (
      $(this).find('#innerMenuIdEn option').length > 1 &&
      inner_menu_id.length == 0
    ) {
      $('#update_form').find('.sub_menu_s_m').css({ border: '1px solid red' });
      error++;
    } else {
      $('#update_form')
        .find('.sub_menu_s_m')
        .css({ border: '1px solid rgba(0,0,0,.15)' });
    }
  } else {
    if ($(this).find('#innerMenuIdEn option').length > 1) {
      $('#update_form').find('.sub_menu_s_m').css({ border: '1px solid red' });
      error++;
    } else {
      $('#update_form')
        .find('.sub_menu_s_m')
        .css({ border: '1px solid rgba(0,0,0,.15)' });
    }
  }
  if (price == 0 || price == null || price == '') {
    $('#update_form').find('#priceE').css({ border: '1px solid red' });
    error++;
  } else {
    $('#update_form')
      .find('#priceE')
      .css({ border: '1px solid rgba(0,0,0,.15)' });
  }

  if (title_lt.trim().length == 0) {
    $('#update_form').find('#title_ltE').css({ border: '1px solid red' });
    error++;
  } else {
    $('#update_form')
      .find('#title_ltE')
      .css({ border: '1px solid rgba(0,0,0,.15)' });
  }

  if (error == 0) {
    $.ajax({
      url: window.update_product,
      method: 'POST',
      data: formdata,
      // dataType:'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('#update_form').trigger('reset');
          $('#description_enE').code('');
          $('#description_ltE').code('');
          $('#description_rusE').code('');
          $('#description_ptE').code('');
          $('#description_esE').code('');
          $('#delivery_enE').code('');
          $('#delivery_ltE').code('');
          $('#delivery_rusE').code('');
          $('#delivery_ptE').code('');
          $('#delivery_esE').code('');
          $('#specification_enE').code('');
          $('#specification_ltE').code('');
          $('#specification_rusE').code('');
          $('#specification_ptE').code('');
          $('#specification_esE').code('');
          $('#othersE').code('');
          $('#main_img_showE').html('');
          $('#alt_img_showE').html('');
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Product Successfully Updated.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
          $('#modal-13').modal('hide');
        }
      },
    });
  } else {
    var x = document.getElementById('snackbar');
    x.style.background = 'red';
    x.innerHTML = 'Please Insert All Information.';
    x.className = 'show';
    setTimeout(function () {
      x.className = x.className.replace('show', '');
    }, 5000);
  }
}

// delete Product
function deleteProduct(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_product,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        window.datatable
          .row($('#product_row_' + id))
          .remove()
          .draw(false);
        // $('.dt-responsive').html(response);
        // $('#simpletable').DataTable();
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Product Successfully Deleted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  }
}

// insert Certificate Password
function insertCerPass() {
  var password = $('#password').val();

  var empty = $('#formData')
    .find('#password')
    .filter(function () {
      return this.value === '';
    });
  if (empty.length) {
    alert('Input Filed is Empty');
  } else {
    $.ajax({
      url: window.insert_certificate_password,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        password: password,
      },
      success: function (response) {
        $('#password').val('');
        $('.data').html(response);
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Certificate Password Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  }
}

// edit Certificate Password
function editCerPass(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_certificate_password,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      // console.log(response);
      $('#idedit').val(response.id);
      $('#passwordEdit').val(response.password);
      $('.tdNuber').val(td);
    },
  });
}

// update Certificate Password
function updateCerPass() {
  var tdNuber = $('.tdNuber').val();
  var id = $('#idedit').val();
  var password = $('#passwordEdit').val();
  $.ajax({
    url: window.update_certificate_password,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
      password: password,
    },
    success: function (response) {
      $('.td-' + tdNuber).html(response);
      $('#modal-13').modal('hide');
    },
  });
}

// delete Certificate Password
function deleteCerPass(id) {
  $.ajax({
    url: window.delete_certificate_password,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Certificate Password Successfully Deleted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
}
$(document).on('click', '.remove', function () {
  var img_name = this.id;
  $(this).closest('span.pip').remove();
  $.ajax({
    method: 'POST',
    url: window.remove_product_tmp_main_img,
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      img_name: img_name,
    },
    success: function (result) {},
  });
});

// insert Package

$('#package_upload_form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.insert_package,
    method: 'POST',
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      $('#package_upload_form').trigger('reset');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Package Successfully Inserted.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
    },
  });
});

// edit Main Slider
function editPackage(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_package,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      $('#packageName').val(response.package_name);
      $('#packagePrice').val(response.package_price);
      $('#packageDiscount').val(response.package_discount);
      $('#urlE').val(response.url);
      $('.tdNuber').val(td);
    },
  });
}

// Update Main Slider
function updatePackage() {
  var form = $('#update_package_form')[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.update_package,
    method: 'POST',
    data: formdata,
    // dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      // console.log(response);
      $('#update_package_form').trigger('reset');
      $('.data').html(response);
      var x = document.getElementById('snackbar');
      x.style.background = 'green';
      x.innerHTML = 'Package Successfully Updated.';
      x.className = 'show';
      setTimeout(function () {
        x.className = x.className.replace('show', '');
      }, 7000);
      $('#modal-13').modal('hide');
    },
  });
}
// delete Package
function deletePackage(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_package,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        $('.data').html(response);
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Data Successfully Deleted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  }
}
// edit User
function editUser(id, td) {
  $('#modal-13').modal('show');
  $('#modal-13').addClass('md-show');
  $.ajax({
    url: window.edit_user,
    type: 'post',
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id,
    },
    success: function (response) {
      $('#idedit').val(response.id);
      if (response.user_info.image) {
        $('#userInfo .image').attr(
          'src',
          window.base_url + '/UserProfilePic/' + response.user_info.image
        );
      } else {
        $('#userInfo .image').attr(
          'src',
          'http://ssl.gstatic.com/accounts/ui/avatar_2x.png'
        );
      }
      $('#userInfo .first-name').html(response.name);
      $('#userInfo .last-name').html(response.user_info.last_name);
      $('#userInfo .email').html(response.user_info.email);
      $('#userInfo .phone').html(response.user_info.phone);
      $('#userInfo .apartment').html(response.user_info.billing_apartment);
      $('#userInfo .town').html(response.user_info.billing_town);
      $('#userInfo .state').html(response.user_info.billing_strt_address);
      $('#userInfo .district').html(response.user_info.billing_district);
      $('#userInfo .country').html(response.user_info.billing_country);
      $('#userInfo .post-code').html(response.user_info.billing_post_code);
      $('#userInfo .discount-form .discount').val(response.user_info.discount);
      $('.tdNuber').val(td);
    },
  });
}

// delete User
function deleteUser(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_user,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        $('.dt-responsive').html(response);
        $('#simpletable').DataTable();
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'User Successfully Deleted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      },
    });
  }
}
// update discount
$('.discount-form').on('submit', function (event) {
  event.preventDefault();
  var form = $(this)[0];

  var formdata = new FormData(form);
  $.ajax({
    url: window.update_discount,
    method: 'POST',
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      if (response == 'error') {
        $('.discount-error').removeClass('d-none');
      } else {
        $('.discount-error').addClass('d-none');
        let tblid = $('.tdNuber').val();
        $('.td-discount-' + tblid).html(response + '%');
        var x = document.getElementById('snackbar');
        x.style.background = 'green';
        x.innerHTML = 'Package Successfully Inserted.';
        x.className = 'show';
        setTimeout(function () {
          x.className = x.className.replace('show', '');
        }, 7000);
      }
    },
  });
});

// delete Custom Color
function deleteCustomColor(id) {
  if (confirm('Are you sure?')) {
    $.ajax({
      url: window.delete_custom_color,
      type: 'post',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id,
      },
      success: function (response) {
        if (response['error']) {
          var x = document.getElementById('snackbar');
          x.style.background = 'red';
          x.innerHTML = response['error'];
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        } else {
          $('.dt-responsive').html(response);
          $('#simpletable').DataTable();
          var x = document.getElementById('snackbar');
          x.style.background = 'green';
          x.innerHTML = 'Custom Color Successfully Deleted.';
          x.className = 'show';
          setTimeout(function () {
            x.className = x.className.replace('show', '');
          }, 7000);
        }
      },
    });
  }
}

$(document).on('change', '#isVideo', function () {
  if (this.checked) {
    $('.image-area').addClass('d-none');
    $('.video-area').removeClass('d-none');
  } else {
    $('.image-area').removeClass('d-none');
    $('.video-area').addClass('d-none');
  }
});
$(document).on('change', '#isVideoE', function () {
  if (this.checked) {
    $('.image-areaE').addClass('d-none');
    $('.video-areaE').removeClass('d-none');
  } else {
    $('.image-areaE').removeClass('d-none');
    $('.video-areaE').addClass('d-none');
  }
});
