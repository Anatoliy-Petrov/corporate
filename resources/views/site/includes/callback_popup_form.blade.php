<div id="popupCallback" class="popupCallback popup 1js_open 1js_animate">
    <div class="popupContentWrapper">
        <!-- <button class="popupCloseButton" type="button"><i class="icomoon icon-close"></i></button> -->

        <header class="modalHeader relative">
            <div class="modal-title title">Обратный звонок</div>
        </header>

        <div class="popUpContainer">
            <div class="description contentRow">
                <p>Введите ваш номер телефона, чтобы мы смогли вам помочь.</p>
            </div>

            <form action="{{ route('callbacks.send') }}" class="standard-form questions-form contentRow" id="popup_callback_form">
                <div class="formRow">
                    <input class="border-decor" name="phone" type="text" placeholder="Ваш телефон">
                </div>

                <div class="submitButtonWrapper">
                    <div class="more-button inversed">
                        <div class="more-button-wrapper">
                            <div class="more-button-container">
                                <button type="submit" class="title semi-bold callbackPopupSubmitButton">Отправить</button>
                                <i class="icomoon standard-arrow-icon inversed"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>