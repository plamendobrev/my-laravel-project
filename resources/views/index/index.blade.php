@extends('layouts.app')

@section('content')
    <div>
        <div class="search-container">
            <input type="text" id="search-query" placeholder="Playgrounds">
            <select id="genre-filter">
                <option value="">All Genres</option>
                
            </select>
            <select id="rating-filter">
                <option value="desc">Highest Rating</option>
                <option value="asc">Lowest Rating</option>
            </select>
            <button id="search-button">Search</button>
        </div>

        <div id="results-container">
            <!-- Results will be displayed here -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        let requestInProcess = false;

        // Set up CSRF token for Ajax requests
        $.ajaxSetup({
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            "url": '/genres',
            "method": 'GET',
            "success": function (data) {
                $.each(data, function (index, genre) {
                    $('#genre-filter').append(`<option value="${genre.id}">${genre.name}</option>`);
                });
            }
        });

        let page = 1;

        const searchGames = function() {
            if (!requestInProcess) {
                requestInProcess = true;

                const nameSearch = $('#search-query').val();
                const genreID = $('#genre-filter').val();
                const rating = $('#rating-filter').val();

                $.ajax({
                    url: '/search',
                    method: 'POST',
                    data: {
                        "name_search": nameSearch,
                        "genre_id": genreID,
                        "rating": rating,
                        "page": page,
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        requestInProcess = false;
                        
                        if (page === 1) {
                            $('#results-container').empty();
                        }

                        if (data.length === 0) {
                            if (page === 1) {
                                $('#results-container').text("No results found.");
                            }
                        }
                        else {
                            $.each(data, function (index, game) {
                                $('#results-container').append(`
                                    <div class="game-item">
                                        <div>` + function() {
                                            if (!game.cover) {
                                                return `<div class="empty-cover"></div>`;
                                            }
                                            else {
                                                return `<img alt="" src="` + game.cover + `">`;
                                            }
                                        }() + `</div>
                                        <div>
                                            <h3>${game.name}</h3>` + function() {
                                                if (!game.description) {
                                                    return ``;
                                                }
                                                else {
                                                    return `<p style="font-style: italic;">` + game.description + `</p>`;
                                                }
                                            }() + `
                                            <p><span style="color: #000;">Release Date:</span> ${game.release_date}</p>
                                            <p><span style="color: #000;">Genres:</span> ${game.genres.map(g => g.name).join(', ')}</p>
                                            <p><span style="color: #000;">Rating:</span> ${game.rating}/5</p>
                                        </div>
                                    </div>
                                `);
                            });
                        }
                    }
                });
            }
        }

        $('#search-button').on('click', function () {
            page = 1;

            searchGames(null);
        });

        $(window).on('scroll', function() {
            if ($(".game-item").length !== 0 && $(window).scrollTop() + $(window).height() >= $(document).height() - $("footer").height()) {
                page++;

                searchGames(page);
            }
        })
    });
</script>
@endsection