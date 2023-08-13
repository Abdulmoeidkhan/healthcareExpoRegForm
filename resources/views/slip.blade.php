<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Badge Printing</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500&amp;display=swap">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slip.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/qr.css') }}">
    <link rel="icon" href="{{asset('/images/Be_Logo.png')}}">

</head>

<body class="antialiased">
    <div>
        <div class="btn-parent col-md-10 row mx-auto">
            <button class="btn btn-outline-primary col-md-4" onclick="window.print()">Print this E-badge</button>
            <a class="btn btn-outline-info col-md-4" href="{{route('slipDashboard', ['badge' => $badge])}}">Go Back To DashBoard</a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row container-first-child">
            <div class="col-md-12 parent-print-program d-print-inline badge-box" style="text-transform: uppercase;">
                <div>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p>

                                Printed At : <b> <?php echo date('d-m-y h:i:s'); ?></b>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                Timings : <b><?php echo config('localvariables.eventTime'); ?></b>
                            </p>
                        </div>
                    </div>

                    <!-- QR Code Tag -->
                    <div class="qr-code" id="qrCode"></div>
                    <div id="barCode" custom-id="{{$slip->SlipCode}}"></div>


                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" type="text/javascript"></script>
    <!-- <script src="https://cdn.jsdelivr.net/gh/bootstrap/libraries@main/choices.min.js" type="text/javascript"></script> -->
    <!-- jsPDF library -->
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/rasterizehtml/1.3.1/rasterizeHTML.min.js" integrity="sha512-uvXxdUlpiyB3amYur1jdi9YpiBZ+aRS2aKVkY0PZwBo06MjD1r5hSVuFq2bHA8WmIMAVn/swaBdgMwP/5dyQlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script type="text/javascript" src="{{ asset('jquery/jquery-slip.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/slip.js') }}"></script>
</body>

</html>