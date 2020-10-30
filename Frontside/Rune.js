var Rune = {
    API: {
        Request: function (
            url,
            method,
            parameters,
            success,
            failure
        ) {
            // @todo Validate parameneters.

            $.ajax({
                url: url,
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