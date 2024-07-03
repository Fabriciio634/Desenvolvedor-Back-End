$(document).ready(function () {
  fetch();
  //add
  $('#addnew').click(function () {
    $('#add').modal('show');
  });
  $('#addForm').submit(function (e) {
    e.preventDefault();
    var addform = $(this).serialize();
    $.ajax({
      method: 'POST',
      url: 'App/Controller/Adicionar.php',
      data: addform,
      dataType: 'json',
      success: function (response) {
        $('#add').modal('hide');
        if (response.error) {
          $('#alert').show();
          $('#alert_message').html(response.message);
        } else {
          $('#alert').show();
          $('#alert_message').html(response.message);
          fetch();
        }
      },
    });
  });
  //

  //edit
  $(document).on('click', '.edit', function () {
    var id = $(this).data('id');
    getDetails(id);
    $('#edit').modal('show');
  });
  $('#editForm').submit(function (e) {
    e.preventDefault();
    var editform = $(this).serialize();
    $.ajax({
      method: 'POST',
      url: 'App/Controller/Editar.php',
      data: editform,
      dataType: 'json',
      success: function (response) {
        if (response.error) {
          $('#alert').show();
          $('#alert_message').html(response.message);
        } else {
          $('#alert').show();
          $('#alert_message').html(response.message);
          fetch();
        }

        $('#edit').modal('hide');
      },
    });
  });
  //

  //delete
  $(document).on('click', '.delete', function () {
    var id = $(this).data('id');
    getDetails(id);
    $('#delete').modal('show');
  });

  $('.id').click(function () {
    var id = $(this).val();
    $.ajax({
      method: 'POST',
      url: 'App/Controller/Excluir.php',
      data: { id: id },
      dataType: 'json',
      success: function (response) {
        if (response.error) {
          $('#alert').show();
          $('#alert_message').html(response.message);
        } else {
          $('#alert').show();
          $('#alert_message').html(response.message);
          fetch();
        }

        $('#delete').modal('hide');
      },
    });
  });
  //

  //hide message
  $(document).on('click', '.close', function () {
    $('#alert').hide();
  });
});

function fetch() {
  $.ajax({
    method: 'POST',
    url: 'App/Controller/Listar.php',
    success: function (response) {
      $('#tbody').html(response);
    },
  });
}

function getDetails(id) {
  $.ajax({
    method: 'POST',
    url: 'App/Controller/Busca.php',
    data: { id: id },
    dataType: 'json',
    success: function (response) {
      if (response.error) {
        $('#edit').modal('hide');
        $('#delete').modal('hide');
        $('#alert').show();
        $('#alert_message').html(response.message);
      } else {
        $('.id').val(response.data.id);
        $('.firstname').val(response.data.firstname);
        $('.lastname').val(response.data.lastname);
        $('.address').val(response.data.address);
        $('.fullname').html(
          response.data.firstname + ' ' + response.data.lastname
        );
      }
    },
  });
}
