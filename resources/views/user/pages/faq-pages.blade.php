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
                        <input type="text" class="form-control shadow-2 border-2" id="searchInput"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                            placeholder="Search" />
                    </div>
                    <button type="button" class="btn mt-2 btn-primary" id="searchButton">Search</button>
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
                    <div class="col-md-12" id="viewFAQ">
                        {{-- data tampil sini --}}
                    </div>
                    {{-- <div class="row justify-content-center">
                        <div class="col-lg-2 pt-4">
                            <a type="button" href="#!" class="btn btn-primary">Load More</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- akhir section 2 acordion -->
@endsection
@section('script')
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Menangani klik pada tombol searchButton
        document.getElementById("searchButton").addEventListener("click", function() {
            // Temukan elemen tujuan dengan ID sectionDUA
            var sectionDUA = document.getElementById("sectionDUA");
            if (sectionDUA) {
                // Perpindahan scroll ke bagian tujuan
                sectionDUA.scrollIntoView({ behavior: "smooth" });
            }
        });
    });
    </script>
    <script>
        $(document).ready(function() {
            var faqData; // Variable to store the fetched FAQ data

            // Fetch FAQ data
            $.getJSON("/faq/all", function(data, textStatus, jqXHR) {
                faqData = data; // Store the fetched data
                renderFAQ(data); // Initial rendering of FAQs
            });

            // Search button click event
            $("#searchButton").click(function() {
                var searchTerm = $("#searchInput").val().toLowerCase();
                var filteredData = faqData.filter(function(faq) {
                    return (
                        faq.question.toLowerCase().includes(searchTerm) ||
                        faq.answer.toLowerCase().includes(searchTerm)
                    );
                });
                renderFAQ(filteredData); // Render filtered FAQs
            });

            // Function to render FAQ data
            function renderFAQ(data) {
                var html = '';
                $.each(data, function(idx, val) {
                    html += `<div class="accordion-item aos-init aos-animate" data-aos="fade-up">
                        <h2 class="accordion-header" id="heading${val.id}">
                          <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse${val.id}"
                            aria-expanded="false"
                            aria-controls="collapse${val.id}"
                          >
                            ${val.question}
                          </button>
                        </h2>
                        <div
                          id="collapse${val.id}"
                          class="accordion-collapse collapse"
                          aria-labelledby="heading${val.id}"
                          data-bs-parent="#accordionExample"
                          style=""
                        >
                          <div class="accordion-body">
                            ${val.answer}
                          </div>
                        </div>
                      </div>
                      `;
                });
                $('#viewFAQ').html(html);
            }
        });
    </script>
@endsection
