@extends('layout.admin.master')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Font Settings</h4>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="home_tamil_font" class="form-label">Homepage Tamil Font</label>
            <select name="home_tamil_font" id="home_tamil_font" class="form-select">
                @foreach($fonts as $key => $value)
                    <option value="{{ $key }}" class="{{ $value }}"
                        @if($settings['home_tamil_font'] == $key) selected @endif>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="project_tamil_font" class="form-label">Project Page Tamil Font</label>
            <select name="project_tamil_font" id="project_tamil_font" class="form-select">
                @foreach($fonts as $key => $value)
                    <option value="{{ $key }}" class="{{ $value }}"
                        @if($settings['project_tamil_font'] == $key) selected @endif>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="project_tamil_weight" class="form-label">Project Page Tamil Weight</label>
            <select name="project_tamil_weight" id="project_tamil_weight" class="form-select">
                <option value="100">100 (Thin)</option>
                <option value="200">200 (Extra Light)</option>
                <option value="300">300 (Light)</option>
                <option value="400">400 (Normal)</option>
                <option value="500">500 (Medium)</option>
                <option value="600">600 (Semi Bold)</option>
                <option value="700">700 (Bold)</option>
                <option value="800">800 (Extra Bold)</option>
                <option value="900">900 (Black)</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Settings</button>
        <div class="bg-dark-subtle mt-4 p-3 rounded">
            <div id="verse">
                <p>3 யோவான் 1:5</p>
                <p>பிரியமானவனே, நீ சகோதரருக்கும் அந்நியருக்கும் செய்கிற யாவற்றையும் உண்மையாய்ச் செய்கிறாய்.</p>
            </div>
        </div>    
    </form>
</div>
@endsection

@push('endjs')
    <script>
        const verse = document.getElementById('verse');
        const fontSelect = document.getElementById('project_tamil_font');
        const weightSelect = document.getElementById('project_tamil_weight');

        function updateVerseStyle() {
            const selectedFont = fontSelect.options[fontSelect.selectedIndex].className;
            const selectedWeight = weightSelect.value;

            verse.style.fontFamily = `'${selectedFont}', sans-serif`;
            verse.style.fontWeight = selectedWeight;
        }

        // Initial apply from selected values (when page loads)
        updateVerseStyle();

        // Apply on change
        fontSelect.addEventListener('change', updateVerseStyle);
        weightSelect.addEventListener('change', updateVerseStyle);
    </script>

@endpush
