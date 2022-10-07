$('document').ready(function(){
    // function Product(Name, Price) {
    //     this.Name = Name;
    //     this.Price = Price;
    //     }

    var selected_product = [];
    var product_list = $('#mytable').DataTable();

    $('#mytable tbody').on('change', '.selectProduct', function(){
        var selected_data = product_list.row($(this).parents('tr')).data();

        if($(this).is(':checked')){
            selected_product.push(selected_data[4]);

            console.log(selected_product);
            $('#selected_product_list').empty();
            for(var i = 0; i < selected_product.length; i++)
            {
                $('selected_product_list').append(selected_product[4]);
            }
        }else {
            selected_product = selected_product.filter(data => data !== selected_data[4]);
            $('#selected_product_list').empty();
            for(var i = 0; i < selected_product.length; i++){
                $('#selected_product_list').append(" " + selected_product[4]);

            }
            console.log(selected_product);
        }
    });
});