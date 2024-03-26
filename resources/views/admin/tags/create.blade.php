@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tags
                <small>add category</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="">
                    <form method="POST" action="{{ route('admin.tag.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name = "title" type="text" class="form-control" id="title" placeholder="Title">
                        </div>
                        <div style = "color:red;">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
