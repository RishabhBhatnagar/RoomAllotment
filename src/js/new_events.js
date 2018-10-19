function validate_form(){
    start_date_field = document.getElementById('ne_start_time');
    end_date_field = document.getElementById('ne_end_time');

    start_date = ((start_date_field.value).split(':')).join(".");
    end_date = ((end_date_field.value).split(':')).join(".")

    if(end_date - start_date < 0){
        show_snackbar("end time cannot be lesser than start time");
        return false;
    } else{
        //date is validated
    }
    return true;
}