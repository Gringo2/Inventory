$('document').ready(function(){
    var total = 0;
    var selected_product = [];
    var valuator = 0;
    var product_list = $('#mytableorder').DataTable({
        retrieve:true,
        columnDefs: [
            {
                target: 1,
                visible: false,
            },
            {
                target: 6,
                visible: false,
            }
        ],

    });
    var productListTable = $('#selected_product_list').DataTable({
        retrieve:true,
        columnDefs: [
            {
                target: 0,
                visible: false,
            },
            {
                target: 5,
                visible: true,
            }
            
        ],
        columns: [
                {data: 'product_id'},
                {data: 'name'},
                {data: 'price'},
                {data: 'amount',
                render: function (data, type, row, meta) {
                    return type === 'display'
                        ? `<input type="number" class = "inp_chk" id=${"amount_" + row["product_id"]} style="width: 50px;" placeholder="1" step="1" min="1" max=${row["max"]} value="${data}"/>`
                        : data;
                },},
                {data: 'total'},
                {data: 'max'}
           ]});

           
    $('#mytableorder tbody').on('change', '.selectProduct', function(){
        var selected_data = product_list.row($(this).parents('tr')).data();
        if($(this).is(':checked')){
            
            var value = 1;
            var prodObj = {
                'product_id':selected_data[1],
                'name': selected_data[2], 
                'price':selected_data[4] ,
                'wholesale' : selected_data[4],
                'retail' : selected_data[5],
                'amount': value , 
                'total': selected_data[4]*value,
                'max': selected_data[6]
            }
            selected_product.push(prodObj);
            //detect increase in amount
            
            if($('#wholesale').is(':checked')){
                for(let i = 0; i < selected_product.length; i++){
                    selected_product[i].price = selected_product[i].retail;
                    selected_product[i].total = selected_product[i].price * selected_product[i].amount;
                    
                    console.log('---');
                }
                total = 0;
                for(let i = 0; i < selected_product.length; i++){
                    total = total + selected_product[i].total;
                }
                $('#subtotal').empty();
                $('#subtotal').append('Total : ' + total);
            }
            console.log(selected_product);
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

            total = 0;
            for(let i = 0; i < selected_product.length; i++){
                total = total + selected_product[i].total;
            }
            console.log('log' + total);
            $('#subtotal').empty();
            $('#subtotal').append('Total : ' + total);
            productListTable.clear().rows.add(selected_product).draw();
            
        }
    });
   
    $('#wholesale').on('change',function() { 
        if (!$(this).is(':checked')) { 
                for(let i = 0; i < selected_product.length; i++){
                    selected_product[i].price = selected_product[i].wholesale;
                    selected_product[i].total = selected_product[i].price * selected_product[i].amount;
                    
                }
                total = 0;
                for(let i = 0; i < selected_product.length; i++){
                    total = total + selected_product[i].total;
                }
                $('#subtotal').empty();
                $('#subtotal').append('Total : ' + total);
                console.log("if");
                
                productListTable.clear().rows.add(selected_product).draw();
                console.log($('#wholesale').is(':checked'));
            }else{
                for(let i = 0; i < selected_product.length; i++){
                    selected_product[i].price = selected_product[i].retail;
                    selected_product[i].total = selected_product[i].price * selected_product[i].amount;

                }
                total = 0;
                for(let i = 0; i < selected_product.length; i++){
                    total = total + selected_product[i].total;
                }
                $('#subtotal').empty();
                $('#subtotal').append('Total : ' + total);
                productListTable.clear().rows.add(selected_product).draw();
                console.log("else");
                console.log($('#wholesale').is(':checked'));
            }
            
        });
      
    $('#selected_product_list tbody').on('change', '.inp_chk', function() {    
        var n_selected_data = productListTable.row($(this).parents('tr')).data();
        var val = $('#amount_' + n_selected_data.product_id).val();

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
    console.log($('input[name="_token"]').val());
    $('#btn_send_order_body').on('click', function(){
            $.ajax(
                {
                // data:{"product_name":selected_product[0].name, "unit":selected_product[0].price},
                   data: { data: selected_product , total: total , customer_id : $('#customer_id').val()},
                   headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                   type: "POST",
                   url:"/transactioncart",
                   success: function(data){
                       console.log(data);
                   }
               }
            ).done(function() {
                window.location.replace("http://fp.ahoondrop.com/transactions");
              })
              .fail(function() {
                alert( "Request failed. Contact system admin if error persists. ");
              })
        
   });
});