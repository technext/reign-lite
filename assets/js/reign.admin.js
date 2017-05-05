/**
 * Created by aqibashef on 4/28/17.
 */

jQuery(document).ready(function ($) {
    function renderMediaUploader(img, input) {
        var file_frame;

        if ( undefined !== file_frame ) {

            file_frame.open();
            return;

        }

        file_frame = wp.media.frames.file_frame = wp.media({
            frame:    'post',
            state:    'insert',
            multiple: false
        });

        file_frame.on('insert', function () {
            var selectedImage = file_frame.state().get( 'selection' ).first().toJSON();
            if(input){
                input.val(selectedImage.url);
            }
            if(img){
                img.attr('src', selectedImage.url);
            }
            else {
                input.before('<img src="' + selectedImage.url + '" alt="Alternative Text">');
            }
        });

        file_frame.open();
    }

    $(document).on('click', 'a#widget-about-us-choose-image', function (e) {
        e.preventDefault();
        renderMediaUploader($(this).next('img'), $(this).parent().find('input#widget-about-us-input'));
    })

    $(document).on('click', 'a.team-member-choose-image', function (e) {
        e.preventDefault();
        renderMediaUploader($(this).next('img'), $(this).parent().find('input#'+$(this).attr('data-target')));
    });

    $(document).on('click', 'a#funfacts-bg', function (e) {
        e.preventDefault();
        renderMediaUploader($(this).next('img'), $(this).parent().find('input#'+$(this).attr('data-target')))
    });

    $('.font-picker').fontIconPicker();

    $(document).on('widget-updated', function (e, widget) {
        $('.font-picker').fontIconPicker();
    })
});

