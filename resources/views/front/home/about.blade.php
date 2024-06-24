@extends('front.layout.template')

@section('title', 'About News Portal - Septi Isdayanna')

@section('content')
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8" data-aos="zoom-out">
                    <!-- Featured blog post-->
                    <div class="card mb-4 shadow-sm">
                        <a href="">
                            <img class="card-img-top featured-img" src="{{ asset('front/img/programming.png') }}" alt="About News Laravel" />
                        </a>

                        <div class="card-body">
                            <div class="small text-muted">{{ date('d-m-Y') }}</div>
                            <h2 class="card-title">About News Code</h2>
                            <p class="card-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>

                                <ul>
                                    <li><a href="https://youtube.com/{{ $config['youtube'] }}">Youtube</a></li>
                                    <li><a href="https://facebook.com/{{ $config['facebook'] }}">Facebook</a></li>
                                    <li><a href="https://instagram.com/{{ $config['instagram'] }}">Instagram</a></li>
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
