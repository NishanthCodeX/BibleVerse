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
      font-weight: bold;
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
    <div id="verse">
      <div class="verse-ref {{ $settings['project_tamil_font'] }}">{{ $verse->getBook->name_ta}} {{ $verse->chapter}}:{{ $verse->verse}}</div>
      <div class="{{ $settings['project_tamil_font'] }}">{{ $verse->text_ta }}</div>
  </div>
</div>
@endsection

@push('endjs')
<script>
  const verseElement = document.getElementById("verse");
  const container = document.getElementById("container");

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
    verseElement.classList.add("show");
  }

  window.addEventListener("load", () => {
    adjustFontSize();
  });
</script>
@endpush