<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@if(auth()->check() && in_array(auth()->user()->auth_role, ['super', 'admin']))
    @include('layout.admin-header')
    @include('shared.success-message')
    @include('shared.error-message')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Running Text
                        <a href="{{ route('runningText.view') }}" class="btn btn-danger float-end">BACK</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('runningText.update', $runningText->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="message" id="content" class="form-control" rows="3" required>{{ old('message', $runningText->message) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $runningText->start_date ? \Carbon\Carbon::parse($runningText->start_date)->format('Y-m-d\TH:i') : '') }}">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $runningText->end_date ? \Carbon\Carbon::parse($runningText->end_date)->format('Y-m-d\TH:i') : '') }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ old('status', $runningText->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $runningText->status) === 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary my-3">Save</button>
                            <a href="{{ route('runningText.view') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <script>window.location.href = '/';</script>
@endif
