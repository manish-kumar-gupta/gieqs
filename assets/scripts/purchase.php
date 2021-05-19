<!-- Modals NEW GENERIC -->

<div class="modal modal-new" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="modal-new"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6" id="modal_title_6">Buy New GIEQs Online Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-0"
                        style="min-height: 100px; background-image: url('<?php echo BASE_URL;?>/assets/img/covers/learning/1.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                    </div>
                    <div class="py-3 text-left">
                        <!-- <i class="fas fa-exclamation-circle fa-4x"></i> -->
                        <hr />
                        <h5 class="heading h4 mt-4">New GIEQs Online Course Subscription</h5>
                        <p class="heading h5 mt-4">Course : <span class="text-white" id="asset-name"></span></p>

                        <p class="text-white"><span class="text-muted" id="asset-type"></span></p>
                        <p class="text-white">Duration : <span class="text-muted" id="renew-frequency"></span><span
                                class="text-muted"> Month(s) after Live Date</span></p>
                        <p class="text-white">Cost : 
                            <?php 
                            if ($access_validated){

                                echo ' FREE with your Complimentary Link';

                            }else{?>
                            
                            <span class="text-muted" id="cost">&euro;</span></p>

                            <?php }?>


                        <p class="text-white text-justify mt-4">
                            Description : <span class="text-muted" id="asset-description"></span>

                        </p>
                        <hr />

                        <?php
                        if  (!$userid){?>

                        <p class="text-white">You need a GIEQs Online User Account (free) to Register for this Course
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>

                    <button id="button-login" class="btn btn-sm btn-white button-login">I have a GIEQs Online
                        Account</button>
                    <button id="button-signup" class="btn btn-sm btn-white button-signup">I have no account, sign me
                        up!</button>


                </div>

                <?php }else{?>

                    <?php if (!($access_validated)){?>

                <p class="text-sm mt-4">
                    By clicking Start Payment you will be taken to PayPal to start the payment process.
                    The payment process is not final until you confirm with the payment provider.
                    Once complete your subscription will be active immediately and you will receive a
                    confirmation email.
                    <!-- This subscription will automatically renew after the expiry term. This can easily be
                            switched off your account settings. -->
                    We do not store any payment details whatsoever on GIEQs.com. We believe this is best handled by
                    PayPal who have a
                    track record in industry standard procedures in this regard.
                    All subscriptions and payments are covered by our <a
                        href="<?php echo BASE_URL;?>/pages/support/support_gieqs_online_terms.php" target="_blank">terms
                        and conditions</a>.
                </p>

                <?php }else{?>

                    <p class="text-sm mt-4">

                        No payment is required for this subscription.
                    </p>


                <?php }   ?>
            </div>
        </div>

        <?php 

        //determine action 

        if ($access_validated){

            //allow free register

            $form_action_path = BASE_URL . '/pages/learning/scripts/subscriptions/generate_free_subscription.php';


        }else{

            $form_action_path = BASE_URL . '/pages/learning/scripts/subscriptions/charge.php';


        }


        ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</button>
            <form id="confirm-new" action="<?php echo $form_action_path;?>"
                method="POST">
                <input type="hidden" id="asset_id_hidden" name="asset_id" value="">
                <input type="hidden" id="course_date" name="course_date" value="<?php echo date_format($programmeDate, "Y-m-d H:i:s");?>">
                <!-- CHANGE ME UPDATE TODO MAKE THIS COME FROM THE PROGRAM -->

                <input type="submit" id="button-confirm-new" class="btn btn-sm btn-white button-confirm-new"
                    value="<?php $result = $access_validated ? 'Register' : 'Start Payment'; echo $result;?>">
            </form>
        </div>

        <?php } ?>
    </div>
    </div>
    </div>

    

<script>

switch (true) {
	case winLocation('gieqs.com'):

		var rootFolder2 = 'https://www.gieqs.com/';
		break;
	case winLocation('localhost'):
		var rootFolder2 = 'http://localhost:90/dashboard/gieqs/';
		break;
	default: // set whatever you want
		var rootFolder2 = 'https://www.gieqs.com/';
		break;
}



var siteRoot2 = rootFolder2;

if ($("#action").text() != '') {
    var videoPassed = $("#action").text();
} else {

    var videoPassed = false;
}

if ($("#access_token").text() != '') {
    var access_token = $("#access_token").text();
} else {

    var access_token = false;
}

if ($(document).find("#asset_id").text() != '') {
    var asset_id = $(document).find("#asset_id").text();
} else {

    var asset_id = false;
}



var userid = '<?php echo $userid;?>';

if (userid == '') {

    userid = false;

}

var waitForFinalEvent = (function() {
    var timers = {};
    return function(callback, ms, uniqueId) {
        if (!uniqueId) {
            uniqueId = "Don't call this twice without a uniqueId";
        }
        if (timers[uniqueId]) {
            clearTimeout(timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();


    $(document).ready(function() {


$('#button-login').click(function() {

            <?php 
            if ($access_validated){
                ?>

window.location = siteRoot2 +
"pages/authentication/login.php?destination=signup&assetid=" + asset_id + "&access_token=" + access_token;

<?php 
            }else{
                ?>

window.location = siteRoot2 +
"pages/authentication/login.php?destination=signup&assetid=" + asset_id;

<?php
            }
            ?>


})



$(document).on('click', '#login', function() {

event.preventDefault();
window.location.href = siteRoot2 +
'/pages/authentication/login.php?destination=signup&assetid=' + asset_id;


})

$('#button-signup').click(function() {


$('.modal-new').modal('hide');
$('#registerInterest').modal('show');
$('.modal').css('overflow', 'auto');



})

if (videoPassed == 'register') {

//simulate click

waitForFinalEvent(function() {

$('.register-now').trigger('click');


}, 500, "hello header");

}

$('.register-now').click(function(event) {

var button = $(this);

$(this).append('<i class="fas fa-circle-notch fa-spin ml-2"></i>');
$(this).attr('disabled', true);
//var asset_type = $(this).data('assettype');
var asset_id = $(this).data('assetid');

console.log(asset_id);
$('.modal-footer #button-confirm-new').attr('data-assetid', '' + asset_id);

//get the modal data
const dataToSend = {

asset_id: asset_id,

}

const jsonString = JSON.stringify(dataToSend);

if (userid) {

//closed version
var url = siteRoot2 +
"pages/learning/scripts/subscriptions/get_new_subscription_data.php";

} else {

//open version

var url = siteRoot2 +
"pages/learning/scripts/subscriptions/get_new_subscription_data_open.php";

}

var request = $.ajax({
url: url,
type: "POST",
contentType: "application/json",
data: jsonString,
timeout: 5000,
fail: function(xhr, textStatus, errorThrown) {
alert(
'Something went wrong. We could not load the subscription data.'
);
$(this).find('i').remove();
$(this).attr('disabled', false);
}
});

request.done(function(data) {


data = data.trim();
console.log(data);

try {

externalTest = $.parseJSON(data);
console.dir(externalTest);
if (data) {


try {

if (externalTest.location_jump){

window.location.href = externalTest.location_jump;

}

}catch(error){



}




$('.modal-new #asset-name').text(externalTest.asset_name);
$('.modal-new #asset-type').text(externalTest.asset_type);
$('.modal-new #renew-frequency').text(externalTest.renew_frequency);
$('.modal-new #asset-description').text(externalTest.description);
$('.modal-new #asset_id_hidden').val(externalTest.asset_id);
$('.modal-new #cost').text(externalTest.cost + ' euro');


$('.modal-new').modal('show');
$(button).find('i').remove();
$(button).attr('disabled', false);

} else {

alert('Something went wrong. We could not load the subscription data.');
$(this).find('i').remove();
$(this).attr('disabled', false);


}

} catch (error) {

alert(data);
$(button).find('i').remove();
$(button).attr('disabled', false);

}


});


});

$(document).on('click', '#submitPreRegister', function(event) {

event.preventDefault();
$('#NewUserForm').submit();

})

$("#NewUserForm").validate({

invalidHandler: function(event, validator) {
var errors = validator.numberOfInvalids();
console.log("there were " + errors + " errors");
if (errors) {
var message = errors == 1 ?
"1 field contains errors. It has been highlighted" :
+errors + " fields contain errors. They have been highlighted";


$('#error').text(message);
//$('div.error span').addClass('form-text text-danger');
//$('#errorWrapper').show();

$("#errorWrapper").fadeTo(4000, 500).slideUp(500, function() {
$("#errorWrapper").slideUp(500);
});
} else {
$('#errorWrapper').hide();
}
},
rules: {
firstname: {
required: true,

},



surname: {
required: true,

},

gender: {
required: true,

},


email: {
required: true,
email: true,

},

password: {
required: true,
minlength: 6,

},

passwordAgain: {
equalTo: "#password",


},


centreCountry: {

required: true,

},
endoscopistType: {

required: true
},

checkterms: {

required: true,

},
checkprivacy: {

required: true
}



},
messages: {



password: {
required: 'Please enter a password',
minlength: 'Please use at least 6 characters'


},
passwordAgain: {

equalTo: "The new passwords should match",



},
},
submitHandler: function(form) {

submitPreRegisterForm();

//console.log("submitted form");



}

});

$(document).on('click', '.editSessionFromPlan', function(event) {

event.preventDefault();
var sessionid = $(this).attr('data');
window.open(siteRoot2 + "/pages/backend/sessionview.php?identifier=" + sessionid, '_blank');


})



})

</script>