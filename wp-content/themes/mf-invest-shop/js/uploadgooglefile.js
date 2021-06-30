
var $ = jQuery;

var alertonsharedfalse = 'Будьте внимательны: данный файл не разрешен для просмотра другими пользователями';
//var currentClicked;
var uploadGoogleFile = $('.button-upload_google');
// The Browser API key obtained from the Google API Console.

var developerKey = 'AIzaSyBk87liDCY_imH_2m1ArvQDXC40nRq0tUw';

// Array of API discovery doc URLs for APIs
var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];

// The Client ID obtained from the Google API Console. Replace with your own Client ID.
var clientId = "1083836329873-jl7avplakf8oi8a6b4fc3kt8i37gopob.apps.googleusercontent.com";

// Replace with your own project number from console.developers.google.com.
// See "Project number" under "IAM & Admin" > "Settings"
var appId = "YFYh-68fRJHcXUD3Np-K8AY4";

// Scope to use to access user's Drive items.
// var scope = ['https://www.googleapis.com/auth/drive.file', 'https://www.googleapis.com/auth/drive.metadata.readonly'];
var scope = ['https://www.googleapis.com/auth/drive.file'];

var pickerApiLoaded = false;
var oauthToken;

// Use the Google API Loader script to load the google.picker script.
function loadPicker() {
    if(!pickerApiLoaded) {
        gapi.load('auth', {'callback': onAuthApiLoad});
        gapi.load('picker', {'callback': onPickerApiLoad});
        gapi.load('client:auth2', initClient);
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
    if (data.action == google.picker.Action.PICKED) {
        console.log(data.docs[0], 'returned');
        if(data.docs[0].isShared !== true) {
            alert(alertonsharedfalse);
        }
        var fileurl = data.docs[0].url;
        const embedurl = data.docs[0].embedUrl;
        let last = localStorage.lastcalled;
        $('#modal-previewfile').modal('show');
        $('#modal-previewfile .modal-body').append('<iframe src="'+embedurl+'"></iframe>');
        $(`input[id=${last}]`).closest('.rcl-field-core').prepend('<iframe src="'+embedurl+'"></iframe>')
        $(`input[id=${last}]`).parent().parent().find('.button-upload_google').first().addClass('success-btn-added');
        //console.log(last);
        $(`input[id=${last}]`).val(fileurl);
        $(`input[id=${last}]`).parent().prev().html('<div class="button-upload_google btn btn-primary btn-primary1" onclick="f(this)"><span>Изменить файл</span></div>');
        // $(`input[id=${last}]`).parent().prev().text('Изменить файл');
        // $(`input[id=${last}]`).parent().prev().after('<span>Файл успешно добавлен</span>');
    }
}

function thumbCallback(data) {
    if (data.action == google.picker.Action.PICKED) {
        let embedurl = data.docs[0].embedUrl;
        let last = localStorage.lastcalled;
        console.log(embedurl);
        if(data.docs[0].isShared !== true) {
            alert(alertonsharedfalse);
        }
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
    let id = $(arguments[0]).closest('.repeater-single').find('input[type=url]').attr('id');
    if(!id) {
        id = $(arguments[0]).next().find('input[type=hidden]').attr('id');
    }
    localStorage.setItem('lastcalled', `${id}`);
    loadPicker();
}
function thumbnailUploader(th) {
    let id = $(arguments[0]).next().attr('id');
    localStorage.setItem('lastcalled', `${id}`);
    !pickerApiLoaded ? thumbloadPicker() : createThumb();
}
function retrievePermissions(fileId, callback = retrieveRespCallback) {
    var request = gapi.client.drive.permissions.list({
        'fileId': fileId
    });
    request.execute(function(resp) {
        if(resp) {
            if(!resp.code) {
                var requestallow;
                resp.forEach(function (element) {
                    if(element.id!== "anyoneWithLink") {
                        requestallow = false;
                    }else {
                        requestallow = true;
                    }
                })
                return true
            }
        }
    });
}

/**
 *  Initializes the API client library and sets up sign-in state
 *  listeners.
 */
function initClient() {
    gapi.client.init({
        apiKey: developerKey,
        clientId: clientId,
        discoveryDocs: DISCOVERY_DOCS,
        scope: scope
    }).then(function () {
        // Listen for sign-in state changes.
        gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

        // Handle the initial sign-in state.
        updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
        authorizeButton.onclick = handleAuthClick;
        signoutButton.onclick = handleSignoutClick;
    }, function(error) {
        appendPre(JSON.stringify(error, null, 2));
    });
}
function retrieveRespCallback(e) {
    console.log(e, 'callback')
}

function previewFromFile(th) {
    let fileurl = $(th).closest('.repeater-single').find('input[type=url]').val();
    const fileid = getIdFromUrl(fileurl)[0];
    let embedurl = 'https://docs.google.com/file/d/'+fileid+'/preview?usp=drive_web';

    $('#modal-previewfile .modal-body').append('<iframe src="'+embedurl+'"></iframe>');
    $('#modal-previewfile').modal('show');

    $(th).closest('.rcl-field-core').prepend('<iframe src="'+embedurl+'"></iframe>')
}

function getIdFromUrl(url) { return url.match(/[-\w]{25,}/); }
