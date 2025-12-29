<section class="features" id="features">
    <div class="features-container">
        <div class="header">
            <h1 style="font-weight: bold">About Vanguard</h1>
            <p>Vanguard 24 merupakan keluarga besar mahasiswa informatika angkatan 2024 Universitas Sultan Ageng Tirtayasa.</p>
        </div>

        @if($aboutPhotos->isNotEmpty())
        <!-- Jika ada lebih dari satu foto, tampilkan slider -->
        <div class="features-image-wrapper">
            @foreach($aboutPhotos as $index => $photo)
            <img 
                src="{{ Storage::url($photo->file) }}" 
                alt="{{ $photo->title ?? 'About Vanguard 24' }}" 
                class="features-image @if($index === 0) active @endif"
                data-index="{{ $index }}"
                data-description="{{ $photo->description ?? '' }}"
                style="@if($index !== 0) display:none; @endif">
            @endforeach
        </div>

        <div class="features-description">
            <p id="about-text">
                {{ $aboutPhotos->first()->description ?? 'Informatics 24, known as Vanguard 24, is a vibrant and dynamic community of students at Sultan Ageng Tirtayasa University...' }}
            </p>

            @if($aboutPhotos->count() > 1)
            <a href="#" class="btn" id="about-next-btn">Next</a>
            @endif
        </div>
        @else
        <!-- Jika tidak ada foto dengan category about -->
        <div class="features-image-wrapper">
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" alt="Default About Image" class="features-image" />
        </div>
        <div class="features-description">
            <p>
                Informatics 24, known as Vanguard 24, is a vibrant and dynamic community of students at Sultan Ageng Tirtayasa University. Our name, Vanguard, reflects our commitment to being at the forefront of innovation, technology, and academic excellence...
            </p>
        </div>
        @endif
    </div>
</section>
