function filter_table(input) {
    var filter, table, tr, td, i;
    filter = input.toUpperCase();
    table = document.getElementById("myMusic");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function play_song(track_name) {
    //escape & chars in names
    track_name = track_name.replace("&", "%26");

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("currentlyPlaying").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "/MediaCentre/control/control_omx.php?play=" + track_name, true);
    xmlhttp.send();
}

function send_control(control) {
    if(control == "prev" || control == "next"){
        var currentlyPlaying = document.getElementById("currentlyPlaying").innerHTML;

        var filter, table, tr, td, i;
        filter = currentlyPlaying.toUpperCase();
        table = document.getElementById("myMusic");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    break;
                }
            }
        }
        alert(i);
        if(control == "prev")
            i--;
        else
            i++;
        td = tr[i].getElementsByTagName("td")[2];
        play_song(td.innerHTML);
    }
    else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

            }
        };
        xmlhttp.open("GET", "/MediaCentre/control/control_omx.php?control=" + control, true);
        xmlhttp.send();
    }
}

(function($) {
    $(function() {
        //dropdown in main nav
        $('.dropdown-button').dropdown({
                hover: true,
                belowOrigin: true,
                alignment: 'right'
            }
        );

        //activator for mobile nav
        $('.button-collapse').sideNav();
    });
})(jQuery);