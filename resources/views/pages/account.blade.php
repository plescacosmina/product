@extends('master')
@section('content')
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.html">
                    <h1 class="tm-site-title mb-0">Product Admin</h1>
                </a>
                <button
                        class="navbar-toggler ml-auto mr-0"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                >
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                <i class="fas fa-shopping-cart"></i> Products
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/account') }}">
                                <i class="far fa-user"></i> Account
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php if (Auth::check() != 1) : ?>
                            <?= link_to("/login", 'Conectare') ?>
                        <?php else: ?>
                            <a class="nav-link d-block" href="{{ url('logout') }}">Logout
                            </a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <!-- row -->
            <div class="row tm-content-row">
                <div class="tm-block-col tm-col-avatar">
                    <div class="tm-bg-primary-dark tm-block tm-block-avatar">
                        <h2 class="tm-block-title">Change Avatar</h2>
                        <div class="tm-avatar-container">
							@if($image)
								<img
                                    src="{{ 'data:image/png;base64,' . $image->image }}"
                                    alt="Avatar"
                                    class="tm-avatar img-fluid mb-4"
								/>	
							@endif
                        </div>
						<form class="contact-form" action="{{ action('HomeController@addImage')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group mb-3">
								<p style="color: white">
									{{ $errors->first('image') }}
								</p>
								<div class="col-md-12">
									<input type="file" placeholder="Image" id="image" name="image" />
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-block text-uppercase">
								Incarca Imagine
							</button>
						</form>
                    </div>
                </div>
                <div class="tm-block-col tm-col-account-settings">
                    <div class="tm-bg-primary-dark tm-block tm-block-settings">
                        <h2 class="tm-block-title">Account Info</h2>
                        <div class="form-group col-lg-6">
                            <p>Account Name: <span class="font-weight-bold"
                                                  style="color: white"><?= $user[0]->name ?></span></p>
                            <p>Account Email: <span class="font-weight-bold"
                                                  style="color: white"><?= $user[0]->email ?></span></p>
                            <p>Account Created At: <span class="font-weight-bold"
                                                   style="color: white"><?= $user[0]->created_at ?></span></p>
                            <p>Number of hits per session: <span class="font-weight-bold"
                                                         style="color: white"><?= $numberOfHitsPerSession ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection