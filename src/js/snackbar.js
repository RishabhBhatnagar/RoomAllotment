path = location.pathname.split( "/" );
href_link = "";

for(i=0; i<path.length; i++){
    href_link += path[i] + "/";
    if(path[i] == 'src'){
        break;
    }
}
href_link += 'css/snackbar.css';

var link = document.createElement( "link" );
link.href = href_link;
link.type = "text/css";
link.rel = "stylesheet";
link.media = "screen,print";

document.getElementsByTagName( "head" )[0].appendChild( link );

function show_snackbar(message) {
    // Get the snackbar DIV
    var x = document.getElementById('snackbar');
    document.getElementById("snackbar").innerHTML = message;
    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
}