function notificationBox(message, type) {
    // Create the notification box element
    var notificationBox = document.createElement('div');

    // Set the class and content of the notification box
    notificationBox.className = 'notification-box ' + type;
    notificationBox.innerHTML = message;

    // Add the dismiss button to the notification box
    var dismissButton = document.createElement('button');
    dismissButton.className = 'dismiss-button';
    dismissButton.innerHTML = '&times;';
    notificationBox.appendChild(dismissButton);

    // Add the notification box to the page
    document.body.appendChild(notificationBox);

    // Define a function to remove the notification box after 3 seconds
    var timeout = setTimeout(function () {
        document.body.removeChild(notificationBox);
    }, 6000);

    // Add event listeners to stop the timeout when the user hovers over the notification box
    notificationBox.addEventListener('mouseover', function () {
        clearTimeout(timeout);
    });
    notificationBox.addEventListener('mouseout', function () {
        timeout = setTimeout(function () {
            document.body.removeChild(notificationBox);
        }, 6000);
    });

    // Add an event listener to the dismiss button to remove the notification box
    dismissButton.addEventListener('click', function () {
        document.body.removeChild(notificationBox);
    });
}

(function ($) {
    $.fn.ajaxFormSubmit = function (options) {
        let $this = $(this);

        let functionOnSuccess = function () {

        };
        let functionOnError = function () {

        };
        let functionOnSubmit = function () {

        };
        let fnMessage = function () {

        };

        let fnDelayEval = function (evalString, ms) {
            let timer = setTimeout(function () {
                eval(evalString);
            }, ms);
        };

        if (typeof options == "object" && options !== null) {

            if (typeof options.onSuccess == "function") {
                functionOnSuccess = options.onSuccess;
            }

            if (typeof options.onError == "function") {
                functionOnError = options.onError;
            }

            if (typeof options.onSubmit == "function") {
                functionOnSubmit = options.onSubmit;
            }
        }

        $this.on('submit', function (event) {
            let url = $this.attr('action');
            let $submitButton = $this.find('button[type=submit]');
            $submitButton.attr("disabled", "disabled");

            functionOnSubmit(event);
            $.post(url, $this.serialize(), function (data) {
                if (data.error !== 0) {
                    $submitButton.removeAttr("disabled");
                    functionOnError(data);

                    //--Autofocus of Error Field
                    if (data.fieldname) {
                        $this.find('[name=' + data.fieldname + ']').focus();
                    }
                    notificationBox(data.message, 'error');
                } else {
                    functionOnSuccess(data);
                    if (data.location === 'location.reload()') {
                        location.reload();
                    } else {
                        location.href = data.location;
                    }

                    notificationBox(data.message, 'Success');

                    fnDelayEval(data.do, 1000);
                }
            }, "json");

            return false;
        });
    };
})(jQuery);
