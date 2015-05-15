/**
 * Created by William Muli on 2/5/2015.
 */
$(document).ready(function () {
    //activate carousel
    $('.carousel').carousel({
        interval: 4000,
        pause: "hover",
        wrap: true
    });

    //adjust height of product columns
    $('.product').matchHeight(true);
    $('.add-to-cart').click(function (event) {
        event.preventDefault();
        $.post(
            $(this).attr('href'),
            '',
            function (result) {
                var message = $('<div class="alert alert-success message" style="display: none;">');
                var close = $('<button type="button" class="close" data-dismiss="alert">&times</button>');
                message.append(close); // adding the close button to the message
                message.append(result); // adding the error response to the message
                // add the message element to the body, fadein, wait 3secs, fadeout
                message.appendTo($('body')).fadeIn(300).delay(3000).fadeOut(500);

            }
        );

        $.get(
            '/cart-summary',
            function (response) {
                var data = response;
                console.log(response);
                console.log(data.items);
                $('.row.items').html(data.items + ' items');
                $('.row.price').html('Ksh ' + data.total);
                console.log('summary updated');
            }
        );
    });

    /**
     * show preview on image upload
     */
    function showPreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var preview = $('.preview');
                preview.css('display', 'block');
                preview.attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#picture').change(function () {
        showPreview(this);
    });

    //fix the hopping carousel problem

    if (window.location.pathname == '/') {

    }

    //add hidden field to form
    var form = $('.new-product');
    form.append('<input name="features[]" id="features" type="hidden"/>');

    //initializing the rich editor
    $("#txtEditor").Editor();
    $('#submitBtn').click(function () {
        //console.log( $(".Editor-editor").html());
        $('#features').val($(".Editor-editor").html());
    });

    $('#features').css('display', 'none');
    //edit product code
    var hidden_field = $('.edit-features');
    var features = hidden_field.val();
    //set the text editor value
    $(".Editor-editor").html(features);

    var submitBtn = $('#editSubmitBtn').click(function () {
        var editor_content = $(".Editor-editor").html();
        hidden_field.val(editor_content);
    });


    $('#addConsBtn').click(function () {
        $('#features').val($(".Editor-editor").html());
    });

});