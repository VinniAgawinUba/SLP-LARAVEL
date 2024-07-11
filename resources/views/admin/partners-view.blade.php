@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
    @include('layout.admin-header')
    @include('shared.success-message')
    @include('shared.error-message')

    @php
    // Define an associative array to map type IDs to their names
    $partnerTypes = [
        1 => 'Local Government Units',
        2 => 'Civil Society Organizations',
        3 => 'Industry',
        4 => 'Non - Government',
        5 => 'Private Sectors',
        6 => 'In - Xu',
        7 => 'Government Agencies',
        8 => 'Schools'
    ];
    @endphp

    <div class="container-fluid px-4">
        <h4 class="mt-4">Partners</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Partners</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Partners
                            <a href="{{ route('admin.partnersAdd') }}" class="btn btn-primary float-end">Add Partner</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="myPartner" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Logo</th>
                                    <th>Address</th>
                                    <th>Contact Person</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Partner Type</th>
                                    <th>Featured</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($partners_list as $row)
                                    <tr>
                                        <td>{{ $row['id'] }}</td>
                                        <td>{{ $row['name'] }}</td>
                                        <td><img src="{{ asset('assets/uploads/partner_logos/'.$row['logo_image']) }}" alt="{{ $row['name'] }}-logo" style="width: 100px;"></td>
                                        <td>{{ $row['address'] }}</td>
                                        <td>{{ $row['contact_person'] }}</td>
                                        <td>{{ $row['email'] }}</td>
                                        <td>{{ $row['contact_number'] }}</td>
                                        <td>{{ isset($partnerTypes[$row['type_id']]) ? $partnerTypes[$row['type_id']] : 'Unknown' }}</td>
                                        <td>
                                            <input type="checkbox" value="{{ $row['id'] }}" {{ $row['featured'] == 1 ? 'checked' : '' }} data-partnerid="{{ $row['id'] }}">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.partnersEdit', ['id' => $row['id']]) }}" class="btn btn-primary"><span class="material-symbols-outlined"> edit </span></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.partnersDelete', $row->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="partner_delete_btn" value="{{ $row['id'] }}">
                                                <button type="submit" class="btn btn-danger deleteButton"><span class="material-symbols-outlined"> delete </span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for handling checkbox clicks -->
    <script>
        // Listen for click events on checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.addEventListener('click', function() {
                // Get the partner ID and the checked status
                var partnerID = this.value;
                var isChecked = this.checked ? 1 : 0;

                // Send AJAX request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ url("javascript-update_featured_partners.php") }}', true); // Update the URL to your PHP file
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        // Handle response
                        if (xhr.status === 200) {
                            console.log('Featured status updated successfully');
                        } else {
                            console.error('Error updating featured status');
                        }
                    }
                };
                xhr.send('update_featured=true&id=' + partnerID + '&featured=' + isChecked);
            });
        });
    </script>

    @include('layout.admin-footer')
    @include('layout.scripts')
@else
    @php
        header('Location: ' . url('/home'));
        exit();
    @endphp
@endif
