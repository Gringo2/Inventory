$('document').ready(function(){
    var total = 0;
    var selected_product = [];
    var product_list = $('#purchase_table').DataTable();
    var productListTable = $('#selected_purchase_list').DataTable({
        "sDom": '"clear"&gt;',
        retrieve:true,
        columnDefs: [
            {
                target: 0,
                visible: false,
            },
            
        ]
        , columns: [
                {data: 'product_id'},
                {data: 'name'},  
                {data: 'price',
                render: function (data, type, row, meta) {
                    return type === 'display'
                        ? `<input type="text" id=${"price_"+row["product_id"]}  class="inp" name="lname" style="max-width:100px" value="${data}">`
                        : data;
                },},
                {data: 'batch_no',
                render: function (data, type, row, meta) {
                    return type === 'display'
                        ? `<input type="text" id=${"batch_"+row["product_id"]}  class="inp" name="lname" style="max-width:100px" value="${data}">`
                        : data;
                },},
                {data: 'expire_date',
                render: function (data, type, row, meta) {
                    return type === 'display'
                        ? `<input type="date" id=${"expire_"+row["product_id"]}  class="inp" name="lname" style="" value="${data}">`
                        : data;
                },},
                
                {data: 'amount',
                render: function (data, type, row, meta) {
                    return type === 'display'
                        ? `<input type="number" class = "inp_chk" id=${"amount_" + row["product_id"]} style="width: 50px;" placeholder="1" step="1" min="1" max="1000" value="${data}"/>`
                        : data;
                },},
                {data: 'total'}
           ]});
           
    $('#purchase_table tbody').on('change', '.selectProduct', function(){
        var selected_data = product_list.row($(this).parents('tr')).data();
        if($(this).is(':checked')){
            var value = 1;
            var prodObj = {
                'product_id':selected_data[1],
                'name': selected_data[2], 
                'price':0, 
                'batch_no': 0 , 
                'expire_date' : "" ,
                'amount': value , 
                'total': selected_data[5]*value, 
                'unit': 1}

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
            var selectedId = selected_data[1];
            selected_product = selected_product.filter(function(data){
                 return data.product_id != selectedId;
            });
            console.log(selected_product);
            productListTable.clear().rows.add(selected_product).draw();
            
        }
    });
    $('#selected_purchase_list tbody').on('change', '.inp', function() { 
        var n_selected_data = productListTable.row($(this).parents('tr')).data();
        var val = $('#price_' + n_selected_data.product_id).val();  
        var val2 = $('#batch_' + n_selected_data.product_id).val(); 
        var val3 = $('#expire_' + n_selected_data.product_id).val();
        console.log(val);
        console.log(val2);
        for(let i = 0; i < selected_product.length; i++ ){
            if(selected_product[i].product_id == n_selected_data.product_id){
                selected_product[i].price = val;
                selected_product[i].batch_no = val2;
                selected_product[i].expire_date = val3;
                selected_product[i].total = selected_product[i].price * selected_product[i].amount;
                productListTable.clear().rows.add(selected_product).draw();

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
    $('#selected_purchase_list tbody').on('change', '.inp_chk', function() {    
        var n_selected_data = productListTable.row($(this).parents('tr')).data();
        console.log(n_selected_data);
        var val = $('#amount_' + n_selected_data.product_id).val();
        
        for(let i = 0; i < selected_product.length; i++ ){
            if(selected_product[i].product_id == n_selected_data.product_id){
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
    console.log($('input[name="_token"]').val());
    $('#btn_send_purchase_body').on('click', function(){
            $.ajax(
                {
                // data:{"product_name":selected_product[0].name, "unit":selected_product[0].price},
                   data: { data: selected_product , total: total , supplier_id : $('#supplier_id').val()},
                   headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                   type: "POST",
                   url:"/purchasecart",
                   success: function(data){
                       console.log(data);
                   }
               }
            ).done(function() {
                window.location.replace("http://fp.ahoondrop.com/purchase");
              })
              .fail(function() {
                alert( "Request failed. Contact system admin if error persists. ");
              })
        
   });
});