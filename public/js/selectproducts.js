$('document').ready(function(){
    
    var selected_product = [];
    var product_list = $('#mytable').DataTable();
    var productListTable = $('#selected_product_list').DataTable({retrieve:true, columns: [
                {data: 'name'},  
                {data: 'price'},
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
});