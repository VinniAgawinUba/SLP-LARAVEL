<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@if (auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
    @include('layout.admin-header')
    @include('shared.success-message')
    @include('shared.error-message')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Running Texts
                        <a href="{{ route('runningText.create') }}" class="btn btn-primary btn-sm float-right">Add New</a>
                    </div>
                    <div class="card-body">
                        @if ($runningTexts->isEmpty())
                            <p>No running texts found.</p>
                        @else
                            <table id="myFaculty"class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Start Datetime</th>
                                        <th>End Datetime</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($runningTexts as $runningText)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $runningText->message }}</td>
                                            <td>{{ $runningText->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($runningText->start_date)->format('M d Y, h:i A') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($runningText->end_date)->format('M d Y, h:i A') }}</td>
                                            

                                            <td>
                                                <a href="{{ route('runningText.edit', $runningText->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('runningText.delete', $runningText->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this running text?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.admin-footer')
    @include('layout.scripts')
@else
    <script>
        window.location.href = '/';
    </script>
@endif
