(function () {
  $(document).ready(function () {
    $('#producto_select').on('change', function (e) {
      let precio = $(this).find(':selected').data('precio');
      $('#precio_unitario').val( precio );
    });
  });
})();
