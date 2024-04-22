@extends('dashboard.layout')

@section('contents')
    <form action="{{ route('pagecontrol.update') }}" method="POST">
        @csrf

        {{-- About --}}
        <div class="form-group row">
            <label class="col-sm-2">About</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_about" id="">
                    <option value="">Choose</option>
                    @foreach ($datapage as $item)
                        <option value="{{ $item->id }}" {{ get_meta_value('_about') == $item->id ? 'Selected': '' }}>
                            {{ $item->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Interest --}}
        <div class="form-group row">
            <label class="col-sm-2">Interest</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_interest" id="">
                    <option value="">Choose</option>
                    @foreach ($datapage as $item)
                        <option value="{{ $item->id }}" {{ get_meta_value('_interest') == $item->id ? 'Selected': '' }}>
                            {{ $item->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Awards & Honors --}}
        <div class="form-group row">
            <label class="col-sm-2">Awards & Honors</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_awards" id="">
                    <option value="">Choose</option>
                    @foreach ($datapage as $item)
                        <option value="{{ $item->id }}" {{ get_meta_value('_awards') == $item->id ? 'Selected': '' }}>
                            {{ $item->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Certification --}}
        <div class="form-group row">
            <label class="col-sm-2">Certification</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_awards" id="">
                    <option value="">Choose</option>
                    @foreach ($datapage as $item)
                        <option value="{{ $item->id }}" {{ get_meta_value('_certification') == $item->id ? 'Selected': '' }}>
                            {{ $item->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button class="btn btn-primary" name="save" type="submit">Save</button>

    </form>
    
@endsection