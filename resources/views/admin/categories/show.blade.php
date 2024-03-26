@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Categories
                <small>change</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="">
                    <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name = "title" type="text" class="form-control" id="title" placeholder="Title"
                                value="{{ $errors->any() ? old('title') : $category->title }}">
                        </div>
                        <div style = "color:red;">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                    <form method="POST" action="{{ route('admin.category.destroy', $category->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" style="margin-top:15px" class="btn btn-danger" ">Delete</button>
                                </form>
                            </div>
                        </div>
                    </section><!-- /.content -->
                </div><!-- /.content-wrapper -->
@endsection
