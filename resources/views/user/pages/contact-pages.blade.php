@extends('landing')
@section('content')
    <div class="container-fluid custom-section">
        <div class="custom-spacing"></div>
        <div id="section" class="container">
            <div class="row justify-content-center text-center" data-aos="fade-up">
                <div class="col-4">
                    <h1 class="mb-4 text-primary">CONTACT US</h1>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                    <h2 class="mb-4 text-primary">Address</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.9986754350325!2d112.73760197383504!3d-7.240987371118271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f91613e32197%3A0xb6a7be1a9dbdb844!2sJl.%20Waspada%20No.94-J%2C%20RT.002%2FRW.02%2C%20Bongkaran%2C%20Kec.%20Pabean%20Cantikan%2C%20Surabaya%2C%20Jawa%20Timur%2060161!5e0!3m2!1sid!2sid!4v1695283237401!5m2!1sid!2sid"
                        width="500" height="200" class="shadow rounded-1"></iframe>
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
                                <input required id="email" name="email" type="text" class="form-control"
                                    placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2" />
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
