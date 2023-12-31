@extends('layouts.main')

@section('content')
<h1 class="text-5xl text-center">
    Artist : {{ $artist->name }}
</h1>
<br>
<div class="flex justify-center">
    @can('update', $artist)
        <a class="inline-block py-2 px-4 border border-gray-600 bg-pink-300 rounded-md uppercase"
                href="{{ route('artists.edit', ['artist' => $artist]); }}">
                    Edit Artist
        </a>
    @endcan

    @can('destroy', $artist)
        @if($artist->songs->isEmpty())
            <form class="inline-block"
            action="{{ route('artists.destroy' , ['artist' => $artist]) }}" method="POST">
                @csrf
                @method("DELETE")

                <button type="submit"
                        class="inline-block py-2 px-4 border border-gray-600 bg-pink-300 rounded-md uppercase">
                Delete Aritst
                </button>
            </form>
        @endif
    @endcan
</div>

    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <div class="bg-pink-100 py-2 px-4 flex justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Songs</h2>
            @can('update', $artist)
                <a class="inline-block py-2 px-4 border border-gray-600 bg-pink-300 rounded-md uppercase"
                    href="{{ route('artists.songs.create', ['artist' => $artist]); }}">
                        Add New Song
                </a>
            @endcan
        </div>
        <ul class="divide-y divide-gray-200">
            @foreach ($artist->songs as $song)
            <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                <div class="flex-1">
                    <h3 class="text-lg font-medium text-gray-800">{{ $song->title }}</h3>
                    <p class="text-gray-600 text-base">{{ $song->artist->name }}</p>
                </div>
                <span class="text-gray-400">{{ $song->duration }}</span>
            </li>
            @endforeach
        </ul>
    </div>
@endsection