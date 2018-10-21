    <?php
    function dynamicQuery($query,$noOfCards_perLine=3)
    {
        $cards=array();
        $result=get_table_data_query($query);
        if(count($result) == 0){
            print("<h4 style='font-family: 'Lobster', cursive'>No events found</h4>");
        }
        for($i=0;$i<count($result);$i++){
            $row=$result[$i];
            array_push($cards,getCard($row['comm_name'],$row['title'], $row['room_no'] ,$row['event_date'], $row['eid']));
        }

        $noOfCards=sizeof($cards);
        print("<center> <table>");

        $cardsleft = $noOfCards;
        while ($cardsleft > 0) {
            print("<tr>");
            if($cardsleft > $noOfCards_perLine){
                # SHOW ALL NUMBER OF CARDS.
                for($i = 0; $i<$noOfCards_perLine; $i++){
                    print($cards[$i + $noOfCards - $cardsleft]);
                    echo '<script>console.log("'.($i + $noOfCards - $cardsleft).'")</script>';
                }
                $cardsleft -= $noOfCards_perLine;
                echo '<script>console.log("next")</script>';
            } else{
                while($cardsleft != 0){
                    print($cards[$noOfCards - $cardsleft]);
                    echo '<script>console.log("'.($noOfCards - $cardsleft).'")</script>';
                    $cardsleft -= 1;
                }
            }
            print("</tr>");
        }
        print("</table> </center>");

    }//dynamicQuery


    function getCard( $commName,$eventName,$roomNo,$startDate,$eventId)
    {
        return
            sprintf(
                "<td>
                            <form action=\"admin_event_details.php\" method=\"post\">
                                <div class=indvCards>
                                    Name Of Commitee: <h3> %s </h3>
                                    Name of Event: <h3> %s </h3>
                                    Room No. : <h3> %s </h3>
                                    Event Start Date: <h3> %s </h3>
                                    <input type=\"submit\" value=\"Know more..\" >
                                    <input type=hidden name=event_id value=".$eventId.">
                                    <input type=hidden name=no_access value=no_access>
                                </div> 
                            </form>
                            
                        </td>",
                $commName,$eventName,$roomNo,$startDate
            );
    }//getCards
?>