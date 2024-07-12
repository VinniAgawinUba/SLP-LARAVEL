@extends('layout.header')
@include('layout.navbar')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">


<div class="container mt-4" id="container">
    <div class="row">
        @if ($partner)
            <div class="col-md-12 mb-4">
                <div class="cards shadow-sm" style="padding: 20px 60px;">
                    <div class="card-body">
                        <div class="row">
                            <!-- Column 1 of Card -->
                            <div class="col-md-6">
                                @if ($partner->logo_image)
                                   <img class="partner-image" src="{{ asset('assets/uploads/partner_logos/' . $partner->logo_image) }}" alt="partner logo">
                                @else
                                    <p>No partner logo available.</p>
                                @endif
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-text"><strong>Partner Name:</strong> {{ $partner->name }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="card-text"><strong>Type:</strong> {{ $partner->type_id }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="card-text"><strong>Contact Person:</strong> {{ $partner->contact_person }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="card-text"><strong>Email:</strong> {{ $partner->email }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="card-text"><strong>Contact Number:</strong> {{ $partner->contact_number }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="card-text"><strong>Address:</strong> {{ $partner->address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column 2 of Card -->
                            <div class="col-md-6">
                                <h5 class="card-title">{{ $partner->name }}</h5>
                                <p class="text-description">{{ $partner->description }}</p>
                            </div>
                        </div>
                        <hr>
                        <!-- Row 2: Other Details -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h5>More Details</h5>
                                <p class="card-text"><strong>Featured:</strong> {{ $partner->featured ? 'Yes' : 'No' }}</p>
                                <!-- Add more details as needed -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- You can add more details here as needed -->
            </div>
        @else
            <div class='alert alert-warning' role='alert'>No Partner found!</div>
        @endif
    </div>
</div>

@include('layout.footer')
@include('layout.scripts')
