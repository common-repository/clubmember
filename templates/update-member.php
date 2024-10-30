<?php
    $member_id = $_GET['id'];
?>

<div class="wrap">
<h2>Edit Member</h2>

<?php
    if($_POST['clubmember_hidden'] == "Y") {
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

        $update_status= cm_update_single_member($member_id,$member_data);

        if($update_status){
           //Form data sent
        ?>
           <div class="clubmember-updated"><p><strong><?php _e('Updated Successfully.' ); ?></strong></p></div>
        <?php }else{
            echo "Error";
        }


?>

<?php
    } else {   
        if($member_id){
            $member = cm_get_single_member($member_id);
?>

<form name="clubmember-add-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
    <input type="hidden" name="clubmember_hidden" value="Y">
    <table class="form-table">
        <tr valign="top">
            <th scope="row">Full Name</th>
            <td><input type="text" name="clubmember_name" value="<?php echo $member->full_name ?>" /></td>
        </tr>
         
        <tr valign="top">
            <th scope="row">Department</th>
            <td><input type="text" name="clubmember_department" value="<?php echo $member->department ?>" /></td>
        </tr>
        
        <tr valign="top">
            <th scope="row">Semester</th>
            <td><input type="text" name="clubmember_semester" value="<?php echo $member->semester ?>" /></td>
        </tr>

        <tr valign="top">
            <th scope="row">Class Roll</th>
            <td><input type="text" name="clubmember_rollno" value="<?php echo $member->class_roll ?>" /></td>
        </tr>

        <tr valign="top">
            <th scope="row">Email</th>
            <td><input type="text" name="clubmember_email" value="<?php echo $member->email ?>" /></td>
        </tr>

        <tr valign="top">
            <th scope="row">Phone</th>
            <td><input type="text" name="clubmember_phone" value="<?php echo $member->phone ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row">Membership Date</th>
            <td><input type="text" id="datepicker" name="clubmember_membership_date" value="<?php echo $member->membership_date ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row">Membership Duration</th>
            <td>
                <select name="clubmember_membership_duration">
                    <option value="1" <?php if($member->membership_duration==1){ echo "selected"; } ?> >1 Month</option>
                    <option value="2" <?php if($member->membership_duration==2){ echo "selected"; } ?> >2 Months</option>
                    <option value="3" <?php if($member->membership_duration==3){ echo "selected"; } ?> >3 Months</option>
                    <option value="4" <?php if($member->membership_duration==4){ echo "selected"; } ?> >4 Months</option>
                    <option value="5" <?php if($member->membership_duration==5){ echo "selected"; } ?> >5 Months</option>
                    <option value="6" <?php if($member->membership_duration==6){ echo "selected"; } ?> >6 Months</option>
                    <option value="7" <?php if($member->membership_duration==7){ echo "selected"; } ?> >7 Months</option>
                    <option value="8" <?php if($member->membership_duration==8){ echo "selected"; } ?> >8 Months</option>
                    <option value="9" <?php if($member->membership_duration==9){ echo "selected"; } ?> >9 Months</option>
                    <option value="10" <?php if($member->membership_duration==10){ echo "selected"; } ?> >10 Months</option>
                    <option value="11" <?php if($member->membership_duration==11){ echo "selected"; } ?> >11 Months</option>
                    <option value="12" <?php if($member->membership_duration==12){ echo "selected"; } ?> >1 year</option>
                    <option value="24" <?php if($member->membership_duration==24){ echo "selected"; } ?> >2 years</option>
                </select>
            </td>
        </tr>

    </table>
    
    <?php submit_button( "Update Member", "primary" ); ?>


</form>

<?php }} ?>

</div>