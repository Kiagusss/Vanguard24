<section class="gallery-section" id="pricing">
    <h2 class="section-title">Informatics 24 Gallery</h2>
    <p class="section-subtitle">Every picture tells a story of our journey</p>

    <div class="gallery">
        @foreach ($galleries->whereNotIn('category', ['prestasi', 'about']) as $gallery)
        <div class="gallery-item"
            data-title="{{ $gallery->title ?? 'Untitled' }}"
            data-desc="{{ $gallery->subtitle ?? '' }}"
            data-img="{{ Storage::url($gallery->file) }}">
            <img src="{{ Storage::url($gallery->file) }}" alt="{{ $gallery->title ?? 'Gallery Image' }}">
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal" id="modal">
        <span class="close-btn" id="close">&times;</span>
        <img id="modal-img" src="" alt="">
        <div class="caption">
            <h2 id="modal-title"></h2>
            <p id="modal-desc"></p>
        </div>
    </div>
</section>
