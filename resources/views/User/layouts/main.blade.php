<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Admin/plugins//fontawesome-free/css/all.min.css')}}">

  <!-- profile -->
  <link rel="stylesheet" href="{{asset('Admin/dist/css/profile.css')}}">
  
  <link rel="stylesheet" href="{{asset('User/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('User/css/ owl-carousel-1.css')}}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('Admin/plugins//tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('Admin/plugins//icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('Admin/plugins//jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('Admin/plugins//overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('Admin/plugins//daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('Admin/plugins//summernote/summernote-bs4.min.css')}}">
   
 <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Admin/plugins//fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>  
 <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
 <!-- DataTables -->
  <link rel="stylesheet" href="User/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="User/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="User/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 


<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script> 



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link href="{{asset('User/css/owlCarousel-1.css')}} " rel="stylesheet">
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">

<title>User Panel</title>
  </head>

  <body>
<div class="wrapper">


@include('User.layouts.header')
@include('User.layouts.sidebar')




<div class="content-wrapper" >
    <div class="content-main-block">
<!-- <section class="main-page-handle">
      <h3 class="font-24">Dashboard</h3>
      <p class="font-14">Hello, {{auth()->user()->name}}. Welcome to Dashboard</p>
    </section> -->
    @yield('content')

</div>
</div>

@include('User.layouts.footer')
</div>
</html>
 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>-->
<!-- jQuery -->
<script src="{{asset('Admin/plugins//jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('Admin/plugins//bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="{{asset('Admin/plugins//jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('Admin/plugins//jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('Admin/plugins//bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('Admin/plugins//chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('Admin/plugins//sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('Admin/plugins//jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('Admin/plugins//jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('Admin/plugins//jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('Admin/plugins//moment/moment.min.js')}}"></script>
<script src="{{asset('Admin/plugins//daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('Admin/plugins//tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('Admin/plugins//summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('Admin/plugins//overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Admin/dist/js/adminlte.js')}}"></script>
<script src="{{asset('Admin/dist/js/image-uplaod.js')}}"></script>
<script src="{{asset('Admin/dist/js/main.js')}}"></script>
<script src="{{asset('Admin/dist/js/tabbing.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('Admin/dist/js/pages/dashboard.js')}}"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{asset('User/js/owl-carousel-1.js')}}"></script>
 <script src="{{asset('User/js/tabs.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="{{asset('User/js/slick-slider.js')}}"></script>
<script src="{{asset('User/js/image-upload.js')}}"></script>
<script src="{{asset('User/js/filter.js')}}"></script>
<script src="{{asset('User/js/single-image-upload.js')}}"></script>
<script src="{{asset('User/js/multiple-image-upload.js')}}"></script>

<script>
  $(document).ready(function() {
    $('#datatable-responsive').DataTable();
} );
 </script>
  
<!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will disappear forever..",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
if ($("#adduser").length > 0) {
    $("#adduser").validate({
       rules: {
        full_name:{
          required: true,
        },
        phone: {
            required: true,
            },
        email: {
            required: true,
            },  
        address:{
          required: true,
        },
        password: {
            required: true,
            },
        image: {
            required: true,
            },
             country_id: {
            required: true,
            },
       
      },
     messages: {
          full_name:{
          required: "Please enter name",
        },
        phone: {
           required: "Please enter phone number",
          
          },
        email: {
           required: "Please enter email",
        
          },
        address: {
           required: "Please enter phone number",
          
          },
        password: {
           required: "Please enter password",
        
          },
     image: {
           required: "Please select image",
        
          },
      country_id: {
           required: "Please choose country",
        
          },
      },
   })
} 
</script>

<script>
if ($("#addleakages").length > 0) {
    $("#addleakages").validate({
       rules: {
        domain:{
          required: true,
        },
        name: {
            required: true,
            },
        email: {
            required: true,
            },  
        password:{
          required: true,
        },
        date: {
            required: true,
            },
             country_id: {
            required: true,
            },
       
      },
     messages: {
          domain:{
          required: "Please enter domain name",
        },
        name: {
           required: "Please enter user name",
          
          },
        password: {
           required: "Please enter password",
        
          },
        address: {
           required: "Please enter phone number",
          
          },
        date: {
           required: "Please enter date",
        
          },
      country_id: {
           required: "Please choose country",
        
          },
     
      },
   })
} 
</script>
<script>
if ($("#addmalware").length > 0) {
    $("#addmalware").validate({
       rules: {
        title:{
          required: true,
        },
        available: {
            required: true,
            },
        image: {
            required: true,
            },  
        date: {
            required: true,
            },
             country_id: {
            required: true,
            },
       
      },
     messages: {
          title:{
          required: "Please enter title",
        },
        available: {
           required: "Please enter available",
          
          },
        image: {
           required: "Please choose image",
        
          },
        date: {
           required: "Please enter date",
        
          },
           country_id: {
           required: "Please choose country",
        
          },
     
     
      },
   })
} 
</script>
<script>
if ($("#addnews").length > 0) {
    $("#addnews").validate({
       rules: {
        title:{
          required: true,
        },
        description: {
            required: true,
            },
        category_id: {
            required: true,
            },  
        country_id: {
            required: true,
            },
             image: {
            required: true,
            },
       
      },
     messages: {
          title:{
          required: "Please enter title",
        },
        description: {
           required: "Please enter description",
          
          },
        category_id: {
           required: "Please choose category",
        
          },
       country_id: {
           required: "Please choose country",
        
          },
           image: {
           required: "Please choose image",
        
          },
     
     
      },
   })
} 
</script>
<script>
if ($("#addtools").length > 0) {
    $("#addtools").validate({
       rules: {
        title:{
          required: true,
        },
        image: {
            required: true,
            },  
        date: {
            required: true,
            },
         country_id: {
            required: true,
            },    
       
      },
     messages: {
          title:{
          required: "Please enter title",
        },
        image: {
           required: "Please choose image",
        
          },
        date: {
           required: "Please enter date",
        
          },
           country_id: {
           required: "Please choose country",
        
          },
     
     
      },
   })
} 
</script>
<script>
if ($("#addicos").length > 0) {
    $("#addicos").validate({
       rules: {
        title:{
          required: true,
        },
        label: {
            required: true,
            },  
        date: {
            required: true,
            },
             country_id: {
            required: true,
            },
       
      },
     messages: {
          title:{
          required: "Please enter title",
        },
        label: {
           required: "Please choose label",
        
          },
        date: {
           required: "Please enter date",
        
          },
           country_id: {
           required: "Please choose country",
        
          },
     
     
      },
   })
} 
</script>
<script>
if ($("#addttps").length > 0) {
    $("#addttps").validate({
       rules: {
        title:{
          required: true,
        },
        label: {
            required: true,
            },  
        available: {
            required: true,
            },
             country_id: {
            required: true,
            },
       
      },
     messages: {
          title:{
          required: "Please enter title",
        },
        label: {
           required: "Please choose label",
        
          },
        available: {
           required: "Please enter available",
        
          },
           country_id: {
           required: "Please choose country",
        
          },
     
     
      },
   })
} 
</script>
<script>
if ($("#addfaq").length > 0) {
    $("#addfaq").validate({
       rules: {
        question:{
          required: true,
        },
        answer: {
            required: true,
            },  
       
      },
     messages: {
          question:{
          required: "Please enter question",
        },
        answer: {
           required: "Please enter answer",
        
          },
      
      },
   })
} 
</script>
<script>
if ($("#addrating").length > 0) {
    $("#addrating").validate({
       rules: {
        image:{
          required: true,
        },
        rate: {
            required: true,
           // digits_between:1,5,
            },
             description: {
            required: true,
            },
       
      },
     messages: {
          image:{
          required: "Please choose image",
        },
        rate: {
           required: "Please enter rating",
           //digits_between:"Please enter between 1 to 5"
        
          },
           description: {
           required: "Please enter description",
        
          },
      
      },
   })
} 
</script>

 <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#details'))
                
                .catch(error => {
                    console.error(error);
                });
           
        </script>
        


<script>
 $(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 70;  // How many characters are shown by default
    var ellipsestext = "";
    var moretext = "Read More";
    var lesstext = "Read Less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
</script>       
<script>
if ($("#editmalware").length > 0) {
    $("#editmalware").validate({
       rules: {
        title:{
          required: true,
        },
        available: {
            required: true,
            },
        
        date: {
            required: true,
            },
             country_id: {
            required: true,
            },
       
      },
     messages: {
          title:{
          required: "Please enter title",
        },
        available: {
           required: "Please enter available",
          
          },
       
        date: {
           required: "Please enter date",
        
          },
           country_id: {
           required: "Please choose country",
        
          },
     
     
      },
   })
} 
</script>
<script>
if ($("#edittools").length > 0) {
    $("#edittools").validate({
       rules: {
        title:{
          required: true,
        },
       
        date: {
            required: true,
            },
         country_id: {
            required: true,
            },    
       
      },
     messages: {
          title:{
          required: "Please enter title",
        },
       
        date: {
           required: "Please enter date",
        
          },
           country_id: {
           required: "Please choose country",
        
          },
     
     
      },
   })
} 
</script>

<script>
   jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}

  

</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
            title: `Are you sure you want to delete this property?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>


 <script>
    $(document).ready(function()
{
    $("#store").change(function()
    {
        var id=$(this).val();

        // alert(id);
        
         $.ajax({
             url: "{{ url('user/progress-bar') }}" , 
             type: "GET",  
             data:{id:id},
             success:function(data)
                {
                        // alert(data.id);
                    var sale = data.sale;
                    var total = data.total;
                    var rent = data.rent;
                      $('#progress1new').show();
                      
                       $('#progress1old').hide();
                      
                    $('#progress1new').html('');
                     var option = ' <div class="left-section"><img src="./Admin/images/sold-icon.svg"><div class="text" id="progress1old"><h2 class="top-heading">Sold</h2><progress class="progress progress1" max="'+total+'" value="'+sale+'"></progress></div></div><div class="right-section"><h3 >'+sale+'</h3></div></div>';
                        $('#progress1new').append(option);

                         $('#progress1rent').show();
                     
                         $('#progressrent').hide();

                    $('#progress1rent').html('');
                     var option1 = '<div class="left-section"><img src="./Admin/images/sold-icon.svg"><div class="text" id="progress1old"><h2 class="top-heading">Rented</h2><progress class="progress progress1" max="'+total+'" value="'+rent+'"></progress></div></div><div class="right-section"><h3 >'+rent+'</h3></div></div>';
                        $('#progress1rent').append(option1);


                  
                   
              },
          error: function (data) {
                console.log(data);
             }

        });  
    });
   
});
</script>

 <script>
    $(document).ready(function()
{
    $("#chart").change(function()
    {
        var id=$(this).val();

        // alert(id);
        
         $.ajax({
             url: "{{ url('user/circle-chart') }}" , 
             type: "GET",  
             data:{id:id},
            success:function(data)
                {
                   $('#donut').hide();  
                     $('#donutchart').show();           
                  var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                  ['Sales',   data.sale],
                  ['Rental',    data.rent],
        
                ]);

        var options = {
           pieHole: 0.4,
           'width':300,
          colors: [ '#1e90ff', '#ffbf00'],
           'height':200
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      
                  
                   
              },
          error: function (data) {
                console.log(data);
             }

        });  
    });
   
});
</script>
<script>
    
    
        //   $(document).on("click" , "#expenses_search" , function() {
           $(document).on("change" , "#selectBox,#selectBox1,#selectBox2,#project,#outside", function() {  
             
          
            var query = $('#selectBox').val();
            var floors = $('#selectBox1').val();
            var surface = $('#selectBox2').val();
               
           var project = [];

    //   alert(query);
        $("#project:checked").each(function() {
            project.push($(this).val()); // Assuming you have a "value" attribute set for each checkbox
        });
        
         var outside = [];

        // Iterate over each checkbox with the "checkbox" class
        $("#outside:checked").each(function() {
            outside.push($(this).val()); // Assuming you have a "value" attribute set for each checkbox
        });
       
                    $.ajax({
                        type:'GET',
                        url:"{{ url('user/search/sale') }}",
                        dataType: 'json',
                        serverSide: 'true',
                        processing: true,
                        data:{query:query,floors:floors,surface:surface,project:project,outside:outside},
                     
                            success:function(data){
                                
                                // alert(data.ids);
                                var ids = data.ids;
                                
                                $('#old').hide();
                                $('#new').show();
                                  for(var i = 0; i < ids.length; i++)
                                  {
                                    var output = '';
                                   output +='<a href="javascript:void(0); "><div class="slider-img "><img src="https://immotep.chainpulse.tech/Property-images/'+data.image[i]+'"><div class="hover-btn-container"><form action="https://immotep.chainpulse.tech/admin/single-properties/'+ids[i]+'"><button class="view-btn"   type="submit">View</button></form><form action="https://immotep.chainpulse.tech/admin/delete-properties/'+ids[i]+'"><button class="delete-btn show_confirm">Delete</button></form></div></div><div class="detail"><h2 class="top-heading">'+data.name[i]+'</h2><div class="location-box"><div class="loc-icon"<img src="{{asset("Admin/images/loc-icon.svg")}}"></div><div class="loc-text">'+data.location[i]+'</div></div></div></a>';
                  
                                         $('#new').html(output);
                                
                   
                                       }
        
                                                                     
                       }
            
                    });
                   
                
                    
              
          });




      
    </script>

<script>
    
    
        
           $(document).on("change" , "#rentselectBox,#rentselectBox1,#rentselectBox2,#rentproject,#rentoutside", function() {  
             
          
            var query = $('#rentselectBox').val();
            var floors = $('#rentselectBox1').val();
            var surface = $('#rentselectBox2').val();
               
           var project = [];

      
        $("#rentproject:checked").each(function() {
            project.push($(this).val()); // Assuming you have a "value" attribute set for each checkbox
        });
        
         var outside = [];

        // Iterate over each checkbox with the "checkbox" class
        $("#rentoutside:checked").each(function() {
            outside.push($(this).val()); // Assuming you have a "value" attribute set for each checkbox
        });
        // alert(project);
       
                    $.ajax({
                        type:'GET',
                        url:"{{ url('user/search/rent') }}",
                        dataType: 'json',
                        serverSide: 'true',
                        processing: true,
                        data:{query:query,floors:floors,surface:surface,project:project,outside:outside},
                     
                            success:function(data){
                                
                                // alert(data.project[0]);
                                var ids = data.ids;
                                
                                $('#rentold').hide();
                                $('#rentnew').show();
                                  for(var i = 0; i < ids.length; i++)
                                  {
                                    var output = '';
                                   output +='<a href="javascript:void(0); "><div class="slider-img "><img src="https://immotep.chainpulse.tech/Property-images/'+data.image[i]+'"><div class="hover-btn-container"><form action="https://immotep.chainpulse.tech/admin/single-properties/'+ids[i]+'"><button class="view-btn"   type="submit">View</button></form><form action="https://immotep.chainpulse.tech/admin/delete-properties/'+ids[i]+'"><button class="delete-btn show_confirm">Delete</button></form></div></div><div class="detail"><h2 class="top-heading">'+data.name[i]+'</h2><div class="location-box"><div class="loc-icon"<img src="{{asset("Admin/images/loc-icon.svg")}}"></div><div class="loc-text">'+data.location[i]+'</div></div></div></a>';
                  
                                         $('#rentnew').html(output);
                                
                   
                                       }
        
                                                                     
                       }
            
                    });
                   
                
                    
              
          });
          




      
    </script>