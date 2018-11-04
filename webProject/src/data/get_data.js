function get_table_data_query(qry){
    //calling a php file : https://www.w3schools.com/php/php_ajax_php.asp
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "../data/get_data.php?query="+qry, true);
    xmlhttp.send();
    // updated the json file from the server.


    xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200){
                    
                }
    }

    //getting data from https://www.taniarascia.com/how-to-use-the-javascript-fetch-api-to-get-json-data/
    fetch('./all_tables_json.json').then(response => {
        return response.json();
    }).then(data => {
        console.log(data['event_details']);
        localStorage.setItem("jsonData", JSON.stringify(data));
    });
    tables_json_string = localStorage.getItem("jsonData");

    alert(tables_json_string);
    var obj = JSON.parse(tables_json_string);
    alert(obj['room_type']);
    return obj;

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

/*
function get_table_data_query(qry){
    qry += ";";
    var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200){
                    
                }
        };
    // xmlhttp.open("GET", "./get_tables.php?query="+qry, true);
    xmlhttp.open("GET", "../data/get_tables.php?query="+qry, true);
    xmlhttp.send();
    return this.responseText;
}*/
