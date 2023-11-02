@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.pb_branch.edit_pb_branch_navbar')

    <body>
        <div class="basic-branch-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card mb-0">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center"> Basic</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id_form">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="basic">
                                    <div class="col-xl-4 col-lg-6 branch-scheme-select">
                                        <label class="form-label">Name of Scheme</label>
                                        <div class="d-flex">
                                            {{-- @foreach ($basic_show as $basic_showas1) --}}
                                            <select class="form-select" id="basic_name_scheme" name="basic_name_scheme">
                                                <option value="">Select Scheme Name </option>
                                                @foreach ($name_of_scheme as $value)
                                                    <option value="{{ $value['id'] }}"
                                                        {{ $project_master->basic_name_scheme == $value['id'] ? 'selected' : '' }}>
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {{-- @endforeach --}}
                                            <div class="pluse-badge" data-bs-toggle="modal"
                                                data-bs-target="#add_name_of_scheme">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                    viewBox="0 0 25 24" fill="none">
                                                    <path d="M12.5 6L12.5 18M18.5 12L6.5 12" stroke="white"
                                                        stroke-width="1.67" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-6 branch-scheme-select">
                                        <label class="form-label">Name of Project</label>
                                        <div class="d-flex">
                                            <select class="form-select" id="basic_name_project" name="basic_name_project">
                                                @foreach ($name_of_project as $value)
                                                    <option value="{{ $value['id'] }}"
                                                        {{ $project_master->basic_name_project == $value['id'] ? 'selected' : '' }}>
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div class="pluse-badge" data-bs-toggle="modal"
                                                data-bs-target="#add_name_of_project">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                    viewBox="0 0 25 24" fill="none">
                                                    <path d="M12.5 6L12.5 18M18.5 12L6.5 12" stroke="white"
                                                        stroke-width="1.67" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-12">
                                        <label class="form-label">WMS Work Head</label>
                                        <input type="text" class="form-control" id="basic_wms_work_head"
                                            name="basic_wms_work_head" placeholder="Enter WMS  Head"
                                            value="{{ $project_master->basic_wms_work_head }}">
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <div class="contact_list district_list">
                                            <h6>Received Proposal</h6>
                                            <div class="row">

                                                <div class="col-xl-7 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="form-label">District</label>

                                                            <select class="form-select" id="district_id" name="district_id">
                                                                <option value="">Select District List</option>
                                                                @foreach ($district_name as $value)
                                                                    <option value="{{ $value['id'] }}"
                                                                        {{ $project_master->district_id == $value['id'] ? 'selected' : '' }}>
                                                                        {{ $value['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>


                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="form-label">Taluka</label>
                                                            <select class="form-select" id="taluka_id" name="taluka_id">
                                                                <option value="">Select Taluka List</option>
                                                                @foreach ($taluka_name as $value)
                                                                    <option value="{{ $value['id'] }}"
                                                                        {{ $project_master->taluka_id == $value['id'] ? 'selected' : '' }}>
                                                                        {{ $value['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Work Type</label>
                                                            <select class="form-select" id="work_type_id"
                                                                name="work_type_id">
                                                                <option value="">Select Work List</option>
                                                                @foreach ($work_type as $value)
                                                                    <option value="{{ $value['id'] }}"
                                                                        {{ $project_master->work_type_id == $value['id'] ? 'selected' : '' }}>
                                                                        {{ $value['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-5 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Type Of Work</label>
                                                            <select class="form-select" id="types_of_work"
                                                                name="types_of_work">
                                                                <option value="">Select Type Of Work</option>
                                                                @if ($project_master->work_type_id == 1)
                                                                    <option value="Re-Surfacing"
                                                                        @if ($project_master->types_of_work === 'Re-Surfacing') selected @endif>
                                                                        Re-Surfacing</option>
                                                                    <option value="Strengthening"
                                                                        @if ($project_master->types_of_work === 'Strengthening') selected @endif>
                                                                        Strengthening</option>
                                                                    <option value="3.75 to 5.5"
                                                                        @if ($project_master->types_of_work === '3.75 to 5.5') selected @endif>
                                                                        3.75 to 5.5</option>
                                                                    <option value="3.75 to 7"
                                                                        @if ($project_master->types_of_work === '3.75 to 7') selected @endif>
                                                                        3.75 to 7</option>
                                                                    <option value="3.75 to 10"
                                                                        @if ($project_master->types_of_work === '3.75 to 10') selected @endif>
                                                                        3.75 to 10</option>
                                                                    <option value="5.5 to 7"
                                                                        @if ($project_master->types_of_work === '5.5 to 7') selected @endif>
                                                                        5.5 to 7</option>
                                                                    <option value="5.5 to 10"
                                                                        @if ($project_master->types_of_work === '5.5 to 10') selected @endif>
                                                                        5.5 to 10</option>
                                                                    <option value="10 to 4 lan"
                                                                        @if ($project_master->types_of_work === '10 to 4 lan') selected @endif>10
                                                                        to 4 lan</option>
                                                                    <option value="7 to 10"
                                                                        @if ($project_master->types_of_work === '7 to 10') selected @endif>7
                                                                        to 10</option>
                                                                    <option value="10 to 6 lan"
                                                                        @if ($project_master->types_of_work === '10 to 6 lan') selected @endif>
                                                                        10 to 6 lan</option>
                                                                    <option value="4 lan to 6 lan"
                                                                        @if ($project_master->types_of_work === '4 lan to 6 lan') selected @endif>
                                                                        4 lan to 6 lan</option>
                                                                @elseif ($project_master->work_type_id == 2)
                                                                    <option value="New Buliding"
                                                                        @if ($project_master->types_of_work === 'New Buliding') selected @endif>
                                                                        New Buliding</option>
                                                                    <option value="Addition Alternative"
                                                                        @if ($project_master->types_of_work === 'Addition Alternative') selected @endif>
                                                                        Addition Alternative</option>
                                                                    <option value="Repairing Work"
                                                                        @if ($project_master->types_of_work === 'Repairing Work') selected @endif>
                                                                        Repairing Work</option>
                                                                @elseif ($project_master->work_type_id == 3)
                                                                    <option value="Rob"
                                                                        @if ($project_master->types_of_work === 'Rob') selected @endif>
                                                                        Rob</option>
                                                                    <option value="WaterBody Bridge"
                                                                        @if ($project_master->types_of_work === 'WaterBody Bridge') selected @endif>
                                                                        WaterBody Bridge</option>
                                                                    <option value="Flyover"
                                                                        @if ($project_master->types_of_work === 'Flyover') selected @endif>
                                                                        Flyover</option>
                                                                @elseif ($project_master->work_type_id == 4)
                                                                    <option value="Slab Drain"
                                                                        @if ($project_master->types_of_work === 'Slab Drain') selected @endif>
                                                                        Slab Drain</option>
                                                                    <option value="Box Calvate"
                                                                        @if ($project_master->types_of_work === 'Box Calvate') selected @endif>
                                                                        Box Calvate</option>
                                                                    <option value="Hp Drain"
                                                                        @if ($project_master->types_of_work === 'Hp Drain') selected @endif>
                                                                        Hp Drain</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label d-xl-block d-none">Name Of
                                                                Work</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_type_work_name" name="basic_type_work_name"
                                                                value="{{ $project_master->basic_type_work_name }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-7 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Budget</label>
                                                            <select class="form-select" id="budget_id" name="budget_id">
                                                                <option value="">Select budget List</option>
                                                                @foreach ($budget as $value)
                                                                    <option
                                                                        value="{{ $value['id'] }}"data-bu-name="{{ $value['name'] }}"
                                                                        {{ $project_master->budget_id == $value['id'] ? 'selected' : '' }}>
                                                                        {{ $value['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        {{-- <div class="col-lg-4">
                                                            <label class="form-label d-xl-block d-none">&nbsp;</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_budget_name" name="basic_budget_name"
                                                                value="{{ $project_master->basic_budget_name }}">
                                                        </div> --}}
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Budget Work / Item / Page No.</label>

                                                            <select class="form-select" id="basic_buget_work"
                                                                name="basic_buget_work">
                                                                <option value="">Select Work List</option>
                                                                <option value="1/235"@selected($project_master->basic_buget_work == '1/235')>1/235
                                                                </option>

                                                                <option value="2/235"@selected($project_master->basic_buget_work == '2/235')>2/235
                                                                </option>
                                                                <option value="3/235"@selected($project_master->basic_buget_work == '3/235')>3/235
                                                                </option>
                                                                <option value="4/235"@selected($project_master->basic_buget_work == '4/235')>4/235
                                                                </option>
                                                                <option value="6/235"@selected($project_master->basic_buget_work == '6/235')>6/235
                                                                </option>
                                                                <option value="7/235"@selected($project_master->basic_buget_work == '7/235')>7/235
                                                                </option>
                                                                <option value="8/236"@selected($project_master->basic_buget_work == '8/236')>8/236
                                                                </option>
                                                                <option value="10/236"@selected($project_master->basic_buget_work == '10/236')>10/236
                                                                </option>
                                                                <option value="11/236"@selected($project_master->basic_buget_work == '11/236')>11/236
                                                                </option>
                                                                <option value="12/236"@selected($project_master->basic_buget_work == '12/236')>12/236
                                                                </option>
                                                                <option value="13/236"@selected($project_master->basic_buget_work == '13/236')>13/236
                                                                </option>
                                                                <option value="20/236"@selected($project_master->basic_buget_work == '20/236')>20/236
                                                                </option>
                                                                <option value="22/236"@selected($project_master->basic_buget_work == '22/236')>22/236
                                                                </option>
                                                                <option value="24/236"@selected($project_master->basic_buget_work == '24/236')>24/236
                                                                </option>
                                                                <option value="27/236"@selected($project_master->basic_buget_work == '27/236')>27/236
                                                                </option>
                                                                <option value="28/237"@selected($project_master->basic_buget_work == '28/237')>28/237
                                                                </option>
                                                                <option value="32/237"@selected($project_master->basic_buget_work == '32/237')>32/237
                                                                </option>
                                                                <option value="33/237"@selected($project_master->basic_buget_work == '33/237')>33/237
                                                                </option>
                                                                <option value="35/237"@selected($project_master->basic_buget_work == '35/237')>35/237
                                                                </option>
                                                                <option value="36/237"@selected($project_master->basic_buget_work == '36/237')>36/237
                                                                </option>
                                                                <option value="38/237"@selected($project_master->basic_buget_work == '38/237')>38/237
                                                                </option>
                                                                <option value="39/237"@selected($project_master->basic_buget_work == '39/237')>39/237
                                                                </option>
                                                                <option value="40/237"@selected($project_master->basic_buget_work == '40/237')>40/237
                                                                </option>
                                                                <option value="55/238"@selected($project_master->basic_buget_work == '55/238')>55/238
                                                                </option>
                                                                <option value="61/238"@selected($project_master->basic_buget_work == '61/238')>61/238
                                                                </option>
                                                                <option value="62/238"@selected($project_master->basic_buget_work == '62/238')>62/238
                                                                </option>
                                                                <option value="63/238"@selected($project_master->basic_buget_work == '63/238')>63/238
                                                                </option>
                                                                <option value="69/238"@selected($project_master->basic_buget_work == '69/238')>69/238
                                                                </option>
                                                                <option value="70/239"@selected($project_master->basic_buget_work == '70/239')>70/239
                                                                </option>
                                                                <option value="71/239"@selected($project_master->basic_buget_work == '71/239')>71/239
                                                                </option>
                                                                <option value="72/239"@selected($project_master->basic_buget_work == '72/239')>72/239
                                                                </option>
                                                                <option value="73/239"@selected($project_master->basic_buget_work == '73/239')>73/239
                                                                </option>
                                                                <option value="74/239"@selected($project_master->basic_buget_work == '74/239')>74/239
                                                                </option>
                                                                <option value="75/239"@selected($project_master->basic_buget_work == '75/239')>75/239
                                                                </option>
                                                                <option value="76/239"@selected($project_master->basic_buget_work == '76/239')>76/239
                                                                </option>
                                                                <option value="77/239"@selected($project_master->basic_buget_work == '77/239')>77/239
                                                                </option>
                                                                <option value="78/239"@selected($project_master->basic_buget_work == '78/239')>78/239
                                                                </option>
                                                                <option value="79/239"@selected($project_master->basic_buget_work == '79/239')>79/239
                                                                </option>
                                                                <option value="81/240"@selected($project_master->basic_buget_work == '81/240')>81/240
                                                                </option>
                                                                <option value="1/244"@selected($project_master->basic_buget_work == '1/244')>1/244
                                                                </option>
                                                                <option value="7/248"@selected($project_master->basic_buget_work == '7/248')>7/248
                                                                </option>
                                                                <option value="13/233"@selected($project_master->basic_buget_work == '13/233')>13/233
                                                                </option>
                                                                <option value="/"@selected($project_master->basic_buget_work == '/')>/
                                                                </option>
                                                                <option value="1/233"@selected($project_master->basic_buget_work == '1/233')>1/233
                                                                </option>
                                                                <option value="17/233"@selected($project_master->basic_buget_work == '17/233')>17/233
                                                                </option>
                                                                <option value="18/233"@selected($project_master->basic_buget_work == '18/233')>18/233
                                                                </option>
                                                                <option value="19/233"@selected($project_master->basic_buget_work == '19/233')>19/233
                                                                </option>
                                                                <option value="20/233"@selected($project_master->basic_buget_work == '20/233')>20/233
                                                                </option>
                                                                <option value="/50"@selected($project_master->basic_buget_work == '/50')>/50
                                                                </option>
                                                                <option value="2/0463"@selected($project_master->basic_buget_work == '2/0463')>2/0463
                                                                </option>
                                                                <option value="7/463"@selected($project_master->basic_buget_work == '7/463')>7/463
                                                                </option>
                                                                <option value="11/464"@selected($project_master->basic_buget_work == '11/464')>11/464
                                                                </option>
                                                                <option value="13/447"@selected($project_master->basic_buget_work == '13/447')>13/447
                                                                </option>
                                                                <option value="14/464"@selected($project_master->basic_buget_work == '14/464')>14/464
                                                                </option>
                                                                <option value="15/464"@selected($project_master->basic_buget_work == '15/464')>15/464
                                                                </option>
                                                                <option value="43/462"@selected($project_master->basic_buget_work == '43/462')>43/462
                                                                </option>
                                                                <option value="48/462"@selected($project_master->basic_buget_work == '48/462')>48/462
                                                                </option>
                                                                <option value="49/462"@selected($project_master->basic_buget_work == '49/462')>49/462
                                                                </option>
                                                                <option value="50/462"@selected($project_master->basic_buget_work == '50/462')>50/462
                                                                </option>
                                                                <option value="52/463"@selected($project_master->basic_buget_work == '52/463')>52/463
                                                                </option>
                                                                <option value="53/463"@selected($project_master->basic_buget_work == '53/463')>53/463
                                                                </option>
                                                                <option value="54/463"@selected($project_master->basic_buget_work == '54/463')>54/463
                                                                </option>
                                                                <option value="55/463"@selected($project_master->basic_buget_work == '55/463')>55/463
                                                                </option>
                                                                <option value="56/463"@selected($project_master->basic_buget_work == '56/463')>56/463
                                                                </option>
                                                                <option value="57/463"@selected($project_master->basic_buget_work == '57/463')>57/463
                                                                </option>
                                                                <option value="58/463"@selected($project_master->basic_buget_work == '58/463')>58/463
                                                                </option>
                                                                <option value="6/425"@selected($project_master->basic_buget_work == '6/425')>6/425
                                                                </option>



                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-5 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Jogvay</label>
                                                            <select class="form-select" id="basic_budget_work_name"
                                                                name="basic_budget_work_name">
                                                                <option value="">Select Jogvay List</option>
                                                                <option value="50"@selected($project_master->basic_budget_work_name == '50')>50
                                                                </option>
                                                                <option value="15"@selected($project_master->basic_budget_work_name == '15')>15
                                                                </option>
                                                                <option value="100"@selected($project_master->basic_budget_work_name == '100')>100
                                                                </option>
                                                                <option value="400"@selected($project_master->basic_budget_work_name == '400')>400
                                                                </option>
                                                                <option value="10000"@selected($project_master->basic_budget_work_name == '10000')>10000
                                                                </option>
                                                                <option value="0"@selected($project_master->basic_budget_work_name == '0')>0
                                                                </option>
                                                                <option value="10480"@selected($project_master->basic_budget_work_name == '10480')>10480
                                                                </option>
                                                                <option value="11500"@selected($project_master->basic_budget_work_name == '11500')>11500
                                                                </option>
                                                                <option value="2500"@selected($project_master->basic_budget_work_name == '2500')>2500
                                                                </option>
                                                                <option value="1200"@selected($project_master->basic_budget_work_name == '1200')>1200
                                                                </option>
                                                                <option value="1"@selected($project_master->basic_budget_work_name == '1')>1
                                                                </option>
                                                                <option value="35956"@selected($project_master->basic_budget_work_name == '35956')>35956
                                                                </option>

                                                                <option value="227033"@selected($project_master->basic_budget_work_name == '227033')>227033
                                                                </option>
                                                                <option value="10"@selected($project_master->basic_budget_work_name == '10')>10
                                                                </option>
                                                                <option value="2149"@selected($project_master->basic_budget_work_name == '2149')>2149
                                                                </option>
                                                                <option value="2000"@selected($project_master->basic_budget_work_name == '2000')>2000
                                                                </option>
                                                                <option value="6000"@selected($project_master->basic_budget_work_name == '6000')>6000
                                                                </option>
                                                                <option value="2500"@selected($project_master->basic_budget_work_name == '2500')>2500
                                                                </option>
                                                                <option value="3000"@selected($project_master->basic_budget_work_name == '3000')>3000
                                                                </option>
                                                                <option value="10"@selected($project_master->basic_budget_work_name == '10')>10
                                                                </option>
                                                                <option value="10500"@selected($project_master->basic_budget_work_name == '10500')>10500
                                                                </option>
                                                                <option value="500"@selected($project_master->basic_budget_work_name == '500')>500
                                                                </option>
                                                                <option value="17000"@selected($project_master->basic_budget_work_name == '17000')>17000
                                                                </option>
                                                                <option value="32967"@selected($project_master->basic_budget_work_name == '32967')>32967
                                                                </option>
                                                                <option value="22520"@selected($project_master->basic_budget_work_name == '22520')>22520
                                                                </option>
                                                                <option value="14607"@selected($project_master->basic_budget_work_name == '14607')>14607
                                                                </option>
                                                                <option value="21679"@selected($project_master->basic_budget_work_name == '21679')>21679
                                                                </option>
                                                                <option value="21679"@selected($project_master->basic_budget_work_name == '21679')>21679
                                                                </option>
                                                                <option value="22236"@selected($project_master->basic_budget_work_name == '22236')>22236
                                                                </option>
                                                                <option value="22236"@selected($project_master->basic_budget_work_name == '22236')>22236
                                                                </option>


                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Amount in Lakh</label>
                                                            <input type="text" class="form-control" id="basic_amount"
                                                                name="basic_amount"
                                                                value="{{ $project_master->basic_amount }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-7 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="form-label">MP/MLA Suggested</label>
                                                            <select class="form-select" id="basic_mp_mla"
                                                                name="basic_mp_mla">
                                                                <option value="">Select Mp MlaList</option>
                                                                @foreach ($mp_mla as $value)
                                                                    <option
                                                                        value="{{ $value['id'] }}"data-mla-name="{{ $value['name'] }}"
                                                                        {{ $project_master->basic_mp_mla == $value['id'] ? 'selected' : '' }}>
                                                                        {{ $value['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="form-label d-xl-block d-none">&nbsp;</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_mp_mla_name" name="basic_mp_mla_name"
                                                                value="{{ $project_master->basic_mp_mla_name }}">
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="form-label">Letter No.</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_letter_no" name="basic_letter_no"
                                                                value="{{ $project_master->basic_letter_no }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-5 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Letter Date</label>
                                                            <input type="date" class="form-control"
                                                                id="basic_letter_date" name="basic_letter_date"
                                                                value="{{ $project_master->basic_letter_date }}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Letter Upload</label>
                                                            <div class="input-group">
                                                                <input type="file" class="form-control w-100"
                                                                    id="basic_upload_img" name="basic_upload_img"
                                                                    value="{{ $project_master->basic_upload_img }}">
                                                                <a href="{{ asset('images/masters/') }}/{{ $project_master->basic_upload_img }}"
                                                                    target="_blank">
                                                                    <br>Open Image in New Tab
                                                                </a>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <label class="form-label">Suggestion</label>
                                                    <input type="text" class="form-control" id="basic_suggest"
                                                        name="basic_suggest" placeholder="Enter Suggestion"
                                                        value="{{ $project_master->basic_suggest }}">
                                                </div>

                                                {{-- <div class="col-lg-12 mt-3">
                                                    <div class="contact_list">
                                                        <h6>Received Proposal</h6>
                                                        <div class="row p-0">
                                                            <div class="col-lg-3 mb-3">
                                                                <label for="inputtitle1" class="form-label">Received
                                                                    Proposal From</label>
                                                                <input class="form-control" type="text"
                                                                    id="basic_recever_from" name="basic_recever_from"
                                                                    placeholder="From"
                                                                    value="{{ $project_master->basic_recever_from }}">
                                                            </div>
                                                            <div class="col-lg-3 mb-3">
                                                                <label for="inputtitle1" class="form-label">Letter
                                                                    No.</label>
                                                                <input class="form-control" type="text"
                                                                    id="basic_rec_letter_no" name="basic_rec_letter_no"
                                                                    placeholder="Enter Letter No."
                                                                    value="{{ $project_master->basic_rec_letter_no }}">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Letter Date</label>
                                                                <input type="date" class="form-control"
                                                                    id="basic_rec_letter_date"
                                                                    name="basic_rec_letter_date"
                                                                    value="{{ $project_master->basic_rec_letter_date }}">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Amount</label>
                                                                <input type="text" class="form-control"
                                                                    id="basic_rec_letter_amount"
                                                                    name="basic_rec_letter_amount"
                                                                    value="{{ $project_master->basic_rec_letter_amount }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <div class="col-lg-12 mt-3">
                                                    <div class="contact_list">
                                                        <h6>Sent Proposal</h6>
                                                        <div class="row p-0">
                                                            <div class="col-lg-3 mb-3">
                                                                <label for="inputtitle1" class="form-label">Sent Proposal
                                                                    To</label>
                                                                <input class="form-control" type="text"
                                                                    id="basic_sent_proposal" name="basic_sent_proposal"
                                                                    placeholder="To"
                                                                    value="{{ $project_master->basic_sent_proposal }}">
                                                            </div>
                                                            <div class="col-lg-3 mb-3">
                                                                <label for="inputtitle1" class="form-label">Letter
                                                                    No.</label>
                                                                <input class="form-control" type="text"
                                                                    id="basic_sent_proposal_letter_no"
                                                                    name="basic_sent_proposal_letter_no"
                                                                    placeholder="Enter Letter No."
                                                                    value="{{ $project_master->basic_sent_proposal_letter_no }}">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Letter Date</label>
                                                                <input type="date" class="form-control"
                                                                    id="basic_sent_proposal_date"
                                                                    name="basic_sent_proposal_date"
                                                                    value="{{ $project_master->basic_sent_proposal_date }}">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Amount</label>
                                                                <input type="text" class="form-control"
                                                                    id="basic_sent_proposal_amount"
                                                                    name="basic_sent_proposal_amount"
                                                                    value="{{ $project_master->basic_sent_proposal_amount }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Sent Box</label>
                                                            <select class="form-select" id="sent_box_id"
                                                                name="sent_box_id">
                                                                <option value="">Select Sent Box</option>
                                                                @foreach ($sent_box as $value)
                                                                    <option
                                                                        value="{{ $value['id'] }}"{{ $project_master->sent_box_id == $value['id'] ? 'selected' : '' }}>
                                                                        {{ $value['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Date</label>
                                                            <input type="date" class="form-control"
                                                                id="basic_sent_box_date" name="basic_sent_box_date"
                                                                value="{{ $project_master->basic_sent_box_date }}">
                                                        </div>


                                                        <div class="col-lg-4">
                                                            <label class="form-label">Amount</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_sent_box_name" name="basic_sent_box_name"
                                                                value="{{ $project_master->basic_sent_box_name }}">
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            @if ($project_master->sent_box_id == 2)
                                                                <label class="form-label" id="letter">Letter No</label>
                                                            @else
                                                                <label class="form-label" id="remarks">Remarks</label>
                                                            @endif
                                                            <input type="text" class="form-control"
                                                                id="basic_sent_box_remark" name="basic_sent_box_remark"
                                                                value="{{ $project_master->basic_sent_box_remark }}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Letter Upload</label>
                                                            <div class="input-group">
                                                                <input type="file" class="form-control w-100"
                                                                    id="basic_sent_box_img" name="basic_sent_box_img"
                                                                    value="{{ $project_master->basic_sent_box_img }}">
                                                                <a href="{{ asset('images/masters/' . $project_master->basic_sent_box_img) }}"
                                                                    target="_blank">
                                                                    <br>Open Image in New Tab
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Name of Department</label>
                                        <input type="text" class="form-control" id="basic_name_of_department"
                                            name="basic_name_of_department" placeholder="Enter Name of Department"
                                            value="{{ $project_master->basic_name_of_department }}">
                                    </div>

                                    <div class="col-lg-2 branch-scheme-select">
                                        <label class="form-label">Proposal Division</label>
                                        <select class="form-select" id="division_master_id" name="division_master_id">
                                            <option value="">Select Division</option>
                                            @foreach ($division_name as $value)
                                                <option
                                                    value="{{ $value['id'] }}"{{ $project_master->division_master_id == $value['id'] ? 'selected' : '' }}>
                                                    {{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-2 branch-scheme-select">
                                        <label class="form-label">Proposal Subdivision</label>
                                        <select class="form-select" id="sub_division_master_id"
                                            name="sub_division_master_id">
                                            <option value="">Select SubDivision</option>
                                            @foreach ($sub_division_name as $value)
                                                <option
                                                    value="{{ $value['id'] }}"{{ $project_master->sub_division_master_id == $value['id'] ? 'selected' : '' }}>
                                                    {{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2 branch-scheme-select">
                                        <label class="form-label">Proposal Circle</label>
                                        <select class="form-select" id="basic_circle_name" name="basic_circle_name">
                                            <option value="">Select Circle</option>
                                            <option value="Dabhoi">Dabhoi</option>

                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Name of Road,Length & Width As Per F1-F2 with
                                            Challenge</label>
                                        <input type="text" class="form-control" id="basic_name_of_road"
                                            name="basic_name_of_road"
                                            placeholder="Enter Name of Road,Length & Width As Per F1-F2 with Challenge"
                                            value="{{ $project_master->basic_name_of_road }}">
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Category of Road(SH, MDR, ODR, VR) With Highway
                                            No.</label>
                                        <input type="text" class="form-control" id="basic_category_of_road"
                                            name="basic_category_of_road"
                                            placeholder="Enter Category of Road(SH, MDR, ODR, VR) With Highway No."
                                            value="{{ $project_master->basic_category_of_road }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Treatment Detail</label>
                                        <textarea rows="9" class="form-control" id="ppd_treatment_detail" name="ppd_treatment_detail"
                                            placeholder="Enter Treatment Detail">  {{ $project_master->ppd_treatment_detail }}</textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn submit-btn btn btn-primary" id="btn_save"
                                            name="sub_client">Save</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- add name of scheme  -->
        <div class="modal fade product-modal" id="add_name_of_scheme" tabindex="-1"
            aria-labelledby="add_name_of_scheme" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_name_of_scheme">Add Name of Scheme</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" enctype="multipart/form-data" id="name_of_scheme_id">
                            @csrf
                            <input type="hidden" name="name_of_scheme_id" id="name_of_scheme_id">
                            <div class="col-lg-12">
                                <label class="form-label">Name Of Scheme</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn submit-btn" id="btn_save"
                                    name="btn_save">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- add name of project  -->
        <div class="modal fade product-modal" id="add_name_of_project" tabindex="-1"
            aria-labelledby="add_name_of_project" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_name_of_project">Add Name of Project</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" enctype="multipart/form-data" id="add_name_of_project_id">
                            @csrf
                            <input type="hidden" name="add_name_of_project_id" id="add_name_of_project_id">

                            <div class="col-lg-12">
                                <label class="form-label">Name Of Project</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn submit-btn" id="btn_save"
                                    name="btn_save">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div id="selectedID" data-id="{{ $project_master->id }}"></div>
    </body>
@endsection

@section('script')
    <script>
        var token = "{{ csrf_token() }}";


        $('#master_id_form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('master_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#master_id').modal('hide');
                        if ($('#master_id').val() == '') {
                            toastr.success("Proposal Master added successfully.");
                        } else {
                            toastr.success("Proposal Master updated successfully.");
                        }
                        dataTable.draw();
                    } else {
                        toastr.error(data.msg);
                    }
                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors['errors'], function(key, val) {
                            console.log(key);
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                }
            });
        });

        $('#name_of_scheme_id').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');
            var selectedID = $("#selectedID").data("id");

            $.ajax({
                type: 'POST',
                url: "{{ route('name_of_schema_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#name_of_scheme_id').modal('hide');
                        if ($('#name_of_scheme_id').val() == '') {
                            toastr.success("Proposal Master added successfully.");
                        } else {
                            toastr.success("Proposal Master updated successfully.");
                        }
                        window.location.href = "{{ url('edit-basic') }}/" + selectedID;

                    } else {
                        toastr.error(data.msg);
                    }

                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors['errors'], function(key, val) {
                            console.log(key);
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                }
            });
        });



        $('#add_name_of_project_id').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');
            var selectedID = $("#selectedID").data("id");

            $.ajax({
                type: 'POST',
                url: "{{ route('name_of_project_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#add_name_of_project_id').modal('hide');
                        if ($('#add_name_of_project_id').val() == '') {
                            toastr.success("Proposal Master added successfully.");
                        } else {
                            toastr.success("Proposal Master updated successfully.");
                        }

                        window.location.href = "{{ url('edit-basic') }}/" + selectedID;
                    } else {
                        toastr.error(data.msg);
                    }
                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors['errors'], function(key, val) {
                            console.log(key);
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                }
            });
        });

        document.getElementById('work_type_id').addEventListener('change', function() {
            const workTypeSelect = document.getElementById('work_type_id');
            const typeOfWorkSelect = document.getElementById('types_of_work');

            // Get the selected option's value
            const selectedWorkTypeId = workTypeSelect.value;

            // Clear the "Type Of Work" dropdown options
            typeOfWorkSelect.innerHTML = '<option value="">Select Type Of Work</option>';

            // Populate the "Type Of Work" dropdown based on the selected "Work Type"
            if (selectedWorkTypeId === '1') {
                // If "Work Type" is 1, add the options specific to that type
                typeOfWorkSelect.innerHTML += `
                <option value="Re-Surfacing">Re-Surfacing</option>
                <option value="Strengthening">Strengthening</option>
                <option value="3.75 to 5.5">3.75 to 5.5</option>
                <option value="3.75 to 7">3.75 to 7</option>
                <option value="3.75 to 10">3.75 to 10</option>
                <option value="5.5 to 7">5.5 to 7</option>
                <option value="5.5 to 10">5.5 to 10</option>
                <option value="7 to 10">7 to 10</option>
                <option value="10 to 4 lan">10 to 4 lan</option>
                <option value="10 to 6 lan">10 to 6 lan</option>
                <option value="4 lan to 6 lan">4 lan to 6 lan</option>`;
            } else if (selectedWorkTypeId === '2') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="New Buliding">New Buliding</option>
                <option value="Addition Alternative">Addition Alternative</option>
                <option value="Repairing Work">Repairing Work</option>`;
            } else if (selectedWorkTypeId === '3') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="Rob">Rob</option>
                <option value="WaterBody Bridge">WaterBody Bridge</option>
                <option value="Flyover">Flyover</option>`;
            } else if (selectedWorkTypeId === '4') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="Slab Drain">Slab Drain</option>
                <option value="Box Calvate">Box Calvate</option>
                <option value="Hp Drain">Hp Drain</option>`;
            } else if (selectedWorkTypeId === '5') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="Other">Other</option>`;
            }
        });

        $(document).ready(function() {
            $('#sent_box_id').change(function() {
                var selectedValue = $(this).val();
                var label = $('#remarks');
                var input = $('#basic_sent_box_remark');

                if (selectedValue === '2') {
                    label.text('Letter No');

                } else {
                    label.text('Remarks');

                }
            })
        });

        //name of schema
        document.getElementById('basic_name_scheme').addEventListener('change', function() {
            const workTypeSelect = document.getElementById('basic_name_scheme');
            const typeOfWorkSelect = document.getElementById('basic_buget_work');

            // Get the selected option's value
            const selectedWorkTypeId = workTypeSelect.value;

            // Clear the "Type Of Work" dropdown options
            typeOfWorkSelect.innerHTML = '';

            // Populate the "Type Of Work" dropdown based on the selected "Work Type"
            if (selectedWorkTypeId === '1') {
                // If "Work Type" is 1, add the options specific to that type
                typeOfWorkSelect.innerHTML += `
                <option value="1/235">1/235</option>`;
            } else if (selectedWorkTypeId === '2') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2/235">2/235</option>
                `;
            } else if (selectedWorkTypeId === '3') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="3/235">3/235</option>`;
            } else if (selectedWorkTypeId === '4') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="4/235">4/235</option>`;
            } else if (selectedWorkTypeId === '5') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="6/235">6/235</option>`;
            } else if (selectedWorkTypeId === '6') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="7/235">7/235</option>`;
            } else if (selectedWorkTypeId === '7') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="8/236">8/236</option>`;
            } else if (selectedWorkTypeId === '8') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="10/236">10/236</option>`;
            } else if (selectedWorkTypeId === '9') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="11/236">11/236</option>`;
            } else if (selectedWorkTypeId === '10') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="12/236">12/236</option>`;
            } else if (selectedWorkTypeId === '11') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="13/236">13/236</option>`;
            } else if (selectedWorkTypeId === '12') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="15/236">15/236</option>`;
            } else if (selectedWorkTypeId === '13') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="16/236">16/236</option>`;
            } else if (selectedWorkTypeId === '14') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="17/236">17/236</option>`;
            } else if (selectedWorkTypeId === '15') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="20/236">20/236</option>`;
            } else if (selectedWorkTypeId === '16') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="22/236">22/236</option>`;
            } else if (selectedWorkTypeId === '17') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="24/236">24/236</option>`;
            } else if (selectedWorkTypeId === '18') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="27/236">27/236</option>`;
            } else if (selectedWorkTypeId === '19') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="28/237">28/237</option>`;
            } else if (selectedWorkTypeId === '20') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="32/237">32/237</option>`;
            } else if (selectedWorkTypeId === '21') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="33/237">33/237</option>`;
            } else if (selectedWorkTypeId === '22') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="35/237">35/237</option>`;
            } else if (selectedWorkTypeId === '23') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="36/237">36/237</option>`;
            } else if (selectedWorkTypeId === '24') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="38/237">38/237</option>`;
            } else if (selectedWorkTypeId === '25') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="39/237">39/237</option>`;
            } else if (selectedWorkTypeId === '26') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="40/237">40/237</option>`;
            } else if (selectedWorkTypeId === '27') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="42/237">42/237</option>`;
            } else if (selectedWorkTypeId === '28') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="44/237">44/237</option>`;
            } else if (selectedWorkTypeId === '29') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="No Option">No Option</option>`;
            } else if (selectedWorkTypeId === '30') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="55/238">55/238</option>`;
            } else if (selectedWorkTypeId === '31') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="61/238">61/238</option>`;
            } else if (selectedWorkTypeId === '32') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="62/238">62/238</option>`;
            } else if (selectedWorkTypeId === '33') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="63/238">63/238</option>`;
            } else if (selectedWorkTypeId === '34') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="69/238">69/238</option>`;
            } else if (selectedWorkTypeId === '35') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="70/239">70/239</option>`;
            } else if (selectedWorkTypeId === '36') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="71/239">71/239</option>`;
            } else if (selectedWorkTypeId === '37') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="72/239">72/239</option>`;
            } else if (selectedWorkTypeId === '38') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value=" 73/239"> 73/239</option>`;
            } else if (selectedWorkTypeId === '39') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="74/239">74/239</option>`;
            } else if (selectedWorkTypeId === '40') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="75/239">75/239</option>`;
            } else if (selectedWorkTypeId === '41') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="76/239">76/239</option>`;
            } else if (selectedWorkTypeId === '42') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="77/239">77/239</option>`;
            } else if (selectedWorkTypeId === '43') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="78/239">78/239</option>`;
            } else if (selectedWorkTypeId === '44') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="79/239">79/239</option>`;
            } else if (selectedWorkTypeId === '45') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="81/240">81/240</option>`;
            } else if (selectedWorkTypeId === '46') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += ` <option value="No Option">No Option</option>
               `;
            } else if (selectedWorkTypeId === '47') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += ` <option value="No Option">No Option</option>
            `;
            } else if (selectedWorkTypeId === '48') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="No Option">No Option</option>`;
            } else if (selectedWorkTypeId === '49') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1/244">1/244</option>`;
            } else if (selectedWorkTypeId === '50') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="7/248">7/248</option>`;
            } else if (selectedWorkTypeId === '51') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="/">/</option>`;
            } else if (selectedWorkTypeId === '52') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="13/233">13/233</option>`;
            } else if (selectedWorkTypeId === '53') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1/233">1/233</option>`;
            } else if (selectedWorkTypeId === '54') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="17/233">17/233</option>`;
            } else if (selectedWorkTypeId === '55') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="18/233">18/233</option>`;
            } else if (selectedWorkTypeId === '56') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="19/233">19/233</option>`;
            } else if (selectedWorkTypeId === '57') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="20/233">20/233</option>`;
            } else if (selectedWorkTypeId === '58') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="/50">/50</option>`;
            } else if (selectedWorkTypeId === '59') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2/0463">2/0463</option>`;
            } else if (selectedWorkTypeId === '60') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="7/463">7/463</option>`;
            } else if (selectedWorkTypeId === '61') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="11/464">11/464</option>`;
            } else if (selectedWorkTypeId === '62') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="13/447">13/447</option>`;
            } else if (selectedWorkTypeId === '63') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="14/464">14/464</option>`;
            } else if (selectedWorkTypeId === '64') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="15/464">15/464</option>`;
            } else if (selectedWorkTypeId === '65') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="42/462">42/462</option>`;
            } else if (selectedWorkTypeId === '66') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="43/462">43/462</option>`;
            } else if (selectedWorkTypeId === '67') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="48/462">48/462</option>`;
            } else if (selectedWorkTypeId === '68') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="49/462">49/462</option>`;
            } else if (selectedWorkTypeId === '69') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="50/462">50/462</option>`;
            } else if (selectedWorkTypeId === '70') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="51/462">51/462</option>`;
            } else if (selectedWorkTypeId === '71') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="52/463">52/463</option>`;
            } else if (selectedWorkTypeId === '72') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="53/463">53/463</option>`;
            } else if (selectedWorkTypeId === '73') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="54/463">54/463</option>`;
            } else if (selectedWorkTypeId === '74') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="55/463">55/463</option>`;
            } else if (selectedWorkTypeId === '75') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="56/463">56/463</option>`;
            } else if (selectedWorkTypeId === '76') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="57/463">57/463</option>`;
            } else if (selectedWorkTypeId === '77') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="58/463">58/463</option>`;
            } else if (selectedWorkTypeId === '78') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="6/425">6/425</option>`;
            } else if (selectedWorkTypeId === '79') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="72/239">72/239</option>`;
            }
        });


        //jogvai auto filled
        document.getElementById('basic_name_scheme').addEventListener('change', function() {
            const workTypeSelect = document.getElementById('basic_name_scheme');
            const typeOfWorkSelect = document.getElementById('basic_budget_work_name');

            // Get the selected option's value
            const selectedWorkTypeId = workTypeSelect.value;

            // Clear the "Type Of Work" dropdown options
            typeOfWorkSelect.innerHTML = '';

            // Populate the "Type Of Work" dropdown based on the selected "Work Type"
            if (selectedWorkTypeId === '1') {
                // If "Work Type" is 1, add the options specific to that type
                typeOfWorkSelect.innerHTML += `
                <option value="50">50</option>`;
            } else if (selectedWorkTypeId === '2') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="15">15</option>
                `;
            } else if (selectedWorkTypeId === '3') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="100">100</option>`;
            } else if (selectedWorkTypeId === '4') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="400">400</option>`;
            } else if (selectedWorkTypeId === '5') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="100">100</option>`;
            } else if (selectedWorkTypeId === '6') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="10000">10000</option>`;
            } else if (selectedWorkTypeId === '7') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="0">0</option>`;
            } else if (selectedWorkTypeId === '8') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="0">0</option>`;
            } else if (selectedWorkTypeId === '9') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="0">0</option>`;
            } else if (selectedWorkTypeId === '10') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="10480">10480</option>`;
            } else if (selectedWorkTypeId === '11') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="11500">11500</option>`;
            } else if (selectedWorkTypeId === '12') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2500">2500</option>`;
            } else if (selectedWorkTypeId === '13') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1200">1200</option>`;
            } else if (selectedWorkTypeId === '14') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1">1</option>`;
            } else if (selectedWorkTypeId === '15') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="35956">35956</option>`;
            } else if (selectedWorkTypeId === '16') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1">1</option>`;
            } else if (selectedWorkTypeId === '17') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="227033">227033</option>`;
            } else if (selectedWorkTypeId === '18') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="10">10</option>`;
            } else if (selectedWorkTypeId === '19') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2149">2149</option>`;
            } else if (selectedWorkTypeId === '20') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="100">100</option>`;
            } else if (selectedWorkTypeId === '21') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2000">2000</option>`;
            } else if (selectedWorkTypeId === '22') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="100">100</option>`;
            } else if (selectedWorkTypeId === '23') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="6000">6000</option>`;
            } else if (selectedWorkTypeId === '24') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2500">2500</option>`;
            } else if (selectedWorkTypeId === '25') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="3000">3000</option>`;
            } else if (selectedWorkTypeId === '26') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="10">10</option>`;
            } else if (selectedWorkTypeId === '27') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="10500">10500</option>`;
            } else if (selectedWorkTypeId === '28') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="500">500</option>`;
            } else if (selectedWorkTypeId === '29') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="0">0</option>`;
            } else if (selectedWorkTypeId === '30') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="17000">17000</option>`;
            } else if (selectedWorkTypeId === '31') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="0">0</option>`;
            } else if (selectedWorkTypeId === '32') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="500">500</option>`;
            } else if (selectedWorkTypeId === '33') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2000">/2000</option>`;
            } else if (selectedWorkTypeId === '34') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1">1</option>`;
            } else if (selectedWorkTypeId === '35') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1">1</option>`;
            } else if (selectedWorkTypeId === '36') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="14607">14607</option>`;
            } else if (selectedWorkTypeId === '37') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="50">50</option>`;
            } else if (selectedWorkTypeId === '38') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2000">2000</option>`;
            } else if (selectedWorkTypeId === '39') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="14607.6923076923">14607.6923076923</option>`;
            } else if (selectedWorkTypeId === '40') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="50">50</option>`;
            } else if (selectedWorkTypeId === '41') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2000">2000</option>`;
            } else if (selectedWorkTypeId === '42') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="21679">21679</option>`;
            } else if (selectedWorkTypeId === '43') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="31610">31610</option>`;
            } else if (selectedWorkTypeId === '44') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="22236">22236</option>`;
            } else if (selectedWorkTypeId === '45') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="6500">6500</option>`;
            } else if (selectedWorkTypeId === '46') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += ` <option value=" 100">  100</option>
               `;
            } else if (selectedWorkTypeId === '47') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += ` <option value="10">10</option>
            `;
            } else if (selectedWorkTypeId === '48') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="0">0</option>`;
            } else if (selectedWorkTypeId === '49') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="21000">21000</option>`;
            } else if (selectedWorkTypeId === '50') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="600">600</option>`;
            } else if (selectedWorkTypeId === '51') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="0">0</option>`;
            } else if (selectedWorkTypeId === '52') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="10">10</option>`;
            } else if (selectedWorkTypeId === '53') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="5381">5381</option>`;
            } else if (selectedWorkTypeId === '54') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="16989">16989</option>`;
            } else if (selectedWorkTypeId === '55') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2500">2500</option>`;
            } else if (selectedWorkTypeId === '56') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="7500">7500</option>`;
            } else if (selectedWorkTypeId === '57') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="6120">6120</option>`;
            } else if (selectedWorkTypeId === '58') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="62176">62176</option>`;
            } else if (selectedWorkTypeId === '59') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="30214">30214</option>`;
            } else if (selectedWorkTypeId === '60') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2500">2500</option>`;
            } else if (selectedWorkTypeId === '61') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2000">2000</option>`;
            } else if (selectedWorkTypeId === '62') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="12500">12500</option>`;
            } else if (selectedWorkTypeId === '63') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="3000">3000</option>`;
            } else if (selectedWorkTypeId === '64') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1000">1000</option>`;
            } else if (selectedWorkTypeId === '65') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="8000">8000</option>`;
            } else if (selectedWorkTypeId === '66') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2500">2500</option>`;
            } else if (selectedWorkTypeId === '67') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="4000">4000</option>`;
            } else if (selectedWorkTypeId === '68') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="0">0</option>`;
            } else if (selectedWorkTypeId === '69') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1000">1000</option>`;
            } else if (selectedWorkTypeId === '70') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="0">0</option>`;
            } else if (selectedWorkTypeId === '71') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1000">1000</option>`;
            } else if (selectedWorkTypeId === '72') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="5000">5000</option>`;
            } else if (selectedWorkTypeId === '73') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="1000">1000</option>`;
            } else if (selectedWorkTypeId === '74') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="500">500</option>`;
            } else if (selectedWorkTypeId === '75') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="14000">14000</option>`;
            } else if (selectedWorkTypeId === '76') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="28900">28900</option>`;
            } else if (selectedWorkTypeId === '77') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="43500">43500</option>`;
            } else if (selectedWorkTypeId === '78') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="2000">2000</option>`;
            }
        });
    </script>
@endsection
