@extends('layouts.main')
@section('content')
    <main class="blog-post">
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
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{ asset('storage/'.$post->preview_image) }}" alt="related post" class="post-thumbnail">
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
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Comments:</h2>
                        @foreach($comments as $comment)
                            <div class="row">
                                <h4 class="form-group col-12" data-aos="fade-up">
                                    {{ $comment->user->name }}:
                                </h4>
                                <div class="form-group col-12" data-aos="fade-up">
                                    {{ $comment->message }}
                                </div>
                            </div>
                        @endforeach
                    </section>
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a comment</h2>
                        <form action="{{ route('personal.comment.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="message" class="form-control" placeholder="Enter comment" rows="10"></textarea>
                                </div>
                            </div>
                            <input name="post_id" type="hidden" value="{{ $post->id }}">
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
