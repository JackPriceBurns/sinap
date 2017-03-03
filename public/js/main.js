$("searchTable").on("keyup", function() {

    var value = $(this).val();

    $("usersTable").each(function (index) {
        var $row;
        if (index != 0) {

            $row = $(this);

            var id = $row.find("td:first").text();

            if (id.indexOf(value) != 0) {
                $(this).hide();
            } else {
                $(this).show();
            }
        }
    });
});