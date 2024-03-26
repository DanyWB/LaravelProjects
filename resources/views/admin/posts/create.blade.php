@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Posts
                <small>add category</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="">
                    <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input value = "{{ old('title') }}" name = "title" class="form-control" type = "text"
                                id="title"></input>

                            @error('title')
                                <p class = "text-danger flex justify-center">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea placeholder="Content" name = "content" class="form-control" id="content" rows = "2">{{ old('content') }}</textarea>
                            @error('content')
                                <p class = "text-red-600 text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input value = "{{ old('image') }}" name = "image" class="form-control" type = "text" id="image"></input>
                            @error('image')
                                <p class = "text-red-600 text-danger">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        <br>

                        <div class="mb-3">
                            <label for="category">Category</label><br>
                            <select style="width:150px;" class="form-select" id ="category" name = "category_id">
                                <option disabled>Category</option>
                                @foreach ($categories as $category)
                                    <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">
                                        {{ $category->title }}</option>
                                @endforeach
                                @error('category_id')
                                    <p class = "text-red-600 text-danger">{{ $message }}</p>
                                @enderror
                            </select>
                        </div><br>
                        <div class="mb-3">
                            <label for="tags">Tags</label><br>
                            <select style="width:150px;" name = "tags[]" id = "tags" class="form-select" multiple
                                aria-label="multiple select example">
                                @foreach ($tags as $tag)
                                    <option {{ old('tags') != null && in_array($tag->id, old('tags')) ? 'selected' : '' }}
                                        value="{{ $tag->id }}">
                                        {{ $tag->title }}</option>
                                @endforeach
                            </select>
                            @error('tags[]')
                                <p class = "text-danger">{{ $message }}</p>
                            @enderror
                            @error('tags.* ')
                                <p class = "text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Preview</label>
                            <input name="preview_image" type="file" id="exampleInputFile">
                            @error('preview_image')
                                <p class = "text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Page image</label>
                            <input name="main_image" type="file" id="exampleInputFile">
                            @error('main_image')
                                <p class = "text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
