<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bacat Expo - Users Dashboard</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
    <link rel="icon" href="{{asset('/images/Be_Logo.png')}}">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="dashboard">
        @if(Session::has('message'))
        <script>
            alert("{{Session::get('message')}}");
        </script>
        @endif
        <aside class="search-wrap">
            <div class="search">
                <!-- <label for="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z" />
                    </svg>
                    <input type="text" id="search">
                </label> -->
                <!-- <a>Company Details</a>
                <a>User Details</a> -->
                <!-- <a></a>
                <a>d</a> -->
            </div>

            <div class="user-actions">
                <a style="
                text-decoration:none;    
                border: 0;
                background: none;
                width: 32px;
                height: 32px;
                margin: 0;
                padding: 0;
                margin-left: 0.5em; 
                " href="{{ url('/dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M3,21c0,0.553,0.448,1,1,1h16c0.553,0,1-0.447,1-1v-1c0-3.714-2.261-6.907-5.478-8.281C16.729,10.709,17.5,9.193,17.5,7.5 C17.5,4.468,15.032,2,12,2C8.967,2,6.5,4.468,6.5,7.5c0,1.693,0.771,3.209,1.978,4.219C5.261,13.093,3,16.287,3,20V21z M8.5,7.5 C8.5,5.57,10.07,4,12,4s3.5,1.57,3.5,3.5S13.93,11,12,11S8.5,9.43,8.5,7.5z M12,13c3.859,0,7,3.141,7,7H5C5,16.141,8.14,13,12,13z" />
                    </svg>
                </a>
                <a href="{{ url('/slipDashboard') }}" style="
                                text-decoration:none;    
                border: 0;
                background: none;
                width: 32px;
                height: 32px;
                margin: 0;
                padding: 0;
                margin-left: 0.5em; 
                ">
                    <svg xmlns="http://www.w3.org/2000/svg" style="fill:blue;" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M21 20V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1zm-2-1H5V5h14v14z" />
                        <path d="M10.381 12.309l3.172 1.586a1 1 0 0 0 1.305-.38l3-5-1.715-1.029-2.523 4.206-3.172-1.586a1.002 1.002 0 0 0-1.305.38l-3 5 1.715 1.029 2.523-4.206z" />
                    </svg>
                </a>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.094 2.085l-1.013-.082a1.082 1.082 0 0 0-.161 0l-1.063.087C6.948 2.652 4 6.053 4 10v3.838l-.948 2.846A1 1 0 0 0 4 18h4.5c0 1.93 1.57 3.5 3.5 3.5s3.5-1.57 3.5-3.5H20a1 1 0 0 0 .889-1.495L20 13.838V10c0-3.94-2.942-7.34-6.906-7.915zM12 19.5c-.841 0-1.5-.659-1.5-1.5h3c0 .841-.659 1.5-1.5 1.5zM5.388 16l.561-1.684A1.03 1.03 0 0 0 6 14v-4c0-2.959 2.211-5.509 5.08-5.923l.921-.074.868.068C15.794 4.497 18 7.046 18 10v4c0 .107.018.214.052.316l.56 1.684H5.388z" />
                    </svg>
                </button>
                <button onclick="logout()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M12 21c4.411 0 8-3.589 8-8 0-3.35-2.072-6.221-5-7.411v2.223A6 6 0 0 1 18 13c0 3.309-2.691 6-6 6s-6-2.691-6-6a5.999 5.999 0 0 1 3-5.188V5.589C6.072 6.779 4 9.65 4 13c0 4.411 3.589 8 8 8z" />
                        <path d="M11 2h2v10h-2z" />
                    </svg>
                </button>
            </div>
        </aside>


        <main class="content-wrap">
            <header class="content-head">
                <h1>Search</h1>

                <div class="action">
                    <form class="form-inline" method="POST">
                        @csrf
                        <input class="list-dt form-control" list="dataList" name="keyName" title="Search Field" id="keyName" value="Badge" required="required" />
                        <datalist id="dataList">
                            <option value="Name"> Name </option>
                            <option value="NationalId"> National ID </option>
                            <option value="PersonsId"> Personal Id </option>
                            <option value="CellPhone"> Cell Phone </option>
                            <option value="Badge"> Badge </option>
                        </datalist>
                        <input type="text" id="fetch-data" placeholder="VS123456" class="form-control" />
                    </form>
                </div>
                <div class="action">
                    <button id="fetchData">
                        Fetch
                    </button>
                </div>
            </header>

            <div class="content">
                <section class="info-boxes">
                    <div class="info-box active">
                        <div class="box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M3,21c0,0.553,0.448,1,1,1h16c0.553,0,1-0.447,1-1v-1c0-3.714-2.261-6.907-5.478-8.281C16.729,10.709,17.5,9.193,17.5,7.5 C17.5,4.468,15.032,2,12,2C8.967,2,6.5,4.468,6.5,7.5c0,1.693,0.771,3.209,1.978,4.219C5.261,13.093,3,16.287,3,20V21z M8.5,7.5 C8.5,5.57,10.07,4,12,4s3.5,1.57,3.5,3.5S13.93,11,12,11S8.5,9.43,8.5,7.5z M12,13c3.859,0,7,3.141,7,7H5C5,16.141,8.14,13,12,13z" />
                            </svg>
                        </div>

                        <div class="box-content">
                            <span class="big"><?php echo $slipsLength; ?></span>
                            Slips Generated
                        </div>
                    </div>
                </section>

                <div>
                    <table id="table" data-toggle="table" data-search="true" data-filter-control="true" data-show-export="true" data-show-refresh="true" data-show-toggle="true" data-pagination="true" data-toolbar="#toolbar" class="table-responsive" data-escape="false">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="name" data-filter-control="input" data-sortable="true">Name</th>
                                <th data-field="PersonId" data-filter-control="input" data-sortable="true">Person ID</th>
                                <th data-field="Badge" data-filter-control="input" data-sortable="true">Badge</th>
                                <th data-field="Email" data-filter-control="input" data-sortable="true">Slip Code</th>
                                <th data-field="CellPhone" data-filter-control="input" data-sortable="true">Status</th>
                                <th data-field="NationalID" data-filter-control="input" data-sortable="true">Used</th>
                                <th data-field="created_at" data-filter-control="input" data-sortable="true">Registered At</th>
                                <th data-field="Nationality" data-filter-control="input" data-sortable="true">Updated At</th>
                                <th data-field="actions" data-sortable="false" data-force-hide="true">Essential Actions For Slips</th>

                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php foreach ($slipsData as $key => $slipData) { ?>
                                <tr id="{{$slipData['PersonsId']}}">
                                    <td class="bs-checkbox">
                                        <input data-index="{{$key+1}}" name="btSelectItem" type="checkbox">
                                    </td>
                                    <td class="tableexport-string">{{$slipData->Name}}</td>
                                    <td class="tableexport-string">{{$slipData->PersonsId}}</td>
                                    <td class="tableexport-string">{{$slipData->Badge}}</td>
                                    <td class="tableexport-string">{{$slipData->SlipCode}}</td>
                                    <td class="tableexport-string">{{$slipData->status==1?"Active":"Inactive"}}</td>
                                    <td class="tableexport-string">{{$slipData->used==1?"Used":"Open"}}</td>
                                    <td class="tableexport-string">{{$slipData->created_at}}</td>
                                    <td class="tableexport-string">{{$slipData->updated_at}}</td>
                                    @if($user === 0)
                                    <td class="custom-buttons">
                                        @if($slipData->used==1)
                                        <a class="btn btn-danger" href="{{'http://'.$host.'/updateSlipValidity/'.$slipData['Badge'].'/'.$slipData['SlipCode'].'/0'}}">Unredeemed </a>
                                        @endif
                                        @if($slipData->status==1 && $slipData->used==0)
                                        <a class="btn btn-danger" href="{{'http://'.$host.'/updateSlipStatus/'.$slipData['Badge'].'/'.$slipData['SlipCode'].'/0'}}">Inactive</a>
                                        @elseif($slipData->status==0)
                                        <a class="btn btn-primary" href="{{'http://'.$host.'/updateSlipStatus/'.$slipData['Badge'].'/'.$slipData['SlipCode'].'/1'}}">Active</a>
                                        @endif
                                        <a class="btn btn-primary" target="_blank" href="{{'http://'.$host.'/slipPrint/'.$slipData['Badge'].'/'.$slipData['SlipCode']}}">Print</a>

                                    </td>
                                    @else
                                    <td class="custom-buttons">
                                        @if($slipData->used==0)
                                        <a class="btn btn-success" href="{{'http://'.$host.'/updateSlipValidity/'.$slipData['Badge'].'/'.$slipData['SlipCode'].'/1'}}">Redeemed</a>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js"></script>
    <script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>
    <script type="text/javascript" src="{{ asset('js/slipDashboard.js') }}"></script>
</body>

</html>