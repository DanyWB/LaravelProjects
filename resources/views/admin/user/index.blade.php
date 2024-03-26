@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small>all</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Posts</th>
                            <th scope="col">%</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->count() > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>###</td>
                                    <td>###</td>
                                    <td><a href="{{ route('admin.user.show', $user->id) }}">Change</a></td>

                                </tr>
                            @endforeach
                        @else
                            <div>
                                User not created
                            </div>
                        @endif
                    </tbody>
                </table>
                <div class="">
                    <a href="{{ route('admin.user.create') }}" class = "btn  btn-primary"> Add </a>
                </div>

            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
