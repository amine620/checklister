@extends('layouts.app')

@section('content')


    <div class="container-fluid mt-5">

        <div class="fade-in">
            <div class="row">
                <div class="col-md-8" style="margin-left: 300px">
                    <div class="card">
                        <div class="card-header">{{ __('Edit Task') }}

                        </div>

                        <div class="card-body">
                            @if ($errors->storetask->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->storetask->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="post"
                                action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input class="form-control" id="name" type="text" name="name"
                                                value="{{ $task->name }}">

                                            <div class="form-group">
                                                <label for="description">{{ __('Description') }}</label>
                                                <textarea class="form-control" id="task-textarea" name="description"
                                                    rows="5">{{$task->description}}</textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit">
                                        {{ __('update task') }}</button>
                                </div>
                            </form>



                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
   ClassicEditor
       .create( document.querySelector( '#task-textarea' ) )
       .catch( error => {
           console.error( error );
       } );
</script>

@endsection
