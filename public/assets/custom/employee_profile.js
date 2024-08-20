/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */

function save_first_name(element_id, employee_id){
    var first_name_text = document.getElementById(element_id).value;

    console.log(first_name_text);

    jQuery.ajax({
        type: "POST",
        url: "/admin/employees/update-first-name",
        data: {employee_id:employee_id, first_name:first_name_text},
        success: function(data) {
        },

    });

    location.reload();
}
