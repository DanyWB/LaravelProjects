@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Posts
                <small>change</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="">
                    <form method="POST" action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input value = "{{ $errors->any() ? old('title') : $post->title }}" name = "title"
                                class="form-control" type = "text" id="title"></input>

                            @error('title')
                                <p class = "text-danger flex justify-center">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name = "content" class="form-control" id="content" rows = "2"> {{ $errors->any() ? old('content') : $post->content }}</textarea>
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
                            <select class="form-select" id ="category" name = "category_id">
                                <option selected disabled>Category</option>
                                @foreach ($categories as $category)
                                    <option
                                        {{ $errors->any() ? (old('category_id') == $category->id ? 'selected' : '') : ($category->id == $post->category_id ? 'selected' : '') }}
                                        value="{{ $category->id }}">
                                        {{ $category->title }}
                                    </option>
                                @endforeach

                            </select>
                        </div><br>
                        <div class="mb-3">
                            <label for="tags">Tags</label><br>
                            <select name = "tags[]" id = "tags" class="form-select" multiple
                                aria-label="multiple select example">
                                @foreach ($tags as $tag)
                                    <option
                                        @foreach ($post->tags as $postTag)
                {{ $errors->any() ? (old('tags') != null && in_array($tag->id, old('tags')) ? 'selected' : '') : ($tag->id == $postTag->id ? 'selected' : '') }} @endforeach
                                        value="{{ $tag->id }}">
                                        {{ $tag->title }}
                                    </option>
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
                            <input value="{{ $errors->any() ? old('preview_image') : $post->preview_image }}"
                                name="preview_image" type="file" id="exampleInputFile">
                            @error('preview_image')
                                <p class = "text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div style = "max-width: 500px; max-height: 200px;">
                            <img style = "max-width: 500px; max-height: 200px;object-fit:cover;"
                                src="{{ asset('storage/' . $post->preview_image) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Page image</label>
                            <input value="{{ $errors->any() ? old('preview_image') : $post->preview_image }}"
                                name="main_image" type="file" id="exampleInputFile">
                            @error('main_image')
                                <p class = "text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div style = "max-width: 500px; max-height: 200px;">
                            <img style = "max-width: 500px; max-height: 200px;object-fit:cover;"
                                src="{{ asset('storage/' . $post->main_image) }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>

                    <form method="POST" action="{{ route('admin.post.destroy', $post->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" style="margin-top:15px" class="btn btn-danger" ">Delete</button>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </section><!-- /.content -->
                                                                            </div><!-- /.content-wrapper -->
@endsection
