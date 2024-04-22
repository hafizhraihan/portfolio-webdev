@extends('dashboard.layout')

@section('contents')
    <div class="pb-3">
        <a href="{{ route('pages.index') }}" class="btn btn-secondary">
            < Return
        </a>
    </div>

    <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title*</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="title"
                id="title"
                aria-describedby="helpId"
                placeholder="Title"
                value="{{ Session::get('title') }}"
            />
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description*</label>
            <textarea 
                class="form-control summernote"
                rows="5"
                name="desc"
                >
                {{ Session::get('desc') }}
            </textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>

    </form>
    
@endsection