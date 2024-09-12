@extends('layouts.app')
 
@section('title', 'Show Article')
 
@section('contents')
<h1 class="font-bold text-2xl ml-3">{{ $article->title }}</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        @if ($article->image) 
        <div class="sm:col-span-4">
            <div class="mt-2">
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="max-h-64"> 
            </div>
        </div>
        @endif
        <div class="sm:col-span-4">
            <div class="mt-2">
                {{ $article->description }}
            </div>
        </div>
        <div class="sm:col-span-4">
            <div class="mt-2">
                {{ $article->created_at->format('d/m/Y') }} 
            </div>
        </div>
        <div class="sm:col-span-4">
            <div class="mt-2">
                Created by: {{ $article->user ? $article->user->name : 'Unknown' }}
            </div>
        </div>
        </form>
    </div>
</div>
@endsection