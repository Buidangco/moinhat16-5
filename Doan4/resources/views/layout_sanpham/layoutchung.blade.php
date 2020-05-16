<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Subash || Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('subas/img/icon/favicon.png')}}">
 
    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('subas/css/bootstrap.min.css')}}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{asset('subas/lib/css/nivo-slider.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('subas/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('subas/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('subas/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('subas/css/responsive.css')}}">
    <!-- Template color css -->
    <link href="{{asset('subas/css/color/color-core.css')}}" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('subas/css/custom.css')}}">

    <!-- Modernizr JS -->
    <script src="{{asset('subas/js/vendor/modernizr-2.8.3.min.js')}}"></script>

      <link rel="icon" type="image/png" href="{{asset('subas/login/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('subas/subas/login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('subas/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('subas/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('subas/login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--======subas/=========================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('subas/login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('subas/login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('subas/login/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('subas/login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('subas/login/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('subas/login/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('subas/login/css/main.css')}}">
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
   @yield('body');
    <!-- Body main wrapper end -->
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
            function them(id){
                let route = '{{ route('product.add', ['id' => ':id']) }}';
                route = route.replace(':id', id);
                console.log(route);
            $.ajax({
                 type:'GET',
                url:route,
            }).done(function(response){
               RenderCart(response);
                alertify.success('Thêm thành công');
            });
        }

        $("#them1").on("click",".del-icon i ",function(){
             let route = '{{ route('xoasanpham', ['id' => ':id']) }}';
                route = route.replace(':id', $(this).data("id"));
                console.log(route);
            $.ajax({
                 type:'GET',
                url:route,
            }).done(function(response){                             
                RenderCart(response);
                 console.log($("#total-quanty-cart").val());
                alertify.success('Đã xóa sản phẩm');
            });
        });

        function RenderCart(response){
             $("#them1").empty();
                $("#them1").html(response);
                 $("#total-quanty-show").text($("#total-quanty-cart").val());
           
        }
        function giatri(){
            let giatri = $("#customRange11").val();
            let code=$("#code").val();
           let code1 =$('#nho').html(code);
           let code2=$('#nho').text();
             $.ajax({
                 type:'GET',
                url:'/danhsach/'+giatri+'/'+code2,
            }).done(function(response){
              $("#themvao").empty();
                $("#themvao").html(response);
                alertify.success('Tìm thành công');
            });
        }

                function giatrimau(){
            let giatrimau = $("#sel1").val();
            let code=$("#code").val();
           let code1 =$('#nho').html(code);
           let code2=$('#nho').text();
           console.log(code2);
             $.ajax({
                 type:'GET',
                url:'/danhsach1/'+giatrimau+'/'+code2,
            }).done(function(response){
              $("#themvao").empty();
                $("#themvao").html(response);
                alertify.success('Tìm thành công');
            });
        }
         function them1(id){
           let soluong= $("#soluongnay").val();
                console.log(soluong);
            $.ajax({
                 type:'GET',
                url:'/save_list/'+id+'/'+soluong,
            }).done(function(response){
                $("#them1").empty();
                $("#them1").html(response);
                 $("#total-quanty-show").text($("#total-quanty-cart").val());
                // $("#total-quanty-show").text($("#total-quanty-cart").val());
                alertify.success('Lưu thành công');
            });
            }
        // }
        // }
        function timkiemsanpham1()
        {
         let nameprice= $('#nameprice').val();
          let code=$("#code").val();
           let code1 =$('#nho').html(code);
           let code2=$('#nho').text();
         $.ajax({
          type:'GET',
          url:'/danhsachtimkiem/'+nameprice+'/'+code2,
         }).done(function(response){
           $("#themvao").empty();
            $("#themvao").html(response);
                alertify.success('Tìm thành công');
         })
        }

        function Xemloai(id){
           $.ajax({
          type:'GET',
          url:'/danhsachsan/'+id,
         }).done(function(response){
           $("#themvao").empty();
            $("#themvao").html(response);
                alertify.success('Tìm thành công');
         })
        }
</script>
    <!-- Placed JS at the end of the document so the pages load faster -->
    <!-- jquery latest version -->
   
    <!-- Bootstrap framework js -->
    <script src="{{asset('subas/js/bootstrap.min.js')}}"></script>
    <!-- jquery.nivo.slider js -->
    <script src="{{asset('subas/lib/js/jquery.nivo.slider.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('subas/js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('subas/js/main.js')}}"></script>
      <script src="{{asset('login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('subas/login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('subas/login/vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{asset('subas/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('subas/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('subas/login/vendor/daterangepicker/moment.min.js')}}"></script>
  <script src="{{asset('subas/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('subas/login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
            <script>
            $(document).ready(function() {

  const $valueSpan = $('.valueSpan2');
  const $value = $('#customRange11');
  $valueSpan.html($value.val());
  $value.on('input change', () => {

    $valueSpan.html($value.val());
  });
});

          
        </script>

</body>

</html>