@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                {{ $date->format('F') }} {{ $date->day }}, {{ $date->year }}, {{ $date->format('H:i') }}, Comments:
                {{ $post->comments->count() }}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img style = "max-height: 600px" src="{{ asset('storage/' . $post->main_image) }}" alt="featured image"
                    class="w-100">
            </section>
            <section class="post-content">

                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <div class="d-flex justify-content-between">
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            @auth
                                <form action="{{ route('like.store', $post->id) }}" method ="post">
                                    @csrf
                                    <button type="submit" class="border-0 bg-transparent">
                                        <span>{{ $post->liked_users_count }}</span>
                                        <i
                                            class = "fa{{ auth()->user()->likedPosts->contains($post->id)? 's': 'r' }} fa-heart"></i>
                                    </button>
                                </form>
                            @endauth
                        </div>
                        <p data-aos="fade-up"> {!! $post->content !!}</p>


                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach ($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img style = "max-height: 120px"
                                        src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="related post"
                                        class="post-thumbnail">
                                    <div class="d-flex justify-content-between">
                                        <p class="blog-post-category">{{ $post->category->title }}</p>
                                        @auth
                                            <form action="{{ route('like.store', $post->id) }}" method ="post">
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <span>{{ $post->liked_users_count }}</span>
                                                    <i
                                                        class = "fa{{ auth()->user()->likedPosts->contains($post->id)? 's': 'r' }} fa-heart"></i>
                                                </button>
                                            </form>
                                        @endauth
                                        @guest
                                            <div>
                                                <span>{{ $post->liked_users_count }}</span>
                                                <i class = "far fa-heart"></i>
                                            </div>
                                        @endguest
                                    </div>
                                    <a href="{{ route('post.show', $relatedPost->id) }} class="blog-post-permalink">
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
            </section>
            <section class="comment-section">
                <h2 class="section-title mb-5" data-aos="fade-up">Comments({{ $post->comments->count() }})</h2>
                @auth
                    <form action="{{ route('comment.store', $post->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Content</label>
                                <textarea name="content" id="comment" class="form-control" placeholder="Your comment" rows="10"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="entity_id" value = "{{ $post->id }}">
                        <input type="hidden" name="entity_type" value = "post">
                        <div class="col-12" data-aos="fade-up">
                            <button type="submit" class="btn btn-warning">Send</button>
                        </div>
                    </form>
                @endauth
            </section>
            <section class = "col-6">
                <ul>
                    @foreach ($post->comments as $comment)
                        <div class="my-5">
                            <h4>
                                {{ $comment->user->name }}
                            </h4>
                            <div class="mx-3">
                                {{ $comment->content }}
                            </div>
                        </div>
                    @endforeach
                </ul>
            </section>
        </div>
        </div>
        </div>
    </main>
@endsection
