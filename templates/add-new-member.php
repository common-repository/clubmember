<div class="wrap">
<h2>Add New Member</h2>

<?php
    if($_POST['clubmember_hidden'] == 'Y') {
        $member_data = array(
            "full_name"=>$_POST['clubmember_name'],
            "department"=>$_POST['clubmember_department'],
            "semester"=>$_POST['clubmember_semester'],
            "class_roll"=>$_POST['clubmember_rollno'],
            "email"=>$_POST['clubmember_email'],
            "phone"=>$_POST['clubmember_phone'],
            "membership_date"=>date ("Y-m-d",  strtotime($_POST['clubmember_membership_date'])),
            "membership_duration"=>$_POST['clubmember_membership_duration']
        );

        $inserted = cm_add_single_member($member_data);

        if($inserted){
           //Form data sent
        ?>
           <div class="clubmember-updated"><p><strong><?php _e('Club Member Added Successfully.' ); ?></strong></p></div>
        <?php }else{
            echo "Error";
        }
?>

<?php
    } else {
        //Normal page display
?>

<form name="clubmember-add-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
    <input type="hidden" name="clubmember_hidden" value="Y">
    <table class="form-table">
        <tr valign="top">
            <th scope="row">Full Name</th>
            <td><input type="text" name="clubmember_name" value="" /></td>
        </tr>
         
        <tr valign="top">
            <th scope="row">Department</th>
            <td><input type="text" name="clubmember_department" value="" /></td>
        </tr>
        
        <tr valign="top">
            <th scope="row">Semester</th>
            <td><input type="text" name="clubmember_semester" value="" /></td>
        </tr>

        <tr valign="top">
            <th scope="row">Class Roll</th>
            <td><input type="text" name="clubmember_rollno" value="" /></td>
        </tr>

        <tr valign="top">
            <th scope="row">Email</th>
            <td><input type="text" name="clubmember_email" value="" /></td>
        </tr>

        <tr valign="top">
            <th scope="row">Phone</th>
            <td><input type="text" name="clubmember_phone" value="" /></td>
        </tr>

        <tr valign="top">
            <th scope="row">Membership Date</th>
            <td><input type="text" id="datepicker" name="clubmember_membership_date" /></td>
        </tr>
        <tr valign="top">
            <th scope="row">Membership Duration</th>
            <td>
                <select name="clubmember_membership_duration">
                    <option value="1" selected="">1 Month</option>
                    <option value="2">2 Months</option>
                    <option value="3">3 Months</option>
                    <option value="4">4 Months</option>
                    <option value="5">5 Months</option>
                    <option value="6">6 Months</option>
                    <option value="7">7 Months</option>
                    <option value="8">8 Months</option>
                    <option value="9">9 Months</option>
                    <option value="10">10 Months</option>
                    <option value="11">11 Months</option>
                    <option value="12">1 year</option>
                    <option value="24">2 years</option>
                </select>
            </td>
        </tr>
    </table>
    
    <?php submit_button( "Add Member", "primary" ); ?>


</form>

<?php } ?>

</div>