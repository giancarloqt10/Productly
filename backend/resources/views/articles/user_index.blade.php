@extends('layouts.app')

@section('title', 'Articles')

@section('contents')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Articles</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($articles as $article)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
            @endif
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
                <p class="text-gray-600 mb-2">{{ Str::limit($article->intro, 100) }}</p>
                <p class="text-sm text-gray-500">Created on: {{ $article->created_at->format('d/m/Y') }}</p>
                <p class="text-sm text-gray-500">By: {{ $article->user ? $article->user->name : 'Unknown' }}</p>
                <a href="{{ route('articles.show', $article->id) }}" class="mt-4 inline-block btn text-white font-bold py-2 px-4 rounded">
                    Learn More
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
