@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 " style="
            margin-left: 300px;
            margin-top: 100px;
             ">
                <div class="card">
                    <div class="card-header">{{ $page->title }}</div>

                    <div class="card-body">


                        {!! $page->content !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
