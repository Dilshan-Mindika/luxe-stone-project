<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h3>LUXE STONE</h3>
                <p>Crafting luxury with premium marble and granite since 1999. Your trusted partner for exceptional stone solutions.</p>
            </div>
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Services</h4>
                <ul>
                    {{-- Note: For a real app, this should loop through all Services from DB --}}
                    <li><a href="{{ route('services.show', 'kitchen-worktops') }}">Kitchen Worktops</a></li>
                    <li><a href="{{ route('services.show', 'bathroom-renovations') }}">Bathroom Renovations</a></li>
                    <li><a href="{{ route('services.show', 'flooring-tiles') }}">Flooring & Tiles</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li>Phone: +44 20 1234 5678</li>
                    <li>Email: info@luxestone.com</li>
                    <li>Mon - Fri: 8AM - 6PM</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© {{ date('Y') }} Luxe Stone. All rights reserved.</p>
        </div>
    </div>
</footer>