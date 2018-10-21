<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/new_events.css">
        <script src="../../js/new_events.js"></script>
    </head>
    <center style="color: #2A6A92; "><h2>New Events</h2></center>
    <?php
        include "../../data/get_data.php";
        session_start();
        $query = get_table_data_query("select * from user where uid =" .$_SESSION["uid"].";")[0];
        $commName=$query['comm_name'];
        $facHead=$query['fac_head'];
    ?>
    <form name=form_block action="" method="post" id="form_block">

        <div id="snackbar"></div>  <!--Div is necessary for snackbar.-->

        <span style="font-family: 'Lobster', cursive;">Enter the date on which you want to book the room : </span><input type=date id="date_picker" name=date_picker" onchange = "date_time()"><br><br>

        <span style="margin: 12px; font-family: 'Lobster', cursive;">Which type of <em>room</em> are you looking for??</span><br>
            <input type=radio name="block" id=classroom value=classroom>
                <label for=classroom style="font-family: 'Lobster', cursive;">Classroom</label>
            <input type=radio name="block" id=lab value=lab>
                <label for=lab style="font-family: 'Lobster', cursive;">Lab</label>
            <input type=radio name="block" id=others value=others>
                <label for=others style="font-family: 'Lobster', cursive;">Others</label><br>

        <div id=list_blocks></div>

        <div id=month_view class="month_view"></div>

        <input name="submit" type="submit" id="submit" style="display:none"/>

        <table border="3px" style="border-collapse: collapse; margin-top: 30px; font-family: 'Lobster', cursive;">
            <th colspan="2" style="font-family: 'Lobster', cursive;">Legends</th>
            <tr>
                <td><h1 style="background-color: red; width: 20px; height:20px; margin: 10px; font-family: 'Lobster', cursive;"></h1></td>
                <td>Room Not Available</td>
            </tr>
            <tr>
                <td><h1 style="background-color: #ffff00; width: 20px; height:20px; margin: 10px; font-family: 'Lobster', cursive;"></h1></td>
                <td>An event is already proposed</td>
            </tr>
            <tr>
                <td><h1 style="background-color: #00fe00; width: 20px; height:20px; margin: 10px; font-family: 'Lobster', cursive;"></h1></td>
                <td>Unallocated room</td>
            </tr>
        </table>

    </form>
    <div>
        <form name="new_event" action="new_events_2.php" id="new_event" onsubmit="return validate_form()" method="post" style="display: none">
            <fieldset>
                <legend>New Event</legend>
                <table>
                    <tr>
                        <th>Committee Name:</th>
                        <td><input type="text" name="ne_comm_name" id="ne_comm_name" readonly value=<?php echo "$commName";?>>

                        </td>
                    </tr>
                    <tr>
                        <th>Event Title</th>
                        <td><input type="text" name="ne_title"></td>
                    </tr>
                    <tr>
                        <th>Event Date:</th>
                        <td><label id="ne_date"></label></td>
                        <input type="hidden" name="ne_date" id="new_event_date">
                        <input type="hidden" name="conflict_possible" id="conflict_possible">
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><textarea noresize name="ne_desc" id="ne_desc"></textarea></td>
                    </tr>
                    <tr>
                        <th>Room No</th>
                        <td><input type="text" name="ne_room_no" id="ne_room_no" readonly></td>
                    </tr>
                    <tr>
                        <th>Start Time:</th>
                        <td><input type="time" name="ne_start_time" id="ne_start_time" min="06:00" max="19:00" required></td>
                    </tr>
                    <tr>
                        <th>End Time:</th>
                        <td><input type="time" name="ne_end_time" id="ne_end_time" required min="07:00" max="20:00"></td>
                    </tr>

                    <tr>
                        <th>Tags:</th>
                        <td>
                            <input type="radio" name="ne_tags" value="MOSSAIC" required>MOSSAIC
                            <input type="radio" name="ne_tags" value="IRIS" required>IRIS
                            <input type="radio" name="ne_tags" value="NONE" required>NONE
                        </td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>
                            <input type="radio" name="ne_type" value="EVENT" required>EVENT
                            <input type="radio" name="ne_type" value="SEMINAR" required>SEMINAR
                            <input type="radio" name="ne_type" value="WORKSHOP" required>WORKSHOP
                            <input type="radio" name="ne_type" value="MEETING" required>MEETING
                            <input type="radio" name="ne_type" value="OTHER" required>OTHER
                        </td>
                    </tr>
                    <tr>
                        <th>Faculty Incharge:</th>
                        <td> <label></label> <?php echo "$facHead"; ?> </label> </td>
                    </tr>
                    <td colspan="2" style="align-self: center;"><center><input type="submit" value="Book This Room"></center></td>
                </table>
            </fieldset>
        </form>
    </div>
<?php

    function get_list($arr){
        return sprintf("[%s]", implode(",", $arr));
    }
    function get_room_numbers($room_type){
        $table = get_table_data_query(sprintf("select * from room where room_type = '%s'", $room_type));
        $room_numbers = array();
        for($i = 0; $i < count($table); $i++){
            array_push($room_numbers, sprintf("\"%s\"", $table[$i]["room_no"]));
        }
        return get_list($room_numbers);
    }
    function get_room_numbers_status($room_type){
        //these are all the room numbers
        $table_temp = get_table_data_query(sprintf("select * from room where room_type = '%s'", $room_type));
        $all_room_nos = array();
        for($i = 0; $i < count($table_temp); $i++){
            array_push($all_room_nos, sprintf("\"%s\"", $table_temp[$i]["room_no"]));
        }
        //getting all booked room_numbers.
        $table = get_table_data_query(
            sprintf(
                "SELECT r.room_no, status
                                        FROM room r, event_detail e 
                                        WHERE room_type = '%s' 
                                              and r.room_no = e.room_no", $room_type
            )
        );
        $status = array();
        for($i = 0; $i < count($all_room_nos); $i++){
            $set = false;
            for($j = 0; $j < count($table); $j++){
                if('"'.$table[$j]["room_no"].'"' == $all_room_nos[$i]){
                    array_push($status, '"'.$table[$j]["status"].'"');
                    $set = true;
                }
            }
            if(!$set){
                array_push($status, '"u"');
            }
        }
        return get_list($status);
    }
    echo "
                <script>
                    classroom = [];
                    lab = [];
                    others = [];
                    
                    function remove_new_event_form(){
                        document.getElementById('new_event').style.display = 'none';
                    }
                    
                    function clear_all_radios() {
                        var radios = document.getElementsByName(\"block\");
                        for(radio in radios) {
                            if(radios[radio] == \"[object HTMLInputElement]\")
                            {
                                radios[radio].checked = false;
                            }
                        }
                    }
                    
                    function clear_all_fields(){
                        container = document.getElementById(\"month_view\");
                        while (container.firstChild) {
                            container.removeChild(container.firstChild);
                        }
                        remove_new_event_form();
                    }
                    
                    function date_time() {
                        date_picker = document.getElementById('date_picker');
                        chosen_date = date_picker.value;
                        
                        if(chosen_date == ''){
                            show_snackbar('Please select a date first.');
                            
                            //removing all blocks recursively.
                            container = document.getElementById(\"month_view\");
                            while (container.firstChild) {
                                container.removeChild(container.firstChild);
                            }
                        }
                        
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth()+1; //January is 0!
                        var yyyy = today.getFullYear();
                        
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        today = yyyy + '-' + mm + '-' + dd ;
                        if( new Date(chosen_date).getTime() >= new Date(today).getTime() )
                        {
                            //date entered is valid
                            
                            //converting date from yy-mm-dd to dd/mm/yy
                            c_date_arr = chosen_date.split('-');
                            document.getElementById('ne_date').innerHTML = c_date_arr[2]+'/'+c_date_arr[1]+'/'+c_date_arr[0];
                            document.getElementById('new_event_date').value = c_date_arr[2]+'/'+c_date_arr[1]+'/'+c_date_arr[0];
                            
                            if(document.getElementById('classroom').checked){
                                inflate_blocks('classroom');
                            }
                            if(document.getElementById('lab').checked){
                                inflate_blocks('lab');
                            }
                            if(document.getElementById('others').checked){
                                inflate_blocks('others');
                            }
                            
                        }
                        else{
                            if(chosen_date != '')
                                inflate_blocks('');   //passing null to remove all views and inflate nothing.
                                show_snackbar('Date should be greater than or equal to current Date.');
                                date_picker.value = '';  //resetting the date
                        }
                    }
                    function altr(event) {
                        remove_new_event_form();
                        document.getElementById('ne_room_no').value = event.srcElement.innerHTML;
                        document.getElementById('new_event').style.display = 'block';
                        
                        location = \"#new_event\";
      
                    }
                    
                    function cannot_book(){
                        remove_new_event_form();
                        show_snackbar('cannot book already allocated room.');
                    }
                    
                    function inflate_blocks(name){
                        if(name != ''){
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                   // Typical action to be performed when the document is ready:
                                   answer = ((this.responseText).split('-----')[1]).split('#####');
                                   localStorage.setItem('rno', answer[0]);
                                   localStorage.setItem('status', answer[1]);
                                   
                                   
                                   
                                   room_nos = JSON.parse(localStorage.getItem('rno'));
                                    room_nos_status = JSON.parse(localStorage.getItem('status'));
                                    
                                    date_picker = document.getElementById('date_picker');
                                    chosen_date = date_picker.value;
                                    
                                    div_ele = document.getElementById(\"list_blocks\");
                                    
                                    block_length = 4;
                                    
                                    breakpoints = [3, 6, 10, 15];
                                    clear_all_fields();
                                    row_number = 0;
                                    for(i = 0; i<room_nos.length; i++){
                                        for(index in breakpoints){
                                            if(i == breakpoints[index]){
                                                row_number += 1;
                                                break_div = document.createElement(\"p\");
                                                break_div.innerHTML = \"&nbsp\";
                                                container.append(break_div);
                                            }
                                        }
                                        day = room_nos[i];
                                        status = room_nos_status[i];
                                        
                                        if(day.length < block_length){day = \" \"+day;}
                                        blobi = document.createElement(\"span\");
                                        blobi.innerHTML = day;
                                        blobi.id = \"blob\"+i;
                                        cname = '';
                                        conflict_possible = false;
                                        switch (status) {
                                            case 'a' : cname = 'single_block_a'; break;
                                            case 'u' : cname = 'single_block_u'; break;
                                            case 'p' : 
                                                cname = 'single_block_p';
                                                conflict_possible = true;
                                                break;
                                            case 'r' : cname = 'single_block_r'; break;
                                        }
                                        blobi.className = cname;
                                        container.appendChild(blobi);
                                        if(status != 'a') {
                                            blobi.style.cursor = 'pointer';
                                            document.getElementById('blob'+i).addEventListener('click', altr , false);
                                        } else {
                                            document.getElementById('blob'+i).addEventListener('click', cannot_book , false);
                                        }
                                        document.getElementById('conflict_possible').value = conflict_possible;
                                    }
                                }
                            };
                            xhttp.open(\"GET\", 'new_events_1.php?date='+chosen_date+'&which_radio='+name, true);
                            xhttp.send();
                            
                            
                        }
                    }
                    function bind_radio_listener(name){
                        var radios = document.getElementsByName(\"block\");
                        for(radio in radios) {
                            if(radios[radio] == \"[object HTMLInputElement]\")
                            {
                                radios[radio].onclick = function() {
                                    if(document.getElementById('date_picker').value != \"\"){
                                        return inflate_blocks(this.value);
                                    } else{
                                        clear_all_radios();
                                        show_snackbar('Select a date first.');
                                    }
                                }
                            }
                        }
                    }
                    
                    function load_default(radio_name){
                        // Bind all radio listeners to change room booked states on selection change.
                        bind_radio_listener(radio_name);
                    }
                    load_default(\"block\");
                </script>
        ";
    ?>
</html>