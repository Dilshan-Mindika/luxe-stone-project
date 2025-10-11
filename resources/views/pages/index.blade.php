@extends('layouts.app')

@section('content')
    <section class="hero-section">
        <div class="video-background">
            <video autoplay muted loop playsinline>
                <source src="https://cdn.coverr.co/videos/coverr-cutting-stone-with-an-angle-grinder-7485/1080p.mp4" type="video/mp4">
            </video>
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content glass-effect">
            <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1200">LUXURY IN STONE</h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1200">Crafting Timeless Elegance with Premium Marble & Granite</p>
            <div class="hero-buttons" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1200">
                <a href="{{ route('contact') }}" class="cta-button primary">Get a Quote</a>
                <a href="{{ route('portfolio') }}" class="cta-button secondary">Explore Our Work</a>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="scroll-arrow"></div>
        </div>
    </section>

    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stat-number" data-count="25">0</div>
                    <div class="stat-label">Years Excellence</div>
                </div>
                <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stat-number" data-count="5000">0</div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-number" data-count="10000">0</div>
                    <div class="stat-label">Tons Processed</div>
                </div>
                <div class="stat-item" data-aos="zoom-in" data-aos-delay="400">
                    <div class="stat-number" data-count="98">0</div>
                    <div class="stat-label">Client Satisfaction</div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Our Premium Services</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Transforming spaces with masterful stone craftsmanship</p>

            <div class="services-grid">
                @foreach ($services as $service)
                    <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-icon">
                            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="8" y="24" width="48" height="32" stroke="currentColor" stroke-width="2"/>
                                <rect x="12" y="28" width="40" height="4" fill="currentColor"/>
                                <circle cx="20" cy="44" r="3" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3>{{ $service->title }}</h3>
                        <p>{{ $service->subtitle ?? 'Bespoke marble and granite solutions for your space.' }}</p>
                        <a href="{{ route('services.show', $service->slug) }}" class="service-link">Learn More →</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="cta-section glass-effect-section" data-aos="fade-up">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Transform Your Space?</h2>
                <p>Let our master craftsmen bring your vision to life with premium stone solutions</p>
                <a href="{{ route('contact') }}" class="cta-button primary large">Schedule Consultation</a>
            </div>
        </div>
    </section>

    <section class="portfolio-preview">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Recent Projects</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Explore our portfolio of exceptional craftsmanship</p>

            <div class="portfolio-grid">
                @foreach ($portfolioItems as $item)
                    <div class="portfolio-item" data-aos="zoom-in" data-aos-delay="100">
                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                        <div class="portfolio-overlay">
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->material }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center" data-aos="fade-up">
                <a href="{{ route('portfolio') }}" class="cta-button secondary">View Full Portfolio</a>
            </div>
        </div>
    </section>
@endsection