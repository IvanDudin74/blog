@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="fa-align-right">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Main</li>
            </ol>
        </div><!-- /.col -->
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <div class="row mb-5">
            Categories:
                <form action="{{ route('post.index') }}" method="get">
                    @csrf
                    @method('get')
                    <select name="category_id">
                        <option value="">All</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                {{ ($category->id == $_GET['category_id']) ? 'selected' : '' }}
                        >
                            {{ $category->title }}
                        </option>
                        @endforeach
                        <input type="submit" value="search">
                    </select>
                </form>
            </div>
            <section class="featured-posts-section">
                <div class="row mb-3">
                    @foreach($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('storage/'.$post->preview_image) }}" alt="blog post">
                        </div>
                        <p class="blog-post-category">{{ $post->category->title}}</p>
                        <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                        </a>
                        @auth
                        <form action="{{ route('post.liked.store', $post->id) }}" method="post">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent">
                                @if(auth()->user()->likedPosts->contains($post))
                                    <i class="nav-icon fas fa-solid fa-star"></i>
                                @else
                                    <i class="nav-icon far fa-solid fa-star"></i>
                                @endif
                                <span>{{ $post->liked_users_count > 0 ? $post->liked_users_count : ''}}</span>
                            </button>
                        </form>
                        @endauth
                        @guest
                            <i class="nav-icon far fa-solid fa-star"></i>
                            <span>{{ $post->liked_users_count > 0 ? $post->liked_users_count : ''}}</span>
                        @endguest
                    </div>
                    @endforeach
                </div>
            </section>
            <div class="row align-center mb-5">
                {{ ($posts->count() == 0) ? 'No posts' : ''}}
            </div>
            <div class="row mb-5">
                <div class="mx-auto">

                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $randomPost)
                            <div class="col-md-6 blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ asset('storage/'.$randomPost->preview_image) }}" alt="blog post">
                                </div>
                                <p class="blog-post-category">{{ $randomPost->category->title }}</p>
                                <a href="{{ route('post.show', $randomPost->id) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $randomPost->title }}</h6>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Popular posts</h5>
                        @foreach($likedPosts as $likedPost)
                        <ul class="post-list">
                            <li class="post">
                                <a href="{{ route('post.show', $randomPost->id) }}" class="post-permalink media">
                                    <img src="{{ asset('storage/'.$likedPost->preview_image) }}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $likedPost->title }}</h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <img src="assets/images/blog_widget_categories.jpg" alt="categories" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
