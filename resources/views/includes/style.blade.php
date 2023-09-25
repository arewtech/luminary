 <!-- Favicons -->
 <link
     href="{{ setting('app_logo') !== null ? asset('storage/' . setting('app_logo')) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
     rel="icon">
 <link href="{{ asset('assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.gstatic.com" rel="preconnect">
 <link
     href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
     rel="stylesheet">

 <!-- Vendor CSS Files -->
 @stack('select2:css')
 <link href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="{{ asset('assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 <link href="{{ asset('assets') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
 <link href="{{ asset('assets') }}/vendor/quill/quill.snow.css" rel="stylesheet">
 <link href="{{ asset('assets') }}/vendor/quill/quill.bubble.css" rel="stylesheet">
 <link href="{{ asset('assets') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
 <link href="{{ asset('assets') }}/vendor/simple-datatables/style.css" rel="stylesheet">

 <!-- Template Main CSS File -->
 <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">
 <style>
     .line-clamp {
         height: 3.6rem;
         display: -webkit-box;
         -webkit-line-clamp: 2;
         -webkit-box-orient: vertical;
         overflow: hidden;
     }

     .line-clamp {
         /* height: 3.6rem; */
         display: -webkit-box;
         -webkit-line-clamp: 3;
         -webkit-box-orient: vertical;
         overflow: hidden;
     }

     ::-webkit-scrollbar {
         width: 7px;
         height: 7px;
     }

     ::-webkit-scrollbar-track {
         box-shadow: inset 0 0 3px rgba(0 0 0 / 0.15);
     }

     ::-webkit-scrollbar-thumb {
         background: linear-gradient(125deg, #696cff, #60a5fa);
         border-radius: 10px;
     }
 </style>
