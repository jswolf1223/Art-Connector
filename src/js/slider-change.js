/*
 * Changes text above range sliders as range value is changed.
 */
$(document).ready(function () {
     $(function () {
        $("input[type=range]").live( 'change input', function () {
           var value = $(this).val();
           if (value == 0) {
              $(this).prev().text("Nothing");
           }
           else if (value == 1) {
              $(this).prev().text($(this).data("spect").e1);
            }
           else if (value == 2) {
              $(this).prev().text($(this).data("spect").e2);
           }
           else if (value == 3) {
              $(this).prev().text($(this).data("spect").e3);
           }
           else if (value == 4) {
              $(this).prev().text($(this).data("spect").e4);
           }
           else if (value == 5) {
               $(this).prev().text($(this).data("spect").e5);
            }
           else {
              $(this).prev().text($(this).data("spect").e6);
           }
        });
        });
});
