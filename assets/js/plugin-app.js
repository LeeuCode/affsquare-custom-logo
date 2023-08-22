jQuery(document).ready(function ($) {

    console.log('run plugin');
    var custom_uploader,
        uploadBtn = $('.upload-custom-logo'),
        logoInput = $('.logo-input'),
        image = $('.logo-image');

    uploadBtn.click(function (e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function () {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            console.log(attachment);
            logoInput.val(attachment.id);
            image.attr('src', attachment.url);
        });
        //Open the uploader dialog
        custom_uploader.open();
    });
});