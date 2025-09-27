@extends('khoshkbar.layout.master')

@section('content')
    <style>
        .recent-articles {
            background-color: #f3f1f1;
            padding: 20px;
            border-radius: 8px;
            margin-top: 10px;

        }

        .subheader {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .articles-list {
            list-style-type: none;
            padding: 0;
        }

        .article-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            background-color: #ffffff;
            border-radius: 10px;

        }

        .article-item a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
        }

        .article-img {
            width: 60px;
            height: 60px;
            margin-right: 10px;
        }

        .article-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .article-text p {
            font-size: 13px;
            margin: 0;
            margin-right: 10px;
        }

        .article-item a:hover .article-text p {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .article-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .article-img {
                width: 100px;
                height: 100px;
            }
        }
    </style>
    <section class="container-fluid inner-section">
        <div class="container p-0">
            <div class="row mt-4 mb-4">
                <!-- بخش اصلی مقاله -->
                <div class="col-md-8 col-12">
                    <div class="header-news">
                        <h1 class="subheader">{{ $posts->name }}</h1>
                    </div>
                    <div class="text">
                        {!! $posts->content !!}
                    </div>
                </div>


                <div class="col-md-4 col-12">
                    <div
                        class="recent-articles bg-gradient-to-br from-green-50 to-yellow-50 rounded-2xl p-6 shadow-lg border border-green-100">
                        <div class="flex items-center mb-6">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-green-500 to-yellow-500 rounded-full flex items-center justify-center ml-3">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                                    <path
                                        d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">آخرین مقالات</h2>
                        </div>
                        <div class="space-y-4">
                            @foreach ($lastedpost as $post)
                                <div
                                    class="article-item bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden group">
                                    <a href="{{ route('Post', $post->id) }}" class="block hover:no-underline">
                                        <div class="flex items-center p-4">
                                            <div class="article-img flex-shrink-0 ml-4">
                                                <img src="{{ asset('AdminAssets.Post-image/' . $post->image) }}"
                                                    alt="طرز تهیه سس پستو ایتالیایی"
                                                    class="w-16 h-16 object-cover rounded-lg group-hover:scale-105 transition-transform duration-300 bg-gray-200">
                                            </div>
                                            <div class="article-text flex-1">
                                                <p
                                                    class="text-gray-800 font-medium leading-relaxed group-hover:text-green-700 transition-colors duration-300">
                                                    {{ substr($post->name, 0, 100) }}
                                                </p>
                                                <div class="flex items-center mt-2">
                                                    <div
                                                        class="w-4 h-0.5 bg-gradient-to-r from-green-400 to-yellow-400 rounded-full">
                                                    </div>
                                                    <span class="text-xs text-gray-500 mr-2">مطالعه بیشتر</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                        <!-- View All Button -->
                        <div class="mt-6 text-center">
                            <a href="{{ route('Allpost') }}"
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-yellow-500 text-white font-medium rounded-full hover:from-green-600 hover:to-yellow-600 transition-all duration-300 shadow-md hover:shadow-lg">
                                <span>مشاهده همه مقالات</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="mr-2">
                                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

    </section>
     <script src="https://cdn.tailwindcss.com"></script>
@endsection
