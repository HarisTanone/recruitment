@extends('landing')
@section('content')
    <div class="custom-spacing"></div>

    <div id="section" class="container-fluid custom-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <h1>TITLE JOB</h1>
                </div>
            </div>
            <div class="row pb-4">
                <!-- Progesi navigais link -->
                <div class="col-md-4">
                    <ul class="nav d-none flex-column d-md-block">
                        <li class="nav-item">
                            <a class="nav-link" href="#personalInfo1Card" id="navPersonalInfomation">Personal
                                Information</a>
                        </li>
                        <li class="nav-item">
                            <a id="naveducationCard" class="nav-link disabled" href="#educationCard">Last Education</a>
                        </li>
                        <li class="nav-item">
                            <a id="navworkExperienceCard" class="nav-link disabled" href="#workExperienceCard">Work
                                Experience</a>
                        </li>
                        <li class="nav-item">
                            <a id="navfinishCard" class="nav-link disabled" href="#finishCard">Finish</a>
                        </li>
                    </ul>
                </div>
                <!-- Akhir Progesi navigais link -->

                <!-- Form aplication in card -->
                <div class="col-md-8">
                    <!-- Card Personal Information -->
                    <div class="card bg-primary" id="personalInfoCard">
                        <div class="card-body">
                            <h5 class="card-title text-white">Personal Information</h5>
                            <form id="personal-information">
                                @csrf
                                <div class="mb-3">
                                    <input type="number" class="form-control mb-2" id="id_cart" name="id_cart"
                                        placeholder="ID Card number" required />
                                </div>
                                <div id="detailUser">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Full Name"
                                                    aria-label="name" id="nama" name="nama" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <input type="number" class="form-control" id="usia" name="usia"
                                                    placeholder="Age" required />
                                            </div>
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example"
                                                    id="agama" name="agama" required>
                                                    <option value="">Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddha">Buddha</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example"
                                                    id="kelamin" name="kelamin" required>
                                                    <option value="">Gender</option>
                                                    <option value="pria">Pria</option>
                                                    <option value="wanita">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <input type="email" class="form-control mb-2" id="email"
                                                    name="email" placeholder="Email" required />
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control mb-2" id="phone_number"
                                                    name="phone_number" placeholder="Phone Number" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Alamat Domisili" required></textarea>
                                            </div>
                                            <div class="col">
                                                <div class="col">
                                                    <textarea class="form-control" id="bahasa" name="bahasa" rows="2" placeholder="Bahasa"
                                                        data-bs-toggle="popover" data-bs-placement="bottom"
                                                        data-bs-content="Jika menguasai lebih dari 1 bahas maka dapat menggunakan koma ," required></textarea>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <textarea class="form-control" id="extra_skill" name="extra_skill" rows="2" placeholder="Skills"
                                                    data-bs-toggle="popover" data-bs-placement="top"
                                                    data-bs-content="Jika menguasai lebih dari 1 skill maka dapat menggunakan koma ," required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-secondary float-end">Next</button>
                                {{-- <button type="submit" class="btn btn-secondary float-end" onclick="showEducationCard()">Next</button> --}}
                            </form>
                        </div>
                    </div>

                    <!-- Card Last Education -->
                    <div class="card bg-primary d-none" id="educationCard">
                        <div class="card-body">
                            <h5 class="card-title text-white">Last Education</h5>
                            <form id="last-education">
                                <div class="mb-3">
                                    <select class="form-select" id="jenjang" name="jenjang">
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="namaInstitusi" name="namaInstitusi"
                                        placeholder="Nama Institusi" />
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="jurusan" name="jurusan"
                                        placeholder="Jurusan" />
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="tahunLulus" name="tahunLulus"
                                        placeholder="Tahun Lulus" />
                                </div>
                                <button type="button" class="btn btn-secondary float-start d-none d-sm-block d-md-none"
                                    onclick="">Back</button>
                                <button type="button" class="btn btn-secondary float-end">Next</button>
                            </form>
                        </div>
                    </div>

                    <!-- Card Work Experience -->
                    <div class="card bg-primary d-none" id="workExperienceCard">
                        <div class="card-body">
                            <h5 class="card-title text-white">Work Experience</h5>
                            <form id="workExperiences">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="namaPerusahaan" name="namaPerusahaan"
                                        placeholder="Nama Perusahaan" />
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="jabatan" name="jabatan"
                                        placeholder="Jabatan" />
                                </div>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="tanggalMulai" name="tanggalMulai"
                                        placeholder="tanggal mulai" />
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="saatIni" name="saatIni" />
                                        <label class="form-check-label" for="saatIni"> Saat ini </label>
                                    </div>
                                    <input type="date" class="form-control" id="tanggalSelesai" name="tanggalSelesai"
                                        disabled />
                                </div>
                                <button type="button" class="btn btn-secondary float-start d-none d-sm-block d-md-none"
                                    onclick="">Back</button>
                                <button type="button" class="btn btn-secondary float-end"
                                    onclick="showFinish()">Next</button>
                                <button type="button" class="btn btn-link float-end text-white"
                                    onclick="addWorkExperience()">Tambah Work Experience</button>
                            </form>
                        </div>
                    </div>

                    <!-- Card Submission approval -->
                    <div class="card bg-primary d-none" id="finishCard">
                        <div class="card-body">
                            <h5 class="card-title text-white">Finish</h5>
                            <form>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agreementCheck" required />
                                    <label class="form-check-label text-white" for="agreementCheck"> I agree with the
                                        terms and conditions </label>
                                </div>

                                <button type="submit" class="btn btn-secondary float-center">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Form aplication in card -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function addWorkExperience() {
            const workExperienceCard = document.getElementById("workExperienceCard");
            const newWorkExperienceCard = workExperienceCard.cloneNode(true);
            const form = newWorkExperienceCard.querySelector("form");

            // Clear input values
            form.reset();

            // Disable checkbox and input for "Saat ini"
            const saatIniCheckbox = form.querySelector("#saatIni");
            const tanggalSelesaiInput = form.querySelector("#tanggalSelesai");
            saatIniCheckbox.checked = false;
            tanggalSelesaiInput.disabled = true;

            workExperienceCard.parentNode.replaceChild(newWorkExperienceCard, workExperienceCard);

            // Hide the old work experience card
            workExperienceCard.style.display = "none";
        }

        // Fungsi button next di personal card
        function showPersonalInformation() {
            hidePopOver();
            document.getElementById("personalInfoCard").classList.remove("d-none");
            document.getElementById("educationCard").classList.add("d-none");
            document.getElementById("workExperienceCard").classList.add("d-none");
            document.getElementById("finishCard").classList.add("d-none");
            document.getElementById("navPersonalInfomation").classList.remove("disabled");
            document.getElementById("naveducationCard").classList.add("disabled");
            document.getElementById("navworkExperienceCard").classList.add("disabled");
            document.getElementById("navfinishCard").classList.add("disabled");
        }


        function showEducationCard() {
            hidePopOver()
            document.getElementById("educationCard").classList.remove("d-none");
            document.getElementById("personalInfoCard").classList.add("d-none");
            document.getElementById("navPersonalInfomation").classList.add("disabled");
            document.getElementById("naveducationCard").classList.remove("disabled");
        }

        // Fungsi button next di education
        function showWorkExperience() {
            hidePopOver()
            document.getElementById("workExperienceCard").classList.remove("d-none");
            document.getElementById("educationCard").classList.add("d-none");
            document.getElementById("personalInfoCard").classList.add("d-none");
            document.getElementById("navPersonalInfomation").classList.add("disabled");
            document.getElementById("naveducationCard").classList.add("disabled");
            document.getElementById("navworkExperienceCard").classList.remove("disabled");
        }

        // Fungsi button next di work experience
        function showFinish() {
            document.getElementById("finishCard").classList.remove("d-none");
            document.getElementById("workExperienceCard").classList.add("d-none");
            document.getElementById("navworkExperienceCard").classList.add("disabled");
            document.getElementById("navPersonalInfomation").classList.add("disabled");
            document.getElementById("personalInfoCard").classList.add("d-none");
            document.getElementById("navfinishCard").classList.remove("disabled");
        }

        function hidePopOver() {
            const popovers = document.querySelectorAll('[data-bs-toggle="popover"]');
            popovers.forEach(popover => {
                const bsPopover = bootstrap.Popover.getInstance(popover);
                if (bsPopover) {
                    bsPopover.hide();
                }
            });
        }

        // Fungsi button finish di card finish

        // baru
        document.addEventListener("DOMContentLoaded", function() {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });
        });

        $(document).ready(function() {
            $("#personal-information button[type='submit']").click(function(event) {
                event.preventDefault();
                const formData = $("#personal-information").serializeArray();
                const personalInformation = {};
                $.each(formData, function(index, field) {
                    personalInformation[field.name] = field.value;
                });
                const personalInformationJSON = JSON.stringify(personalInformation);
                localStorage.setItem("personalInformation", personalInformationJSON);
                showEducationCard();
            });

            $("#last-education button[type='button']").click(function() {
                const formData = $("#last-education").serializeArray();
                const lastEducation = {};
                $.each(formData, function(index, field) {
                    lastEducation[field.name] = field.value;
                });
                const lastEducationJSON = JSON.stringify(lastEducation);
                localStorage.setItem("lastEducation", lastEducationJSON);
                showWorkExperience();
            });
            $("#workExperiences button[type='button']").click(function() {
                const formData = $("#workExperiences").serializeArray();
                const lastEducation = {};
                $.each(formData, function(index, field) {
                    lastEducation[field.name] = field.value;
                });
                const lastEducationJSON = JSON.stringify(lastEducation);
                localStorage.setItem("workExperience", lastEducationJSON);
                showFinish();
            });

            // go to view ketika data belum tersedia di localstorage
            const personalInformationJSON = localStorage.getItem("personalInformation");
            const lastEducationJSON = localStorage.getItem("lastEducation");
            const workExperienceJSON = localStorage.getItem("workExperience");

            if (!personalInformationJSON) {
                showPersonalInformation()
            } else if (!lastEducationJSON) {
                showEducationCard();
            } else if (!workExperienceJSON) {
                showWorkExperience();
            } else if(personalInformationJSON && lastEducationJSON && workExperienceJSON){
                console.log('ok -> ', personalInformationJSON && lastEducationJSON && workExperienceJSON)
                showFinish();
            }
        });
    </script>
@endsection
