$(document).ready(function () {

var validate_title= 1;
var validate_summary= 1;
var validate_content= 1;
var validate_price= 1;



$("#title").keyup(function(){

    
    if($("#title").val().length<10) {
        
        $("#message_title").html("<p style='color: red;'> Title must be between more than 10 characters</p>");
        $('#title').removeClass().addClass("form-control   is-invalid");
    }
    else{
        
        $("#message_title").html("");
        $('#title').removeClass().addClass("form-control is-valid");
        validate_title= 0;
    }


});


$("#summary").keyup(function(){

        if($("#summary").val().length<10||$("#summary").val().length>255){

                $("#message_summary").html("<p style='color:red;'> Summary must be more than 10 ans less than 255 characters</p>");
                $('#summary').removeClass().addClass("form-control is-invalid");

        }

        else {

            $("#message_summary").html("");
            $("#summary").removeClass().addClass("form-control is-valid");
             validate_summary= 0;

        }


});



$("#content").keyup(function(){
    console.log($("#content".val()));

    if($("#content".val().length<50)){

        $("#content").removeClass().addClass("form-control is-invalid");
        $("#message_content").html("<p style='color:red;'> Content of post must be more than 100 character </p>");

    }

    else{

        $("#content").removeClass().addClass("form-control is-valid");
        $("#message_content").html("");
        validate_content= 0;

    }

})

    $("#price").keyup(function(){

        if(!Number($("#price").val())){

            $("#price").removeClass().addClass("form-control is-invalid");
            $("#message_price").html("<p style='color:red;'> the price must be a number </p>");
        }
        else if(parseFloat($("#price").val())>99999){

            $("#price").removeClass().addClass("form-control is-invalid");
            $("#message_price").html("<p style='color:red;'> the price is too high</p>");
        }

        else {


            $("#price").removeClass().addClass("form-control is-valid");
            $("#message_price").html("");
             validate_price= 0;
        }


    });


    $("#submit_btn").click(function(){

        if(validate_price===1||validate_summary===1||validate_title===1){

            $("#message_submit").html("<p style='color:red;'> Some fields are not validated</p>");
            event.preventDefault();
        }

    })










})