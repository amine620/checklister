@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-8" style="margin-left: 300px">
                    <div class="card">
                        <div class="card-header">{{ __('Edit CheckList Group') }}</div>

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form  method="post" action="{{route('admin.checklist_groups.update',$checklist_group)}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input class="form-control" id="name" type="text" name="name" value="{{$checklist_group->name}}"
                                               >

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit"> {{ __('save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form action="{{route('admin.checklist_groups.destroy',$checklist_group)}}" class="form-group" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('are you sure')">delete this checklist group</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
