res = ["css"];

file_location = window.location.href;

route = file_location.split("/");

file_name_with_extension = route[route.length - 1];

file_name = file_name_with_extension.split(".")[0];

for(i = 0; i<res.length; i++){
    linkRes(file_name, res[i]);
}
linkScript(file_name);




function linkRes(file_name, file_extension){
    var head = document.getElementsByTagName('head')[0];
    var link = document.createElement('link');
    link.id = file_name;
    switch(file_extension){
        case 'css' : 
            link.rel = 'stylesheet'; 
            link.type = "text/css";
            break;
        default : window.alert("undefined resource type found : " + file_extension); break;
    }
    
    link.href = "../" + file_extension + "/" + file_name + "." + file_extension;
    
    head.appendChild(link);
}

function linkScript(file_name){
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.src = "../js/" + file_name + ".js";
    head.appendChild(script);
}

