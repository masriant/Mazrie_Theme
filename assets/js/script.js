jQuery(document).ready(function ($) {
    $('.tab').click(function () {
        var tabId = $(this).data('tab');

        $('.tab').removeClass('active');
        $('.tab-panel').removeClass('active');

        $(this).addClass('active');
        $('#' + tabId).addClass('active');
    });
});
