<html>
<script type="text/javascript" src = "../data/get_data.js"></script>
<link rel="stylesheet" type="text/css" href="../css/room_blocks.css">
    <form name=form_block>
        <input type=radio name="block" id=classroom value=classroom><label for=classroom>classroom</label>
        <input type=radio name="block" id=lab value=lab><label for=lab>lab</label>
        <input type=radio name="block" id=others value=others><label for=others>others</label>
        <div id=list_blocks style="margin:20"></div>
        <div id=month_view style="margin-top:50"></div>
    </form>

    <?php
        include "../data/get_data.php";
        function get_room_numbers($room_type){
        	$table = get_table_data_query(sprintf("select * from room where room_type = '%s'", $room_type));
        	$room_numbers = array();
        	for($i = 0; $i < count($table); $i++){
        		if($table[$i]["room_type"] == $room_type){
        			array_push($room_numbers, sprintf("\"%s\"", $table[$i]["room_no"]));
        		}
        	}
        	return sprintf("[%s]", implode(",", $room_numbers));
        }
        echo "
        	<script>

			    classroom = [];
				lab = [];
				others = [];

				function seggregate_data(obj){
				    for(i = 0; i<obj.length; i++){
				        switch(obj[i][\"room_type\"]){
				            case \"classroom\" : classroom.push(obj[i][\"room_no\"]); break;
				            case \"lab\" : lab.push(obj[i][\"room_no\"]); break;
				            case \"others\" : others.push(obj[i][\"room_no\"]); break;
				        } 
				    }
				}

	        	
	        	function inflate_blocks(name){
	        		all_room_nos = {
				        \"classroom\" : ".get_room_numbers("classroom").", 
				        \"lab\"       : ".get_room_numbers("lab").",
				        \"others\"    : ".get_room_numbers("others").",
				    };

				    div_ele = document.getElementById(\"list_blocks\");

				    room_nos = all_room_nos[name];   

				    //removing all previous children
				    while (div_ele.firstChild) {
				        div_ele.removeChild(div_ele.firstChild);
				    }
				    for(index in room_nos){
				        //Create an button dynamically.   
				        var element = document.createElement(\"input\");
				        //Assign different attributes to the element. 
				        element.type = \"button\";
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
				    
				    container = document.getElementById(\"month_view\");

				    while (container.firstChild) {
				        container.removeChild(container.firstChild);
				    }
				    
				    for(i = 0; i<number_of_days; i++){
				        for(index in breakpoints){
				            if(i == breakpoints[index]){
				                break_div = document.createElement(\"p\");
				                break_div.innerHTML = \"&nbsp\";
				                container.append(break_div);
				            }
				        }
				        day = i;
				        if(day <10){day = \"0\"+day;}
				        blobi = document.createElement(\"span\");
				        blobi.innerHTML = day;
				        blobi.id = \"blob\"+i;
				        blobi.className = \"single_block\";
				        container.appendChild(blobi);
				    }
				}

				function bind_radio_listener(name){
		        	var radios = document.getElementsByName(\"block\");
				    for(radio in radios) {
				    	if(radios[radio] == \"[object HTMLInputElement]\")
				    	{
				    		radios[radio].onclick = function() {
				            	return inflate_blocks(this.value);
				        	}
				    	}
				    }
				}

				function load_default(radio_name){
				    
				    //segregate all table room by room_type.
				    //get_table_data_query(\"select * from room\");
				    
				    // Bind all radio listeners to change room booked states on selection change.
				    bind_radio_listener(radio_name);
				    
				    //get array of radio button / radio group.
				    var radios = document.getElementsByName(radio_name);
				    
				    //set first radio button checked by default.
				    radios[0].checked = \"checked\";
				    inflate_blocks(radios[0].value);
				}
				load_default(\"block\");
				number_of_days = 31;
        	</script>
        ";
    ?>
</html>