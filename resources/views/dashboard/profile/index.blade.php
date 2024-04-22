@extends('dashboard.layout')

@section('contents')
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h3>Profile</h3>
                {{-- Input Profile Picture --}}
                @if (get_meta_value('_profpic'))
                    <img src="{{ asset('profpic')."/".get_meta_value('_profpic') }}" style="max-width: 100px" alt="Profile Picture">
                @endif
                <div class="mb-3">
                    <label for="_profpic" class="form-label">Profile Picture*</label>
                    <input
                        type="file"
                        class="form-control form-control-sm"
                        name="_profpic"
                        id="_profpic"
                    >
                </div>

                {{-- Input Location --}}
                <div class="mb-3">
                    <label for="_loc" class="form-label">Location*</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_loc"
                        id="_loc"
                        value="{{ get_meta_value('_loc') }}"
                    >
                </div>

                {{-- Input Mobile Number --}}
                <div class="mb-3">
                    <label for="_nohp" class="form-label">Mobile</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_nohp"
                        id="_nohp"
                        value="{{ get_meta_value('_nohp') }}"
                    >
                </div>

                {{-- Input Email --}}
                <div class="mb-3">
                    <label for="_email" class="form-label">Email*</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_email"
                        id="_email"
                        value="{{ get_meta_value('_email') }}"
                    >
                </div>
                
                <button class="btn btn-primary" name="save" type="submit">Save</button>

            </div>

            <div class="col-5">
                <h3>Social Media</h3>

                {{-- Input LinkedIn --}}
                <div class="mb-3">
                    <label for="_linkedin" class="form-label">LinkedIn</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_linkedin"
                        id="_linkedin"
                        value="{{ get_meta_value('_linkedin') }}"
                    >
                </div>

                {{-- Input Instagram --}}
                <div class="mb-3">
                    <label for="_ig" class="form-label">Instagram</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_ig"
                        id="_ig"
                        value="{{ get_meta_value('_ig') }}"
                    >
                </div>

                {{-- Input Github --}}
                <div class="mb-3">
                    <label for="_github" class="form-label">Github</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_github"
                        id="_github"
                        value="{{ get_meta_value('_github') }}"
                    >
                </div>

                {{-- Input Behance --}}
                <div class="mb-3">
                    <label for="_behance" class="form-label">Behance</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_behance"
                        id="_behance"
                        value="{{ get_meta_value('_behance') }}"
                    >
                </div>

            </div>
        </div>
        
    </form>
    
@endsection