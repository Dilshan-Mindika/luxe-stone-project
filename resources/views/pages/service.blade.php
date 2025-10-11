@extends('layouts.app')

{{-- Use dynamic data for SEO --}}
@section('title', $service->title . ' | Luxe Stone')
@section('meta_description', $service->subtitle)

@push('styles')
<style>
    /* Paste the service-page specific CSS from the original HTML files here (e.g., RMP Multi Page/service-kitchen.html) */
    .service-hero {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        /* Dynamically use the hero image URL from the database */
        background: linear-gradient(135deg, rgba(10, 10, 10, 0.85), rgba(26, 26, 26, 0.9)), url('{{ $service->hero_image_url ?? 'https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&w=1600' }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        position: relative;
        margin-top: 80px;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 40px;
        margin: 60px 0;
    }

    .feature-card {
        background: rgba(26, 26, 26, 0.6);
        padding: 40px 30px;
        border-radius: 16px;
        border: 1px solid rgba(212, 175, 55, 0.1);
        text-align: center;
        transition: var(--transition);
    }

    .feature-card:hover {
        transform: translateY(-8px);
        border-color: var(--gold);
        box-shadow: 0 16px 40px rgba(212, 175, 55, 0.2);
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 24px;
        color: var(--gold);
    }

    .feature-card h3 {
        color: var(--white);
        font-size: 22px;
        margin-bottom: 16px;
        font-family: 'Playfair Display', serif;
    }

    .feature-card p {
        color: var(--off-white);
        line-height: 1.6;
        font-size: 14px;
    }

    .process-section {
        background: var(--charcoal);
        padding: 100px 0;
    }

    .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-top: 60px;
    }

    .process-step {
        position: relative;
        padding: 40px 30px;
        background: rgba(42, 42, 42, 0.5);
        border-radius: 16px;
        border: 1px solid rgba(212, 175, 55, 0.1);
        text-align: center;
    }

    .step-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: 700;
        color: var(--black);
        margin: 0 auto 24px;
        font-family: 'Playfair Display', serif;
    }

    .process-step h3 {
        color: var(--white);
        font-size: 20px;
        margin-bottom: 12px;
    }

    .process-step p {
        color: var(--off-white);
        font-size: 14px;
        line-height: 1.6;
    }

    .materials-section {
        background: var(--black);
        padding: 100px 0;
    }

    .materials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 60px;
    }

    .material-card {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        cursor: pointer;
        aspect-ratio: 1;
    }

    .material-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s;
    }

    .material-card:hover img {
        transform: scale(1.1);
    }

    .material-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 30px;
        background: linear-gradient(to top, rgba(10, 10, 10, 0.95), transparent);
    }

    .material-overlay h3 {
        color: var(--white);
        font-size: 24px;
        margin-bottom: 8px;
        font-family: 'Playfair Display', serif;
    }

    .material-overlay p {
        color: var(--gold);
        font-size: 14px;
    }

    .quote-form-section {
        background: var(--charcoal);
        padding: 100px 0;
    }

    .quote-form {
        max-width: 700px;
        margin: 60px auto 0;
        background: rgba(26, 26, 26, 0.6);
        padding: 50px;
        border-radius: 20px;
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        color: var(--white);
        margin-bottom: 8px;
        font-weight: 500;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 14px 20px;
        background: rgba(42, 42, 42, 0.8);
        border: 1px solid rgba(212, 175, 55, 0.2);
        border-radius: 8px;
        color: var(--white);
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        transition: var(--transition);
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .submit-btn {
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        color: var(--black);
        border: none;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        letter-spacing: 1px;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.5);
    }

    @media (max-width: 768px) {
        .service-hero {
            min-height: 50vh;
        }

        .quote-form {
            padding: 30px 20px;
        }

        .process-steps {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
    <section class="service-hero">
        <div class="container">
            <div style="position: relative; z-index: 1; text-align: center;">
                {{-- Dynamic Title --}}
                <h1 class="hero-title" data-aos="fade-up">{{ $service->title }}</h1>
                {{-- Dynamic Subtitle --}}
                <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">{{ $service->subtitle }}</p>
            </div>
        </div>
    </section>

    <section class="services-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Why Choose {{ $service->title }}?</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">{{ $service->description }}</p>
            
            {{-- Hardcoded Features from RMP Multi Page/service-kitchen.html. Ideal for dynamic data later. --}}
            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M32 8L8 20V44L32 56L56 44V20L32 8Z" stroke="currentColor" stroke-width="2"/><path d="M32 32L32 56" stroke="currentColor" stroke-width="2"/><path d="M32 32L8 20" stroke="currentColor" stroke-width="2"/><path d="M32 32L56 20" stroke="currentColor" stroke-width="2"/></svg>
                    </div>
                    <h3>Exceptional Durability</h3>
                    <p>Natural stone is one of the most durable materials available, resistant to heat, scratches, and everyday wear.</p>
                </div>

                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="32" cy="32" r="20" stroke="currentColor" stroke-width="2"/><path d="M32 12V32L42 42" stroke="currentColor" stroke-width="2"/></svg>
                    </div>
                    <h3>Timeless Elegance</h3>
                    <p>Each slab is unique, featuring natural patterns and colors that add character and luxury to your kitchen.</p>
                </div>

                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="12" y="12" width="40" height="40" stroke="currentColor" stroke-width="2"/><path d="M12 24H52M12 36H52M24 12V52M36 12V52" stroke="currentColor" stroke-width="2"/></svg>
                    </div>
                    <h3>Custom Fabrication</h3>
                    <p>Precision-cut to your exact specifications, ensuring a perfect fit for any kitchen layout or design.</p>
                </div>

                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M32 8L12 28L32 48L52 28L32 8Z" stroke="currentColor" stroke-width="2"/><circle cx="32" cy="28" r="4" fill="currentColor"/></svg>
                    </div>
                    <h3>Increases Home Value</h3>
                    <p>Premium stone worktops are a sought-after feature that significantly enhances your property's market value.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="process-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Our Process</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">From consultation to installation, we make it seamless</p>

            <div class="process-steps">
                <div class="process-step" data-aos="zoom-in" data-aos-delay="100">
                    <div class="step-number">1</div>
                    <h3>Consultation</h3>
                    <p>We discuss your vision, requirements, and budget to understand exactly what you're looking for.</p>
                </div>

                <div class="process-step" data-aos="zoom-in" data-aos-delay="200">
                    <div class="step-number">2</div>
                    <h3>Material Selection</h3>
                    <p>Visit our showroom to view our extensive collection and choose the perfect stone for your project.</p>
                </div>

                <div class="process-step" data-aos="zoom-in" data-aos-delay="300">
                    <div class="step-number">3</div>
                    <h3>Digital Templating</h3>
                    <p>We create precise 3D measurements of your space using advanced digital templating technology.</p>
                </div>

                <div class="process-step" data-aos="zoom-in" data-aos-delay="400">
                    <div class="step-number">4</div>
                    <h3>Fabrication</h3>
                    <p>Our master craftsmen cut and polish your stone with precision CNC machinery and hand-finishing.</p>
                </div>

                <div class="process-step" data-aos="zoom-in" data-aos-delay="500">
                    <div class="step-number">5</div>
                    <h3>Installation</h3>
                    <p>Expert installation ensures a perfect fit and finish that will last for decades to come.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="materials-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Popular Materials</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Explore our premium stone selection</p>

            <div class="materials-grid">
                <div class="material-card" data-aos="zoom-in" data-aos-delay="100">
                    <img src="https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Calacatta Marble">
                    <div class="material-overlay">
                        <h3>Calacatta Marble</h3>
                        <p>Luxurious white with gold veining</p>
                    </div>
                </div>

                <div class="material-card" data-aos="zoom-in" data-aos-delay="200">
                    <img src="https://images.pexels.com/photos/1457842/pexels-photo-1457842.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Black Granite">
                    <div class="material-overlay">
                        <h3>Black Granite</h3>
                        <p>Bold and sophisticated</p>
                    </div>
                </div>

                <div class="material-card" data-aos="zoom-in" data-aos-delay="300">
                    <img src="https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Carrara Marble">
                    <div class="material-overlay">
                        <h3>Carrara Marble</h3>
                        <p>Classic Italian elegance</p>
                    </div>
                </div>

                <div class="material-card" data-aos="zoom-in" data-aos-delay="400">
                    <img src="https://images.pexels.com/photos/1571453/pexels-photo-1571453.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Emperador Marble">
                    <div class="material-overlay">
                        <h3>Emperador Marble</h3>
                        <p>Warm brown tones</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="quote-form-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Request a Quote</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Let's bring your dream project to life</p>

            <form class="quote-form" data-aos="fade-up">
                {{-- Form fields from RMP Multi Page/service-kitchen.html --}}
                @csrf
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="material">Preferred Material</label>
                    <select id="material" name="material">
                        <option value="">Select a material</option>
                        <option value="marble">Marble</option>
                        <option value="granite">Granite</option>
                        <option value="quartz">Quartz</option>
                        <option value="unsure">Not Sure Yet</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Project Details</label>
                    <textarea id="message" name="message" placeholder="Tell us about your project..."></textarea>
                </div>

                <button type="submit" class="submit-btn">Request Free Quote</button>
            </form>
        </div>
    </section>
@endsection