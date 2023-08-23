@extends('landing')
@section('content')
    <!-- section-1 // hero -->
    <div id="sectionSATU" class="container-fluid bg-image" style="background-color: aliceblue; height: 90vh">
      <div class="custom-spacing"></div>
      <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
          <h1 class="mb-4 text-primary fw-bold">Frequently Asked Questions</h1>
          <div class="col-md-4">
            <div class="input-group input-group-lg">
              <input type="text" class="form-control shadow-2 border-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Search" />
            </div>
            <a type="button" class="btn mt-2 btn-primary" href="#sectionDUA">Search</a>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir section-1 // hero -->

    <div class="custom-spacing"></div>

    <!-- section 2 accordion -->
    <div id="sectionDUA" class="container-fluid custom-section">
      <div class="container p-4">
        <div class="accordion" id="accordionExample">
          <div class="row">
            <div class="col-md-12">
              <div class="accordion-item" data-aos="fade-up">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is TalentFinders?</button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">TalentFinders is an innovative recruitment platform connecting companies with the best-suited candidates across various industries.</div>
                </div>
              </div>
              <div class="accordion-item" data-aos="fade-up">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Is my personal information safe on TalentFinders?</button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance,
                    as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                    <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item" data-aos="fade-up">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Who can see my profile information?</button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance,
                    as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                    <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item" data-aos="fade-up">
                <h2 class="accordion-header" id="heading4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">How do I contact customer support?</button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                  <div class="accordion-body">TalentFinders is an innovative recruitment platform connecting companies with the best-suited candidates across various industries.</div>
                </div>
              </div>
              <div class="accordion-item" data-aos="fade-up">
                <h2 class="accordion-header" id="heading5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">Can I follow a company for updates?</button>
                </h2>
                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance,
                    as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                    <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item" data-aos="fade-up">
                <h2 class="accordion-header" id="heading6">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse">How do I apply for a job?</button>
                </h2>
                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance,
                    as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the
                    <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-2 pt-4">
                <a type="button" href="#!" class="btn btn-primary">Load More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir section 2 acordion -->

@endsection