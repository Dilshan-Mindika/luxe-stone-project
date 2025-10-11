@extends('layouts.app')

@push('styles')
<style>
    /* Custom CSS from RMP Multi Page/portfolio.html */
    .portfolio-hero {
        min-height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--black) 0%, var(--charcoal) 100%);
        margin-top: 80px;
    }

    .filter-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 60px;
    }

    .filter-btn {
        padding: 12px 30px;
        background: rgba(26, 26, 26, 0.6);
        border: 1px solid rgba(212, 175, 55, 0.2);
        border-radius: 50px;
        color: var(--white);
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        letter-spacing: 0.5px;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        color: var(--black);
        border-color: var(--gold);
    }

    .portfolio-full-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 80px;
    }

    .portfolio-full-item {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        cursor: pointer;
        aspect-ratio: 4/3;
        background: rgba(26, 26, 26, 0.6);
    }

    .portfolio-full-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s;
    }

    .portfolio-full-item:hover img {
        transform: scale(1.1);
    }

    .portfolio-full-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 30px;
        background: linear-gradient(to top, rgba(10, 10, 10, 0.95), transparent);
        transform: translateY(100%);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .portfolio-full-item:hover .portfolio-full-overlay {
        transform: translateY(0);
    }

    .portfolio-full-overlay h3 {
        font-family: 'Playfair Display', serif;
        color: var(--white);
        font-size: 22px;
        margin-bottom: 8px;
    }

    .portfolio-full-overlay p {
        color: var(--gold);
        font-size: 14px;
        margin-bottom: 4px;
    }

    .portfolio-full-overlay .location {
        color: var(--off-white);
        font-size: 12px;
    }

    .lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 10000;
        padding: 40px;
    }

    .lightbox.active {
        display: flex;
    }

    .lightbox-content {
        max-width: 1200px;
        max-height: 90vh;
        position: relative;
    }

    .lightbox-content img {
        max-width: 100%;
        max-height: 80vh;
        border-radius: 12px;
    }

    .lightbox-close {
        position: absolute;
        top: -40px;
        right: 0;
        width: 40px;
        height: 40px;
        background: var(--gold);
        border: none;
        border-radius: 50%;
        color: var(--black);
        font-size: 24px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .lightbox-close:hover {
        transform: rotate(90deg);
    }

    .lightbox-info {
        margin-top: 20px;
        text-align: center;
    }

    .lightbox-info h3 {
        font-family: 'Playfair Display', serif;
        color: var(--white);
        font-size: 28px;
        margin-bottom: 8px;
    }

    .lightbox-info p {
        color: var(--gold);
        font-size: 16px;
    }

    @media (max-width: 768px) {
        .portfolio-full-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .filter-buttons {
            gap: 10px;
        }

        .filter-btn {
            padding: 10px 20px;
            font-size: 13px;
        }

        .lightbox {
            padding: 20px;
        }

        .lightbox-close {
            top: -35px;
            width: 35px;
            height: 35px;
        }
    }
</style>
@endpush

@section('title', 'Portfolio | Luxe Stone - Our Premium Projects')
@section('meta_description', 'Explore our portfolio of exceptional marble and granite installations. View completed kitchen, bathroom, flooring, and commercial projects.')

@section('content')
    <section class="portfolio-hero">
        <div class="container">
            <div style="position: relative; z-index: 1; text-align: center;">
                <h1 class="hero-title" data-aos="fade-up">Our Portfolio</h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Explore our masterpiece installations</p>
            </div>
        </div>
    </section>

    <section class="portfolio-preview" style="padding-top: 100px;">
        <div class="container">
            <div class="filter-buttons" data-aos="fade-up">
                <button class="filter-btn active" data-filter="all">All Projects</button>
                @foreach ($categories as $category)
                    <button class="filter-btn" data-filter="{{ $category }}">{{ ucwords(str_replace('-', ' ', $category)) }}</button>
                @endforeach
            </div>

            <div class="portfolio-full-grid" id="portfolioGrid">
                @foreach ($portfolioItems as $item)
                    <div class="portfolio-full-item" data-category="{{ $item->category }}" data-aos="zoom-in" data-aos-delay="100">
                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                        <div class="portfolio-full-overlay">
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->material }}</p>
                            <p class="location">{{ $item->location }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close" id="lightboxClose">&times;</button>
            <img id="lightboxImage" src="" alt="">
            <div class="lightbox-info">
                <h3 id="lightboxTitle"></h3>
                <p id="lightboxMaterial"></p>
            </div>
        </div>
    </div>

    <section class="cta-section glass-effect-section" data-aos="fade-up">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Create Your Masterpiece?</h2>
                <p>Let's discuss how we can transform your space with premium stone</p>
                <a href="{{ route('contact') }}" class="cta-button primary large">Start Your Project</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-full-item');
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxTitle = document.getElementById('lightboxTitle');
    const lightboxMaterial = document.getElementById('lightboxMaterial');
    const lightboxClose = document.getElementById('lightboxClose');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filter = button.dataset.filter;

            portfolioItems.forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    portfolioItems.forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            const title = item.querySelector('h3').textContent;
            const material = item.querySelector('.portfolio-full-overlay p:first-of-type').textContent; // Get material correctly

            lightboxImage.src = img.src;
            lightboxTitle.textContent = title;
            lightboxMaterial.textContent = material;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    lightboxClose.addEventListener('click', () => {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    });

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
</script>
@endpush