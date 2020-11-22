
// Lawyer datatable
$(document).ready( function () {
    $('#indexdataTable').DataTable();
} );
// Case details
$(document).ready( function () {
    $('#dataTable').DataTable();
});

//edit membership plan
function membership(datavalue){
    //alert(datavalue);
    $.ajax({
        url:  'action.php',
        type: 'POST',
        data: {membershipdata : datavalue},
        success: function(result){
            $('#plan_details').html(result);
            $('#membership-edit').modal('show');
        }
    });
}

// Lawyer login form
$(document).ready(function(){
    $('#lform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                if(result.url && result.url.length > 0){
                    setTimeout(function(){
                        window.location.href = result.url
                    }, 2000)
                }
            }
        });
    });
});

// Lawyer membership form
$(document).ready(function(){
    $('#m-form').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                // if(result.status=='success'){
                    $.toast({
                        hading:'notification',
                        text: result.message,
                        position:'top-center',
                        icon: result.status
                    });
                if(result.url && result.url.length > 0){
                    setTimeout(function(){
                        window.location.href = result.url
                    }, 2000)
                }

            }
        });

    });

});

// Lawyer membership Edit form
$(document).ready(function(){
    $('#membership-edit-form').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
    });
});

// Lawyer upgrade profile
$(document).ready(function(){
    $('#upgrade_lawyer_form').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                if(result.url && result.url.length > 0){
                    setTimeout(function(){
                        window.location.href = result.url
                    }, 2000)
                }
            }
        });
    });
});


// model popup with id for lawyer comments
$(document).ready().ready(function (){
    $('.comment_modal').on('click', function (e) {
        e.preventDefault();
        var idval = $(this).attr('mival');
        $('input[name=comment_case_id]').val(idval);
        $('#comments').modal('show');
    });
});

// model popup with id for edit membership plan
//     $(document).ready().ready(function (){
//         $('.edit-membership').on('click', function (e) {
//             e.preventDefault();
//             var idval = $(this).val();
//
//             $('input[name=plan_id]').val(idval);
//             $('#membership-edit').modal('show');
//         });
//     });


//client case reject from lawyer popup
$(document).ready(function(){
    $('.reject').on('click',function () {
        var rejectid=$(this).attr('valueid');
        $('#reject').attr('getvalue',rejectid);
        $('#reject_modal').modal('show');
    });
});

// Lawyer case reject
$(document).ready(function(){
    $('#reject').on('click',function () {
        var lowerid=$(this).attr('getvalue');
        $.ajax({
            url:'action.php',
            type:"POST",
            data:{
                token_lower:1,
                deleteid:lowerid
            },
            success:function(data) {
                var result = JSON.parse(data);
                $.toast({
                    hading: 'notification',
                    text: result.message,
                    position: 'top-center',
                    icon: result.status
                });
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        });

    });
});

// Add Lawyer services
$(document).ready(function(){
    $('#add_services').on('submit', function(e){
        e.preventDefault();
        var fd = new FormData(this);
        $.ajax({
            url: 'action.php',
            type: 'post',
            // data: $(this).serialize(),
            data: fd,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success: function(data){
                // var result = JSON.parse(data);
                var result = data;
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
    });
});



// reject cases from admin
$(document).ready(function () {
    $('.reject_case').on('click',function () {
        var reject_id=$(this).val();
        $.ajax({
            url:'action.php',
            type:'post',
            data: {
                "reject_id":reject_id,
                "action": 'reject_case'
            },
            success:function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position: 'top-center',
                    icon:result.status
                });
                setTimeout(function () {
                    location.reload();
                },2000);
            }
        });
    });
});

// reject cleint from admin
$(document).ready(function () {
    $('.reject_client').on('click',function () {
        var reject_client=$(this).val();
        $.ajax({
            url:'action.php',
            type:'post',
            data: {
                reject_client:reject_client,
                action_client_active: 'reject_client'
            },
            success:function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position: 'top-center',
                    icon:result.status
                });
                setTimeout(function () {
                    location.reload();
                },2000);
            }
        });
    });
});

// Active cases from admin
$(document).ready(function () {
    $('.active-case').on('click',function(){
        var active_id = $(this).val();
        $.ajax({
            url:'action.php',
            type:'post',
            data: {
                "active":active_id,
                "action":'active_case'
            },
            success:function (data) {
                var result = JSON.parse(data);
                $.toast({
                    hading: 'notification',
                    text:result.message,
                    position:'top-center',
                    icon:result.status
                });
                setTimeout(function () {
                    location.reload();
                },2000);

            }
        });
    });
});

// activate clients
$(document).ready(function () {
    $('.active-clients').on('click',function () {
        var active_client=$(this).val();
        $.ajax({
            url:'action.php',
            type:'post',
            data: {
                activeClient:active_client,
                action_client: 'clientActive'
            },
            success:function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position: 'top-center',
                    icon:result.status
                });
                setTimeout(function () {
                    location.reload();
                },2000);
            }
        });
    });
});

// activate membership
$(document).ready(function () {
    $('.membership-plan-active').on('click',function () {
        var membership_plan=$(this).val();
        $.ajax({
            url:'action.php',
            type:'post',
            data: {
                activeMembership:membership_plan,
                action_Membership: 'membershipActive'
            },
            success:function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position: 'top-center',
                    icon:result.status
                });
                setTimeout(function () {
                    location.reload();
                },2000);
            }
        });
    });
});

// activate Lawyers
$(document).ready(function () {
    $('.active-lawyer').on('click',function () {
        var active_lawyer = $(this).val();
        $.ajax({
            url:'action.php',
            type:'post',
            data: {
                activeLawyer :active_lawyer,
                action_lawyer: 'lawyer_action'
            },
            success:function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position: 'top-center',
                    icon:result.status
                });
                setTimeout(function () {
                    location.reload();
                },2000);
            }
        });
    });
});

// reject Lawyers from admin
$(document).ready(function () {
    $('.reject-lawyer').on('click',function () {
        var reject_lawyer = $(this).val();
        $.ajax({
            url:'action.php',
            type:'post',
            data: {
                rejectLawyer :reject_lawyer,
                action_lawyer_reject: 'lawyer_action_reject'
            },
            success:function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position: 'top-center',
                    icon:result.status
                });
                setTimeout(function () {
                    location.reload();
                },2000);
            }
        });
    });
});

// Lawyer Membership plan create
$(document).ready(function(){
    $('#membership-modal').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
    });
});

// Lawyer  comments
$(document).ready(function(){
    $('#c-form').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
    });
});

// Lawyer send request for case approval
$(document).ready(function(){
    $('#app-form').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
    });
});

// Lawyer next hearing case data and information
$(document).ready(function(){
    $('#next_hearing').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
    });
});

// Update lawyer profile
$(document).ready(function(){
    $('#update_lawyer_form').on('submit', function(e){
        e.preventDefault();
        var fd = new FormData(this);
        $.ajax({
            url: 'action.php',
            type: 'post',
            // data: $(this).serialize(),
            data: fd,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success: function(data){
                // var result = JSON.parse(data);
                var result = data;
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                if(result.url && result.url.length > 0){
                    setTimeout(function(){
                        window.location.href = result.url
                    }, 2000)
                }
            }
        });
    });
});

//service select option ajax
function mservice(datavalue){
    $.ajax({
        url:  'action.php',
        type: 'POST',
        data: {data : datavalue},
        success: function(result){
            $('#services').html(result);
        }
    });
}

// Paypal payment request
    paypal.Buttons({
    createOrder: function(data, actions) {
        // This function sets up the details of the transaction, including the amount and line item details.
        var price = $('#price').val();
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: price
                }
            }]
        });
    },

    onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
            console.log(details);
              $('input[name=transaction_id]').val(details.id);
              $('input[name=transaction_status]').val(details.status);

              $('#pay_now').trigger('click');
            // This function shows a transaction success message to your buyer.
           // alert('Transaction completed by ' + details.payer.name.given_name);
        });
    }
}).render('#paypal-button-container');
//This function displays Smart Payment Buttons on your web page.

// payment form submit
$(document).ready(function(){
    $('#payment_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                if(result.url && result.url.length > 0){
                    setTimeout(function(){
                        window.location.href = result.url
                    }, 2000)
                }
            }
        });
    });
});

//show and hide div
    function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
