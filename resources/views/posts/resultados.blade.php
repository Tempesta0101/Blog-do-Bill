@extends('layouts.app') {{-- ou o layout principal que você usa --}}

@section('content')
    <div class="container mt-4">
        <h2>Resultados para: "{{ $termo }}"</h2>

        @if($posts->isEmpty())
            <p>Nenhum post encontrado.</p>
        @else
            @foreach($posts as $post)
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->titulo }}</h5>
                        <p class="card-text">{{ Str::limit($post->conteudo, 150) }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-info">Ler mais</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
