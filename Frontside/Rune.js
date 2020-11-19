var Rune = {
    API: {
        Request: function (
            method,
            parameters,
            success,
            failure
        ) {
            // @todo Validate parameneters.

            $.ajax({
                url: window.location.href,
                type: 'POST',
                dataType: 'json',
                data: {
                    method: method,
                    parameters: parameters
                },
                success: function (data) {
                    success(data);
                },
                error: function()
                {
                    failure();
                }
            });

        }
    }
};