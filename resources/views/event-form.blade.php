<x-modal-action action="{{ $action }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <div class="text-xs">Start Date</div>
                <input type="text" name="start_date" readonly value="{{ $data->start_date ?? request()->start_date }}" class="form-control datepicker" required>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <div class="text-xs">End Date</div>
                <input type="text" name="end_date" readonly value="{{ $data->end_date ?? request()->end_date }}" class="form-control datepicker" required>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="text-xs">Event Title</div>
                <textarea name="title" class="form-control" required>{{ $data->title }}</textarea>
            </div>
        </div>
        <div class="col-12">
             <div class="form-check form-check-inline">
                <input class="form-check-input" {{ $data->category == 'Paket 1' ? 'checked' : null }} type="radio" name="category" id="category-Paket-1" value="Paket 1" required>
                <label class="form-check-label" for="category-Paket-1">Paket 1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" {{ $data->category == 'Paket 2' ? 'checked' : null }} type="radio" name="category" id="category-Paket-2" value="Paket 2" required>
                <label class="form-check-label" for="category-Paket-2">Paket 2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" {{ $data->category == 'Paket 3' ? 'checked' : null }} type="radio" name="category" id="category-Paket-3" value="Paket 3" required>
                <label class="form-check-label" for="category-Paket-3">Paket 3</label>
            </div>
        </div>
    </div>
</x-modal-action>
