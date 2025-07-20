@extends('layout.admin.master')

@section('content')
<div class="container-fluid pt-3">
    <div class="row" style="height: calc(100vh - 80px);">
        <div class="col-md-4 border-end" style="overflow-y: auto;">
            <div class="mb-3">
                <h5 class="fw-bold lh-lg tamil-mukta">புத்தகம்</h5>
                <div class="d-flex flex-wrap gap-1 tamil-mukta">
                    @foreach($books as $book)
                        <button class="btn btn-sm btn-outline-dark fw-bold book-btn flex-grow-1" data-id="{{ $book->id }}" data-name="{{ $book->name_ta }}">
                            {{ $book->name_ta }}
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="mb-3" id="chapters-container" style="display:none;">
                <h6 class="fw-bold tamil-mukta">அத்தியாயம் (<span id="sbook-head"></span>) <a href="" onclick="smoothScrollTo('top'); return false;" class="text-decoration-none ms-2" title="புத்தகத்திற்கு மீண்டும் செல்"><i class="fa-solid fa-circle-up fs-4"></i></a></h6>
                <div class="d-flex flex-wrap gap-1" id="chapter-buttons"></div>
            </div>

            <div class="mb-3" id="verses-container" style="display:none;">
                <h6 class="fw-bold tamil-mukta">வசனம் <a href="" onclick="smoothScrollTo('top'); return false;" class="text-decoration-none ms-2" title="புத்தகத்திற்கு மீண்டும் செல்"><i class="fa-solid fa-circle-up fs-4"></i></a></h6>
                <div class="d-flex flex-wrap gap-1" id="verse-buttons"></div>
            </div>
        </div>

        <div class="col-md-8" style="overflow-y: auto;">
            <h5 class="fw-bold tamil-mukta pt-4 pt-md-3 pb-2" id="xchapter-head"></h5>
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

    @media (min-width: 768px) {
        .row > .col-md-4,
        .row > .col-md-8 {
            height: calc(100vh - 80px);
            overflow-y: auto;
        }
    }

    @media (max-width: 767.98px) {
        .row > .col-md-4,
        .row > .col-md-8 {
            height: auto;
            overflow: visible;
        }
    }
</style>

@push('endjs')
<script>
let selectedBookId = null;

$('.book-btn').on('click', function () {
    const selectedBookId = $(this).data('id');
    const bookName = $(this).data('name');
    $('#sbook-head').text(`${bookName}`);

    loadChapters(selectedBookId, true);
    setTimeout(() => smoothScrollTo('#chapters-container'), 300);
});

function loadChapters(bookId, autoSelectFirst = false) {
    $.get(`/api/chapters/${bookId}`, function (data) {
        $('#chapters-container').show();
        $('#chapter-buttons').empty();
        $('#verses-container').hide();
        $('#verse-display').empty();

        data.forEach(function (ch) {
            $('#chapter-buttons').append(`<button class="btn btn-sm btn-dark me-1 mb-1 chapter-btn">${ch}</button>`);
        });

        $('.chapter-btn').on('click', function () {
            const chapter = $(this).text();
            loadVerses(bookId, chapter);

            setTimeout(() => smoothScrollTo('#verses-container'), 300);
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

        const bookName = $('#sbook-head').text();
        $('#xchapter-head').html(`<span class="text-primary">${bookName}</span> - அத்தியாயம் ${chapter}`);

        data.forEach(function (verse) {
            const btn = $(`
                <button class="btn btn-sm btn-outline-dark me-1 mb-1 verse-btn" data-id="${verse.id}">
                    ${verse.verse}
                </button>
            `);
            $('#verse-buttons').append(btn);
        });

        data.forEach(function (verse) {
            const verseBlock = $(`
                <div class="text-dark d-block border-bottom py-2 verse-block">
                    <strong>${verse.verse}</strong>. ${verse.text_ta}
                </div>
            `);
            $('#verse-display').append(verseBlock);
        });

        $('.verse-btn').on('click', function () {
            const verseId = $(this).data('id');
            const $btn = $(this);

            $.post("{{ route('admin.project-verse.store') }}", {
                _token: '{{ csrf_token() }}',
                verse_id: verseId,
            }, function (res) {
                if (res.status === 'success') {
                    $('.verse-btn').removeClass('btn-success').addClass('btn-outline-dark');

                    $(`.verse-btn[data-id="${verseId}"]`).removeClass('btn-outline-dark').addClass('btn-success');
                }
            });
        });
    });
}
</script>

<script>
    function smoothScrollTo(targetSelector) {
        const isMobile = window.innerWidth < 768;
        if (targetSelector == 'top') {
            if (isMobile) {
                $('html, body').animate({ scrollTop: 0 }, 500);
            } else {
                const leftCol = $('.col-md-4');
                leftCol.animate({ scrollTop: 0 }, 500);
            }
            return;
        }

        const target = $(targetSelector);
        if (!target.length) return;

        if (isMobile) {
            if(targetSelector=='#chapters-container')
            {
                target.get(0).scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        } else {
            const leftCol = $('.col-md-4');
            leftCol.animate({
                scrollTop: leftCol.scrollTop() + target.position().top - 20
            }, 500);
        }
    }
</script>
@endpush

@endsection
