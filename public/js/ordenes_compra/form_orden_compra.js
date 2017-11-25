// siempre debes usar esto
(function () {
  new Vue({
    el: '#crear_orden_compra_form',
    data: {
      cliente: '',
      form_producto: {
        producto_id: null,
        precio_unitario: 0,
        unidades: 1,
        descripcion: ''
        // importe: 0
      },
      productos: []
    },
    computed: {
      importe: function () {
        return (this.form_producto.unidades * this.form_producto.precio_unitario);
      }
    },
    methods: {
      setPrecioUnitario: function (event) {
        let precio = $(event.target).find(':selected').data('precio');
        this.form_producto.precio_unitario = precio;
      },

      agregarProducto: function () {
        let producto = _.clone(this.form_producto);
        if (producto.producto_id != null) {
          this.productos.push(producto);
          this.form_producto = {
            producto_id: null,
            precio_unitario: 0,
            unidades: 1,
            descripcion: ''
            // importe: 0
          };
        }
      }
    }
  });
  // $(document).ready(function () {
  //   $('#producto_select').on('change', function (e) {
  //     let precio = $(this).find(':selected').data('precio');
  //     $('#precio_unitario').val( precio );
  //   });
  // });
})();
