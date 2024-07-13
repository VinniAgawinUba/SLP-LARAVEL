@if (auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
    @include('layout.admin-header')
    @include('shared.success-message')
    @include('shared.error-message')

    <div class="container-fluid px-4">
        <h4 class="mt-4">Edit Partner</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.partnersView') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Partner</li>
        </ol>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Partner
                            <a href="{{ route('admin.partnersView') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.partnersUpdate', ['id' => $partner->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Partner Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $partner->name }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="logo_image" class="form-label">Logo Image</label>
                                    <input type="file" class="form-control" id="logo_image" name="logo_image" accept="image/*">
                                    @if ($partner->logo_image)
                                    Current Logo:
                                        <img src="{{ asset('assets/uploads/partner_logos/' . $partner->logo_image) }}" alt="Partner Logo" style="max-width: 200px; margin-top: 10px;">
                                    @else
                                        <p>No logo uploaded</p>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" required>{{ $partner->address }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contact_person" class="form-label">Contact Person</label>
                                    <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $partner->contact_person }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $partner->email }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $partner->contact_number }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type_id" class="form-label">Partner Type</label>
                                    <select class="form-select" id="type_id" name="type_id" required>
                                        @foreach ($partnerTypes as $key)
                                            <option value="{{ $key->id }}" {{ $key->id == $partner->type_id ? 'selected' : '' }}>{{ $key->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
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
