<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('assets-user/images/vand.png') }}"  style="height:60px">
                <strong class="ms-2" style="font-size:22px">VandRent.</strong>
                </a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">

						<li><a class="nav-link" href="shop.html"></a></li>
						<li><a class="nav-link" href="about.html"></a></li>
                        <li class="nav-item active">
							<a class="nav-link" href="index.html">Beranda</a>
						</li>
						<li><a class="nav-link" href="services.html">Layanan</a></li>
						<li><a class="nav-link" href="blog.html">Riwayat</a></li>
						<li><a class="nav-link" href="contact.html">Masuk</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="#"><img src="{{ asset('assets-user/images/user.svg') }}"></a></li>
						<li><a class="nav-link" href="cart.html"><img src="{{ asset('assets-user/images/cart.svg') }}"></a></li>
					</ul>
				</div>
			</div>

		</nav>