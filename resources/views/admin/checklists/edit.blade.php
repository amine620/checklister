@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-8" style="margin-left: 300px">
                    <div class="card">
                        <div class="card-header">{{ __('Edit CheckList') }}</div>

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

                            <form  method="post" action="{{route('admin.checklist_groups.checklists.update',[$checklist_group,$checklist])}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input class="form-control" id="name" type="text" name="name" value="{{$checklist->name}}"
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
                    <form action="{{route('admin.checklist_groups.checklists.destroy',[$checklist_group,$checklist])}}" class="form-group" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('are you sure')">delete this checklist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
