@extends('landing')
@section('content')
    <style>
        :root {
            --prm-color: #0D3745;
            --prm-gray: #b1b1b1;
        }

        /* CSS */
        .steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .step-button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            background-color: var(--prm-gray);
            transition: .4s;
        }

        .step-button[aria-expanded="true"] {
            width: 60px;
            height: 60px;
            background-color: var(--prm-color);
            color: #fff;
        }

        .done {
            background-color: var(--prm-color);
            color: #fff;
        }

        .step-item {
            z-index: 10;
            text-align: center;
        }

        #progress {
            -webkit-appearance: none;
            position: absolute;
            width: 95%;
            z-index: 5;
            height: 10px;
            margin-left: 18px;
            margin-bottom: 18px;
        }

        /* to customize progress bar */
        #progress::-webkit-progress-value {
            background-color: var(--prm-color);
            transition: .5s ease;
        }

        #progress::-webkit-progress-bar {
            background-color: var(--prm-gray);

        }

        .table> :not(caption)>*>* {
            color: white;
            background-color: transparent;
        }
    </style>
    <div class="custom-spacing"></div>
    <div id="section" class="container-fluid custom-section">
        <div class="container pt-5 pb-5">
            <div class="accordion" id="accordionExample">
                <div class="steps">
                    <progress id="progress" value=0 max=100></progress>
                    <div class="step-item">
                        <button class="step-button text-center" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1
                        </button>
                        <div class="step-title">
                            First Step
                        </div>
                    </div>
                    <div class="step-item">
                        <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2
                        </button>
                        <div class="step-title">
                            Second Step
                        </div>
                    </div>
                    <div class="step-item">
                        <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            3
                        </button>
                        <div class="step-title">
                            Third Step
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div id="headingOne">
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="border-0 shadow">
                            <div class="card bg-primary" id="personalInfoCard">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-white">Personal Information</h5>
                                    <form id="personal-information">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
                                                <input type="number" class="form-control mb-2" id="id_cart"
                                                    name="id_cart" placeholder="ID Card number" required />
                                            </div>
                                            <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
                                                <input type="text" class="form-control" placeholder="Full Name"
                                                    aria-label="name" id="nama" name="nama" required />
                                            </div>
                                            <div class="mb-3 col-lg-4 col-md-6 col-sm-12">
                                                <input type="number" class="form-control" id="usia" name="usia"
                                                    placeholder="Age" required />
                                            </div>
                                            <div class="mb-3 col-lg-4 col-md-6 col-sm-12">
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
                                            <div class="mb-3 col-lg-4 col-md-6 col-sm-12">
                                                <select class="form-select" aria-label="Default select example"
                                                    id="kelamin" name="kelamin" required>
                                                    <option value="">Gender</option>
                                                    <option value="pria">Pria</option>
                                                    <option value="wanita">Wanita</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                                <input type="email" class="form-control mb-2" id="email"
                                                    name="email" placeholder="Email" required />
                                            </div>
                                            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                                <input type="number" class="form-control mb-2" id="phone_number"
                                                    name="phone_number" placeholder="Phone Number" required />
                                            </div>
                                            <div class="mb-3 col-lg-4 col-md-12 col-sm-12">
                                                <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Alamat Domisili" required></textarea>

                                            </div>
                                            <div class="mb-3 col-lg-4 col-md-12 col-sm-12">
                                                <textarea class="form-control" id="bahasa" name="bahasa" rows="2" placeholder="Bahasa"
                                                    data-bs-toggle="popover" data-bs-placement="bottom"
                                                    data-bs-content="Jika menguasai lebih dari 1 bahas maka dapat menggunakan koma ," required></textarea>
                                            </div>
                                            <div class="mb-3 col-lg-4 col-md-12 col-sm-12">
                                                <textarea class="form-control" id="extra_skill" name="extra_skill" rows="2" placeholder="Skills"
                                                    data-bs-toggle="popover" data-bs-placement="top"
                                                    data-bs-content="Jika menguasai lebih dari 1 skill maka dapat menggunakan koma ," required></textarea>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-secondary float-end">Next</button>
                                        <button type="button" class="btn btn-link float-end text-white"
                                            id="cek_idcart">Sudah Pernah Melengkapi Data</button>
                                        {{-- <button type="button" class="btn btn-secondary float-end">Sudah Pernah Melengkapi Data</button>
                                        <button type="submit" class="btn btn-secondary float-end">Next</button> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div id="headingTwo">

                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="border-0 shadow">
                            <!-- Card Last Education -->
                            <div class="card bg-primary" id="educationCard">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-white">Last Education</h5>
                                    <form id="last-education">
                                        <div class="row">
                                            <div class="mb-3 col-lg-12 col-md-12">
                                                <select class="form-select" id="jenjang" name="jenjang" required>
                                                    <option value="SMA">SMA</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-lg-6 col-md-12 col-sm-12">
                                                <input required type="text" class="form-control" id="universitas"
                                                    name="universitas" placeholder="Universitas" />
                                            </div>
                                            <div class="mb-3 col-lg-6 col-md-12 col-sm-12">
                                                <input required type="text" class="form-control" id="jurusan"
                                                    name="jurusan" placeholder="Jurusan" />
                                            </div>
                                            <div class="mb-3 col-lg-4 col-md-4 -col-sm-4">
                                                <input required type="number" class="form-control" id="tahunMasuk"
                                                    name="tahunMasuk" placeholder="Tahun Masuk" />
                                            </div>
                                            <div class="mb-3 col-lg-4 col-md-4 -col-sm-4">
                                                <input required type="number" class="form-control" id="tahunLulus"
                                                    name="tahunLulus" placeholder="Tahun Lulus" />
                                            </div>
                                            <div class="mb-3 col-lg-4 col-md-4 -col-sm-4">
                                                <input required type="number" step="0.01" class="form-control"
                                                    id="ipk" name="ipk" placeholder="IPK" />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-secondary float-end">Next</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div id="headingThree">

                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="border-0 shadow">
                            <div class="card bg-primary" id="workExperienceCard">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h5 class="card-title text-white">Work Experience</h5>
                                    </div>
                                    <form id="workExperiences">
                                        <div class="row">
                                            <div class="mb-3 col-lg-6 col-md-12 col-sm-12">
                                                <input type="text" class="form-control" id="namaPerusahaan"
                                                    name="namaPerusahaan" placeholder="Nama Perusahaan" />
                                            </div>
                                            <div class="mb-3 col-lg-6 col-md-12 col-sm-12">
                                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                                    placeholder="Jabatan" />
                                            </div>
                                            <div class="mb-3 col-lg-5 col-md-12 col-sm-12">
                                                <input type="date" class="form-control" id="tanggalMulai"
                                                    name="tanggalMulai" placeholder="tanggal mulai" />
                                            </div>
                                            <div class="align-self-center col-lg-2 mb-3 mr-3 text-center">
                                                <input class="form-check-input" type="checkbox" id="saatIni"
                                                    name="saatIni" />
                                                <label class="form-check-label text-white" for="saatIni"> Saat ini
                                                </label>
                                            </div>
                                            <div class="mb-3 col-lg-5 col-md-12 col-sm-12">
                                                <input type="date" class="form-control" id="tanggalSelesai"
                                                    name="tanggalSelesai" />
                                            </div>
                                        </div>


                                        {{--  --}}
                                        {{-- <div class="btn-group float-end" role="group"
                                            aria-label="Basic mixed styles example">
                                        </div> --}}
                                        <button type="submit" class="btn btn-secondary float-end">Save</button>
                                        <button type="button" class="btn btn-link float-end text-white"
                                            id="saveWork">Add Work
                                            Experience</button>
                                        {{--  --}}

                                    </form>
                                    <!-- HTML Table -->
                                    <div class="mt-4 pt-5">
                                        <table class="table table-striped rounded" id="workExperienceTable"
                                            style="display: none;">
                                            <!-- Table headers... -->
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th scope="col">Nama Perusahaan</th>
                                                    <th scope="col">Jabatan</th>
                                                    <th scope="col">Tanggal Mulai</th>
                                                    {{-- <th scope="col">Saat Ini</th> --}}
                                                    <th scope="col">Tanggal Selesai</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="workExperienceTableBody">
                                                <!-- Table rows will be dynamically added here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="cekid_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cek Data</h5>
                </div>
                <div class="modal-body">
                    <form id="form_cekid">
                        @csrf
                        <input type="number" name="id_cart" id="id_cart" class="form-control" required
                            placeholder="1234567890123">
                        <div class="float-end pt-5">
                            <button type="submit" class="btn btn-primary">Check</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
@endsection
@section('script')
    <script>
        // cek jika sudah ada user id maka langsung redirect ke home page untuk apply job
        if (localStorage.getItem('userID')) {
            window.location.href = localStorage.getItem('last_path');
        }
        //
        const stepButtons = document.querySelectorAll('.step-button');
        const progress = document.querySelector('#progress');

        Array.from(stepButtons).forEach((button, index) => {
            button.addEventListener('click', () => {
                progress.setAttribute('value', index * 100 / (stepButtons.length -
                    1));

                stepButtons.forEach((item, secindex) => {
                    if (index > secindex) {
                        item.classList.add('done');
                    }
                    if (index < secindex) {
                        item.classList.remove('done');
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#personal-information').submit(function(e) {
                e.preventDefault();
                const formData = $("#personal-information").serializeArray();
                const personalInformation = {};
                $.each(formData, function(index, field) {
                    personalInformation[field.name] = field.value;
                });
                const personalInformationJSON = JSON.stringify(personalInformation);
                localStorage.setItem("personalInformation", personalInformationJSON);
                $('#collapseTwo').collapse('show');
                $('.step-button[data-bs-target="#collapseOne"]').addClass('done');
                $('#headingTwo button').trigger('click');
                document.querySelector('#progress').setAttribute('value', 50)
            });

            $("#last-education").submit(function(e) {
                e.preventDefault();
                const formData = $("#last-education").serializeArray();
                const lastEducation = {};
                $.each(formData, function(index, field) {
                    lastEducation[field.name] = field.value;
                });
                const lastEducationJSON = JSON.stringify(lastEducation);
                localStorage.setItem("lastEducation", lastEducationJSON);
                $('#collapseThree').collapse('show');
                $('.step-button[data-bs-target="#collapseTwo"]').addClass('done');
                $('#headingThree button').trigger('click');
                document.querySelector('#progress').setAttribute('value', 100)
            });

            $("#workExperiences").submit(function(e) {
                e.preventDefault();
                var local_personalInfo = localStorage.getItem('personalInformation')
                var local_lastEducation = localStorage.getItem('lastEducation')
                var local_workExperience = localStorage.getItem('workExperiences')

                if (!local_personalInfo || !local_lastEducation || !local_workExperience) {
                    swal({
                        title: "Oops...",
                        text: "Pastikan Semua Data Telah Dilengkapi.!",
                        icon: "error",
                        button: false,
                        timer: 1350
                    })
                } else {
                    savelocalStorageData();
                }
            });

            function savelocalStorageData() {
                var personalInfo = JSON.parse(localStorage.getItem('personalInformation'));
                var lastEducation = JSON.parse(localStorage.getItem('lastEducation'));
                var workExperience = JSON.parse(localStorage.getItem('workExperiences'));

                var data = {
                    personalInfo: personalInfo,
                    lastEducation: lastEducation,
                    workExperience: workExperience,
                    _token: $('#token').attr('content')
                };

                $.post('/apply/save', data, function(response) {
                    localStorage.setItem('userID', response.kandidat_id)
                    window.location.href = localStorage.getItem('last_path');
                });
            }

        });
    </script>
    <script>
        var workExperienceArray = JSON.parse(localStorage.getItem('workExperiences')) || [];
        toggleTableVisibility();
        displayWorkExperiences();

        function saveWorkExperience() {
            localStorage.setItem('workExperiences', JSON.stringify(workExperienceArray));
        }

        // Function to add work experience to the array
        function addWorkExperience() {
            var namaPerusahaan = document.getElementById("namaPerusahaan").value;
            var jabatan = document.getElementById("jabatan").value;
            var tanggalMulai = document.getElementById("tanggalMulai").value;
            var tanggalSelesai = document.getElementById("tanggalSelesai").value;

            // Validate that all fields are not empty
            if (!namaPerusahaan || !jabatan || !tanggalMulai || !tanggalSelesai) {
                swal({
                    title: "Oops...",
                    text: "Semua Field Harus Diisi.!",
                    icon: "error",
                    button: false,
                    timer: 1350
                })
                return;
            }
            // Validate tanggalMulai and tanggalSelesai
            var isValid = validateDates(tanggalMulai, tanggalSelesai);
            if (!isValid) {
                swal({
                    title: "Oops...",
                    text: "Tanggal Mulai harus sebelum Tanggal Selesai.",
                    icon: "error",
                    button: false,
                    timer: 1350
                })
                return;
            }

            var newWorkExperience = {
                id: new Date().getTime(), // Generate a unique timestamp-based ID
                nama_perusahaan: namaPerusahaan,
                posisi: jabatan,
                tanggal_mulai: tanggalMulai,
                tanggal_selesai: tanggalSelesai
            };

            workExperienceArray.push(newWorkExperience);
            saveWorkExperience();
            resetForm();
            displayWorkExperiences();
            toggleTableVisibility();
        }

        // Function to display work experiences
        function displayWorkExperiences() {
            var workExperienceTableBody = document.getElementById("workExperienceTableBody");
            workExperienceTableBody.innerHTML = ""; // Clear previous data

            for (var i = 0; i < workExperienceArray.length; i++) {
                var workExperience = workExperienceArray[i];
                var tableRow = document.createElement("tr");

                var tableDataNamaPerusahaan = document.createElement("td");
                tableDataNamaPerusahaan.textContent = workExperience.nama_perusahaan;

                var tableDataJabatan = document.createElement("td");
                tableDataJabatan.textContent = workExperience.posisi;

                var tableDataTanggalMulai = document.createElement("td");
                tableDataTanggalMulai.textContent = workExperience.tanggal_mulai;

                var tableDataSaatIni = document.createElement("td");
                tableDataSaatIni.textContent = workExperience.saat_ini ? "Saat Ini" : "Tidak";

                var tableDataNumber = document.createElement("td");
                tableDataNumber.textContent = i + 1;

                var tableDataTanggalSelesai = document.createElement("td");
                tableDataTanggalSelesai.textContent = workExperience.tanggal_selesai;

                var tableDataAction = document.createElement("td");
                var deleteButton = document.createElement("button");
                deleteButton.textContent = "Delete";
                deleteButton.className = "btn btn-outline-secondary btn-sm";
                deleteButton.addEventListener("click", function() {
                    deleteWorkExperience(workExperience.id);
                });

                tableDataAction.appendChild(deleteButton);
                tableRow.appendChild(tableDataNumber);
                tableRow.appendChild(tableDataNamaPerusahaan);
                tableRow.appendChild(tableDataJabatan);
                tableRow.appendChild(tableDataTanggalMulai);
                tableRow.appendChild(tableDataTanggalSelesai);
                tableRow.appendChild(tableDataAction);

                workExperienceTableBody.appendChild(tableRow);
            }
        }

        // Function to delete work experience from the array
        function deleteWorkExperience(id) {
            workExperienceArray = workExperienceArray.filter(function(work) {
                return work.id !== id;
            });
            saveWorkExperience();
            displayWorkExperiences();
            toggleTableVisibility();
        }

        // Function to reset the form
        function resetForm() {
            document.getElementById("namaPerusahaan").value = "";
            document.getElementById("jabatan").value = "";
            document.getElementById("tanggalMulai").value = "";
            document.getElementById("saatIni").checked = false;
            document.getElementById("tanggalSelesai").value = "";
        }
        $('#saveWork').click(function(e) {
            e.preventDefault();
            addWorkExperience();
            toggleTableVisibility();
        });

        function toggleTableVisibility() {
            var workExperienceTable = document.getElementById("workExperienceTable");
            if (workExperienceArray.length > 0) {
                workExperienceTable.style.display = "table";
            } else {
                workExperienceTable.style.display = "none";
            }
        }

        function handleSaatIniCheckbox() {
            var saatIniCheckbox = document.getElementById("saatIni");
            var tanggalSelesaiInput = document.getElementById("tanggalSelesai");

            if (saatIniCheckbox.checked) {
                tanggalSelesaiInput.value = new Date().toISOString().split('T')[0];
                tanggalSelesaiInput.disabled = true;
            } else {
                tanggalSelesaiInput.value = "";
                tanggalSelesaiInput.disabled = false;
            }
        }

        function validateDates(tanggalMulai, tanggalSelesai) {
            return new Date(tanggalMulai) <= new Date(tanggalSelesai);
        }
        $('#saatIni').change(function(e) {
            e.preventDefault();
            handleSaatIniCheckbox();
        });

        $('#cek_idcart').click(function(e) {
            e.preventDefault();
            $('#cekid_modal').modal('show')
            $('#form_cekid').submit(function(e) {
                e.preventDefault();
                var id_cart_value = $('#form_cekid #id_cart').val()
                var url = "/cek/" + id_cart_value;
                $.getJSON(url,
                    function(res) {
                        if (res.status == 200) {
                            localStorage.setItem('personalInformation', res[0].kandidat)
                            localStorage.setItem('lastEducation', res[0].education)
                            localStorage.setItem('workExperiences', res[0].work)
                            localStorage.setItem('userID', res[0].kandidat_id)
                            swal({
                                title: "Success",
                                text: res.message,
                                icon: "success",
                                button: false,
                                timer: 3000
                            });
                            setTimeout(() => {
                                window.location.href = localStorage.getItem('last_path')
                            }, 3000);
                        } else {
                            swal({
                                title: "Oops.",
                                text: res.message,
                                icon: "error",
                                button: false,
                                timer: 3000
                            });
                        }
                    }
                );
            });
        });
    </script>
@endsection
