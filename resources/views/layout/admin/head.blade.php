<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('xmt_tit')</title>
    <meta name="description" content="@yield('xmt_des','')">
    <meta name="robots" content="@yield('xmt_rob')">
    <meta name="google" content="notranslate">
    <link href="/assets/images/favicon/favicon.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('headcss')
    <style>
        .w-max-100 {
        max-width:100%;
        }
        .w-min-100 {
            min-width:100%;
        }
        .w-min-100-px {
            min-width:100px;
        }
        .w-min-150-px {
            min-width:150px;
        }
        .w-100-px {
            width:100px;
        }
        .w-150-px {
            width:100px;
        }
        .w-max-150-px {
            max-width: 150px;
        }
        .w-max-200-px {
            max-width: 200px;
        }
        .w-max-250-px {
            max-width: 250px;
        }
        .w-max-300-px {
            max-width: 300px;
        }
        .text-justify {
            text-align: justify;
        }
        .fs-0-6 {
            font-size: 0.6rem;
        }
        .fs-0-8 {
            font-size: 0.8rem;
        }
        .fs-0-9 {
            font-size: 0.9rem;
        }
        .fs-1-1 {
            font-size: 1.1rem;
        }
        .cursor-pointer {
            cursor: pointer;
        }
        .extnd600, .extnd900
        {
        padding:5px;
        overflow-x: auto;
        }
        @media only screen and (max-width: 600px) 
        {
            .extnd600 table
            {
            width:600px;
            }
        }
        @media only screen and (max-width: 900px) 
        {
            .extnd900 table
            {
            width:900px;
            }
        }
        .tox-statusbar__branding, .tox-promotion-link
        {
            display:none !important;
            visibility: hidden !important;
        }
        .tox-edit-area
        {
            padding: 10px !important;
        }
    </style>
</head>