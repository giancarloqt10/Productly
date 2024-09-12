@extends('layouts.app')

@section('title', 'All Messages')

@section('contents')
<div class="container mx-auto px-4">
    <h1 class="font-bold text-2xl ml-3">All Contact Messages</h1>
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
</div>
@endsection
