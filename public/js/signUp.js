function signIn() {
    let uEmail = document.getElementsByName("emailSignIn")[0].value;
    let uPass = document.getElementsByName("passSignIn")[0].value;
    axios.post('/userSignIn', {
        email: uEmail,
        password: uPass
    })
        .then(
            (response) => {
                if (response.data) {
                    window.location.pathname = "/dashboard";
                }
            }
        )
        .catch(function (error) {
            console.log(error);
        })

    return false;
}

function signUp() {
    let uName = document.getElementsByName("name")[0].value;
    let csrf = document.getElementsByName("csrf")[0].value
    let uEmail = document.getElementsByName("email")[0].value;
    let uPass = document.getElementsByName("pass")[0];
    let uConfirmPass = document.getElementsByName("confirmPass")[0];
    uConfirmPass.setCustomValidity("Confirm Password does not match");
    uPass.setCustomValidity("Password does not match");
    uPass.value === uConfirmPass.value ?
        axios.post('/userSignUp', {
            csrf,
            name: uName,
            email: uEmail,
            password: uPass.value,
            confirmPass: uConfirmPass.value
        })
            .then(
                (response) => {
                    console.log(response)
                    location.reload();
                }
            )
            .catch(function (error) {
                console.log(error);
            }) : uConfirmPass.reportValidity();

    return false;
}

function resetPass() {
    let uEmail = document.getElementsByName("forgotEmail")[0].value;
    let oldPass = document.getElementsByName("forgotPassOld")[0];
    let newPass = document.getElementsByName("forgotPassNew")[0];
    let newConfirmPass = document.getElementsByName("forgotPassConfirmNew")[0];
    newPass.setCustomValidity("Confirm Password does not match");
    newConfirmPass.setCustomValidity("Password does not match");
    ;
    newPass.value === newConfirmPass.value ?
        axios.post('/userReset', {
            email: uEmail,
            password: oldPass.value,
            newPass: newPass.value,
            newConfirmPass: newConfirmPass.value
        })
            .then(
                (response) => {
                    if (response) {
                        response.data === 1 ? location.reload() : (() => {
                            oldPass.setCustomValidity(response.data);
                            return oldPass.reportValidity()
                        })();
                    }
                }
            )
            .catch(function (error) {
                console.log(error);
            }) : newConfirmPass.reportValidity();

    return false;
}