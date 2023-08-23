@extends('landing')
@section('content')
    <div class="container-fluid custom-section">
        <div class="custom-spacing"></div>
        <div id="section" class="container" style="height: 75vh">
            <div class="row justify-content-center text-center" data-aos="fade-up">
                <div class="col-4">
                    <h1 class="mb-4 text-primary">CONTACT US</h1>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-6" data-aos="fade-up" data-aos-duration="500">
                    <h2 class="mb-4 text-primary">Address</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    </p>
                </div>
                <div class="col-md-6 text-lg-end" data-aos="fade-up" data-aos-duration="500">
                    <div class="row">
                        <form id="myform">
                            @csrf
                            <div class="col-12">
                                <h2 class="mb-4 text-primary text-lg-start">Send Mesagge</h2>
                            </div>
                            <div class="input-group mb-3">
                                <input required id="firstname" name="firstname" type="text" class="form-control me-4"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                    placeholder="Fist Name" />
                                <input required id="lastname" name="lastname" type="text" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                    placeholder="Last Name" />
                            </div>
                            <div class="input-group mb-3">
                                <input required id="email" name="email" type="text" class="form-control" placeholder="Email"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2" />
                            </div>
                            <div class="input-group">
                                <textarea required id="message" name="message" class="form-control" aria-label="With textarea" placeholder="Mesagge"></textarea>
                            </div>
                            <div class="input-group mb-3 justify-content-end">
                                <button type="submit" class="btn btn-primary mt-2">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-spacing d-none d-xs-block"></div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#myform').submit(function(e) {
                e.preventDefault();
                $.post("/contact-insert", $(this).serialize(),
                    function(data) {
                        swal({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                            button: false,
                            timer: 1350
                        })
                        $('#myform')[0].reset();
                    },
                    "json"
                );
            });
        });
    </script>
@endsection
