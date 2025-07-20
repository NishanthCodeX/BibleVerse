@extends('layout.master-plain')

@push('headcss')
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      font-family: Arial, sans-serif;
      color: white;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url('/images/bg3.jpg');
    }

    #container {
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 40px 100px;
      box-sizing: border-box;
    }

    #verse {
      width: 100%;
      opacity: 0;
      transition: opacity 1s ease-in-out;
      word-wrap: break-word;
      font-weight: 900;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    #verse.show {
      opacity: 1;
    }

    #verse > div:first-child {
      margin-bottom: 30px;
    }
  </style>
@endpush
@section('content')
<div id="container">
    <input type="hidden" id="current_verse_id" value="">
    <div id="verse" class="show">
        <div class="verse-ref {{ $settings['project_tamil_font'] }}"></div>
        <div class="{{ $settings['project_tamil_font'] }}"></div>
    </div>
</div>
<input type="hidden" id="ulink" value="{{ $ulink }}">
@endsection

@push('endjs')
<script>
  const verseElement = document.getElementById("verse");
  const container = document.getElementById("container");
  const currentVerseIdInput = document.getElementById("current_verse_id");

  function adjustFontSize() {
    const maxFontSize = 60;
    const minFontSize = 18;
    let fontSize = maxFontSize;

    verseElement.style.fontSize = fontSize + "px";

    const computedStyle = getComputedStyle(container);
    const paddingX = parseFloat(computedStyle.paddingLeft) + parseFloat(computedStyle.paddingRight);
    const paddingY = parseFloat(computedStyle.paddingTop) + parseFloat(computedStyle.paddingBottom);

    const maxHeight = container.clientHeight - paddingY;
    const maxWidth = container.clientWidth - paddingX;

    while (
      (verseElement.scrollHeight > maxHeight || verseElement.scrollWidth > maxWidth)
      && fontSize > minFontSize
    ) {
      fontSize -= 1;
      verseElement.style.fontSize = fontSize + "px";
    }
  }

  function updateVerseDisplay(verse) {
    const fontClass = "{{ $settings['project_tamil_font'] }}";
    verseElement.innerHTML = `
      <div class="verse-ref ${fontClass}">${verse.book} ${verse.chapter}:${verse.verse}</div>
      <div class="${fontClass}">${verse.text_ta}</div>
    `;
    adjustFontSize();
  }

  async function pollLatestVerse() {
    try {
      const ulink = document.getElementById('ulink').value;
      const res = await fetch(`/api/project-verse/latest/${encodeURIComponent(ulink)}`);
      const data = await res.json();

      if (data.id && data.id != currentVerseIdInput.value) {
        currentVerseIdInput.value = data.id;
        updateVerseDisplay(data);
      }
    } catch (err) {
      console.error('Polling error:', err);
    }
  }

  // Initial adjustment
  window.addEventListener("load", () => {
    setInterval(pollLatestVerse, 500);
  });
</script>
@endpush