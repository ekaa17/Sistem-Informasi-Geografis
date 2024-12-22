@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <!-- Card -->
                    <div class="col-lg-8">

                        <div class="card">
                            <div class="card-body row justify-content-center text-center m-5">
                                <h3 class="m-0" style="font-family: 'Algerian';">WELCOME</h3>
                                <img src="{{ asset('assets/img/globe.jpg') }}" alt="" class="img-fluid w-50 mt-0 m-0">
                                <h4 class="m-0" style="font-family: 'Algerian';">SISTEM INFORMASI GEOGRAFIS</h4>
                            </div>
                        </div>

                    </div><!-- End Card -->
                </div>
            </div>
        </div>
        <div class="row">


          </div>
    </section>
@endsection