
// for fetching plastic sales
function fetch_plastic_sales(){
  var action ='fetch_plastic_sales';
	$.ajax({
		url:'adminBackend.php',
		method:'POST',
		data:{'action':action},
		success:function(data){
      if(data===''){
      }
      else{
      $('#plastic_sales').html(data);

      }
		}
	})
}
fetch_plastic_sales();

// for fetching the events
function fetch_events(){
  var action ='fetch_events';
	$.ajax({
		url:'adminBackend.php',
		method:'POST',
		data:{'action':action},
		success:function(data){
      if(data===''){
      }
      else{
      $('#events_tbl').html(data);

      document.querySelectorAll('#more_drop_down').forEach((btn)=>{

       btn.children[1].children[0].addEventListener("click",function (e) {

     	var id = e.target.id;

     	var classname = e.target.classList[1];

         if(classname==='delete_event'){
           Swal.fire({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#000051',
             cancelButtonColor: '#ff6600',
             confirmButtonText: 'Yes, delete it!'
           }).then((result) => {
             if (result.isConfirmed) {
       //***************deleting the product from the database*************//
                   var action = 'deleteProduct';
                   var productId = e.target.id;
                   $.ajax({
                     url:"productsBackEnd.php",
                     method:"POST",
                     data:{"productId":productId, "action":action,"category":categoryName,'businessName':businessName},
                     success:function(data)
                     {
                       var rowId='#A'+productId;
                       $(rowId).remove();
                       const Toast = Swal.mixin({
                         toast: true,
                         position: 'center',
                         showConfirmButton: false,
                         timer: 1500,
                         timerProgressBar: true,
                         didOpen: (toast) => {
                           toast.addEventListener('mouseenter', Swal.stopTimer)
                           toast.addEventListener('mouseleave', Swal.resumeTimer)
                         }
                       })

                       Toast.fire({
                         icon: 'success',
                         title: data
                       })
                     }
                   })
             }
           })
         }

     })
     })
// END
      }
		}
	})
}
fetch_events();

// for fetching total uploads
function fetch_total_uploads(){
  var action ='fetch_total_uploads';
	$.ajax({
		url:'adminBackend.php',
		method:'POST',
		data:{'action':action},
		success:function(data){
      if(data===''){
      $('#uploads').html(0);
      }
      else{
      $('#uploads').html(data);

      }
		}
	})
}
fetch_total_uploads();

// for fetching total uploads
function fetch_total_mass(){
  var action ='fetch_total_mass';
	$.ajax({
		url:'adminBackend.php',
		method:'POST',
		data:{'action':action},
		success:function(data){
      if(data===''){
        $('#total_volume').html(0);
      }
      else{
      $('#total_volume').html(data);

      }
		}
	})
}
fetch_total_mass();

//for fetching total uploads
function fetch_total_price(){
  var action ='fetch_total_price';
	$.ajax({
		url:'adminBackend.php',
		method:'POST',
		data:{'action':action},
		success:function(data){
      if(data===''){
        $('#total_payments').html(0);
      }
      else{
      $('#total_payments').html(data);

      }
		}
	})
}
fetch_total_price();

// get categories
function fetch_products(){
  var action = 'fetch_products';
  $.ajax({

    url:"adminBackend.php",
    method:"POST",
    data:{'action':action},
    success:function(data){
      $('#product_tbody').html(data);

      // FOR EDITING DELETING
      document.querySelectorAll('#more_drop_down').forEach((btn)=>{

       btn.children[1].children[0].addEventListener("click",function (e) {

     	var id = e.target.id;

     	var classname = e.target.classList[1];

         if(classname==='delete_product'){
           Swal.fire({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#000051',
             cancelButtonColor: '#ff6600',
             confirmButtonText: 'Yes, delete it!'
           }).then((result) => {
             if (result.isConfirmed) {
       //***************deleting the product from the database*************//
                   var action = 'deleteProduct';
                   var productId = e.target.id;
                   $.ajax({
                     url:"adminBackend.php",
                     method:"POST",
                     data:{"productId":productId, "action":action},
                     success:function(data)
                     {
                       var rowId='#A'+productId;
                       $(rowId).remove();
                       const Toast = Swal.mixin({
                         toast: true,
                         position: 'center',
                         showConfirmButton: false,
                         timer: 1500,
                         timerProgressBar: true,
                         didOpen: (toast) => {
                           toast.addEventListener('mouseenter', Swal.stopTimer)
                           toast.addEventListener('mouseleave', Swal.resumeTimer)
                         }
                       })

                       Toast.fire({
                         icon: 'success',
                         title: data
                       })
                     }
                   })
             }
           })
         }

     })
     })
// END


// ---------for sorting the table-----------//
// -----------------------sorting the table--------------------------------//
function sortTableByColumn(table, column, asc = true) {
    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll("#product_table tr"));

    // Sort each row
    const sortedRows = rows.sort((a, b) => {
        const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
        const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();

        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
    });

    // Remove all existing TRs from the table
    while (tBody.firstChild) {
        tBody.removeChild(tBody.firstChild);
    }

    // Re-add the newly sorted rows
    tBody.append(...sortedRows);

    // Remember how the column is currently sorted
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);
}

document.querySelectorAll("#product_table th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        const tableElement = headerCell.parentElement.parentElement.parentElement;
        const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const currentIsAscending = headerCell.classList.contains("th-sort-asc");

        sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
    });
    });
        }
    })
  }
  fetch_products();

  // get categories
  function fetch_categories(){
    var action = 'fetchCategories';
    $.ajax({

      url:"adminBackend.php",
      method:"POST",
      data:{'action':action},
      success:function(data){
        var data= JSON.parse(data);
        $('#category_list').html(data.options);
        $('#category_tbl').html(data.categories);

    //for deleting the category
    document.querySelectorAll("#category_tr").forEach(function(row){
    row.children[2].children[0].addEventListener('click',(e)=>{
      e.preventDefault();
      var id=e.target.id;
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#000051',
        cancelButtonColor: '#ff6600',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
  //***************deleting the product from the database*************//
              var action = 'delete_category';
              var productId = e.target.id;
              $.ajax({
                url:"adminBackend.php",
                method:"POST",
                data:{"productId":productId, "action":action},
                success:function(data)
                {
                  row.remove();
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })

                  Toast.fire({
                    icon: 'success',
                    title: data
                  })
                }
              })
        }
      })
    })
    })
          }
      })
    }
    fetch_categories();
//for inserting the recieved plastics

$('#submit_plastic').click(function(e){
 e.preventDefault();
//bind parsley to products entry form

  $('#record_plastic_form').parsley();

//after form has been successfully validated

  if($('#record_plastic_form').parsley().isValid())
  {
  var mass = $('#mass').val();
  var price = $('#plastic_price').val();
  var location = $('#location').val();

  var action="record_plastic";
       $.ajax({

       url:'adminBackend.php',
       method:'post',
       data:{"action":action,"price":price,"mass":mass,"location":location},
       success: function(data){
         fetch_plastic_sales();
         if(data==1){
          Swal.fire({
          icon: 'success',
          title: 'Sucess...',
          text: 'your updates have been submitted...!'
        })
         }

        $('.btn-close').click();
        mass = $('#mass').val('');
        price = $('#plastic_price').val('');
        location = $('#location').val('');
      }

  })
}
})

// for inserting the category
  $('#select_image_category').change(function(event){
    var image= document.getElementById('show_category_Img');
    image.src = URL.createObjectURL(event.target.files[0]);
  })


  // ******************************************************************/


  // for sending category to dB
  // binding parsley to form
    $('#category_form').parsley();

    $('#category_form').submit(function(event){

      event.preventDefault();
      $('#category_form').parsley();

    //after form has been successfully validated
    if($('#category_form').parsley().isValid())
    {
           var image_name = $('#select_image_category').val();
           if(image_name == '')
           {
           swal("Please Select Image",'','warning');
           return false;
           }
           else
           {
           var extension = $('#select_image_category').val().split('.').pop().toLowerCase();
           if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
           {
             swal("Invalid Image File","","error");
             $('#select_image_category').val('');
             return false;
           }
           else
           {

             $.ajax({
             url:"adminBackend.php",
             method:"POST",
             data:new FormData(this),
             contentType:false,
             processData:false,
             success:function(data)
             {
               Swal.fire({
                 position: 'top-end',
                 icon: 'success',
                 title: data,
                 showConfirmButton: false,
                 timer: 1500
               })
               $('.btn-close').click();
               $('#select_image_category').val('');
               $('#category_name').val('');
               var img= document.getElementById('show_category_Img');
               img.src = " ";
             }
             });
           }
           }
    }
    else{
      alert('Please enter the values first')
    }

    });


//for inserting the category
  $('#product_image').change(function(event){
    var image= document.getElementById('show_product_Img');
    image.src = URL.createObjectURL(event.target.files[0]);
  })
// ******************************************************************/
// for sending category to dB
// binding parsley to form
  $('#product_form').parsley();

  $('#product_form').submit(function(event){

    event.preventDefault();
    $('#product_form').parsley();

      //after form has been successfully validated
  if($('#product_form').parsley().isValid())
  {
         var image_name = $('#product_image').val();
         if(image_name == '')
         {
         swal("Please Select Image",'','warning');
         return false;
         }
         else
         {
         var extension = $('#product_image').val().split('.').pop().toLowerCase();
         if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
         {
           swal("Invalid Image File","","error");
           $('#product_image').val('');
           return false;
         }
         else
         {
           $.ajax({
           url:"adminBackend.php",
           method:"POST",
           data:new FormData(this),
           contentType:false,
           processData:false,
           success:function(data)
           {
          alert(data)
             fetch_categories();
             Swal.fire({
               position: 'top-end',
               icon: 'success',
               title: data,
               showConfirmButton: false,
               timer: 1500
             })
             $('.btn-close').click();
             $('#show_product_Img').val('');
             $('#category_name').val('');
             var img= document.getElementById('show_category_Img');
             img.src = " ";
           }
           });
         }
         }
  }
  else{
    alert('Please enter the values first')
  }

  });

  //for inserting the event
    $('#event_image').change(function(event){
      var image= document.getElementById('show_selected_event_Img');
      image.src = URL.createObjectURL(event.target.files[0]);
    })
  // ******************************************************************/
  // for sending category to dB
  // binding parsley to form
    $('#event_form').parsley();

    $('#event_form').submit(function(event){

      event.preventDefault();
      $('#event_form').parsley();

        //after form has been successfully validated
    if($('#event_form').parsley().isValid())
    {
           var image_name = $('#event_image').val();
           if(image_name == '')
           {
           swal("Please Select Image",'','warning');
           return false;
           }
           else
           {
           var extension = $('#event_image').val().split('.').pop().toLowerCase();
           if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
           {
             swal("Invalid Image File","","error");
             $('#event_image').val('');
             return false;
           }
           else
           {

             $.ajax({
             url:"adminBackend.php",
             method:"POST",
             data:new FormData(this),
             contentType:false,
             processData:false,
             success:function(data)
             {
               fetch_events();
               Swal.fire({
                 position: 'top-end',
                 icon: 'success',
                 title: data,
                 showConfirmButton: false,
                 timer: 1500
               })
               $('.btn-close').click();
               $('#show_selected_event_Img').val('');
               var img= document.getElementById('show_category_Img');
               img.src = " ";
             }
             });
           }
           }
    }
    else{
      alert('Please enter the values first')
    }

    });
 // bind parsley to all forms
 $('form').parsley();
