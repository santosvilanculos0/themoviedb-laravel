<x-layout>
    <div class="page">
        <div class="page-wrapper">
            <div class="page-header">
                <div class="container-xl">
                    <div class="row text-center">
                        <a href="{{ route('home') }}">Página inicial</a>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="row mb-4">
                        <div class="col-12">
                            <img src="https://image.tmdb.org/t/p/w1280/{{ $data['backdrop_path'] }}"
                                alt="{{ $data['original_title'] }}" class="ratio ratio-16x9">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Título Original</div>
                                    <div class="datagrid-content">{{ $data['original_title'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Título</div>
                                    <div class="datagrid-content">{{ $data['title'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Empresas de Produção</div>
                                    <div class="datagrid-content">
                                        <div class="list-inline list-inline-dots">
                                            @forelse ($data['production_companies'] as $production_companies)
                                                <div class="list-inline-item">
                                                    {{-- TODO: image --}}
                                                    {{ $production_companies['name'] }}
                                                </div>
                                            @empty
                                                -
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Adulto</div>
                                    <div class="datagrid-content">{{ $data['adult'] ? 'Sim' : 'Não' }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Orçamento</div>
                                    <div class="datagrid-content">${{ $data['budget'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Géneros</div>
                                    <div class="datagrid-content">
                                        <div class="list-inline list-inline-dots">
                                            @forelse ($data['genres'] as $genre)
                                                <div class="list-inline-item">
                                                    {{ $genre['name'] }}
                                                </div>
                                            @empty
                                                -
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Homepage</div>
                                    <div class="datagrid-content">{{ $data['homepage'] ?? '-' }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">TMDB ID</div>
                                    <div class="datagrid-content">{{ $data['id'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">IMDB ID</div>
                                    <div class="datagrid-content">{{ $data['imdb_id'] ?? '-' }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">País de Origem</div>
                                    <div class="datagrid-content">
                                        <div class="list-inline list-inline-dots">
                                            @forelse ($data['origin_country'] as $origin_country)
                                                <div class="list-inline-item">
                                                    {{ $origin_country }}
                                                </div>
                                            @empty
                                                -
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Idioma Original</div>
                                    <div class="datagrid-content">{{ $data['original_language'] ?? '-' }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Popularidade</div>
                                    <div class="datagrid-content">{{ $data['popularity'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Data de Lançamento</div>
                                    <div class="datagrid-content">{{ $data['release_date'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Duração</div>
                                    <div class="datagrid-content">{{ $data['runtime'] }}min</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Idiomas Falados</div>
                                    <div class="datagrid-content">
                                        <div class="list-inline list-inline-dots">
                                            @forelse ($data['spoken_languages'] as $spoken_languages)
                                                <div class="list-inline-item">
                                                    {{ $spoken_languages['name'] }}
                                                </div>
                                            @empty
                                                -
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Status</div>
                                    <div class="datagrid-content">{{ $data['status'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p class="text-secondary text-sm">{{ $data['overview'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" rel="noopener noreferrer" class="link-secondary">
                                        Lorem ipsum
                                    </a>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" rel="noopener noreferrer" class="link-secondary">
                                        Lorem ipsum
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" rel="noopener noreferrer" class="link-secondary">
                                        Lorem ipsum
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright © {{ now()->year }}
                                    <a href="#" class="link-secondary">{{ config('app.name') }}</a>. Todos os
                                    direitos reservados.
                                </li>
                                <li class="list-inline-item">
                                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                                        v0.0.1-beta1
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</x-layout>
