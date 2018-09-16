function bind_radio_listener(name){
    var radios = document.getElementsByName(name);
    for(radio in radios) {
        radios[radio].onclick = function() {
            return inflate_blocks(this.value);
        }
    }
}

function inflate_blocks(name){
    all_room_nos = {
        "classroom" : ["23","32"], 
        "lab"       : ["100", "101"], 
        "others"    : ["41", "14"]
    };
    div_ele = document.getElementById("list_blocks");
    
    room_nos = all_room_nos[name];   
    
    //removing all previous children
    while (div_ele.firstChild) {
        div_ele.removeChild(div_ele.firstChild);
    }

    for(index in room_nos){
        //Create an button dynamically.   
        var element = document.createElement("input");
        //Assign different attributes to the element. 
        element.type = "button";
        element.value = room_nos[index];
        element.name = room_nos[index];
        element.onclick = function() {
            alert(element.value);
        };

        //Append the element in page (in div).  
        div_ele.appendChild(element);
    }
}


function load_default(radio_name){
    
    bind_radio_listener(radio_name);
    var radios = document.getElementsByName(radio_name);
    
    radios[0].checked = "checked";
    inflate_blocks(radios[0].value);
}
load_default("block");
create_table(12);
