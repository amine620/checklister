@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-8" style="margin-left: 300px">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>{{ __('Register Time') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Website') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)

                                        <tr>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->website }}</td>
                                            <td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
