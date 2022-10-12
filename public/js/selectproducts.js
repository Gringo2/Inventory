$('document').ready(function(){
    
    var selected_product = [];
    var product_list = $('#mytable').DataTable();
    var productListTable = $('#selected_product_list').DataTable({retrieve:true, columns: [
                {data: 'name'},  
                {data: 'price'},
                {data: 'unit',
                render: function (data, type, row, meta) {
                    return type === 'display'
                        ? '<select name="pets" id="pet-select">'+ 
                        '<option value="">choose unit</option>' +
                        '<option value="unit1">unit1</option>' +
                        '<option value="unit2">unit2</option>' 
                        + '</select>'
                        : data;
                },},
                {data: 'amount',
                render: function (data, type, row, meta) {
                    return type === 'display'
                        ? '<input type="number" style="width: 50px;" placeholder="1" step="1" min="1" max="1000" value="1"/>'
                        : data;
                },}
           ]});
    $('#mytable tbody').on('change', '.selectProduct', function(){
        var selected_data = product_list.row($(this).parents('tr')).data();
        if($(this).is(':checked')){
        //     productListTable = $('#selected_product_list').DataTable({retrieve:true, columns: [
        //         {data: 'name'},
        //         {data: 'price'},
        //    ]});
            var prodObj = {'name': selected_data[1], 'price':selected_data[4]}
            selected_product.push(prodObj);
            console.log(selected_product);
            productListTable.clear().rows.add(selected_product).draw();
            // $('#selected_product_list').DataTable({
            //     retrieve: true,
            //     data: selected_product,
            //     columns: [
            //         {data: 'name'},
            //         {data: 'price'},
            //    ]
            // })
        }
        else {
            var selected_data = product_list.row($(this).parents('tr')).data();
            console.log(selected_data);
            var selectedName = selected_data[1];
            selected_product = selected_product.filter(function(data){
                 return data.name != selectedName;
            });
            console.log(selected_product);
            productListTable.clear().rows.add(selected_product).draw();
            
        }
    });
    $('#btn_send_purchase_body').on('click', function(){
            $.ajax(
                {
                   data:{"product_name":selected_product[0].name, "unit":selected_product[0].price},
                   type: "POST",
                   url:"/api/purchases",
                   success: function(data){
                       console.log(data);
                   }
               }
            )
        
   });
});