@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tags
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
                            <th scope="col">Title</th>
                            <th scope="col">Posts</th>
                            <th scope="col">%</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tags->count() > 0)
                            @foreach ($tags as $tag)
                                <tr>
                                    <th scope="row">{{ $tag->id }}</th>
                                    <td>{{ $tag->title }}</td>
                                    <td>###</td>
                                    <td>###</td>
                                    <td><a href="{{ route('admin.tag.show', $tag->id) }}">Change</a></td>

                                </tr>
                            @endforeach
                        @else
                            <div>
                                Tags not created
                            </div>
                        @endif

                    </tbody>
                </table>
                <div class="">
                    <a href="{{ route('admin.tag.create') }}" class = "btn  btn-primary"> Add </a>
                </div>

            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
