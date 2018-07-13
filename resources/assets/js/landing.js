// check age

$(document).ready(function () {

   $('#ageCheckerModal').modal({
       backdrop: 'static',
       keyboard: false
   });

   $('#dob').datepicker({
       changeMonth: true,
       changeYear: true,
       yearRange: "-100:+0"
   });


    $('#ageCheckerModal form').submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/ageCheck',
            data: $('form').serialize(),
            dataType: 'json',

            success: function ( response ) {
                $('#ageCheckerModal').modal('hide');
            },
            error: function ( response ) {
                var fields = ['dob','month', 'day', 'year'];
                $.each(fields, function (i, el) {
                    if (response['responseJSON'].errors[el]) {
                        $('.'+el).show();
                    }
                });
            }
        });
    });

});

