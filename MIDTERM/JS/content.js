$(document).ready(function () {
    alert('conneced');
    function load_content()
    {
        let data = {
            'view_content':true
        }
        $.ajax({
            type: "POST",
            url: "Code/Content/fetch_content.php",
            data: data,
            success: function (response) {
                console.log(response);
            }
        });
    }
    load_content();
});