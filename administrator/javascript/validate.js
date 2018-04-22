$(function(){
    $("#product-form1").validate({
        rules: {
            product_name:{
                required:true
            },
            description: {
                required:true
            }
           
           },
           
        messages: {
            product_name: "Product name required",
            description: "Please enter description",
             
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });  
});

$(function(){
    $("#product-form2").validate({
        rules: {
            price: "required",
            model: "required",
            upc : "required",
            quantity: "required"
           },
           
        messages: {
            price: "Please enter price",
            model: "Please enter model type",
            upc: "Please enter a universal product code",
            quantity: "Please enter quantity" 
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });  
});


