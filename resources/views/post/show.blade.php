@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="fa-align-right">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Main</a></li>
                <li class="breadcrumb-item active">{{ $post->id }}</li>
            </ol>
        </div><!-- /.col -->
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                Создано: {{ $date->day }} {{ $date->translatedFormat('F') }} {{ $date->year }},
                {{ $date->format('H:i') }} •
                Комментариев: {{ $post->comments->count() }}
            </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/'.$post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{!! $post->content !!}</p>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="mb-5">
                        @auth
                            <form action="{{ route('post.liked.store', $post->id) }}" method="post">
                                @csrf
                                <button type="submit" class="border-0 bg-transparent">
                                    @if(auth()->user()->likedPosts->contains($post))
                                        <i class="nav-icon fas fa-solid fa-star"></i>
                                    @else
                                        <i class="nav-icon far fa-solid fa-star"></i>
                                    @endif
                                    <span>{{ $post->likedUsers->count() > 0 ? $post->likedUsers->count() : ''}}</span>
                                </button>
                            </form>
                        @endauth
                        @guest
                            <i class="nav-icon far fa-solid fa-star"></i>
                            <span>{{ $post->likedUsers->count() > 0 ? $post->likedUsers->count() : ''}}</span>
                        @endguest
                    </section>
                    <section class="related-posts">
                        @if($relatedPosts->count() > 0)
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        @endif
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{ asset('storage/'.$relatedPost->preview_image) }}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{ $relatedPost->category->title }}</p>
                                <a href="{{ route('post.show', $relatedPost->id) }}">
                                    <h5 class="post-title">
                                        {{ $relatedPost->title }}
                                    </h5>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    <h2 class="section-title mb-5" data-aos="fade-up">Comments: ({{ $post->comments->count() }})</h2>
                    <section class="comment-list">
                        @foreach($comments as $comment)
                        <div class="comment-text mb-3">
                            <span class="username">
                              {{ $comment->user->name }}
                                <span class="text-muted float-right">
                                    {{ $comment->dateAsCarbon->diffForHumans() }}
                                </span>
                                <div>
                                    {{ $comment->message }}
                                </div>
                            </span>
                        </div>
                        @endforeach
                    </section>
                    @auth
                    <section class="comment-section mt-5">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a comment</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="message" class="form-control" placeholder="Enter comment" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
