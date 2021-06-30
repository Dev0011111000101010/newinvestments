
var $ = jQuery;
//var currentClicked;
var uploadGoogleFile = $('.button-upload_google');
// The Browser API key obtained from the Google API Console.

var developerKey = 'AIzaSyBk87liDCY_imH_2m1ArvQDXC40nRq0tUw';

// The Client ID obtained from the Google API Console. Replace with your own Client ID.
var clientId = "1083836329873-jl7avplakf8oi8a6b4fc3kt8i37gopob.apps.googleusercontent.com";

// Replace with your own project number from console.developers.google.com.
// See "Project number" under "IAM & Admin" > "Settings"
var appId = "YFYh-68fRJHcXUD3Np-K8AY4";

// Scope to use to access user's Drive items.
var scope = ['https://www.googleapis.com/auth/drive.file'];

var pickerApiLoaded = false;
var oauthToken;

// Use the Google API Loader script to load the google.picker script.
function loadPicker() {
    if(!pickerApiLoaded) {
        gapi.load('auth', {'callback': onAuthApiLoad});
        gapi.load('picker', {'callback': onPickerApiLoad});
    }else {
        createPicker();
    }
}

function onAuthApiLoad() {
    window.gapi.auth.authorize(
        {
            'client_id': clientId,
            'scope': scope,
            'immediate': false
        },
        handleAuthResult);
}

function onPickerApiLoad() {
    pickerApiLoaded = true;
    createPicker();
}
function thumbloadPicker() {
    console.log('thumbload picker');
    gapi.load('auth', {'callback': thumbonAuthApiLoad});
    gapi.load('picker', {'callback': thumbonPickerApiLoad});
}

function thumbonAuthApiLoad() {
    console.log('thumbonAuthApiLoad');
    window.gapi.auth.authorize(
        {
            'client_id': clientId,
            'scope': scope,
            'immediate': false
        },
        thumbhandleAuthResult);
}

function thumbonPickerApiLoad() {
    console.log('thumbonPickerApiLoad');
    pickerApiLoaded = true;
    createThumb();
}

function thumbhandleAuthResult(authResult) {
    if (authResult && !authResult.error) {
        oauthToken = authResult.access_token;
        createThumb();
    }
}

function handleAuthResult(authResult) {
    if (authResult && !authResult.error) {
        oauthToken = authResult.access_token;
        createPicker();
    }
}

// Create and render a Picker object for searching files.
function createPicker() {
    if (pickerApiLoaded && oauthToken) {
        var view = new google.picker.View(google.picker.ViewId.DOCS);
        var picker = new google.picker.PickerBuilder()
            .setAppId(appId)
            .setOAuthToken(oauthToken)
            .addView(view)
            .addView(new google.picker.DocsUploadView())
            .setDeveloperKey(developerKey)
            .setCallback(function(data){pickerCallback(data)})
            .build();
        picker.setVisible(true);
    }
}
function createThumb() {
    console.log('create thumb');
    if (pickerApiLoaded && oauthToken) {
        var view1 = new google.picker.View(google.picker.ViewId.DOCS);
        view1.setMimeTypes("image/png,image/jpeg,image/jpg");
        var picker1 = new google.picker.PickerBuilder()
            .setAppId(appId)
            .setOAuthToken(oauthToken)
            .addView(view1)
            .addView(new google.picker.DocsUploadView())
            .setDeveloperKey(developerKey)
            .setCallback(thumbCallback)
            .build();
        picker1.setVisible(true);
    }
}

// A simple callback implementation.
function pickerCallback(data) {
    console.log('picker callback')
    if (data.action == google.picker.Action.PICKED) {
        var fileurl = data.docs[0].url;
        $('#modal-previewfile').modal('show');
        let last = localStorage.lastcalled;
        $(`input[id=${last}]`).parent().parent().find('.button-upload_google').first().addClass('success-btn-added');
        //console.log(last);
        $(`input[id=${last}]`).val(fileurl);
        $(`input[id=${last}]`).parent().prev().text('Изменить файл');
        $(`input[id=${last}]`).parent().prev().after('<span>Файл успешно добавлен</span>');
    }
}

function thumbCallback(data) {
    if (data.action == google.picker.Action.PICKED) {
        let embedurl = data.docs[0].embedUrl;
        let last = localStorage.lastcalled;
        console.log(embedurl);
        $(`input[id=${last}]`).parent().find('iframe').attr('src', embedurl);
        $(`input[id=${last}]`).parent().find('.button-upload_google').addClass('success-btn-added');
        $(`input[id=${last}]`).parent().find('.googlethumb-field').attr('value', embedurl);
        $(`input[id=${last}]`).parent().find('.button-upload_google').text('Изменить изображение');
    }
}
document.addEventListener('DOMContentLoaded', function () {
    $('body').prepend('<script src="https://apis.google.com/js/api.js"></script>');
})
function f(that) {
    let id = $(arguments[0]).next().find('input[type=hidden]').attr('id');
    localStorage.setItem('lastcalled', `${id}`);
    loadPicker();
}
function thumbnailUploader(th) {
    let id = $(arguments[0]).next().attr('id');
    localStorage.setItem('lastcalled', `${id}`);
    !pickerApiLoaded ? thumbloadPicker() : createThumb();
}