@extends('front.layout.template')

@section('title', 'Contact News Portal - Septi Isdayana')

@section('content')
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8" data-aos="zoom-in">
                    <!-- Featured blog post-->
                    <div class="card mb-4 shadow-sm">
                        <div class="text-center">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31658.512225673792!2d112.70607521436139!3d-7.318578082111201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb6551205733%3A0x32a9d1800d0cfc47!2sKetintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1719078184819!5m2!1sid!2sid" 
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <div class="card-body">
                            <div class="small text-muted">{{ date('d-m-Y') }}</div>
                            <h2 class="card-title">Contact News Laravel</h2>
                            <p class="card-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>

                                <ul>
                                    <li>Phone: {{ $config['phone'] }}</li>
                                    <li>Email: {{ $config['email'] }}</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Side widgets-->
                @include('front.layout.side-widget')
            </div>
        </div>
@endsection
