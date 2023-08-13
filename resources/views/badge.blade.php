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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/badge.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/qr.css') }}">
    <link rel="icon" href="{{asset('images/Healthcare_Expo_Logo.png')}}">

</head>

<body class="antialiased">
    <div>
        <div class="btn-parent col-md-10 row mx-auto">
            <button class="btn btn-outline-primary col-md-4" onclick="window.print()">Print this E-badge</button>
            <button class="btn btn-outline-secondary col-md-4" onclick="downloadBadge()">Download this E-badge</button>
            <a class="btn btn-outline-info col-md-4" href="{{route('form')}}">Go Back To Form</a>
        </div>
    </div>
    <div class="container">
        <div class="row container-first-child">
            <div class="col-md-6 parent-print-program d-print-inline badge-box" style="text-transform: uppercase;">
                <div>
                    <h3>Registration Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                Registered : <b> {{ date("d-M-Y", strtotime(substr_replace($registration->created_at, "", 10))); }}</b>
                            </p>
                            <p>
                                Visit Date : <b>{{ config('localvariables.eventDate'); }}</b>
                            </p>
                        </div>
                        <div class="col-md-6">

                            <p>
                                Registration : <b>Visitor</b>
                            </p>
                            <p>
                                Timings : <b>{{ config('localvariables.eventTime'); }}</b>
                            </p>
                        </div>
                    </div>



                    <!-- QR Code Tag -->
                    <div class="qr-code" id="qrCode"></div>
                    <h2 style="text-align:center;">
                        {{ config('localvariables.eventName'); }}
                    </h2>
                    <br />
                    <p>
                        Venue : {{ config('localvariables.eventVenue'); }}
                    </p>
                    <p>
                        <i class="fa-solid fa-location-dot"></i> Location :
                        {{ config('localvariables.eventLocation'); }}
                    </p>
                    <p>
                        <i class="fa-solid fa-globe"></i> Website :
                        <span style="text-transform:lowercase">
                            {{ config('localvariables.website'); }}
                        </span>
                    </p>
                    <p>
                    <ul class="badge-point list-rules">
                        <!-- <li>
                            <b>This Badge</b> is only permitted to visit the exhibition on the <b>24th of March 2023</b>
                        </li>
                        <li>
                            This is a non-transferable and personal badge that must be displayed at the time of entry.
                        </li> -->
                    </ul>
                    </p>

                </div>
            </div>
            <div class="col-md-6 parent-print-program text-center d-print-inline badge-box-2">
                <div>
                    <h1>
                        <!-- <mark> -->
                        e-Badge
                        <!-- </mark> -->
                    </h1>
                    <div class="card-border">
                        <!-- <h1>
                        <mark>E-Badge</mark>
                    </h1> -->
                        <div class="logo-child">
                            <div>
                                <img src="{{asset('images/Bxss.png')}}" class="logo-img responsive" alt="Badar Expo Solutions" />&nbsp;&nbsp;
                            </div>
                            <div>
                                <h5>
                                    {{config('localvariables.eventName') }}
                                </h5>
                            </div>
                        </div>
                        <h4 style="text-transform:uppercase;">
                            {{ $registration->name; }}
                        </h4>
                        <!-- <br /> -->
                        <h5 style="text-transform:uppercase;">
                            <!-- <php echo $registration->Designation;> -->
                        </h5>
                        <!-- <br /> -->
                        <h5 style="text-transform:uppercase;">
                            <!-- <php echo $organizations->Companyname; > -->
                        </h5>
                        <!-- Bar Code Tag -->
                        <div id="barCode" custom-id="{{ $registration->badge; }}"></div>
                        <!-- <code>
                            <php echo $registration->Badge; > PHP CODE ?? missing
                        </code> -->
                        <h2 style="text-transform:uppercase; font-weight:700;">
                            Visitor
                        </h2>
                        <h6 style="text-transform: uppercase;">Badge Validity : {{ config('localvariables.eventDate'); }}</h6>
                        <div class="logo-child">
                            <!-- <img src="https://jdcwelfare.org/wp-content/uploads/2023/03/JDC-Logo-Square.png" style="height: 80px;" class="img-fluid" alt="BXSS" /> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Commented Code # 6 -->
        <!-- <div class="row container-first-child">

        </div> -->
        <div class="row container-second-child">
            <div class="col-md-6 parent-print-program d-print-inline badge-box" style="text-transform: uppercase;">
                <div>
                    <h4>RULES FOR VISITING THE EXHIBITION</h4>
                    <p class="blockquote">
                    <p>
                        <!-- All persons who accepted the invitation of the organizer to visit the exhibition, as well as registered as a visitor or bought a pre-registration badge, agree to these Rules and undertake to observe them. -->
                    </p>
                    <ol class="list-rules">
                        <li>HealthExpo is open for the second and third days (04th and 06th of January 2023) by invitation only to professionals trade visitors.</li>
                        <!-- <li><b>General public visitors</b> are only permitted to visit the exhibition on the 12th of February 2023, and admission is free on that day.</li> -->
                        <!-- <li>Minors under the age of 18 are not allowed to visit the exhibition.</li> -->
                        <li>The basis for entering the exhibition during the entire period of the exhibition is the event badge.</li>
                        <li>In case of loss of the badge, you can ask for help from the registration desk or online registration portal.</li>
                        <li>Entry to the exhibition with weapons will not be permitted It is mandatory to present an ID at the entrance of the exhibition.</li>
                        <li>The Organizer is authorized to conduct reasonable security checks or frisk badge holders at the event venue’s entry for security purposes; your cooperation is requested.</li>
                        <li>In case of violation of these Rules, the organizer has the right, without any compensation, to deny the person who committed the violation in visiting the exhibition</li>

                        <!-- <li>Keep the Print out of your e-Badge</li>
                        <li>Keep your Original and Valid Identity Proof (CNIC for Pakistani National) & (Passport for Foreigners)</li>
                        <li>Keep your Business / Job Card confirming your Profession and Job Status details you provided at the time of Pre-registration</li>
                        <li>Come to the Queue Counters at the Visitor’s Registration Cell located at National Coaching Centre (NCC) and collect your entry Badge.</li>
                        <li>Your CNIC / Passport, Entry Badge and Job/Visiting Card shall be checked at the Gate of Karachi Expo Centre.</li>
                        <li><b>No person under the age of 18 years, including children of exhibitors, will be admitted during the tenancy period.</b></li> -->
                    </ol>
                    </p>
                </div>
            </div>
            <div class="col-md-6 parent-print-program d-print-inline badge-box-2" style="text-transform: uppercase;">
                <div>
                    <h4>COVID-19 GUIDELINES</h4>
                    <p class="blockquote">
                    <ol class="list-rules">
                        <li>This is close contact event, we have put in place suggested government directives and protocols so as to ensure your safety when you visit the exhibition.</li>
                        <li>All event participants need to be vaccinated in case you may be asked to producing the Vaccination card at the venue (We count on your support and understanding).</li>
                        <li>All guests are required to wear a facial covering or mask which covers both their nose and mouth. </li>
                        <li>Visitors are requested to cancel their visit to the exhibition, if, within 72 hours of their scheduled visit, they develop any signs or symptoms of COVID-19, or have come in contact with anyone who has tested positive for COVID-19 or has been advised to self-isolate by any health or government authority.</li>
                        <li>Visitors are also requested to abide by the government and organizer’s enhanced SOPs and shall take the necessary health and safety precautions while visiting the exhibition.</li>
                    </ol>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" type="text/javascript"></script>
    <!-- jsPDF library -->
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script type="text/javascript" src="{{ asset('jquery/jquery-barcode.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/badge.js') }}"></script>
</body>

</html>
