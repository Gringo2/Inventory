$('document').ready(function(){
    // function Product(Name, Price) {
    //     this.Name = Name;
    //     this.Price = Price;
    //     }

    var selected_product = [];
    var product_list = $('#mytable').DataTable();
    var counter = 0;
    var selected_product_list = [];
    $('#mytable tbody').on('change', '.selectProduct', function(){
        var selected_data = product_list.row($(this).parents('tr')).data();

        if($(this).is(':checked')){

            $('#selected_product_list').empty();
            selected_product = [];
            for(var i = 1; i<selected_data.length; i++){
            selected_product.push(selected_data[i]);
            }

            selected_product_list.push(selected_product);
            console.log(selected_product);
            console.log(selected_product_list);
            // $('#selected_product_list').append("<tr>");
            // for(var i = 0; i < selected_product.length; i++)
            // {
            //     $('#selected_product_list').append("<td>"+ selected_product[i] + "</td></tr>");
            // }
            // $('#selected_product_list').append("</tr>");
            $('#selected_product_list').append("<tr>");
            for(var i = 0; i < selected_product_list.length; i++){
                for(var j = 0; j < selected_product_list[i].length; j++)
                $('#selected_product_list').append("<td>" + selected_product_list[i][j]+ "</td>");

            }
            $('#selected_product_list').append("</tr>");
        }
        else {
            // selected_product = selected_product.filter(data => data !== selected_product);
            selected_product_list = selected_product_list.filter(data => data != selected_product );
            $('#selected_product_list').empty();
            $('#selected_product_list').append("<tr>");
            for(var i = 0; i < selected_product_list.length; i++){
                for(var j = 0; j < selected_product_list[i].length; j++)
                $('#selected_product_list').append("<td>" + selected_product_list[i][j]+ "</td>");

            }
            $('#selected_product_list').append("<tr>");
            // for(var i = 0; i < selected_product.length; i++){
            //     $('#selected_product_list').append("<td>" + selected_product[i] + "</td>");
            selected_product = [];
            // }
            console.log(selected_product);
            console.log(selected_product_list);
        }
    });
});