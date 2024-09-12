@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
<div class="container mx-auto px-4">
    @if(auth()->user()->type == 'admin')
        <h1 class="font-bold text-2xl ml-3">Latest Contact Messages</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($contacts as $contact)
                <div class="bg-white rounded-lg shadow-md overflow-hidden p-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $contact->name }}</h3>
                    <p class="text-gray-600 mb-2">{{ $contact->email }}</p>
                    <p class="text-gray-600 mb-2">{{ $contact->phone }}</p>
                    <p class="text-gray-600 mb-2">{{ $contact->address }}</p>
                    <p class="text-gray-600 mb-2">{{ $contact->zip }}</p>
                    <p class="text-gray-600 mb-2">{{ $contact->city }}</p>
                    @if($contact->file)
                        <a href="{{ Storage::url($contact->file) }}" target="_blank" class="mt-4 inline-block btn text-white font-bold py-2 px-4 rounded">
                            View File
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <h1 class="font-bold text-2xl ml-3">Latest Articles</h1>
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
    @endif
</div>
@endsection