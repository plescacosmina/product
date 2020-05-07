@extends('master')
@section('content')
    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            <h1 class="tm-site-title mb-0">Product Admin</h1>
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
                        <a class="nav-link" href="{{ url('/account') }}">
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
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
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
                                <th scope="col">&nbsp;</th>
                                <th scope="col">&nbsp;</th>
								<th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row"><?= $product->id ?></th>
                                <td class="tm-product-name"><?= $product->name ?></td>
                                <td><?= $product->description ?></td>
                                <td><?= $product->price ?></td>
                                <td><?= $product->units ?></td>
                                <td><?= $product->created_at ?></td>
								<td>
                                    <a href="{{ url('/edit') . '/' . $product->id }}" class="tm-product-delete-link">
                                        <i class="fa fa-edit tm-product-delete-icon"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('/view') . '/' . $product->id }}" class="tm-product-delete-link">
                                        <i class="fa fa-search tm-product-delete-icon"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('/delete') . '/' . $product->id }}" class="tm-product-delete-link">
                                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table container -->
                    <a
                            href="{{ url('add') }}"
                            class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
                </div>
            </div>
        </div>
    </div>
@endsection