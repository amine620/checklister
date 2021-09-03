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

                            <form method="post"
                                action="{{ route('admin.checklist_groups.checklists.update', [$checklist_group, $checklist]) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input class="form-control" id="name" type="text" name="name"
                                                value="{{ $checklist->name }}">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit">
                                        {{ __('save checklist') }}</button>
                                </div>
                            </form>



                        </div>
                    </div>
                    <form
                        action="{{ route('admin.checklist_groups.checklists.destroy', [$checklist_group, $checklist]) }}"
                        class="form-group" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('are you sure')">delete this
                            checklist</button>
                    </form>
                    <hr>


                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i> {{ __('List of Tasks') }}</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm">
                                <tbody>
                                    @foreach ($checklist->tasks as $task)
                                        <tr>
                                            <td>{{ $task->name }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}">{{__('Edit')}}</a>
                                                <form style="display: inline-block"
                                                    action="{{ route('admin.checklists.tasks.destroy', [$checklist,$task]) }}"
                                                    class="form-group" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('are you sure')">delete
                                                        </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        @if ($errors->storetask->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->storetask->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('admin.checklists.tasks.store', [$checklist]) }}">
                            @csrf
                            <div class="card-header">{{ __('New Task') }}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input value='{{ old('name') }}' class="form-control" id="name" type="text"
                                                name="name" placeholder="{{ __('Task Name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">{{ __('Description') }}</label>
                                            <textarea class="form-control" id="name" name="description"
                                                rows="5">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ __('save task') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
