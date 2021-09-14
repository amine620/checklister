@extends('layouts.app')

@section('content')


    <div class="container-fluid mt-5">

        {{--session message --}}
        @if (session('message'))
            <div class="alter alert-info">{{ session('message') }}</div>
        @endif

        <div class="fade-in">
            <div class="row">
                <div class="col-md-8" style="margin-left: 300px">
                    <div class="card">
                        <div class="card-header">{{ __('Edit Page') }}

                        </div>

                        <div class="card-body">
                            {{-- display errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->storetask->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <form method="post" action="{{ route('admin.pages.update', [$page]) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">{{ __('Title') }}</label>
                                            <input class="form-control" id="name" type="text" name="title"
                                                value="{{ $page->title }}">

                                            <div class="form-group">
                                                <label for="content">{{ __('Content') }}</label>
                                                <textarea class="form-control" id="task-textarea" name="content"
                                                    rows="5">{{ $page->content }}</textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit">
                                        {{ __('update page') }}</button>
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
            .create(document.querySelector('#task-textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
