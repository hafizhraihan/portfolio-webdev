@extends('dashboard.layout')

@section('contents')
    <p class="card-title">Project</p>
    <div class="pb-3">
        <a href="{{ route('project.create') }}" class="btn btn-primary">+ Add project</a>
    </div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Project Name</th>
                    <th>Picture</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <img style="border-radius: 0" src="{{ asset(''.$item->img) }}" alt="{{ $item->img }}">
                    </td>
                    <td>
                        <a href="{{ route('project.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form onsubmit="return confirm('Are you sure you want to delete this page?')" action="{{ route('project.destroy', $item->id) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" name="submit">Del</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection
