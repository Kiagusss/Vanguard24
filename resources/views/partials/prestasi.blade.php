@php
$prestasiItems = $galleries->where('category', 'prestasi');
@endphp

@if($prestasiItems->count() > 0)
<section class="prestasi-section" id="prestasi">
    <h2 class="section-title">Our Achievements</h2>
    <p class="section-subtitle">Proud moments of our journey together</p>

    <div class="awards-row">
        <div class="awards-carousel" id="awards-carousel">
            @foreach($prestasiItems as $prestasi)
            <div class="award-card">
                <img src="{{ Storage::url($prestasi->file) }}" alt="{{ $prestasi->title ?? 'Prestasi' }}">
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
