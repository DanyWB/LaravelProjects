@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Posts
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
                            <th scope="col">Category</th>
                            <th scope="col">Tags</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($posts->count() > 0)
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->title }}</td>
                                    <td>
                                        @foreach ($post->tags as $tag)
                                            <span>
                                                {{ $tag->title }}
                                            </span>
                                        @endforeach

                                    </td>
                                    <td><a href="{{ route('admin.post.show', $post->id) }}">Change</a></td>

                                </tr>
                            @endforeach
                        @else
                            <div>
                                Posts not created
                            </div>
                        @endif

                    </tbody>
                </table>
                <div class="">
                    <a href="{{ route('admin.post.create') }}" class = "btn  btn-primary"> Add </a>
                </div>

            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
