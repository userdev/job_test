var request = 0;

function addComment() {
    if (request) {
        request.abort();
    }
    var email = $("#email").val();
    var comment = $("#comment").val();
    request = $.ajax({
        url: "/job_test/comment/addcomment",
        type: "post",
        data: "email=" + email + "&comment=" + comment,
    });
    // callback handler that will be called on success
    request.done(function(response, textStatus, jqXHR) {
        console.log(response);
        $('#new-comments').before(response);
        $("#email").val('');
        $("#comment").val('');
    });
    // callback handler that will be called on failure
    request.fail(function(jqXHR, textStatus, errorThrown) {
        console.error(
                "The following error occured: " +
                textStatus, errorThrown
                );
    });
}
