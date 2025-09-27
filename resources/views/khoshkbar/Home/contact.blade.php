@extends('khoshkbar.layout.master')

@section('content')
    <section class="container-fluid inner-section">
        <div class="container p-0">
            <div class="row mt-3 mb-3">
                <div class="col-12 p-0">
                    <div class="card crd-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 p-0">
                                    <span class="tiltle-slider">تماس با ما</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 p-0 text-center">
                                    <h2 class="c-category">
                                        <span>
                                            اطلاعات خود را برای ما بگذارید
                                        </span>
                                    </h2>

                                </div>
                            </div>
                            <style>
                                label.error {
                                    color: red;
                                    font-size: 13px;
                                    margin-top: 5px;
                                    display: block;
                                }
                            </style>
                            <div class="row mt-4">
                                <div class="col-lg-9 col-md-10 mx-auto col-12 p-0">
                                    <form method="POST" action="{{ route('Contactpost') }}" id="contact-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12 mt-3">
                                                <div class="d-flex align-items-center bg-color">
                                                    <span class="icon-user"><i class="fas fa-user"></i></span>
                                                    <input type="text" name="username" placeholder="نام و نام خانوادگی"
                                                        value="{{ old('username') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mt-3">
                                                <div class="d-flex align-items-center bg-color">
                                                    <span class="icon-mail"><i class="fas fa-envelope"></i></span>
                                                    <input type="text" name="email" placeholder="ایمیل"
                                                        value="{{ old('email') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-12 mt-3">
                                                <div class="d-flex align-items-center bg-color">
                                                    <span class="icon-subject"><i class="fas fa-paperclip"></i></span>
                                                    <input type="text" name="title" placeholder="موضوع"
                                                        value="{{ old('title') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-12 mt-3">
                                                <div class="d-flex align-items-baseline bg-color">
                                                    <span class="icon-message"><i
                                                            class="fas fa-comment-alt-edit"></i></span>
                                                    <textarea class="col-md-8 col-12 " name="content" placeholder="پیام" style="height: 76px;margin-right: 8px;">{{ old('content') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 mx-auto col-12 mt-4 text-center">
                                                <button type="submit"
                                                    class="btn btn-primary d-flex align-items-center btn-send">
                                                    <span class="icon-send"></span> اکنون ارسال کنید
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-12 p-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 p-0">
                                    <span class="tiltle-slider">اطلاعات تماس</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 p-0">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d198.13107322400228!2d46.235329895485705!3d37.38753420274892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x401b11d736d2a6df%3A0xe4d189097c9958e7!2z2qnYp9ix2YjYp9mG2LPYsdin24wg2K7Yp9mF2YbZhw!5e0!3m2!1sfa!2s!4v1758371896268!5m2!1sfa!2s"
                                        style="border:0;" allowfullscreen="" loading="lazy" width="100%"
                                        height="300"></iframe>
                                </div>
                            </div>
                            <div class="row mt-3 info-contact">
                                <div class="col-12 mt-3">
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <span class="text-info">
                                        مراغه، مراغه، استان آذربایجان شرقی، مراغه، محله آغداش،،، 96QP+246، ایران
                                    </span>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="d-block">
                                        <span>
                                            <i class="fas fa-phone-plus"></i>
                                        </span>
                                        <span class="text-info">
                                            <a href="tel:+989145015158">09145015158</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="d-block">
                                        <span>
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <span class="text-info">
                                            <a href="meysamkhoshkbar@gmail.com">meysamkhoshkbar@gmail.com</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Khoshkbar\ContactRequest', '#contact-form') !!}


    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>
@endsection
