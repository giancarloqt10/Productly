@extends('layouts.app')

@section('title', 'Message Detail')

@section('contents')
<div class="container mx-auto px-4">
    <h1 class="font-bold text-2xl ml-3">Message Detail</h1>
    <div class="bg-white rounded-lg shadow-md overflow-hidden p-4">
        <h3 class="text-xl font-semibold mb-2">{{ $message->name }}</h3>
        <p class="text-gray-600 mb-2">{{ $message->email }}</p>
        <p class="text-gray-600 mb-2">{{ $message->phone }}</p>
        <p class="text-gray-600 mb-2">{{ $message->address }}</p>
        <p class="text-gray-600 mb-2">{{ $message->zip }}</p>
        <p class="text-gray-600 mb-2">{{ $message->city }}</p>
        <p class="text-gray-600 mb-2">{{ $message->message }}</p>
        @if($message->file)
            <a href="{{ Storage::url($message->file) }}" target="_blank" class="mt-4 inline-block btn text-white font-bold py-2 px-4 rounded">
                View File
            </a>
        @endif
    </div>
</div>
@endsection
