<!--
/**
* Created by PhpStorm.
* User: gsoc
* Date: 19/10/18
* Time: 9:47 PM
*/
-->
<center style="color: #2A6A92; "><h2>Feedback Form</h2></center>
<form name="feedback" action="feedback_2.php" method="POST" style="font-family: 'Lobster', cursive;" >
	<fieldset>
		<legend>Feedback Form</legend>
		<p style="color: #2A6A92;">Please provide your feedback below:-</p>

		1. What was your first impression when you entered the website ?
		<p>
			<textarea type='text' name="q1" style='width: 450px; border-radius: 10px; margin-top: 5px; 'required></textarea> 
		</p>
		2. How did you first hear about us ?
        <p>
            <textarea type="text" name="q2" style='width: 450px; border-radius: 10px; margin-top: 5px; 'required></textarea> 
        </p>
        3. Is there anything missing on this page ?
        <p>
            <textarea type="text" name="q3" style='width: 450px; border-radius: 10px; margin-top: 5px; 'required></textarea> 
        </p>
        4. How likely are you to recommend us to a friend or colleague ?
        <p>
            <textarea type="text" name="q4" style='width: 450px; border-radius: 10px; margin-top: 5px; 'required></textarea> 
        </p>
   
        <p>
            <input type="submit" name="submit" value ='Submit' style="margin-left: 17%; font-family: 'Lobster', cursive ;border-radius: 5px; font-size: 18px; background-color: #292c2f; color: #ffffff;">
        </p>
                        
	</fieldset>
</form>
