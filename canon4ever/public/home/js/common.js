$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

(function ($) {
    'use strict';

    $(document).ready(function () {
        NProgress.start();
    });

    $(window).load(function () {
        NProgress.done();
    })

    $(function () {
        $(".p-jcph li").mouseenter(function () {
            $(this).siblings().find("img").hide();
            $(this).find("img").show();
        })
    });

})(jQuery);