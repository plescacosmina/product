@extends('master')
@section('content')
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
                        <a class="nav-link active" href="{{ url('/') }}">
                            <i class="fas fa-shopping-cart"></i> Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('account') }}">
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
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">View Product</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="tm-product-table-container">
                            <table class="table table-hover tm-table-small tm-product-table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">UNITS</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">DATE MODIFIED</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $p)
                                    <tr>
                                        <th scope="row"><?= $p->id ?></th>
                                        <td class="tm-product-name"><?= $p->name ?></td>
                                        <td><?= $p->description ?></td>
                                        <td><?= $p->price ?></td>
                                        <td><?= $p->units ?></td>
                                        <td><?= $p->created_at ?></td>
                                        <td><?= $p->updated_at ?></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ url('/') }}" class="btn btn-primary btn-block text-uppercase mb-3">Go to
                            Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection