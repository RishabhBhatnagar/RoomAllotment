//hard coded array due to laziness. You may create a dictionary.
classroom = [];
lab = [];
others = [];


function seggregate_data(obj){
    // alert(get_table_data_query("select * from user"));
    
    get_table_data_query("select * from user");

    for(i = 0; i<obj.length; i++){
        switch(obj[i]["room_type"]){
            case "classroom" : classroom.push(obj[i]["room_no"]); break;
            case "lab" : lab.push(obj[i]["room_no"]); break;
            case "others" : others.push(obj[i]["room_no"]); break;
        } 
    }
    /*
        console.log(classroom);
        console.log(lab);
        console.log(others);
    */
}

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
        "classroom" : classroom, 
        "lab"       : lab, 
        "others"    : others
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
            add_blobs(number_of_days);
        };

        //Append the element in page (in div).  
        div_ele.appendChild(element);
    }
}

function add_blobs(number_of_days){
    breakpoints = [7, 14, 21, 28];
    
    container = document.getElementById("month_view");

    while (container.firstChild) {
        container.removeChild(container.firstChild);
    }
    
    for(i = 0; i<number_of_days; i++){
        for(index in breakpoints){
            if(i == breakpoints[index]){
                break_div = document.createElement("p");
                break_div.innerHTML = "&nbsp";
                container.append(break_div);
            }
        }
        day = i;
        if(day <10){day = "0"+day;}
        blobi = document.createElement("span");
        blobi.innerHTML = day;
        blobi.id = "blob"+i;
        blobi.className = "single_block";
        container.appendChild(blobi);
    }
}

function load_default(radio_name){
    
    //segregate all table room by room_type.
    seggregate_data(get_table_data("room"));
    
    // Bind all radio listeners to change room booked states on selection change.
    bind_radio_listener(radio_name);
    
    //get array of radio button / radio group.
    var radios = document.getElementsByName(radio_name);
    
    //set first radio button checked by default.
    radios[0].checked = "checked";
    inflate_blocks(radios[0].value);
}

load_default("block");
number_of_days = 31;
