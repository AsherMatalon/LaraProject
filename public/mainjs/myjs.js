$('.add_to_cart').click(function(){
    console.log($(this).attr("data-id"));
    console.log(BASE_URL);

    $.ajax({

        url:BASE_URL+"/shop/AddToCart",
        type:"GET",
       // datatype:"json",
        data:{product_id: $(this).attr("data-id")
        },
        success:function(result){
            if(result){location.reload();}
        }
    });
});

$('.update_cart').click(function(){
        console.log($(this).attr("data-id"));
        console.log(BASE_URL);
        $.ajax({
            url:BASE_URL+"/shop/UpdateCart",
            type:"GET",
           // datatype:"json",
            data:{product_id: $(this).attr("data-id")
            },
            success:function(result){
            if(result){location.reload();}
            }
        });
    });

$('.delete_product').click(function(){
    //  console.log($(this).attr("id"));
    //  console.log(BASE_URL);
        $.ajax({
            url:BASE_URL+"/shop/DeleteProduct",
            type:"GET",
           // datatype:"json",
            data:{
                product_id: $(this).attr("data-id")
            },
            success:function(result){
                if(result){location.reload();}
            }
        });
    });

$('.sm').delay('3000').slideUp();
$('.sf').delay('3000').slideUp();


$("#myInput").on("keyup",function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

    });
});



     $('th').click(function(){
        var table = $(this).parents('table').eq(0)
        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc
        if (!this.asc){rows = rows.reverse()}
        for (var i = 0; i < rows.length; i++){table.append(rows[i])}
    })
    function comparer(index) {
        return function(a, b) {
            var valA = getCellValue(a, index), valB = getCellValue(b, index)
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
        }
    }
    function getCellValue(row, index){ return $(row).children('td').eq(index).text()
 }



