@extends('layouts.main')

@section('content')
    {{-- $songs->links() --}}
    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <div class="bg-pink-100 py-2 px-4 flex justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Artist List</h2>
            <a class="inline-block py-2 px-4 border border-gray-600 bg-pink-300 rounded-md uppercase"
            href="{{ route('artists.create'); }}">
                Create New Artist
            </a>
        </div>
        <ul class="divide-y divide-gray-200">
            @foreach ($artists as $artist)
            <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                <div class="flex-1">
                    <a href="{{ route('artists.show', ['artist' => $artist]) }}">
                        <h3 class="text-lg font-medium text-gray-800">{{ $artist->name }}</h3>
                    </a>
                    <p class="text-gray-600 text-base"></p>
                </div>
                <span class="text-gray-400"></span>
            </li>
            @endforeach
        </ul>
    </div>

    {{-- $songs->links() --}}
@endsection