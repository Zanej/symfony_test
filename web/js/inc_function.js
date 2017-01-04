$(document).on("submit", "#login_form", function(e){
    
    if($("#login_form input[name='email']").val().trim() !== "" && $("#login_form input[name='password']").val().trim() !== ""){
        
        $.ajax({

            url:"/articms/login/",
            dataType:"json",
            type:"POST",
            data:{

                email:$("#login_form input[name='email']").val(),
                password:$("#login_form input[name='password']").val()
            },
            success:function(data){
                
                if(data.success){
                    window.location.href = "/articms/admin/";
                }else{
                    
                }
                //console.log(data);
            }

        });
    
    }
    
    return false;
});

$(document).on("click", ".ajax_call", function(e){
    e.preventDefault();
    var href = $(this).prop("href");
    $.ajax({
        url:href,
        success:function(data){
            
        },
        error:function(data){
            
        }
    });
    
    return false;
});