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
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add Product</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            {{--                        <form action="" class="tm-edit-product-form">--}}
                            {{ Form::open(array('url' => 'add', 'id' => 'contact')) }}
                            <p style="color: white">
                                {{ $errors->first('name') }}
                                {{ $errors->first('description') }}
                                {{ $errors->first('image') }}
                            </p>
                            <div class="form-group mb-3">
                                <fieldset>
                                    <label for="name">Product Name</label>
                                    {{ Form::text('name', '', array('placeholder' => 'Name', 'class' => 'form-control validate')) }}
                                </fieldset>
                            </div>
                            <div class="form-group mb-3">
                                <fieldset>
                                    <label for="description">Description</label>
                                    {{ Form::textarea('description', '', array('placeholder' => 'Description' , 'class' => 'form-control validate')) }}
                                </fieldset>
                            </div>
                            <div class="row">
                                <div class="form-group mb-12 col-xs-12 col-sm-12">
                                    <fieldset>
                                        <label for="description">Price</label>
                                        {{ Form::text('price', '', array('placeholder' => 'Price', 'class' => 'form-control validate')) }}
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-12 col-xs-12 col-sm-12">
                                    <fieldset>
                                        <label for="description">Units</label>
                                        {{ Form::text('units', '', array('placeholder' => 'Units', 'class' => 'form-control validate')) }}
                                    </fieldset>
                                </div>
                            </div>

                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now
                            </button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection