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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
          </div>
          <div class="col-md-6 text-lg-end" data-aos="fade-up" data-aos-duration="500">
            <div class="row">
              <div class="col-12">
                <h2 class="mb-4 text-primary text-lg-start">Send Mesagge</h2>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control me-4" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Fist Name" />
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Last Name" />
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2" />
              </div>
              <div class="input-group">
                <textarea class="form-control" aria-label="With textarea" placeholder="Mesagge"></textarea>
              </div>
              <div class="input-group mb-3 justify-content-end">
                <button type="button" class="btn btn-primary mt-2">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="custom-spacing d-none d-xs-block"></div>
    </div>

    @endsection
