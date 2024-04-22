@extends('dashboard.layout')

@section('contents')
    <div class="pb-3">
        <a href="{{ route('project.index') }}" class="btn btn-secondary">
            < Return
        </a>
    </div>

    {{-- Input Project Name --}}
    <form action="{{ route('project.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Project Name*</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="title"
                id="title"
                aria-describedby="helpId"
                placeholder="Ex: Portfolio Website"
                value="{{ $data->title }}"
            />
        </div>

    <div class="row">
        {{-- Input Project Picture --}}
        <div class="mb-3">
            <label for="img" class="form-label">Project Picture*</label>
            <input
                type="file"
                class="form-control form-control-sm"
                name="img"
                id="img"
                aria-describedby="helpId"
                value="{{ $data->img }}"
            />
        </div>

        {{-- Input Project Link --}}
        <div class="mb-3">
            <label for="info1" class="form-label">Project Link*</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="info1"
                id="info1"
                aria-describedby="helpId"
                placeholder="Link"
                value="{{ $data->info1}}"
            />
        </div>
    </div>

        {{-- Input Description --}}
        <div class="mb-3">
            <label for="desc" class="form-label">Description*</label>
            <textarea 
                class="form-control summernote"
                rows="5"
                name="desc"
                id="desc"
                >
                {{ $data->desc }}
            </textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>

    </form>
    
@endsection