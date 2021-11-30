
$('#tokenfield').tokenfield({

  autocomplete: {

    source: function (request, response) {
        jQuery.get("../php/live-suburb-postcode.php", {

            query: request.term

        }, function (data) {
            data = $.parseJSON(data);
            response(data);
        });
    },
    delay: 100
  },

  showAutocompleteOnFocus: true

});