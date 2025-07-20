@extends('layout.master')

@section('content')
<div class="container-fluid mt-3">
    <div class="row" style="height: calc(100vh - 80px);">
        <div class="col-md-4 border-end" style="overflow-y: auto;">
            <div class="mb-3" id="top-books">
                <h5 class="fw-bold lh-lg tamil-mukta">புத்தகம்</h5>
                <div class="d-flex flex-wrap gap-1 tamil-mukta">
                    @foreach($books as $book)
                        <button class="btn btn-sm btn-outline-primary book-btn flex-grow-1" data-id="{{ $book->id }}" data-name="{{ $book->name_ta }}">
                            {{ $book->name_ta }}
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="mb-3" id="chapters-container" style="display:none;">
                <h6 class="fw-bold tamil-mukta">அத்தியாயம் <span id="sbook-head"></span> <a href="#top-books" class="text-decoration-none ms-2" title="புத்தகத்திற்கு மீண்டும் செல்">🔼</a></h6>
                <div class="d-flex flex-wrap gap-1" id="chapter-buttons"></div>
            </div>

            <div id="verses-container" style="display:none;">
                <h6 class="fw-bold tamil-mukta">வசனம்</h6>
                <div class="d-flex flex-wrap gap-1" id="verse-buttons"></div>
            </div>
        </div>

        <div class="col-md-8" style="overflow-y: auto;">
            <h5 class="fw-bold tamil-mukta" id="xchapter-head"></h5>
            <div id="verse-display" class="border p-3 tamil-mukta" style="min-height: 300px;">
                <p class="text-muted"></p>
            </div>
        </div>
    </div>
</div>

<style>
    html, body {
        height: 100%;
        margin: 0;
        overflow-y: auto;
    }

    #chapter-buttons button,
    #verse-buttons button {
        min-width: 40px;
    }

    .row > .col-md-4,
    .row > .col-md-8 {
        height: 100%;
    }
</style>

@push('endjs')
<script>
let selectedBookId = null;

$('.book-btn').on('click', function () {
    const selectedBookId = $(this).data('id');
    const bookName = $(this).data('name');
    $('#sbook-head').text(`(${bookName})`);

    loadChapters(selectedBookId, true);

    setTimeout(() => {
        const leftCol = $('.col-md-4');
        leftCol.animate({
            scrollTop: leftCol.scrollTop() + $('#chapters-container').position().top - 20
        }, 500);
    }, 300);
});

function loadChapters(bookId, autoSelectFirst = false) {
    $.get(`/api/chapters/${bookId}`, function (data) {
        $('#chapters-container').show();
        $('#chapter-buttons').empty();
        $('#verses-container').hide();
        $('#verse-display').html('<p class="text-muted">Select a verse.</p>');

        data.forEach(function (ch) {
            $('#chapter-buttons').append(`<button class="btn btn-sm btn-secondary me-1 mb-1 chapter-btn">${ch}</button>`);
        });

        $('.chapter-btn').on('click', function () {
            const chapter = $(this).text();
            loadVerses(bookId, chapter);
            setTimeout(() => {
                $('html, body').animate({
                    scrollTop: $('#verses-container').offset().top - 20
                }, 500);
            }, 100);
        });

        if (autoSelectFirst && data.length > 0) {
            loadVerses(bookId, data[0]);
        }
    });
}

function loadVerses(bookId, chapter) {
    $.get(`/api/verses/${bookId}/${chapter}`, function (data) {
        $('#verses-container').show();
        $('#verse-buttons').empty();
        $('#verse-display').empty();

        $('#xchapter-head').html(`அத்தியாயம் ${chapter} - <span class="text-primary">${$('#sbook-head').text()}</span>`);
        data.forEach(function (verse) {
            const leftBtn = $(`
                <a href="/verse/project/${verse.id}" target="verseproject" class="btn btn-sm btn-outline-dark me-1 mb-1">
                    ${verse.verse}
                </a>
            `);
            $('#verse-buttons').append(leftBtn);
        });

        data.forEach(function (verse) {
            const verseBlock = $(`
                <a href="/verse/project/${verse.id}" target="verseproject" class="text-decoration-none text-dark d-block border-bottom py-2 verse-block">
                    <strong>${verse.verse}</strong>. ${verse.text_ta}
                </a>
            `);
            $('#verse-display').append(verseBlock);
        });
    });
}

$(document).ready(function () {
    const firstBtn = $('.book-btn').first();
    if (firstBtn.length) {
        firstBtn.trigger('click');
    }
});
</script>
@endpush

@endsection
