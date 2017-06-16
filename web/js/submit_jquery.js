function confirmDelete(review, idReview) {
    var di = $("#dialog");
    di.text(review);
    di.dialog({
        autoOpen: true,
        title: "Do You want to delete this review?",
        resizable: false,
        width: 450,
        modal: true,
        buttons: {
            "Yes": function () {
                submitDelete(idReview);
                $(this).dialog("close");
            },
            "No": function () {
                $(this).dialog("close");
            }
        }
    });
}

$("[name='btnDelReview']").click(function () {
    var idReview = $(this).attr("value");
    var ids = 'spReview' + idReview;
    var spn = jQuery('[name="' + ids + '"]');
    confirmDelete(spn.text(), idReview);

});

function submitDelete(idReview) {
    $.ajax({
        type: "POST",
        url: "script/form_delete.php",

        data: "idReview=" + idReview,
        success: function (text) {
            if (text === "success") {
                location.href =location.href ;// reload the page
            }
        }
    });
}