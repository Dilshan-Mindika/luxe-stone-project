@extends('layouts.app')

@push('styles')
<style>
    /* Custom CSS from RMP Multi Page/contact.html */
    .contact-hero {
        min-height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--black) 0%, var(--charcoal) 100%);
        margin-top: 80px;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 60px;
        padding: 100px 0;
        background: var(--black);
    }

    .contact-info-section {
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    .info-card {
        background: rgba(26, 26, 26, 0.6);
        padding: 40px;
        border-radius: 16px;
        border: 1px solid rgba(212, 175, 55, 0.1);
        transition: var(--transition);
    }

    .info-card:hover {
        border-color: var(--gold);
        transform: translateX(5px);
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .info-icon svg {
        width: 24px;
        height: 24px;
        color: var(--black);
    }

    .info-card h3 {
        font-family: 'Playfair Display', serif;
        color: var(--white);
        font-size: 24px;
        margin-bottom: 16px;
    }

    .info-card p {
        color: var(--off-white);
        line-height: 1.8;
        font-size: 15px;
    }

    .info-card a {
        color: var(--gold);
        text-decoration: none;
        transition: var(--transition);
    }

    .info-card a:hover {
        color: var(--gold-light);
    }

    .contact-form-container {
        background: rgba(26, 26, 26, 0.6);
        padding: 50px;
        border-radius: 20px;
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .contact-form-container h2 {
        font-family: 'Playfair Display', serif;
        color: var(--white);
        font-size: 36px;
        margin-bottom: 12px;
    }

    .contact-form-container .subtitle {
        color: var(--gold);
        margin-bottom: 40px;
        font-size: 15px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        color: var(--white);
        margin-bottom: 8px;
        font-weight: 500;
        font-size: 14px;
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
        min-height: 140px;
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
        margin-top: 10px;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.5);
    }

    .map-section {
        background: var(--charcoal);
        padding: 100px 0;
    }

    .map-container {
        width: 100%;
        height: 500px;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(212, 175, 55, 0.2);
        margin-top: 60px;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
        filter: grayscale(20%) contrast(1.2);
    }

    .business-hours {
        background: rgba(26, 26, 26, 0.6);
        padding: 30px;
        border-radius: 16px;
        border: 1px solid rgba(212, 175, 55, 0.1);
    }

    .business-hours h4 {
        color: var(--white);
        font-size: 20px;
        margin-bottom: 20px;
        font-family: 'Playfair Display', serif;
    }

    .hours-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .hours-row:last-child {
        border-bottom: none;
    }

    .hours-row span:first-child {
        color: var(--off-white);
    }

    .hours-row span:last-child {
        color: var(--gold);
        font-weight: 600;
    }

    @media (max-width: 1024px) {
        .contact-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .map-container {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .contact-hero {
            min-height: 40vh;
        }

        .contact-form-container {
            padding: 30px 20px;
        }

        .contact-form-container h2 {
            font-size: 28px;
        }
    }
</style>
@endpush

@section('title', 'Contact Us | Luxe Stone - Get in Touch')
@section('meta_description', 'Contact Luxe Stone for premium marble and granite solutions. Visit our showroom, call us, or request a free consultation today.')

@section('content')
    <section class="contact-hero">
        <div class="container">
            <div style="position: relative; z-index: 1; text-align: center;">
                <h1 class="hero-title" data-aos="fade-up">Get In Touch</h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Let's discuss your dream project</p>
            </div>
        </div>
    </section>

    <section class="contact-container">
        <div class="container" style="display: contents;">
            <div class="contact-info-section" style="padding: 0 24px;">
                <div class="info-card" data-aos="fade-right">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 5C3 3.89543 3.89543 3 5 3H8.27924C8.70967 3 9.09181 3.27543 9.22792 3.68377L10.7257 8.17721C10.8831 8.64932 10.6694 9.16531 10.2243 9.38787L7.96701 10.5165C9.06925 12.9612 11.0388 14.9308 13.4835 16.033L14.6121 13.7757C14.8347 13.3306 15.3507 13.1169 15.8228 13.2743L20.3162 14.7721C20.7246 14.9082 21 15.2903 21 15.7208V19C21 20.1046 20.1046 21 19 21H18C9.71573 21 3 14.2843 3 6V5Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3>Call Us</h3>
                    <p><a href="tel:+442012345678">+44 20 1234 5678</a></p>
                    <p><a href="tel:+442087654321">+44 20 8765 4321</a></p>
                </div>

                <div class="info-card" data-aos="fade-right" data-aos-delay="100">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 8L10.89 13.26C11.5391 13.6984 12.4609 13.6984 13.11 13.26L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3>Email Us</h3>
                    <p><a href="mailto:info@luxestone.com">info@luxestone.com</a></p>
                    <p><a href="mailto:sales@luxestone.com">sales@luxestone.com</a></p>
                </div>

                <div class="info-card" data-aos="fade-right" data-aos-delay="200">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.657 16.657L13.414 20.9C12.2332 22.0809 10.312 22.1379 9.06298 21.0538L8.89801 20.9L4.65601 16.657C2.00601 14.007 1.59301 9.76697 3.47601 6.67297L3.85801 6.06897C5.04311 4.24915 7.24674 3.33385 9.42301 3.74797L10.007 3.85797C10.663 3.98997 11.308 4.19497 11.927 4.47097L12 4.50497L12.073 4.47097C13.465 3.85097 14.999 3.62297 16.493 3.83297L17.007 3.90797C19.044 4.22497 20.7 5.83297 21.09 7.84497C21.419 9.59197 21.07 11.396 20.116 12.913L19.657 13.572C18.955 14.531 18.105 15.372 17.136 16.066L16.657 16.414L17.657 16.657Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3>Visit Our Showroom</h3>
                    <p>123 Stone Avenue<br>London, UK<br>W1A 1AA</p>
                </div>

                <div class="business-hours" data-aos="fade-right" data-aos-delay="300">
                    <h4>Business Hours</h4>
                    <div class="hours-row">
                        <span>Monday - Friday</span>
                        <span>8:00 AM - 6:00 PM</span>
                    </div>
                    <div class="hours-row">
                        <span>Saturday</span>
                        <span>9:00 AM - 4:00 PM</span>
                    </div>
                    <div class="hours-row">
                        <span>Sunday</span>
                        <span>Closed</span>
                    </div>
                </div>
            </div>

            <div class="contact-form-container" data-aos="fade-left" style="margin-right: 24px;">
                <h2>Send Us a Message</h2>
                <p class="subtitle">We typically respond within 24 hours</p>

                <form id="contactForm">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name *</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>

                        <div class="form-group">
                            <label for="lastName">Last Name *</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="service">Service Interest</label>
                        <select id="service" name="service">
                            <option value="">Select a service</option>
                            <option value="kitchen">Kitchen Worktops</option>
                            <option value="bathroom">Bathroom Renovations</option>
                            <option value="flooring">Flooring & Tiles</option>
                            <option value="staircases">Staircases</option>
                            <option value="commercial">Commercial Projects</option>
                            <option value="consultation">General Consultation</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message *</label>
                        <textarea id="message" name="message" required placeholder="Tell us about your project..."></textarea>
                    </div>

                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Find Us</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">Visit our showroom to see our stunning stone collection</p>

            <div class="map-container" data-aos="fade-up">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.540943654408!2d-0.14405668422908545!3d51.50735297963595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604b900d26973%3A0x4291f3172409ea92!2slondon%20eye!5e0!3m2!1sen!2suk!4v1635334870858!5m2!1sen!2suk"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // In a real application, you would use fetch() or axios here to submit data to a Laravel controller endpoint.
        alert('Thank you for your message! We will get back to you within 24 hours.');
        this.reset();
    });
</script>
@endpush