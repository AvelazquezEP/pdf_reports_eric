log = console.log();

$(document).ready(function () {
    $("#ButtonSend").on("click", function () {
        $(this).attr("disable", "disable");
        let radio_input_yes = document.getElementById('radio_input_yes');
        let radio_input_no = document.getElementById('radio_input_no');
        let c_radio = document.getElementById('check_radio');
        let c_internet = document.getElementById('check_internet');
        let c_referral = document.getElementById('check_referral');
        let c_facebook = document.getElementById('check_facebook');

        sendData();
    });
});

const sendData = (radioYes, radioNo, c_radio) => {
    document.getElementById('messageError').innerHTML = '';
    let radio_input_yes = document.getElementById('radio_input_yes');
    let radio_input_no = document.getElementById('radio_input_no');
    let c_radio = document.getElementById('check_radio');
    let c_internet = document.getElementById('check_internet');
    let c_referral = document.getElementById('check_referral');
    let c_facebook = document.getElementById('check_facebook');

    /* #region Condition */
    if ((!radio_input_yes.checked && !radio_input_no.checked) ||
        (!c_radio.checked && !c_internet.checked && !c_referral.checked && !c_facebook.checked)) {
        document.getElementById('messageError').innerHTML = 'REVIEW ALL INPUTS';
    } else {
        /* #endregion */
        var radioInput = '';
        if (document.getElementById('radio_input_yes').checked) {
            radioInput = '1';
        } else if (document.getElementById('radio_input_no').checked) {
            radioInput = '0';
        }
        let checkRadio = isChecked(document.getElementById('check_radio'));
        let checkInternet = isChecked(document.getElementById('check_internet'));
        let checkReferral = isChecked(document.getElementById('check_referral'));
        let checkFacebook = isChecked(document.getElementById('check_facebook'));
        let checkOther = document.getElementById('check_other').value;
        let statusRating = document.getElementById('statusRating').value;
        let language = document.getElementById('language').value;

        // log(language)
        saveData(radioInput, checkRadio, checkInternet, checkReferral, checkFacebook, checkOther, statusRating.trim(), language);
    }
}

const isChecked = (element) => {
    if (element.checked) {
        return '1';
    } else {
        return '0';
    }
}
const saveData = (radioInput, checkRadio, checkInternet, checkReferral, checkFacebook, checkOther, statusRating, language) => {
    $.ajax({
        type: 'POST',
        url: 'form.php',
        data: {
            "radio_input": radioInput,
            "check_radio": checkRadio,
            "check_internet": checkInternet,
            "check_referral": checkReferral,
            "check_facebook": checkFacebook,
            "check_other": checkOther,
            "statusRating": statusRating,
            "languagesurvey": language
        },
        dataType: 'text',
        success: function (data) {
            log(data);
            window.location.replace("https://abogadoericprice.com/thanks.html");
        }, error: function (data) {
        }
    });
}