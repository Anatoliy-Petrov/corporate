window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$(document).ready(function(){

    $('#discount').on('click', function(){

        PopupModule.closePopup($('#popupActions'));

        var name  = $('#discount-name').val();
        var email = $('#discount-email').val();
        var phone = $('#discount-phone').val();

        axios.post('/main/discount',{name: name, email: email, phone: phone}).then(function(response){

            if(response.data.status == 'success') {

                popupActionsSuccessOpen( $('#popupActionsSuccess') );

            } else {

                $('#popupError').find('p').html('Email адрес уже зарегистрирован');

                popupActionsSuccessOpen( $('#popupError') );

                setTimeout(function(){
                    PopupModule.closePopup( $('#popupError') );
                    PopupModule.hideOverlay("popup", pageOverlay);
                }, 2500)
            }

        });

        return false;
    });

});
