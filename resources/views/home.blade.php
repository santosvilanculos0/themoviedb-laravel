<x-layout>
    <div class="page">
        <div class="page-wrapper">
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">Filmes</h2>
                            @php
                                $page = $data['page'];
                                $total_pages = $data['total_pages'];
                                $total_results = $data['total_results'];

                                // Calculate items per page
                                $items_per_page = ceil($total_results / $total_pages);

                                // Calculate start and end indices
                                $start_index = ($page - 1) * $items_per_page + 1;
                                $end_index = min($start_index + $items_per_page - 1, $total_results);
                            @endphp

                            <div class="text-secondary mt-1">
                                {{ $start_index }}-{{ $end_index }}
                                de
                                {{ $data['total_results'] }} filmes</div>
                        </div>

                        <div class="col-auto ms-auto d-print-none">
                            <form action="{{ route('home') }}" method="GET" autocomplete="off" novalidate>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        {{-- http://tabler-icons.io/i/search --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                    </span>

                                    <input type="text" name="query" class="form-control"
                                        value="{{ request()->get('query') }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-body">
                <div class="container-xl">


                    @unless ($data['total_results'] >= 1)
                        <div class="row">
                            <div class="col-12">
                                <div class="empty">
                                    <div class="empty-icon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/mood-sad -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="9" y1="10" x2="9.01" y2="10"></line>
                                            <line x1="15" y1="10" x2="15.01" y2="10"></line>
                                            <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path>
                                        </svg>
                                    </div>
                                    <p class="empty-title">No results found</p>
                                    <p class="empty-subtitle text-muted">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit necessitatibus
                                        aliquid consectetur.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row row-cards">
                            @foreach ($data['results'] as $movie)
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm h-100">
                                        <a href="{{ route('movies.show', ['id' => $movie['id']]) }}" class="d-block"><img
                                                src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}"
                                                class="card-img-top"></a>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div>{{ $movie['original_title'] }}</div>
                                                    <div class="text-secondary">{{ $movie['release_date'] }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endunless

                    @if ($data['total_pages'] > 1)
                        <div class="d-flex mt-4">
                            @php
                                $page = $data['page'];
                                $next_page = $page + 1;
                                $previous_page = $page - 1;

                                if ($previous_page < 1) {
                                    $previous_page = 1;
                                }

                                if ($next_page > $total_pages) {
                                    $next_page = $total_pages;
                                }

                                // Disable previous link if on the first page
                                $previous_disabled = $page == 1;

                                // Disable next link if on the last page
                                $next_disabled = $page == $total_pages;
                            @endphp
                            <ul class="pagination ms-auto">
                                <li class="page-item">
                                    <a @class(['page-link', 'disabled' => $previous_disabled]) @disabled($previous_disabled)
                                        href="{{ route('home', ['page' => $previous_page]) }}" tabindex="-1">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M15 6l-6 6l6 6"></path>
                                        </svg>
                                        Anterior
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a @class(['page-link', 'disabled' => $next_disabled]) href="{{ route('home', ['page' => $next_page]) }}"
                                        @disabled($next_disabled)>
                                        Proxima
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 6l6 6l-6 6"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" rel="noopener noreferrer"
                                        class="link-secondary">
                                        Documentation
                                    </a>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" rel="noopener noreferrer"
                                        class="link-secondary">
                                        License
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank" rel="noopener noreferrer"
                                        class="link-secondary">
                                        Source code
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright © {{ now()->year }}
                                    <a href="." class="link-secondary">{{ config('app.name') }}</a>. All rights
                                    reserved.
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
