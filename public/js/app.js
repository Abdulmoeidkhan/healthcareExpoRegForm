($("#identity").length > 0) && $("#identity").inputmask();



// Multi Select Button JQUERY

$(document).ready(function () {

    var multipleCancelButton = new Choices('#multi-select-interestSelect', {
        removeItemButton: true,
        maxItemCount: 10,
        searchResultLimit: 6,
        renderChoiceLimit: 6
    });
    var multipleCancelButton = new Choices('#multi-select-purpose', {
        removeItemButton: true,
        maxItemCount: 6,
        searchResultLimit: 6,
        renderChoiceLimit: 6
    });


});

// CNIC NUMBER Validator

function isNumeric(comp) {
    let evt = document.getElementById(comp);
    let evtValue = evt.value;

    evtValue = evtValue.replaceAll("-", "");
    evtValue = evtValue.replaceAll("_", "");
    evtValue = parseInt(evtValue)
    var regex = /^\d{13}$/;
    if (!regex.test(evtValue)) {
        evt.returnValue = false;
        evt.setCustomValidity("CNIC Must be 13 Digit Long");
        evt.reportValidity();
        if (evt.preventDefault) { evt.preventDefault() };
        return false
    } else {
        evt.setCustomValidity("");
        evt.value = evtValue
        return true
    }
}

// Length Validator

function isCorrectLength(comp) {
    let evt = document.getElementById(comp);
    var regex = /^[A-Za-z0-9_]{6,9}$/;
    if (!regex.test(evt.value)) {
        evt.returnValue = false;
        evt.setCustomValidity("Passport Number Should be 6 to 9 Character Long");
        evt.reportValidity();
        if (evt.preventDefault) evt.preventDefault();
        return false;
    } else {
        evt.setCustomValidity("");
        return true;
    }
};

// Contact Number Validator

function isCtc(comp) {
    let evt = document.getElementById(comp);
    var regex = /^\d{10,15}$/;
    if (!regex.test(parseInt(evt.value))) {
        evt.returnValue = false;
        evt.setCustomValidity("Contact Number should be between 10-15 numbers");
        evt.reportValidity();
        if (evt.preventDefault) evt.preventDefault();
        return false;
    } else {
        evt.setCustomValidity("");
        return true;
    }
};


// Email Address Validator

function isEmail(comp) {
    // var theEvent = evt || window.event;
    let evt = document.getElementById(comp);
    let regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    if (!regex.test(evt.value)) {
        evt.returnValue = false;
        evt.setCustomValidity("Email Address should be well formatted");
        evt.reportValidity();
        if (evt.preventDefault) evt.preventDefault();
        return false;
    } else {
        evt.setCustomValidity("");
        return true;
    }
};


function isCurrentQuantity(comp) {
    // var theEvent = evt || window.event;
    let evt = document.getElementById(comp);
    var regex = /^\d{1}$/;
    if (!regex.test(evtValue)) {
        evt.returnValue = false;
        evt.setCustomValidity("you can select value 1-9");
        evt.reportValidity();
        if (evt.preventDefault) { evt.preventDefault() };
        return false
    } else {
        evt.setCustomValidity("");
        evt.value = evtValue
        return true
    }
};


// Form Submission

function formdispatch() {
    setTimeout(document.getElementsByTagName("form")[0].submit(), 10000);
}

// UUID Generator

$(document).ready(function () {
    function generateUUID() { // Public Domain/MIT
        var d = new Date().getTime();//Timestamp
        var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now() * 1000)) || 0;//Time in microseconds since page-load or 0 if unsupported
        return 'xxxx4xxxyxxx'.replace(/[xy]/g, function (c) {
            var r = Math.random() * 16;//random number between 0 and 16
            if (d > 0) {//Use timestamp until depleted
                r = (d + r) % 16 | 0;
                d = Math.floor(d / 16);
            } else {//Use microseconds since page-load if supported
                r = (d2 + r) % 16 | 0;
                d2 = Math.floor(d2 / 16);
            }
            return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
    }
    document.getElementById("sessionId").value = generateUUID();
});

// First Page Identity type validator CNIC / PASSPORT

document.getElementById("nationality")?.addEventListener("change", (evt) => {
    if (evt.target.value === "Pakistan") {
        document.getElementById("identificatoinLabel").innerHTML = "CNIC Number: *";
        document.getElementById("identity").remove();
        let cnicInput = document.createElement("input");
        cnicInput.setAttribute("type", "text");
        cnicInput.setAttribute("class", "field1");
        cnicInput.setAttribute("id", "identity");
        cnicInput.setAttribute("title", "CNIC");
        cnicInput.setAttribute("name", "identity");
        cnicInput.setAttribute("placeholder", "CNIC");
        cnicInput.setAttribute("onchange", "isNumeric('identity')")
        // cnicInput.setAttribute("title", "13 DIGIT CNIC CODE");
        cnicInput.setAttribute("data-inputmask", "'mask': '99999-9999999-9'");
        cnicInput.setAttribute("required", "required");
        document.getElementById("first-validation").appendChild(cnicInput);
        document.getElementById('isForeign').value = "false";
        $(":input").inputmask();
    }
    else {
        document.getElementById("identificatoinLabel").innerHTML = "Passport Number: *";
        document.getElementById("identity").remove();
        let passportInput = document.createElement("input");
        passportInput.setAttribute("type", "text");
        passportInput.setAttribute("class", "field1");
        passportInput.setAttribute("name", "identity");
        passportInput.setAttribute("placeholder", "Passport Number");
        passportInput.setAttribute("onchange", "isCorrectLength('identity')");
        // passportInput.setAttribute("title", "Passport Number Should be 6 to 9 Character Long");
        passportInput.setAttribute("required", "required");
        passportInput.setAttribute("id", "identity");
        passportInput.setAttribute("title", "PPNO");
        document.getElementById("first-validation").appendChild(passportInput);
        document.getElementById('isForeign').value = "true";
    }

});


$(document).ready(function () {

    $(document).on("keydown", "form", function (event) {
        if (event.key === "Enter") {
            event.preventDefault()
        };
    });

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;



    function firstStepValidation(selectedFieldSet) {

        $('input.' + selectedFieldSet).each(function () {
            let id = this.id;
            let title = this.title;
            let value = this.value;
            value = value.replaceAll("-", "");
            if ((title === "PPNO" && isCorrectLength(id)) ||
                (title === "CNIC" && isNumeric(id))) {
                formdispatch();
            }
            else {
                // $('#myModal').modal("show")
                document.getElementById('identity').setCustomValidity("CNIC should be with in format and does not empty");
                document.getElementById('identity').reportValidity();
            }
        })

    }

    $(".next").click(function () {
        current_fs = $(this).parent().parent();
        next_fs = $(this).parent().parent().next();
        step = $(this).attr("my-step");
        fieldset = $(this).parent().parent('fieldset').attr("class");
        console.log(fieldset)
        switch (parseInt(step)) {
            case 1:
                firstStepValidation(fieldset);
                break;
            default:
                console.log(`step unknown`);

        }
    });

    $(".submit").click(function () {
        return false;
    })

});

function changeDate(e) {
    let trimedValue = (e.value).slice(0, 4)
    const d = new Date();
    let year = d.getFullYear() - 16;
    if (trimedValue >= year) {
        let trimDate = (e.value).slice(4)
        e.value = (year - 1) + trimDate;
    }
}

function checkPattern(e) {
    let value = e.value
    let pattern = /^([a-zA-Z ]|[\-\,\.])*$/;
    let result = pattern.test(value);
    // console.log(result, value);
    e.setCustomValidity("You can not use special correctors");
    e.reportValidity();
    // result ? e.value = value : e.value = value.slice(0,value.length-1);
    result ? e.value = value : e.value = value.replace(/[\!\@\#\$\%\^\&\*\)\(\+\=\<\>\{\}\[\]\:\;\'\"\|\~\`\_]/g, "");
}

function dobValidator(dob) {
    if ($("#" + dob).val() != "") {
        return true;
    }
    else {
        document.getElementById('dob').setCustomValidity("Date of Birth Should be according to format and does not empty");
        document.getElementById('dob').reportValidity();
    }
}

function genderValidator(gender) {
    console.log($("#" + gender).val())
    if ($("#" + gender).val() != null && $("#" + gender).val() != undefined && $("#" + gender).val() != "") {
        return true;
    }
    else {
        document.getElementById('gender').setCustomValidity("Gender Should be according to format and does not empty");
        document.getElementById('gender').reportValidity();
    }
}




$(".ctclass").each(function () {
    const phoneInput = window.intlTelInput(this, {
        preferredCountries: ["pk", "ae", "sa", "af"],
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
    let tag = this.parentElement.parentElement;
    // tag.children[1].value = this.value.replaceAll("+", "")
    this.addEventListener("countrychange", function () {
        console.log(tag.children[1])
        console.log(phoneInput.getSelectedCountryData().dialCode)
        tag.children[1].value = phoneInput.getSelectedCountryData().dialCode;
    });
})
