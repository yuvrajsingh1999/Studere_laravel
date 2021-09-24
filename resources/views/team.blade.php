<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Studere</title>

    <link rel="icon" type="image/png" href="img/brand/studere.png"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Sacramento&family=Vidaloka&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
       
    </head>
    <body class="antialiased" style="background-image:url({{ asset('./img/brand/background.jpg')}}); background-repeat: no-repeat;background-size: cover;">
        <div class="relative flex  justify-center min-h-screen  sm:items-center py-3 " style="width:1600px;color:white;background-color:black;text-align:right;">
            @if (Route::has('login'))
                <div class="container-fluid " >
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-white underline  ">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white underline ">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-white underline  ">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>



<div class="container mt-4 bg-light pb-2" styel="margin-left:100px;width:600">
    <div class="container ">
        <a class="btn btn-primary mt-4 fas fa-arrow-circle-left" href="{{ url('/') }}"> Go Back</a>
    </div>

    <div class="max-w-6xl mx-auto mb-3 mt-2 ">
    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
            viewBox="0 0 172 172"
            style=" fill:#000000; " class="w-25 float-left"><defs><radialGradient cx="90.80256" cy="89.71681" r="53.61831" gradientUnits="userSpaceOnUse" id="color-1_cSTZGiTsAgJX_gr1"><stop offset="0" stop-color="#34495e"></stop><stop offset="0.219" stop-color="#95a5a6"></stop><stop offset="0.644" stop-color="#ecf0f1"></stop><stop offset="1" stop-color="#9b59b6"></stop></radialGradient><radialGradient cx="87.34644" cy="86.40044" r="64.21512" gradientUnits="userSpaceOnUse" id="color-2_cSTZGiTsAgJX_gr2"><stop offset="0" stop-color="#34495e"></stop><stop offset="0.219" stop-color="#95a5a6"></stop><stop offset="0.644" stop-color="#ecf0f1"></stop><stop offset="1" stop-color="#9b59b6"></stop></radialGradient><linearGradient x1="86" y1="139.75" x2="86" y2="25.73013" gradientUnits="userSpaceOnUse" id="color-3_cSTZGiTsAgJX_gr3"><stop offset="0" stop-color="#155cde"></stop><stop offset="0.278" stop-color="#1f7fe5"></stop><stop offset="0.569" stop-color="#279ceb"></stop><stop offset="0.82" stop-color="#2cafef"></stop><stop offset="1" stop-color="#2eb5f0"></stop></linearGradient></defs><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#ffffff" stroke="none" stroke-width="1"></path><g stroke="none" stroke-width="1"><path d="M10.75,24.1875v0c5.93669,0 10.75,-4.81331 10.75,-10.75v0c0,-5.93669 -4.81331,-10.75 -10.75,-10.75v0c-5.93669,0 -10.75,4.81331 -10.75,10.75v0c0,5.93669 4.81331,10.75 10.75,10.75z" fill="url(#color-1_cSTZGiTsAgJX_gr1)"></path><path d="M120.9375,133.03125v0c0,9.64813 7.82062,17.46875 17.46875,17.46875h21.5c5.375,0 9.675,4.48812 9.40625,9.91688c-0.26875,5.07937 -4.8375,8.89562 -9.94375,8.89562h-139.2125c-5.19494,0 -9.40625,-4.21131 -9.40625,-9.40625v-0.02687c0,-5.02563 3.92375,-9.11062 8.89562,-9.37938c0.16125,-0.02687 0.3225,-0.02687 0.48375,-0.02687h14.80813v0.02687v0c8.90637,0 16.125,-7.21863 16.125,-16.125v0c0,-8.90637 -7.21863,-16.125 -16.125,-16.125h-21.8225c-5.75931,0 -10.4275,-4.66819 -10.4275,-10.4275v-0.645c0,-5.75931 4.66819,-10.4275 10.4275,-10.4275h27.1975c5.21375,0 9.89,-2.09625 13.30313,-5.50937c3.27606,-3.27606 5.34006,-7.72119 5.49862,-12.685c0.33863,-10.68012 -8.89831,-19.43062 -19.58381,-19.43062h-22.06169c-7.07081,0 -12.71994,-6.08181 -12.04,-13.287c0.59125,-6.28606 6.23769,-10.9005 12.55063,-10.9005h22.33313c2.96969,0 5.375,-2.40531 5.375,-5.375v0c0,-2.96969 -2.40531,-5.375 -5.375,-5.375h-2.6875c-6.29413,0 -11.34663,-5.43681 -10.69356,-11.83844c0.56975,-5.58731 5.6115,-9.66156 11.22569,-9.66156h115.03038c6.29413,0 11.34663,5.43681 10.69356,11.83844c-0.56975,5.58731 -5.6115,9.66156 -11.22569,9.66156h-4.84287c-0.43,0 -0.86,0.02688 -1.26313,0.08062c-9.80937,1.12875 -8.4925,16.04438 1.3975,16.04438h11.95937c7.06813,0 12.73875,6.07375 12.04,13.27625c-0.59125,6.28875 -6.235,10.91125 -12.55063,10.91125h-12.92687c-4.085,0 -7.79375,1.66625 -10.45437,4.32688c-2.58269,2.58269 -4.23012,6.15706 -4.32419,10.105c-0.19619,8.3205 7.10306,15.13063 15.42625,15.13063h13.63369c5.61687,0 10.64519,4.09306 11.19344,9.68306c0.63156,6.407 -4.39944,11.81694 -10.69356,11.81694h-22.84375c-9.64813,0 -17.46875,7.82062 -17.46875,17.46875z" fill="url(#color-2_cSTZGiTsAgJX_gr2)"></path><path d="M85.08088,24.1875c17.18656,0 43.32519,7.2025 43.32519,23.88112c0,7.34762 -5.97163,13.74388 -13.31925,13.74388c-12.9,0 -12.98869,-16.125 -30.76919,-16.125c-9.95181,0 -14.45875,5.75125 -14.45875,11.10744c0,5.66525 1.59906,9.79863 13.23594,12.24694l18.67544,3.98019c23.41888,5.0525 32.60475,16.99306 32.60475,34.2925c0,19.59456 -12.24694,37.81044 -48.22181,37.81044c-23.02919,0 -48.52819,-6.55481 -48.52819,-24.338c0,-7.654 6.278,-12.70919 13.92931,-12.70919c12.98331,0 15.00162,12.85969 33.37337,12.85969c12.24694,0 19.88481,-4.28656 19.88481,-11.63419c0,-5.35888 -3.96406,-9.03269 -14.9855,-11.32512l-18.82863,-3.98019c-21.43281,-4.59562 -30.68587,-15.31337 -30.68587,-34.29519c0,-20.05412 15.37519,-35.51531 44.76838,-35.51531z" fill="url(#color-3_cSTZGiTsAgJX_gr3)"></path></g><g fill="#110202" stroke="none" stroke-width="1"><path d="M33.29,75.435v5.43h-2.98l-0.74,-4.16c-0.6,-0.50667 -1.4,-0.93 -2.4,-1.27c-1.00667,-0.33333 -2.17,-0.5 -3.49,-0.5v0c-2.09333,0 -3.7,0.44667 -4.82,1.34c-1.12,0.88667 -1.68,2.04333 -1.68,3.47v0c0,1.26667 0.57,2.32333 1.71,3.17c1.14,0.84667 2.98333,1.59 5.53,2.23v0c3.07333,0.76667 5.40667,1.89 7,3.37c1.59333,1.48 2.39,3.31333 2.39,5.5v0c0,2.35333 -0.95667,4.24333 -2.87,5.67c-1.91333,1.42667 -4.42,2.14 -7.52,2.14v0c-2.24,0 -4.23,-0.36667 -5.97,-1.1c-1.74667,-0.73333 -3.16667,-1.69333 -4.26,-2.88v0v-5.43h2.97l0.76,4.19c0.76,0.62667 1.66667,1.14 2.72,1.54c1.05333,0.4 2.31333,0.6 3.78,0.6v0c1.99333,0 3.56667,-0.42 4.72,-1.26c1.15333,-0.84667 1.73,-1.99 1.73,-3.43v0c0,-1.33333 -0.5,-2.45 -1.5,-3.35c-1,-0.9 -2.77,-1.65667 -5.31,-2.27v0c-3.08,-0.73333 -5.49,-1.81667 -7.23,-3.25c-1.73333,-1.42667 -2.6,-3.22 -2.6,-5.38v0c0,-2.28 0.97,-4.18 2.91,-5.7c1.93333,-1.51333 4.44667,-2.27 7.54,-2.27v0c2.04667,0 3.90667,0.35 5.58,1.05c1.67333,0.7 3.01667,1.55 4.03,2.55zM40.46,74.515h3.94v5.23h4.11v2.92h-4.11v13.15c0,1.02 0.21,1.73667 0.63,2.15c0.42,0.41333 0.98,0.62 1.68,0.62v0c0.34667,0 0.73667,-0.03 1.17,-0.09c0.43333,-0.06 0.79667,-0.12333 1.09,-0.19v0l0.54,2.7c-0.37333,0.24 -0.92,0.43667 -1.64,0.59c-0.72,0.15333 -1.44333,0.23 -2.17,0.23v0c-1.6,0 -2.87333,-0.48333 -3.82,-1.45c-0.94667,-0.96667 -1.42,-2.48667 -1.42,-4.56v0v-13.15h-3.42v-2.92h3.42zM68.29,101.405l-0.26,-3.2c-0.68667,1.16 -1.56667,2.05333 -2.64,2.68c-1.07333,0.62667 -2.31,0.94 -3.71,0.94v0c-2.34667,0 -4.18333,-0.75333 -5.51,-2.26c-1.32,-1.50667 -1.98,-3.85667 -1.98,-7.05v0v-9.67l-2.48,-0.56v-2.54h2.48h3.95v12.81c0,2.30667 0.34,3.89667 1.02,4.77c0.68,0.86667 1.74,1.3 3.18,1.3v0c1.4,0 2.55667,-0.28333 3.47,-0.85c0.92,-0.56667 1.61333,-1.37333 2.08,-2.42v0v-12.51l-2.91,-0.56v-2.54h2.91h3.94v18.58l2.48,0.56v2.52zM92.35,101.405l-0.32,-2.58c-0.70667,0.98667 -1.57,1.73333 -2.59,2.24c-1.02,0.50667 -2.20667,0.76 -3.56,0.76v0c-2.64,0 -4.70333,-0.95667 -6.19,-2.87c-1.48667,-1.92 -2.23,-4.44 -2.23,-7.56v0v-0.42c0,-3.48667 0.74333,-6.29667 2.23,-8.43c1.48667,-2.13333 3.56333,-3.2 6.23,-3.2v0c1.28667,0 2.42,0.23667 3.4,0.71c0.98,0.47333 1.81667,1.15667 2.51,2.05v0v-8.83l-3.26,-0.56v-2.54h3.26h3.94v28.15l3.27,0.56v2.52zM81.4,90.975v0.42c0,2.17333 0.44667,3.92333 1.34,5.25c0.89333,1.32 2.27333,1.98 4.14,1.98v0c1.18,0 2.17,-0.26667 2.97,-0.8c0.8,-0.53333 1.46,-1.29 1.98,-2.27v0v-10.05c-0.50667,-0.90667 -1.16667,-1.62667 -1.98,-2.16c-0.81333,-0.53333 -1.79,-0.8 -2.93,-0.8v0c-1.88,0 -3.27,0.78 -4.17,2.34c-0.9,1.56667 -1.35,3.59667 -1.35,6.09zM111.93,101.825v0c-3.02,0 -5.42,-1.00333 -7.2,-3.01c-1.78,-2.01333 -2.67,-4.62 -2.67,-7.82v0v-0.88c0,-3.08667 0.91667,-5.65333 2.75,-7.7c1.83333,-2.04667 4.00667,-3.07 6.52,-3.07v0c2.90667,0 5.11,0.88 6.61,2.64c1.50667,1.76 2.26,4.11 2.26,7.05v0v2.46h-14.06l-0.06,0.1c0.04,2.08 0.56667,3.79333 1.58,5.14c1.02,1.34 2.44333,2.01 4.27,2.01v0c1.33333,0 2.50333,-0.19 3.51,-0.57c1.00667,-0.38 1.87667,-0.90333 2.61,-1.57v0l1.55,2.56c-0.77333,0.74667 -1.8,1.37667 -3.08,1.89c-1.27333,0.51333 -2.80333,0.77 -4.59,0.77zM111.33,82.445v0c-1.32,0 -2.45,0.55667 -3.39,1.67c-0.93333,1.11333 -1.50667,2.51333 -1.72,4.2v0l0.04,0.1h9.99v-0.52c0,-1.55333 -0.41333,-2.85 -1.24,-3.89c-0.82667,-1.04 -2.05333,-1.56 -3.68,-1.56zM127.34,82.845l-3.26,-0.56v-2.54h6.79l0.38,3.14c0.61333,-1.10667 1.37,-1.97333 2.27,-2.6c0.9,-0.62667 1.93,-0.94 3.09,-0.94v0c0.30667,0 0.62333,0.02333 0.95,0.07c0.32667,0.04667 0.57667,0.09667 0.75,0.15v0l-0.52,3.66l-2.24,-0.12c-1.04,0 -1.91333,0.24333 -2.62,0.73c-0.70667,0.48667 -1.25333,1.17 -1.64,2.05v0v12.44l3.26,0.56v2.52h-10.47v-2.52l3.26,-0.56zM150.55,101.825v0c-3.02,0 -5.42,-1.00333 -7.2,-3.01c-1.78,-2.01333 -2.67,-4.62 -2.67,-7.82v0v-0.88c0,-3.08667 0.91667,-5.65333 2.75,-7.7c1.83333,-2.04667 4.00667,-3.07 6.52,-3.07v0c2.90667,0 5.11,0.88 6.61,2.64c1.5,1.76 2.25,4.11 2.25,7.05v0v2.46h-14.05l-0.06,0.1c0.04,2.08 0.56667,3.79333 1.58,5.14c1.01333,1.34 2.43667,2.01 4.27,2.01v0c1.33333,0 2.50333,-0.19 3.51,-0.57c1.00667,-0.38 1.87667,-0.90333 2.61,-1.57v0l1.54,2.56c-0.77333,0.74667 -1.79667,1.37667 -3.07,1.89c-1.27333,0.51333 -2.80333,0.77 -4.59,0.77zM149.95,82.445v0c-1.32667,0 -2.45667,0.55667 -3.39,1.67c-0.93333,1.11333 -1.50667,2.51333 -1.72,4.2v0l0.04,0.1h9.99v-0.52c0,-1.55333 -0.41333,-2.85 -1.24,-3.89c-0.82667,-1.04 -2.05333,-1.56 -3.68,-1.56z"></path></g><path d="M3.19,111.825v-51.65h165.62v51.65z" fill="#ff0000" stroke="#50e3c2" stroke-width="3" opacity="0">
                </path></g>
            </svg><h2 class="w-75 float-left" style="width:500px;font-family: 'Pattaya', sans-serif; font-size:80px;">STUDERE</h2>
          
        </div>
    </div>
    <h3><center>Group 13</center></h3>
    <div class="container w-70 mb-3">
        <h4 style="font-family: 'Abril Fatface', cursive;">Mentor:</h4>
        <p style="font-family: 'Vidaloka', serif;font-size:30px;">Mr. Ashish Kumar</p>
        <hr>
        <h4 style="font-family: 'Abril Fatface', cursive;">Team Member</h4>
        <table class="table table-responsive-sm table-hover table-dark ">
            <tr style="font-family: 'Abril Fatface', cursive;">
                <th>S.no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roll No</th>
            </tr>
            <tr style="font-family: 'Vidaloka', serif;font-size:20px;">
                <td>1.</td>
                <td>Yuvraj Singh</td>
                <td>yuvrajsingh11999@gmail.com</td>
                <td>1716110252</td>
            </tr>
            <tr style=" font-family: 'Vidaloka', serif;font-size:20px;">
                <td>2.</td>
                <td>Shreyash Raj Singh</td>
                <td>shreyasrajsingh1999@gmail.com</td>
                <td>1716110201</td>
            </tr>
            <tr style="font-family: 'Vidaloka', serif;font-size:20px;">
                <td>3.</td>
                <td>Surya Prakash</td>
                <td>sps680543@gmail.com</td>
                <td>1716110215</td>
            </tr>
            <tr style="font-family: 'Vidaloka', serif;font-size:20px;">
                <td>4.</td>
                <td>Vikas Gupta</td>
                <td>vikashgp047@gmail.com</td>
                <td>1716110238</td>
            </tr>
        </table>
    </div>
</div>