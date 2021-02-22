$(document).ready(function () {



   $('#keyword').keyup(function(){


      if($('#keyword').val().length >2){ 

         $('#message_keyword').html('');
         
     
       $.ajax({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          type:'POST',
          url:"search1",
          data:{keyword:$('#keyword').val(),},
          success:function(items){
          
             
            $('#search_result').html('');
             var temp_html='';
            
             if(items.length>0){
             for(var i=0;i<items.length;i++)
             {
               temp_html+="<div class='row-12 border border-warning mb-2 border-3 d-flex'>";
               temp_html+= "<div class='col-8 border' >";
     
               temp_html+= "<h1><a href='/vnmarket/public/article/show/"+items[i]['id']+"'>"+items[i]['title']+"</a></h1> <hr>";
               temp_html+= "<div>";
               temp_html+= "<p>"+items[i]['summary']+"</p>";
               temp_html+= "</div>";
               temp_html+="</div>";
     
               temp_html+="<div class='col-4 border text-center' >";
                             
                           //  echo "<h1>".$item['avatar']."</h1>";
                           temp_html+= "<img class='product_avatar ' src='../storage/"+items[i]['avatar']+"' alt='picture of product'>";
                           temp_html+= "<br/>";
                           temp_html+= "<h1 class='text-primary'>"+items[i]['price']+"&#36;</h1>";
                           temp_html+="</div>";
                           temp_html+="</div>";
     
             }

             $('#search_result').html(temp_html);
            }
            else {

               temp_html='<h3> No Post is found!</h3>';
               $('#search_result').html(temp_html);
               $('#search_result').css({'color':'blue'});


            }




          }
       });
   
   
   
      }
      else $('#message_keyword').html("<p style='color:red;'> keyword should be more than 5 characters</p>");


   })

  








})