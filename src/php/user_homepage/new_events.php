<html>
<link rel="stylesheet" type="text/css" href="../../css/room_blocks.css">
    <form name=form_block action="" method="post" id="form_block">
        
        <input type=radio name="block" id=classroom value=classroom><label for=classroom>classroom</label>
        <input type=radio name="block" id=lab value=lab><label for=lab>lab</label>
        <input type=radio name="block" id=others value=others><label for=others>others</label><br>
        <input type=date id="date_picker" name=date_picker" onchange = "date_time()">
        <div id=list_blocks style="margin:20"></div>
        <div id=month_view style="margin-top:50"></div>
        <input name="submit" type="submit" id="submit" style="display:none"/>
    </form>

    <?php
        include "../../data/get_data.php";
        session_start();

        function get_list($arr){
        	return sprintf("[%s]", implode(",", $arr));
        }
        function get_room_numbers($room_type){
        	$table = get_table_data_query(sprintf("select * from room where room_type = '%s'", $room_type));
        	$room_numbers = array();
        	for($i = 0; $i < count($table); $i++){
        		if($table[$i]["room_type"] == $room_type){
        			array_push($room_numbers, sprintf("\"%s\"", $table[$i]["room_no"]));
        		}
        	}
        	return get_list($room_numbers);
        }
        echo "
        	<script>
			    classroom = [];
				lab = [];
				others = [];

				function date_time() {
				    alert('date changed');
				}
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
				        \"classroom\" : ".get_room_numbers("c").", 
				        \"lab\"       : ".get_room_numbers("l").",
				        \"others\"    : ".get_room_numbers("o").",
				    };
	        		
				    div_ele = document.getElementById(\"list_blocks\");
				    room_nos = all_room_nos[name];
				    block_length = 4;
				    
				    //removing all previous children
				    /*while (div_ele.firstChild) {
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
				        	//document.getElementById(\"hide\").value = this.value;
				        	//document.getElementById(\"submit\").click();
				        };

				        //Append the element in page (in div).
				        div_ele.appendChild(element);
				    }
				    
				    */
				    
				    breakpoints = [3, 7, 14, 21, 28];
				    container = document.getElementById(\"month_view\");

				    while (container.firstChild) {
				        container.removeChild(container.firstChild);
				    }
				    
				    for(i = 0; i<room_nos.length; i++){
				        for(index in breakpoints){
				            if(i == breakpoints[index]){
				                break_div = document.createElement(\"p\");
				                break_div.innerHTML = \"&nbsp\";
				                container.append(break_div);
				            }
				        }
				        day = room_nos[i];
				        if(day.length < block_length){day = \" \"+day;}
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
				    alert(document.getElementById('hide2').value );
				        if(document.getElementById('hide2').value != ''){
                            radios[0].checked = \"checked\";
                            inflate_blocks(radios[0].value);
				        }
				}
				load_default(\"block\");
				number_of_days = 31;
        	</script>
        ";
    ?>
</html>
