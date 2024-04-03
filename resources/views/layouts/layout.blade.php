<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Custom Auth Laravel')</title>

    {{-- data table css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>





    <style>
      .navbar{
        padding: 10px 100px !important;

        background-color: rgb(46, 34, 19) !important;
      }
      .navbar-brand img{
        width: 100px;
      }
    
      .dropdown-menu .dropdown-item{
        font-weight: 600 !important;
        color: black !important;
      }
      .dropdown-menu .dropdown-item:hover{
        background-color: transparent !important;
       
      }

    
      .form{

        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        width: 55% !important;
        margin: 5% auto !important;
        padding: 50px 15px !important;
      }
      .form .btn{
        margin-top: 10px !important;
        width: 100%;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      }
      .form-group input{
        border: none !important;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        margin-bottom: 10px !important;
        font-size: 13px;

      }
      .form-group .alert-danger{
        font-size: 11px;
        font-weight: 600 !important;
        padding: 0px !important;
        background-color: transparent !important;
        border: none !important;
        color: red !important;
      }
      .form-group label{
        
        font-size: 13px;
        font-weight: light;
        margin-bottom: 4px !important;

      }
      .form-footer{
        margin: 10px !important;
      }
      .table{
        border: 2px solid black;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      }
  
      .navbar-nav a{
        color: white !important;
        margin: auto 3px !important;
      }

      @media screen and (max-width: 700px) {
        .navbar{
          padding: 10px !important;
        }
        .navbar-nav .btn{
          margin-bottom: 5px !important;
          display: block !important;
         
        }
        .navbar-nav{
         
          padding: 5px !important;
          margin-top: 10px !important;
        }
     
        .navbar-toggler{
         
          color: white !important;
        }
      
       
      }
    </style>
  </head>
  <body>

 
    @include('include.header')
    @yield('content')

    {{-- font-awesome --}}
     <!--font awesome icon-->
    <script
      src="https://kit.fontawesome.com/6cea1e7bdb.js"
      crossorigin="anonymous"
    ></script>

    {{-- Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    {{-- Sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- data tables script --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

    
    <script>
      let table = new DataTable('#myTable');
    </script>

  </body>
</html>