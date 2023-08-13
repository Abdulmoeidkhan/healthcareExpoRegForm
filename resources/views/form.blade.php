<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Visitor Registration</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{asset('images/Be_Logo.png')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <!-- Styles -->
    <style>

    </style>
</head>

<body class="antialiased">
    @if(Session::has('message'))
    <script>
        alert("{{Session::get('message')}}");
    </script>
    @endif
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0 ">
            <div class="col-11 col-sm-9 col-md-10 col-lg-8 text-center p-0 mt-3 mb-2 parentRow">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3 ">
                    <h2><strong>HealthCare Expo Visitor Registration Form</strong></h2>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" method="POST" action="{{route('formResponse')}}">
                                @csrf
                                <!-- progressbar -->
                                <!-- <ul id="progressbar">
                                    <li class="active" id="eligibility"><strong>Eligibility Criteria</strong></li>
                                </ul> -->
                                <!-- fieldsets -->
                                <fieldset class="field1">
                                    <legend>Personal Information</legend>
                                    <div class="form-card">
                                        <!-- <h2 class="fs-title">Essential Information</h2> -->
                                        <!-- <input type="email" name="email" placeholder="Email Id" /> -->
                                        <div class="row" id="nationalityParent">
                                            <div class="col-md-5 col-sm-12">
                                                <div>
                                                    <label for="nationality">Your Nationality: *</label>
                                                </div>
                                                <div>
                                                    <input class="list-dt field1" list="nationalities" name="nationality" title="Nationality" placeholder="(i.e Pakistan)" id="nationality" required="required" value="Pakistan" maxlength="55">
                                                    <datalist id="nationalities">
                                                    </datalist>
                                                    <!-- Commented Code # 1 -->
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12">
                                                <div>
                                                    <label class="idLabel" id="identificatoinLabel" for="identity">CNIC Number: *</label>
                                                </div>
                                                <div id="first-validation" class="identity1">
                                                    <input type="text" class="field1" id="identity" title="CNIC" name="identity" placeholder="(i.e CNIC)" onchange="isNumeric('identity')" title="13 DIGIT CNIC CODE" data-inputmask="'mask': '99999-9999999-9'" required maxlength="15" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12">
                                                <div>
                                                    <label class="pay">Date Of Birth*</label>
                                                </div>
                                                <div>
                                                    <input type="date" onchange="changeDate(this)" id="dob" name="dob" value="dd/mm/yyyy" min="1900-01-01" max="<?php echo substr(date(DATE_ATOM, mktime(0, 0, 0, (date("m")), (date("d")), (date("Y") - 17))), 0, 10) ?>">
                                                    <!-- Commented Code # 2 -->
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12">
                                                <div>
                                                    <label for="gender">Name</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="field2" title="Name" name="Name" id="Name" placeholder="(i.e John)" required="required" pattern="^[a-zA-Z]*$" onkeyup="checkPattern(this)" maxlength="55" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12">
                                                <div>
                                                    <label for="gender">Your Gender: *</label>
                                                </div>
                                                <div>
                                                    <select class="list-dt field1" id="gender" name="gender" required style="width:100%">
                                                        <!-- <option disabled selected value> -- select an option -- </option> -->
                                                        <option value='Male'> Male </option>
                                                        <option value='Female'> Female </option>
                                                        <!-- <option value='Others'> Others </option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-12">
                                                <div>
                                                    <label class="pay">Number of Accompained person</label>
                                                </div>
                                                <div>
                                                    <input type="number" name="nos" min="1" max="9" value="1" required onkeyup="isCurrentQuantity('nos')" />
                                                    <!-- Commented Code # 2 -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-12">
                                                <div>
                                                    <label for="Ctc">Mobile / Cell Phone Number:* </label>
                                                </div>
                                                <div>
                                                    <input type="tel" class="field2" name="Ctc" id="Ctc" title="Mobile / Cell Phone Number" onkeyup="isCtc('Ctc')" placeholder="(i.e 2134821159)" required="required" maxlength="15" />
                                                </div>
                                            </div>

                                            <div class="col-md-7 col-sm-12">
                                                <div>
                                                    <label for="email">Email Address:* </label>
                                                </div>
                                                <div>
                                                    <input type="email" class="field2" name="email" id="email" title="Email Address" onkeyup="isEmail('email')" placeholder="(i.e abc@xyz.org)" required="required" maxlength="55" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div>
                                                    <label for="purpose">Interests:</label>
                                                </div>
                                                <div>
                                                    <select id="multi-select-purpose" class="field4" title="Interests" placeholder="Select your interests" name="interests[]" multiple required>
                                                        <option value="Medical-Technology">Medical Technology</option>
                                                        <option value="Hospitals-Health-Centres-Clinics-Equipment-and-Products">Hospitals / Health Centres / Clinics Equipment and Products</option>
                                                        <option value="Laboratory-and-Analytical-Equipment-and-Products">Laboratory and Analytical Equipment and Products</option>
                                                        <option value="Analytical-Equipment">Analytical Equipment</option>
                                                        <option value="Life-sciences,-Biotechnology-and-Diagnostics">Life sciences, Biotechnology and Diagnostics</option>
                                                        <option value="Measuring-and-Testing">Measuring and Testing</option>
                                                        <option value="Pharmacy-and-Dispensary-Equipment-and-Furniture">Pharmacy and Dispensary Equipment and Furniture</option>
                                                        <option value="Rehabilitation">Rehabilitation</option>
                                                        <option value="Components">Components</option>
                                                        <option value="Service-Provider">Service Provider</option>
                                                        <option value="Hospital-Infrastructure">Hospital Infrastructure</option>
                                                        <option value="Medical-Consultancy">Medical Consultancy</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="sessionId" name="sessionId" value="" />
                                        <!-- Commented Code # 3 -->
                                    </div>
                                    <div class="row justify-content-center">
                                        <input type="button" name="next" class="next action-button" value="Submit" my-step="1" />
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!-- Use as a jQuery plugin -->
    <!-- <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="build/js/intlTelInput-jquery.min.js"></script> -->

    @if (session('message'))
    <script>
        $('#notifyModal').modal("show");
    </script>
    @endif
</body>

</html>
