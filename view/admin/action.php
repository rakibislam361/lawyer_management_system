<?php
    if (isset($_POST['data'])) {
        $id = $_POST['data'];
        $result= mi_db_read_by_id('services', array('service_id'=>$id));

      foreach ($result as $rs) { ?>
        <input type="checkbox" name="services[]" value="<?=$rs['services_name'];?>">
        <label for="vehicle1"><?php echo $rs['services_name'];?></label><br>
      <?php }} ?>

<?php
//--------------------------------------------Membership edit modal---------------------------------------//
    if(isset($_POST['membershipdata'])){
        $plan_id= $_POST['membershipdata'];
        $plan_details= mi_db_read_by_id('membership_plan', array('id'=>$plan_id));
        foreach ($plan_details as $plan){?>
            <div class="form-group">
                <input type="input" class="form-control" name="name" placeholder="Plan name"/ value="<?=$plan['plan_name'];?>">
                <input name="plan_id" value="<?=$plan['id'];?>" type="hidden">
            </div>
            <div class="form-group">
                <input type="input" class="form-control" name="price" placeholder="Price" value="<?=$plan['price'];?>" />
            </div>
            <div class="form-group">
                <select name="month" class="form-control">
                    <option value="1">month <?=$plan['month'];?></option>
                    <option value="1">month 1</option>
                    <option value="2">month 2</option>
                    <option value="3">month 3</option>
                    <option value="4">month 4</option>
                    <option value="5">month 5</option>
                    <option value="6">month 6</option>
                    <option value="7">month 7</option>
                    <option value="8">month 8</option>
                    <option value="9">month 9</option>
                    <option value="10">month 10</option>
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="5" name="plan_details" placeholder="Plan details ..."><?=$plan['details'];?></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="hidden" name="membership-plan-edit" value="1">
                <button type="submit" id="membership-plan-edit" class="btn btn-primary">Update</button>
            </div>
        <?php }}?>

<?php

//--------------------------------------------Admin Login---------------------------------------//
    if (isset($_POST['login'])) {
    $msg = [];
    $email = mi_secure_input($_POST['email']);
    $password = mi_secure_input($_POST['password']);
    $pass = md5($password);
        
    if (empty($email) || empty($password)) {
        $msg = array('message' => 'Password or email invalid', 'status'=>'error');
    } else {
        $query = mi_db_read_by_id('admin', array('email'=>$email,'password'=>$pass, 'status'=>'1'));
        if (count($query)>0) {
            mi_set_session('admin_id', $query[0]['id']);
            $msg = array('message' => 'Thank you ! Login successfull', 'status'=>'success', 'url'=>'index.php');
        } else {
            $msg = array('message' => 'Password or email Incorrect', 'status'=>'error');
        }
    }

    echo json_encode($msg);
    return;
}
//----------------------------------Admin Login end---------------------------------------//


//-------------------------------------update lawyer profile--------------------------------------//
    if(isset($_POST['update_lawyer']) && !empty($_POST['update_lawyer'])){
    $msg=[];
    $name = mi_secure_input($_POST['name']);
    $phone = mi_secure_input($_POST['phone']);
    $email = mi_secure_input ($_POST['email']);
    $nid = mi_secure_input ($_POST['nid']);
    $self_details = mi_secure_input($_POST['self-desc']);
    $address = mi_secure_input($_POST['address']);
    $area = mi_secure_input($_POST['area']);
    $category = mi_secure_input($_POST['category']);
    $l_type = mi_secure_input($_POST['case_type']);


    $service = mi_secure_input($_POST['service']);
    $services = $_POST['services'];
    if($service != ''){
        $service_group = array(
            'service_id'=> $service,
            'category'=> $services
        );
        $srv =json_encode($service_group);
    }


    $gender = mi_secure_input($_POST['gender']);
    $lawyer_id = mi_secure_input($_POST['lawyer_id']);

    if(isset($_FILES['image'])&& !empty($_FILES['image'])){
        $image =$_FILES['image'];
    }
    if(isset($_FILES['document'])&& !empty($_FILES['document'])){
        $document =$_FILES['document'];
    }

    if (empty($name)) {
        $msg = array('message' => 'Please Fill the name field', 'status'=>'error');
    }elseif (is_numeric($name)){
        $msg = array('message' => 'Please Select your services', 'status'=>'error');
    }elseif (is_numeric($srv)){
        $msg = array('message' => 'Name should be Latter', 'status'=>'error');
    }elseif (empty($phone)){
        $msg = array('message' => 'Please write Phone number ', 'status'=>'error');
    }elseif (!is_numeric($phone)){
        $msg = array('message' => 'Phone number should be digits', 'status'=>'error');
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msg = array('message' => 'Invalid email format', 'status'=>'error');
    }elseif (is_numeric($address)){
        $msg = array('message' => 'Please fill address field', 'status'=>'error');
    }elseif (empty($self_details)){
        $msg = array('message' => 'Please tell us something about you', 'status'=>'error');
    }elseif (empty($area)){
        $msg = array('message' => 'Please select a district', 'status'=>'error');
    }elseif (empty($category)){
        $msg = array('message' => 'Please select Your Court', 'status'=>'error');
    }else{

        $law_doc = mi_db_read_by_id('lawyer',array('id'=>$lawyer_id))[0];
        $old_doc = '../'.$law_doc['documents'];
        if(isset($document['name']) && !empty($document['name'])){
            $new_doc = mi_uploader(
                $document['name'],
                $document['tmp_name'],
                '../uploads/',
                array('doc','docx','rtf', 'txt')
            );
//            print_r($up_doc); return;
            if($new_doc != false){
                $up_doc = str_replace('../', '', $new_doc);
                unlink($old_doc);
            }
            $data = array(
                'name'              => $name,
                'phone'             => $phone,
                'email'             => $email,
                'nid'               => $nid,
                //'image'             => $up_img,
                'address'           => $address,
                'gender'            => $gender,
                'self_details'      => $self_details,
                'case_type'         => $l_type,
                'lawyer_category_id'=> $category,
                        'services_id'       => $srv,
                'service_area'      => $area,
                'documents'         => $up_doc,
            );
        }else{
            $data = array(
                'name'              => $name,
                'phone'             => $phone,
                'email'             => $email,
                'nid'               => $nid,
              //  'image'             => $up_img,
                'address'           => $address,
                'gender'            => $gender,
                'self_details'      => $self_details,
                'case_type'         => $l_type,
                'lawyer_category_id'=> $category,
                        'services_id'       => $srv,
                'service_area'      => $area,
              //  'documents'         => $up_doc,
            );

        }

        if(isset($image['name']) && !empty($image['name'])){
            $up_img = str_replace('../', '',
                mi_uploader($image['name'],
                    $image['tmp_name'],
                    '../uploads/',
                    array('png', 'PNG', 'jpg', 'jpeg', 'JPG', 'gif', 'GIF', 'JPEG', 'svg', 'SVG')));

            if($up_img==true){
                unlink('../'.$law_doc['image']);
            }
            $data = array(
                'name'              => $name,
                'phone'             => $phone,
                'email'             => $email,
                'nid'               => $nid,
                'image'             => $up_img,
                'address'           => $address,
                'gender'            => $gender,
                'self_details'      => $self_details,
                'case_type'         => $l_type,
                'lawyer_category_id'=> $category,
                'services_id'       => $srv,
                'service_area'      => $area,
                //'documents'         => $up_doc,
            );
        }else{
            $data = array(
                'name'              => $name,
                'phone'             => $phone,
                'email'             => $email,
                'nid'               => $nid,
                //  'image'             => $up_img,
                'address'           => $address,
                'gender'            => $gender,
                'self_details'      => $self_details,
                'case_type'         => $l_type,
                'lawyer_category_id'=> $category,
                        'services_id'       => $srv,
                'service_area'      => $area,
                //'documents'         => $up_doc,
            );
        }


        $result = mi_db_update('lawyer', $data, array('id'=>$lawyer_id));
        if($result){
            $msg = array('message' => 'Your Profile update successfully', 'status'=>'success','url'=>'lawyer_profile.php');
        }else{
            $msg = array('message' => 'Something worng', 'status'=>'error');
        }
    }
    echo json_encode($msg);
    return;
}
//-------------------------------------update lawyer profile--------------------------------------//


//----------------------------------Lawyer profile upgrade start---------------------------------------//
if(isset($_POST["upgrade-form"]) && !empty($_POST["upgrade-form"])){
    $msg=[];
    $id = mi_secure_input($_POST['lawyer-id']);
    $education = mi_secure_input($_POST['education']);
    $member = mi_secure_input($_POST['member']);
    $award = mi_secure_input($_POST['award']);

    if(empty($education) && empty($member) && empty($award)){
        $msg = array('message' => 'No data funded to upgrade ', 'status'=>'error');
    }else{

        if (!empty($education)){
            $edata=$education;
        }else{
            $edata='';
        }
        if (!empty($member)){
            $ldata=$member;
        }else{
            $ldata='';
        }
        if (!empty($award)){
            $adata=$award;
        }else{
            $adata='';
        }

            $data=array(
                'education'     =>$edata,
                'law_member'    =>$ldata,
                'awards'        =>$adata
            );


        $upgrade = mi_db_update('lawyer', $data, array('id'=>$id));
        if($upgrade){
            $msg = array('message' => 'Your information added successfully ', 'status'=>'success', 'url'=>'lawyer_profile.php');
        }else{
            $msg = array('message' => 'Something worng !', 'status'=>'error');
        }
    }
    echo json_encode($msg);
    return;
}
//----------------------------------Lawyer profile upgrade end---------------------------------------//


//----------------------------------Lawyer and Admin comments---------------------------------------//
if(isset($_POST["c-submit"]) && !empty($_POST["c-submit"])){
    $msg=[];
    $comment = mi_secure_input($_POST['comments']);
    $cid = mi_secure_input($_POST['comment_case_id']);
    $user_id = mi_secure_input($_POST['user_id']);
     if(empty($comment)){
         $msg = array('message' => 'Comments field blunk', 'status'=>'error');

     }else{
         $type = mi_db_read_by_id('lawyer', array('id'=>$user_id));
         if(!empty($type)){
             $data= array(
                 'clints_case_id'=> $cid,
                 'user_id'       => $user_id,
                 'type'          => 'Lawyer',
                 'comments'      => $comment
             );

         }else{
             $data= array(
                 'clints_case_id'=> $cid,
                 'user_id'       => $user_id,
                 'type'          => 'Admin',
                 'comments'      => $comment
             );

         }

         $insert = mi_db_insert('lawyer_case_comnt', $data);
         if($insert){
            $msg = array('message' => 'Comments save successfully', 'status'=>'success');
        }else{
             $msg = array('message' => 'Something worng !', 'status'=>'error');

         }

     }
    echo json_encode($msg);
    return;
}
//----------------------------------Lawyer and Admin comments end---------------------------------------//


//----------------------------------Add Lawyer service---------------------------------------//
if(isset($_POST["service_insert"]) && !empty($_POST["service_insert"])){
    $msg=[];
    $service = mi_secure_input($_POST['service']);
    $services = mi_secure_input($_POST['services']);
    $service_type = mi_secure_input($_POST['service_type']);
    if (!empty($_FILES['service_image'])){
        $image  = $_FILES['service_image'];
    }
        if(empty($service)){
            if (empty($service_type)){
                $msg = array('message' => ' Please select service type ', 'status'=>'error');
            }else{
                if(isset($image['name']) && !empty($image['name'])){
                    $up_img = str_replace('../', '', mi_uploader($image['name'], $image['tmp_name'], '../uploads/', array('png', 'PNG', 'jpg', 'jpeg', 'JPG', 'gif', 'GIF', 'JPEG', 'svg', 'SVG')));
                    $data= array(
                        'service_name'  => $services,
                        'type_id'       => $service_type,
                        'image'         => $up_img
                    );
                    $insert = mi_db_insert('service', $data);
                    $msg = array('message' => ' Service add successfully ', 'status'=>'success');
                }else{
                    $data= array(
                        'service_name'  => $services,
                        'type_id'       => $service_type,
                    );
                    $insert = mi_db_insert('service', $data);
                    $msg = array('message' => ' Service add successfully ', 'status'=>'success');
                }

            }
        }else{
            $data= array(
                'service_id'    => $service,
                'services_name' => $services
            );
            $insert = mi_db_insert('services', $data);
            $msg = array('message' => ' Services Add successfully ', 'status'=>'success');
        }

    echo json_encode($msg);
    return;
}
//----------------------------------Add Lawyer service end---------------------------------------//


//----------------------------------Case update information start---------------------------------------//
    if(isset($_POST["hearing_submit"]) && !empty($_POST["hearing_submit"])){
    $msg=[];
    $case_information = mi_secure_input($_POST['case_information']);
    $status = mi_secure_input($_POST['case_status']);
    $cid = mi_secure_input($_POST['case_id']);
    $lid = mi_secure_input($_POST['lawyer_id']);
    $next_date = mi_secure_input($_POST['ndate']);


    if(empty($case_information)) {
        $msg = array('message' => 'Case Details field field blank', 'status' => 'error');
    }elseif(empty($next_date)){
        $msg = array('message' => 'Please select a date', 'status' => 'error');
    }elseif(empty($status)){
        $msg = array('message' => 'Please select a option (status}', 'status' => 'error');
    }else{
        $data= array(
            'case_id'          => $cid,
            'lawyer_id'        => $lid,
            'details'          => $case_information,
            'next_date'        => $next_date,
            'case_status'      => $status
        );

        $insert = mi_db_insert('case_update_information', $data);
        if($insert){
            $msg = array('message' => 'Information save successfully', 'status'=>'success');
        }else{
            $msg = array('message' => 'Something worng !', 'status'=>'error');

        }

    }
    echo json_encode($msg);
    return;
}
//----------------------------------Case update information end---------------------------------------//


//----------------------------------Lawyer Membership---------------------------------------//
    if(isset($_POST["action"]) && $_POST["action"] == 'm-plan'){
    $msg = [];
    $lid = mi_secure_input($_POST['law_id']);
    $case_id = mi_secure_input($_POST['case_id']);
    $checkbox = mi_secure_input($_POST['m-plan']);
    $end_date = mi_db_read_by_id('membership_plan', array('id'=>$checkbox))[0];
    $day = $end_date['month'];
     if(empty($checkbox)){
         $msg = array('message' => 'Please select a membership plan', 'status'=>'error');
     }else{
        $data= array(
            'lawyer_id'         => $lid,
            'membership_id'     => $checkbox,
            'end_date'          => date('Y-m-d H:i:s', strtotime('+'.$day.'month')),
            'payment_status'    => '1',
            'status'            => '1'
        );
         $insert = mi_db_insert('enroll_membership', $data);
         if ($insert){

             $member_id = mi_db_read_all('enroll_membership', 'id', 'DESC', 1)[0];
             mi_set_session('member_id',$member_id);
             mi_set_session('case_id',$case_id);
             $msg = array('message' => 'Please complete your Payment', 'status'=>'success', 'url'=>'checkout.php');
         }else{
             $msg = array('message' => 'Something worng', 'status'=>'error', 'url'=>'case_details.php');

         }
      }
    echo json_encode($msg);
    return;
}
//----------------------------------Lawyer Membership end---------------------------------------//


//----------------------------------Payment for Membership---------------------------------------//
if(isset($_POST["pay_now"]) && !empty($_POST["pay_now"])){
    $msg = [];
    $case_id=mi_get_session('case_id');
    $user_id = mi_secure_input($_POST['user_id']);
    $item_id = mi_secure_input($_POST['item_number']);
    $item_name = mi_secure_input($_POST['item_name']);
    $amount = mi_secure_input($_POST['amount']);
    $currency = mi_secure_input($_POST['currency_code']);
    $transaction_id = mi_secure_input($_POST['transaction_id']);
    $status = mi_secure_input($_POST['transaction_status']);

    if(empty($status)){
        $msg = array('message' => 'Transaction Incomplete ', 'status'=>'error');
    }else {
        $data = array(
            'user_id' => $user_id,
            'item_name' => $item_id,
            'item_id' => $item_name,
            'item_price_currency' => $currency,
            'paid_amount' => $amount,
            'paid_amount_currency' => $currency,
            'txn_id' => $transaction_id,
            'payment_status' => $status
        );

        $insert = mi_db_insert('orders', $data);
        if ($insert == true) {
            mi_db_update('enroll_membership', array('payment_status' => 2), array('lawyer_id'=>$user_id));
            $approve= mi_db_update('clients_cases', array('status'=>5) , array('id'=>$case_id));
            $msg = array('message' => 'Payment successful', 'status' => 'success', 'url' => 'case_details.php?id='.$case_id);
            mi_unset('case_id');
        } else {
            $msg = array('message' => 'Something worng', 'status' => 'error', 'url' => 'case_details.php');
            mi_unset('case_id');

        }
    }
    echo json_encode($msg);
    return;
}
//----------------------------------Payment for Membership end---------------------------------------//


//----------------------------------Lawyer Case reject---------------------------------------//
    if(isset($_POST["token_lower"]) && !empty($_POST['token_lower']) && $_POST['token_lower']==1){
    $msg =[];
    $cid = mi_secure_input($_POST['deleteid']);
    $data= array(
        'status' => '3'
    );

    $reject= mi_db_update('clients_cases',$data ,array('id'=>$cid));

    if($reject){
        $msg = array('message' => 'Case rejected successfully', 'status'=>'success');
    }else{
        $msg = array('message' => 'Something worng', 'status'=>'error');
    }
    echo json_encode($msg);

}
//----------------------------------Lawyer case reject end---------------------------------------//


//----------------------------------Admin Case reject---------------------------------------//
    if(isset($_POST["action"]) && $_POST['action'] == 'reject_case'){
    $msg =[];
    $cid = $_POST['reject_id'];
//    $cid = mi_secure_input($_POST['reject_case']);
    $data= array(
        'status' => '7'
    );

    $reject= mi_db_update('clients_cases',$data ,array('id'=>$cid));

    if($reject){
        $msg = array('message' => 'Case rejected successfully', 'status'=>'success');
    }else{
        $msg = array('message' => 'Something worng', 'status'=>'error');
    }
    echo json_encode($msg);
}
//----------------------------------Admin case reject end---------------------------------------//


//----------------------------------Admin Active Case ---------------------------------------//
    if(isset($_POST["action"]) && $_POST['action'] == 'active_case'){
    $msg =[];
    $cid = $_POST['active'];
    $case_status = mi_db_read_by_id('clients_cases',array('id'=>$cid))[0];

    if($case_status['status']==1 || $case_status['status']==7) {
        $data = array('status' => 6, 'status_change_date' => date('Y-m-d H:i:s', strtotime("now")));
        $reject= mi_db_update('clients_cases',$data ,array('id'=>$cid));
        $msg = array('message' => 'Case send to lawyer', 'status'=>'success');
    }elseif($case_status['status']==5){
        $data = array('status' => 2, 'status_change_date' => date('Y-m-d H:i:s', strtotime("now")));
        $reject= mi_db_update('clients_cases',$data ,array('id'=>$cid));
        $msg = array('message' => 'Case running successfully', 'status'=>'success');
    }else{
        $data = array('status' => 2, 'status_change_date' => date('Y-m-d H:i:s', strtotime("now")));
        $reject= mi_db_update('clients_cases',$data ,array('id'=>$cid));
        $msg = array('message' => 'Case running successfully', 'status'=>'success');
    }

    echo json_encode($msg);
}
//----------------------------------Admin case active end---------------------------------------//


//---------------------------------- Active Clients ---------------------------------------//
    if(isset($_POST["action_client"]) && $_POST['action_client'] == 'clientActive'){
    $msg =[];
    $client = $_POST['activeClient'];
//    print_r($client); return;

    $status = mi_db_read_by_id('clients', array('id'=>$client))[0];

    if($status['status']==1){
        $data = array('status' => 2);
        $active = mi_db_update('clients', $data ,array('id'=>$client));
        if($active){
            $msg = array('message' => 'Client approve successfully', 'status'=>'success');
        }else{

        }
    }else{
        $data = array('status' => 1);
        $active = mi_db_update('clients', $data ,array('id'=>$client));
        if($active){
            $msg = array('message' => 'Client approve successfully', 'status'=>'success');
        }else{

        }
    }

    echo json_encode($msg);
}
//---------------------------------- Active Clients end---------------------------------------//


//---------------------------------- Reject Clients ---------------------------------------//
    if(isset($_POST["action_client_active"]) && $_POST['action_client_active'] == 'reject_client'){
    $msg =[];
    $client = $_POST['reject_client'];

    $status = mi_db_read_by_id('clients', array('id'=>$client))[0];

    if($status['status']==1){
        $data = array('status' => 2);
        $active = mi_db_update('clients', $data ,array('id'=>$client));
        if($active){
            $msg = array('message' => 'Client reject successfully', 'status'=>'success');
        }else{

        }
    }else{
        $data = array('status' => 1);
        $active = mi_db_update('clients', $data ,array('id'=>$client));
        if($active){
            $msg = array('message' => 'Client reject successfully', 'status'=>'success');
        }else{

        }
    }

    echo json_encode($msg);
}
//---------------------------------- Reject Clients end---------------------------------------//


//---------------------------------- Lawyer active ---------------------------------------//
    if(isset($_POST["action_lawyer"]) && $_POST['action_lawyer'] == 'lawyer_action'){
    $msg =[];
    $lawyer = $_POST['activeLawyer'];
    $status = mi_db_read_by_id('lawyer', array('id'=>$lawyer))[0];

        $data = array('status' => 3);
        $active = mi_db_update('lawyer', $data ,array('id'=>$lawyer));
        if($active){
            $msg = array('message' => 'Lawyer verified successfully', 'status'=>'success');
        }else{

        }

    echo json_encode($msg);
}
//---------------------------------- Lawyer active end---------------------------------------//


//---------------------------------- Lawyer Reject ---------------------------------------//
    if(isset($_POST["action_lawyer_reject"]) && $_POST['action_lawyer_reject'] == 'lawyer_action_reject'){
    $msg =[];
    $lawyer = $_POST['rejectLawyer'];

        $data = array('status' => 4);
        $active = mi_db_update('lawyer', $data ,array('id'=>$lawyer));
        if($active){
            $msg = array('message' => 'Lawyer reject successfully', 'status'=>'success');
        }else{

        }

    echo json_encode($msg);
}
//---------------------------------- Lawyer reject end---------------------------------------//


//----------------------------------Lawyer Case approve---------------------------------------//
    if(isset($_POST["approve"]) && !empty($_POST["approve"])){
    $msg =[];
    $cid = mi_secure_input($_POST['case_id']);

        $data= array(
            'status'             => '5',
            'status_change_date' => ''
        );


    $approve= mi_db_update('clients_cases', $data , array('id'=>$cid));
    if($approve){
        $msg = array('message' => 'Your request Send successfully', 'status'=>'success');
    }else{
        $msg = array('message' => 'Something worng', 'status'=>'error');
    }
    echo json_encode($msg);
    return;
}
//----------------------------------Lawyer Case approve end---------------------------------------//


//----------------------------------Create new membersip plan---------------------------------------//
    if(isset($_POST["membership-plan"]) && !empty($_POST["membership-plan"])){
    $msg = [];
    $name = mi_secure_input($_POST['name']);
    $price = mi_secure_input($_POST['price']);
    $plan_details = mi_secure_input($_POST['plan_details']);
    $month = mi_secure_input($_POST['month']);

    if(empty($name) || empty($price) || empty($plan_details) || empty($month) ) {
        $msg = array('message' => 'Any field cannot blank', 'status' => 'error');
    }elseif(is_numeric($name)){
        $msg = array('message' => 'Name cannot be numeric', 'status' => 'error');
    }elseif (!is_numeric($price)){
        $msg = array('message' => 'Price should be numeric', 'status' => 'error');
    }else{
        $data= array(
           'plan_name'  =>$name,
            'month'     =>$month,
            'price'     =>$price,
            'details'   =>$plan_details
        );
        $insert = mi_db_insert('membership_plan', $data);
        if ($insert){
            $msg = array('message' => 'Membership plan create successfully', 'status'=>'success');
        }else{
            $msg = array('message' => 'Something worng', 'status'=>'error');

        }
    }
    echo json_encode($msg);
    return;
}
//----------------------------------Create new membersip plan end---------------------------------------//


//----------------------------------membersip plan active/deactive---------------------------------------//
    if(isset($_POST["action_Membership"]) && !empty($_POST["action_Membership"])){
    $msg =[];
    $mid = mi_secure_input($_POST['activeMembership']);
    $membership_sts= mi_db_read_by_id('membership_plan',array('id'=>$mid))[0];

    if(($membership_sts['status'])==1){
        $data= array(
            'status'             => '2',
        );

    }else{
        $data= array(
            'status'             => '1',
        );
    }

    $active= mi_db_update('membership_plan', $data , array('id'=>$mid));
    if($active){
        $msg = array('message' => 'Status change successfully', 'status'=>'success');
    }else{
        $msg = array('message' => 'Something worng', 'status'=>'error');
    }
    echo json_encode($msg);
    return;
}
//---------------------------------- membersip plan active/deactive---------------------------------------//


//----------------------------------Edit membership plan---------------------------------------//
    if(isset($_POST["membership-plan-edit"]) && !empty($_POST["membership-plan-edit"])){
    $msg = [];
    $name = mi_secure_input($_POST['name']);
    $price = mi_secure_input($_POST['price']);
    $plan_details = mi_secure_input($_POST['plan_details']);
    $month = mi_secure_input($_POST['month']);
    $m_id = mi_secure_input($_POST['plan_id']);

    if(empty($name) || empty($price) || empty($plan_details) || empty($month) ) {
        $msg = array('message' => 'Any field cannot blank', 'status' => 'error');
    }elseif(is_numeric($name)){
        $msg = array('message' => 'Name cannot be numeric', 'status' => 'error');
    }elseif (!is_numeric($price)){
        $msg = array('message' => 'Price should be numeric', 'status' => 'error');
    }else{
        $data= array(
            'plan_name'  =>$name,
            'month'     =>$month,
            'price'     =>$price,
            'details'   =>$plan_details
        );
        $insert = mi_db_update('membership_plan', $data, array('id'=>$m_id));
        if ($insert){
            $msg = array('message' => 'Membership plan update successfully', 'status'=>'success');
        }else{
            $msg = array('message' => 'Something worng', 'status'=>'error');

        }
    }
    echo json_encode($msg);
    return;
}
//----------------------------------Edit Membership plan end---------------------------------------//
