@extends('dashboard.layout')

@section('contents')
    <div class="pb-3">
        <a href="{{ route('pages.index') }}" class="btn btn-secondary">
            < Return
        </a>
    </div>

    <form action="{{ route('pages.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title*</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="title"
                id="title"
                aria-describedby="helpId"
                placeholder="Title"
                value="{{ $data->title }}"
            />
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description*</label>
            <textarea 
                class="form-control summernote"
                rows="5"
                name="desc"
                >
                {{ $data->desc }}
            </textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save Changes</button>

    </form>
    
@endsection