// siempre debes usar esto
(function () {
  new Vue({
    el: '#crear_orden_compra_form',
    data: {
      cliente: '',
      descuento: 0,
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
      },
      subtotal: function () {
        return this.productos.reduce(function (carry, producto) {
          return carry + (producto.unidades * producto.precio_unitario);
        }, 0);
      },
      subtotalDescontado: function () {
        return this.subtotal - this.descuento;
      },
      iva: function () {
        return this.subtotalDescontado * 0.16;
      },
      total: function () {
        return this.subtotalDescontado + this.iva;
      }
    },
    methods: {
      setPrecioUnitario: function (event) {
        let seleccionado = $(event.target).find(':selected');
        let precio = seleccionado.data('precio');
        this.form_producto.precio_unitario = precio;
        this.form_producto.descripcion = seleccionado.html();
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
      },

      guardarOrdenCompra: function () {
        ordenCompra = {
          cliente: this.cliente,
          descuento: this.descuento,
          productos: this.productos
        }
        if (ordenCompra.cliente && ordenCompra.productos.length > 0) {
          axios.post('/ordenes_compra', ordenCompra)
          .then(function () {
            window.location.replace('/ordenes_compra');
          }).catch(function (e) {
            console.error(e);
            alert('ups');
          });
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
