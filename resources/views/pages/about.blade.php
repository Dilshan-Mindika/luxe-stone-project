@extends('layouts.app')

@push('styles')
<style>
    /* Custom CSS from RMP Multi Page/about.html */
    .about-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--black) 0%, var(--charcoal) 100%);
        position: relative;
        overflow: hidden;
        margin-top: 80px;
    }

    .about-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&w=1200');
        background-size: cover;
        background-position: center;
        opacity: 0.2;
    }

    .about-content {
        background: var(--black);
        padding: 100px 0;
    }

    .content-block {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        margin-bottom: 100px;
        align-items: center;
    }

    .content-block.reverse {
        direction: rtl;
    }

    .content-block.reverse > * {
        direction: ltr;
    }

    .content-text h2 {
        font-family: 'Playfair Display', serif;
        font-size: 42px;
        color: var(--white);
        margin-bottom: 24px;
    }

    .content-text h2 .gold-text {
        color: var(--gold);
    }

    .content-text p {
        color: var(--off-white);
        line-height: 1.8;
        font-size: 16px;
        margin-bottom: 16px;
    }

    .content-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        position: relative;
    }

    .content-image img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        transition: transform 0.6s;
    }

    .content-image:hover img {
        transform: scale(1.05);
    }

    .timeline-section {
        background: var(--charcoal);
        padding: 100px 0;
    }

    .timeline {
        position: relative;
        padding: 40px 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, var(--gold), var(--gold-dark));
        transform: translateX(-50%);
    }

    .timeline-item {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        margin-bottom: 80px;
        position: relative;
    }

    .timeline-item:nth-child(even) .timeline-content {
        grid-column: 2;
    }

    .timeline-item:nth-child(even) .timeline-year {
        grid-column: 1;
        grid-row: 1;
        text-align: right;
    }

    .timeline-year {
        font-family: 'Playfair Display', serif;
        font-size: 64px;
        color: var(--gold);
        font-weight: 700;
        display: flex;
        align-items: center;
    }

    .timeline-content {
        background: rgba(42, 42, 42, 0.5);
        padding: 40px;
        border-radius: 16px;
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .timeline-content h3 {
        font-family: 'Playfair Display', serif;
        color: var(--white);
        font-size: 28px;
        margin-bottom: 16px;
    }

    .timeline-content p {
        color: var(--off-white);
        line-height: 1.8;
    }

    .timeline-dot {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        background: var(--gold);
        border-radius: 50%;
        border: 4px solid var(--charcoal);
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.6);
        z-index: 2;
    }

    .team-section {
        background: var(--black);
        padding: 100px 0;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 40px;
    }

    .team-member {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        background: rgba(26, 26, 26, 0.6);
        border: 1px solid rgba(212, 175, 55, 0.1);
        transition: var(--transition);
    }

    .team-member:hover {
        transform: translateY(-10px);
        border-color: var(--gold);
        box-shadow: 0 20px 50px rgba(212, 175, 55, 0.2);
    }

    .team-photo {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    .team-info {
        padding: 30px;
    }

    .team-info h3 {
        font-family: 'Playfair Display', serif;
        color: var(--white);
        font-size: 24px;
        margin-bottom: 8px;
    }

    .team-info .role {
        color: var(--gold);
        font-size: 14px;
        letter-spacing: 1px;
        margin-bottom: 16px;
        text-transform: uppercase;
    }

    .team-info p {
        color: var(--off-white);
        font-size: 14px;
        line-height: 1.6;
    }

    @media (max-width: 1024px) {
        .content-block {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .timeline::before {
            left: 20px;
        }

        .timeline-item {
            grid-template-columns: 1fr;
            padding-left: 60px;
        }

        .timeline-item:nth-child(even) .timeline-content,
        .timeline-item:nth-child(even) .timeline-year {
            grid-column: 1;
            text-align: left;
        }

        .timeline-dot {
            left: 20px;
        }

        .team-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .about-hero {
            min-height: 40vh;
        }

        .content-text h2 {
            font-size: 32px;
        }

        .timeline-year {
            font-size: 48px;
        }
    }
</style>
@endpush

@section('title', 'About Us | Luxe Stone - Premium Marble & Granite Specialists')
@section('meta_description', 'Discover our story of excellence in marble and granite craftsmanship. Over 25 years of transforming spaces with premium stone solutions.')

@section('content')
    <section class="about-hero">
        <div class="container">
            <div style="position: relative; z-index: 1; text-align: center;">
                <h1 class="hero-title" data-aos="fade-up">Our Story</h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">25 Years of Excellence in Stone Craftsmanship</p>
            </div>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="content-block" data-aos="fade-up">
                <div class="content-text">
                    <h2>Crafting <span class="gold-text">Luxury</span> Since 1999</h2>
                    <p>At Luxe Stone, we believe that every space deserves the timeless elegance of premium marble and granite. For over two decades, we've been at the forefront of stone craftsmanship, transforming ordinary spaces into extraordinary experiences.</p>
                    <p>Our journey began with a simple vision: to bring the world's finest natural stone to discerning clients who appreciate quality, beauty, and durability. Today, we're proud to be recognized as industry leaders, trusted by homeowners, designers, and architects across the region.</p>
                    <p>Every slab we source, every cut we make, and every installation we complete is executed with meticulous attention to detail and an unwavering commitment to excellence.</p>
                </div>
                <div class="content-image">
                    <img src="https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Luxury marble craftsmanship">
                </div>
            </div>

            <div class="content-block reverse" data-aos="fade-up">
                <div class="content-text">
                    <h2>Master <span class="gold-text">Craftsmen</span></h2>
                    <p>Our team comprises highly skilled artisans who have dedicated their careers to mastering the art of stone fabrication and installation. Each member brings years of experience and a passion for perfection to every project.</p>
                    <p>We invest heavily in ongoing training and cutting-edge technology to ensure that we remain at the pinnacle of our craft. From traditional hand-finishing techniques to state-of-the-art CNC machinery, we blend the best of old and new to deliver impeccable results.</p>
                    <p>When you choose Luxe Stone, you're not just getting a product—you're gaining access to generations of knowledge and expertise in working with the world's most beautiful natural materials.</p>
                </div>
                <div class="content-image">
                    <img src="https://images.pexels.com/photos/5691576/pexels-photo-5691576.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Craftsmen at work">
                </div>
            </div>
        </div>
    </section>

    <section class="timeline-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Our Journey</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Milestones that shaped our legacy</p>

            <div class="timeline">
                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-year">1999</div>
                    <div class="timeline-content">
                        <h3>The Beginning</h3>
                        <p>Founded by master craftsman James Patterson with a small workshop and a big vision to bring premium stone solutions to local homeowners.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>

                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-year">2005</div>
                    <div class="timeline-content">
                        <h3>Expansion & Growth</h3>
                        <p>Opened our 10,000 sq ft showroom and fabrication facility. Expanded our team to 25 skilled professionals and began working with luxury home builders.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>

                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-year">2012</div>
                    <div class="timeline-content">
                        <h3>Industry Recognition</h3>
                        <p>Awarded "Best Stone Fabricator" by the National Kitchen & Bath Association. Completed our 1,000th project milestone.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>

                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-year">2018</div>
                    <div class="timeline-content">
                        <h3>Technology Integration</h3>
                        <p>Invested in state-of-the-art CNC machinery and 3D templating technology, enhancing precision and reducing installation time by 40%.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>

                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-year">2024</div>
                    <div class="timeline-content">
                        <h3>Leading the Future</h3>
                        <p>Now serving over 500 clients annually with a team of 60+ professionals. Pioneering sustainable sourcing practices and eco-friendly installation methods.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Meet Our Team</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">The masters behind every masterpiece</p>

            <div class="team-grid">
                <div class="team-member" data-aos="zoom-in" data-aos-delay="100">
                    <img src="https://images.pexels.com/photos/2182970/pexels-photo-2182970.jpeg?auto=compress&cs=tinysrgb&w=600" alt="James Patterson" class="team-photo">
                    <div class="team-info">
                        <h3>James Patterson</h3>
                        <p class="role">Founder & Master Craftsman</p>
                        <p>With over 30 years of experience, James leads our team with passion and precision, ensuring every project meets the highest standards.</p>
                    </div>
                </div>

                <div class="team-member" data-aos="zoom-in" data-aos-delay="200">
                    <img src="https://images.pexels.com/photos/3785079/pexels-photo-3785079.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Sarah Chen" class="team-photo">
                    <div class="team-info">
                        <h3>Sarah Chen</h3>
                        <p class="role">Design Director</p>
                        <p>Sarah brings creative vision to every project, helping clients select perfect stone combinations that exceed their expectations.</p>
                    </div>
                </div>

                <div class="team-member" data-aos="zoom-in" data-aos-delay="300">
                    <img src="https://images.pexels.com/photos/2182973/pexels-photo-2182973.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Michael Rodriguez" class="team-photo">
                    <div class="team-info">
                        <h3>Michael Rodriguez</h3>
                        <p class="role">Lead Installer</p>
                        <p>Michael's meticulous installation techniques ensure flawless results. His attention to detail is unmatched in the industry.</p>
                    </div>
                </div>

                <div class="team-member" data-aos="zoom-in" data-aos-delay="400">
                    <img src="https://images.pexels.com/photos/3756679/pexels-photo-3756679.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Emma Thompson" class="team-photo">
                    <div class="team-info">
                        <h3>Emma Thompson</h3>
                        <p class="role">Client Relations Manager</p>
                        <p>Emma ensures every client journey is smooth and enjoyable, from initial consultation to final installation and beyond.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section glass-effect-section" data-aos="fade-up">
        <div class="container">
            <div class="cta-content">
                <h2>Experience the Luxe Stone Difference</h2>
                <p>Let us transform your space with our unparalleled expertise and premium materials</p>
                <a href="{{ route('contact') }}" class="cta-button primary large">Get Started Today</a>
            </div>
        </div>
    </section>
@endsection