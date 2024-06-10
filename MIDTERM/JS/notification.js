$(document).ready(function () {
  
    // alert('connected');
    function load_notification()
    {
        let data = {
            'load_notif':true
        }
        $.ajax({
            type: "POST",
            url: "Code/Notification/notify_fetch.php",
            data: data,

            success: function (response) {
                console.log(response);
                response.forEach(function(value){
                    

                    let notif = ` <h4>${value.notif.notif}</h4>`;

                    $(".notify-container").append(notif);
                });
             
                
            }
        });
    }

    load_notification();
});