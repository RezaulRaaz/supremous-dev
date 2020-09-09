<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo">
                    <img src="{{logo()}}" alt="">
                </div>
                <div class="company-details">
                <p>{{Store()->strore_description}}</p>
                    <div class="footer-social">
                        <ul>
                            <li><a href="{{social()->facebook_links}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{social()->twitter_links}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{social()->linked_links}}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{social()->instagram_links}}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{social()->youtube_links}}"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <p class="font-weight-bold">Shopping online</p>
                <div class="f-menu">
                    <ul>
                        <li><a href="#">Order Status</a></li>
                        <li><a href="#">Shipping and Delivery</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Payment Options</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p class="font-weight-bold">Information</p>
                <div class="f-menu">
                    <ul>
                        <li><a href="#">Gift Cards</a></li>
                        <li><a href="#">Find a store</a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#">Bacome a member</a></li>
                        <li><a href="#">Site feedback</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p class="font-weight-bold">Contact</p>
                <div class="f-menu">
                    <ul>
                        <li><a href="#">{{Store()->store_email}}</a></li>
                        <li><a href="#">Hotline: {{Store()->store_mobile}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2019. ALL RIGHTS RESERVED</p>
    </div>
</footer>
