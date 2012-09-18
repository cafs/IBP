$(document).ready(function() {
    $('#drupalchat-colorpicker1').farbtastic('#edit-drupalchat-chat-topbar-color');
    $('#drupalchat-colorpicker2').farbtastic('#edit-drupalchat-chat-topbar-text-color');
    $('#drupalchat-colorpicker3').farbtastic('#edit-drupalchat-font-color');
    $("fieldset > legend:contains('Theme Customization')").parent().hide();
    $("input[name=drupalchat_polling_method]").change(function() {
        $('#edit-drupalchat-external-api-key').attr('disabled', 'disabled');
        $('#edit-drupalchat-external-api-key-wrapper').hide();
        $("fieldset > legend:contains('Theme Customization')").parent().hide();
        $('#edit-drupalchat-user-latency-wrapper').show();
        $('#edit-drupalchat-refresh-rate-wrapper').show();
        $('#edit-drupalchat-send-rate-wrapper').show();
        $('#edit-drupalchat-rel-wrapper').show();
        $('#edit-drupalchat-ur-name-wrapper').show();
        if ($("input[name=drupalchat_polling_method]:checked").val() == '0') {
            $('#edit-drupalchat-refresh-rate').removeAttr('disabled');
            $('#edit-drupalchat-send-rate').removeAttr('disabled');
            $('#edit-drupalchat-refresh-rate-wrapper').fadeIn();
            $('#edit-drupalchat-send-rate-wrapper').fadeIn();
        } else if ($("input[@name=drupalchat_polling_method]:checked").val() == '1') {
            $('#edit-drupalchat-refresh-rate').attr('disabled', 'disabled');
            $('#edit-drupalchat-send-rate').attr('disabled', 'disabled');
            $('#edit-drupalchat-refresh-rate-wrapper').hide();
            $('#edit-drupalchat-send-rate-wrapper').hide();
        } else if (jQuery("input[@name=drupalchat_polling_method]:checked").val() == '3') {
            $('#edit-drupalchat-external-api-key').removeAttr('disabled');
            $('#edit-drupalchat-external-api-key-wrapper').fadeIn();
            $("fieldset > legend:contains('Theme Customization')").parent().fadeIn();
            $('#edit-drupalchat-user-latency-wrapper').hide();
            $('#edit-drupalchat-refresh-rate-wrapper').hide();
            $('#edit-drupalchat-send-rate-wrapper').hide();
            $('#edit-drupalchat-rel-wrapper').hide();
            $('#edit-drupalchat-ur-name-wrapper').hide();
        }
    });

    $("input[name=drupalchat_rel]").change(function() {
        if ($("input[name=drupalchat_rel]:checked").val() == '1') {
            $('#edit-drupalchat-ur-name').removeAttr('disabled');
            $('#edit-drupalchat-ur-name-wrapper').fadeIn();
        } else {
            $('#edit-drupalchat-ur-name').attr('disabled', 'disabled');
            $('#edit-drupalchat-ur-name-wrapper').hide();
        }
    });

    $("input[name=drupalchat_polling_method]").change();
    $("input[name=drupalchat_rel]").change();
});
