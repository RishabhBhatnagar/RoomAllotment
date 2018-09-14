function wrap(tag, element, add_attr){
    /*
    returns element enclosed in tag given as an input.
    For Example : wrap('h1', 'rishabh') would return 
    <h1>rishabh</h1>
    */
    if(add_attr == undefined){
        add_attr = "";
    }
    return "<"+tag+add_attr+">"+element+"</"+tag+">";
}

function create_table(nod, container){
    /*
    nod is number of days.
    */
    code = "";
    for(i = 0; i<nod; i++){
        temp_row_data = wrap("td", ".");
        temp_row = wrap("tr", temp_row_data);
        //window.alert(temp_row);
        code += temp_row;
    }
    code = wrap("table", code);
    window.alert(code);
    
    document.getElementById(container).innerHTML = code;
    document.write(code);
}

function bind_radio_listener(name){
    var radios = document.forms[name].elements["block"];
    for(radio in radios){
        radios[radio].onclick() = function() {
            window.alert(this.value);
        }
    }
}

bind_radio_listener("form_block");
create_table(12);
