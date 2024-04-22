@extends('dashboard.layout')

@section('contents')
    <div class="pb-3">
        <a href="{{ route('experience.index') }}" class="btn btn-secondary">
            < Return
        </a>
    </div>

    {{-- Input Job Position --}}
    <form action="{{ route('experience.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Position:*</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="title"
                id="title"
                aria-describedby="helpId"
                placeholder="Ex: Web Developer"
                value="{{ $data->title }}"
            />
        </div>

        {{-- Input Company Name --}}
        <div class="mb-3">
            <label for="info1" class="form-label">Company name:*</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="info1"
                id="info1"
                aria-describedby="helpId"
                placeholder="Ex: Traveloka"
                value="{{ $data->info1 }}"
            />
        </div>

        {{-- Input Date --}}
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Start Date*</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="start_date" placeholder="Date" value="{{ $data->start_date }}">
                </div>
                <div class="col-auto">End Date</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="end_date" placeholder="Date" value="{{ $data->end_date }}">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea 
                class="form-control summernote"
                rows="5"
                name="desc"
                >
                {{ $data->desc }}
            </textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>

    </form>
    
@endsection