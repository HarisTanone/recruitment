export function savelocalStorageData(
    local_personalInfo,
    local_lastEducation,
    local_workExperience
) {
    var personalInfo = JSON.parse(local_personalInfo);
    var lastEducation = JSON.parse(local_lastEducation);
    var workExperience = JSON.parse(local_workExperience);

    var data = {
        personalInfo: personalInfo,
        lastEducation: lastEducation,
        workExperience: workExperience,
        _token: $("#token").attr("content"),
    };

    $.post("/apply/save", data, function (response) {
        console.log(response.message);
    });
}

// helper.js
export function jobApplication(data) {
    $.post("/insert-job-applications", data, function (response) {
        if (response.success) {
            swal({
                title: "Success",
                text: response.message,
                icon: "success",
                button: false,
                timer: 1350,
            });
        } else {
            swal({
                title: "Error",
                text: response.message,
                icon: "error",
                button: false,
                timer: 1350,
            });
        }
    });
}
