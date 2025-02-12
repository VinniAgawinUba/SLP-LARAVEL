{{--Layouts--}}
@include('layout.header')
@include('layout.navbar')
@include('layout.footer')

{{-- Header Section--}}
@yield('header')

{{-- Navbar Section--}}
@yield('navbar')
@include('shared.success-message')
@include('shared.error-message')

<div class="container-fluid px-4">
    <h4 class="mt-4">Requests</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Requests</li>
    </ol>
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>View Requests
                    </h4>
                    <div class="btn-group float-end" role="group" aria-label="Basic example">


                    </div>
                    <div class="card-body">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter by Status
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                <li><a class="dropdown-item filter-btn" href="#" data-status="all">All</a></li>
                                <li><a class="dropdown-item filter-btn" href="#" data-status="not approved">Not Approved</a></li>
                                <li><a class="dropdown-item filter-btn" href="#" data-status="Received by CPU">Received by CPU</a></li>
                                <li><a class="dropdown-item filter-btn" href="#" data-status="Left CPU office">Left CPU office</a></li>
                                <li><a class="dropdown-item filter-btn" href="#" data-status="Received by Registrar">Received by Registrar</a></li>
                                <li><a class="dropdown-item filter-btn" href="#" data-status="Left Registrar office">Left Registrar office</a></li>
                                <li><a class="dropdown-item filter-btn" href="#" data-status="Received by VPadmin">Received by VPadmin</a></li>
                                <li><a class="dropdown-item filter-btn" href="#" data-status="Left VPadmin office">Left VPadmin office</a></li>
                                <li><a class="dropdown-item filter-btn" href="#" data-status="Received by President">Received by President</a></li>
                                <li><a class="dropdown-item filter-btn" href="#" data-status="Left President office">Left President office</a></li>
                                <li><a class="dropdown-item filter-btn" href="#" data-status="Approved">Approved</a></li>
                                <!-- Add more items for other statuses as needed -->
                            </ul>

                        </div>
                    </div>
                </div>

                <table id="myRequests" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Request Received Date</th>
                            <th>Expected Delivery Date</th>
                            <th>Ppo Group</th>
                        </tr>
                    </thead>

                    @php
                    // Assuming these are small arrays and manageable to define here.
                    $types = [
                    1 => 'Preventive',
                    2 => 'Request'
                    ];

                    $categories = [
                    1 => 'Fabrication',
                    2 => 'Repair',
                    3 => 'Events',
                    4 => 'Housekeeping',
                    5 => 'Pest Control',
                    6 => 'Others',
                    ];

                    $statuses = [
                    0 => 'Received by PPO',
                    1 => 'Pending Request',
                    2 => 'Ongoing Request',
                    3 => 'Completed Request',
                    4 => 'Cancelled Request'
                    ];

                    $ppo_groups = [
                    1 => 'Skilled',
                    2 => 'Custodial'
                    ]

                    @endphp

                    {{-- // View for Approval --}}
                    <tbody>
                        @forelse ($request_list as $request_row)
                        <tr>
                            <td>{{ $request_row['id'] }}</td>
                            <td>{{ $types[$request_row['type_id']] ?? 'Unknown Type' }}</td>
                            <td>{{ $categories[$request_row['category_id']] ?? 'Unknown Category' }}</td>
                            <td>{{ $statuses[$request_row['status']] ?? 'Unknown Status' }}</td>
                            <td>{{ $request_row['request_received_date'] }}</td>
                            <td>{{ $request_row['expected_delivery_date'] }}</td>
                            <td>{{ $ppo_groups[$request_row['ppo_group_id']] ?? 'Unknown Group' }}</td>
                        </tr>
                        @empty
                        
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

@include('layout.admin-footer')
@include ('layout.scripts')