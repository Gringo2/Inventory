$('document').ready(function(){
    var total = 0;
    var selected_product = [];
    var product_list = $('#mytable').DataTable();
    var productListTable = $('#selected_product_list').DataTable({retrieve:true, columns: [
                {data: 'name'},  
                {data: 'price'},
                {data: 'unit',
                render: function (data, type, row, meta) {
                    return type === 'display'
                        ? '<select name="" id="pet-select">'+ 
                        '<option value="1">unit1</option>' +
                        '<option value="2">unit2</option>' 
                        + '</select>'
                        : data;
                },},
                {data: 'amount',
                render: function (data, type, row, meta) {
                    return type === 'display'
                        ? `<input type="number" class = "inp_chk" id=${"amount_" + row["name"]} style="width: 50px;" placeholder="1" step="1" min="1" max="1000" value="${data}"/>`
                        : data;
                },},
                {data: 'total'}
           ]});
           
    $('#mytable tbody').on('change', '.selectProduct', function(){
        var selected_data = product_list.row($(this).parents('tr')).data();
        if($(this).is(':checked')){
            var value = 1;
            var prodObj = {'name': selected_data[1], 'price':selected_data[4] ,
            'amount': value , 'total': selected_data[4]*value, 'unit': 1}
            selected_product.push(prodObj);
            //detect increase in amount
            // console.log(selected_product.length);
            // console.log(selected_product);
            productListTable.clear().rows.add(selected_product).draw();
            total = 0;
            for(let i = 0; i < selected_product.length; i++){
                total = total + selected_product[i].total;
            }
            console.log('log' + total);
            $('#subtotal').empty();
            $('#subtotal').append('Total : ' + total);
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
    $('#selected_product_list tbody').on('change', '.inp_chk', function() {    
        var n_selected_data = productListTable.row($(this).parents('tr')).data();
        var val = $('#amount_' + n_selected_data.name).val();  
        for(let i = 0; i < selected_product.length; i++ ){
            if(selected_product[i].name == n_selected_data.name){
                selected_product[i].amount = val;
                
                selected_product[i].total = selected_product[i].price * selected_product[i].amount;
                productListTable.clear().rows.add(selected_product).draw();
                // console.log('#amount_' + n_selected_data.name + " ammount " + selected_product[i].amount);
                // $('#amount').val(selected_product[i].amount)
                // selected_product[i].amount = $ 
                // console.log(selected_product);
                // $('#OuterDiv').append('<div id="innerDiv"></div>');
                total = 0;
                for(let i = 0; i < selected_product.length; i++){
                    total = total + selected_product[i].total;
                }
                console.log('log' + total);
                $('#subtotal').empty();
                $('#subtotal').append('Total :' + total);
            }
        } 
        console.log(selected_product);
    });
    $('#btn_send_purchase_body').on('click', function(){
            $.ajax(
                {
                //    data:{"product_name":selected_product[0].name, "unit":selected_product[0].price},
                   data: { data: selected_product},
                   type: "POST",
                   url:"/api/purchasecart",
                   success: function(data){
                       console.log(data);
                   }
               }
            )
        
   });
});