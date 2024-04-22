@extends('dashboard.layout')

@section('contents')
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Skill*</label>
            <input
                type="text"
                class="form-control form-control-sm skill"
                name="_skill"
                id="title"
                aria-describedby="helpId"
                placeholder="Ex: After Effect"
                value="{{ get_meta_value('_skill') }}"
            >
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea 
                class="form-control summernote"
                rows="5"
                name="_desc"
                >
                {{ get_meta_value('_desc') }}
            </textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>

    </form>
    
@endsection

@push('child-scripts')
  <script>
    $(document).ready(function() {
        $('.skill').tokenfield({
            autocomplete: {
                source: [{!! $skill !!}],
                delay: 100
            },
            showAutocompleteOnFocus: true
        });
    });
  </script>    
@endpush