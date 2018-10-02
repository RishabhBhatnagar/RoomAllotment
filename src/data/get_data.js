function get_table_data(table_name){
    //calling a php file : https://www.w3schools.com/php/php_ajax_php.asp
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "get_data.php", true);
    xmlhttp.send();
    // updated the json file from the server.



    //getting data from https://www.taniarascia.com/how-to-use-the-javascript-fetch-api-to-get-json-data/
    fetch('./all_tables_json.json').then(response => {
        return response.json();
    }).then(data => {
        console.log(data['event_details']);
        localStorage.setItem("jsonData", JSON.stringify(data));
    });
    tables_json_string = localStorage.getItem("jsonData");

    var obj = JSON.parse(tables_json_string);
    return JSON.parse(obj[table_name]);

        /*
            Sample Data :
                table_name = 'room'
                
                room_no	room_type
            1)  001 	others
            2)  403B 	classroom
	        3)  404 	classroom
	        4)  411B 	lab
	        
	        
	        //for getting data in php file:
	            use : 
	            <script type='text/javascript' src = "get_data.js"></script>
	        //This will get all the functions of this file in your file.

	        
	        //get tables by : 
	        room_table = get_table_data('room');
	        
	        //accessing first record(tuple) :
	            room_table[0];
	        
	        //accessing room_type of 3rd record :
	            room_table[2]['room_type'];
	    
        */
}
