<?php 
if (isset($_POST['data'])) {
    $id = $_POST['data'];

    $result= mi_db_read_by_id('services', array('service_id'=>$id));
    foreach ($result as $rs) { ?>
        <input type="checkbox" name="services[]" value="<?php echo $rs['services_name'];?>">
        <label for="vehicle1"><?php echo $rs['services_name'];?></label><br>
    <?php } 
}?> 


<?php    

//----------------------------------Lawyer signup start---------------------------------------//
              
if(isset($_POST['lawyer_reg']) && !empty($_POST['lawyer_reg'])){
    $msg = [];
    $name = mi_secure_input($_POST['name']);
    $phone = mi_secure_input($_POST['phone']);
    $nid = mi_secure_input ($_POST['nid']);
    $password = mi_secure_input($_POST['password']);
    $cpass = mi_secure_input($_POST['cpassword']);
    $self_details = mi_secure_input($_POST['self-desc']);
    $address = mi_secure_input($_POST['address']);
    $area = mi_secure_input($_POST['area']);
    $category = mi_secure_input($_POST['category']);
    $l_type = mi_secure_input($_POST['type']);

    $service = mi_secure_input($_POST['service']);
    $single_service = $_POST['services'];
    if($service != ''){
        $service_group = array(
           'service_id'=> $service,
            'category'=>  $single_service
        );
        $srvc =json_encode($service_group);
    }

    $token=md5(time().$name);
    $gender = mi_secure_input($_POST['gender']);

    $document = $_FILES['document'];
    $image =  $_FILES['image'];

    $email = mi_secure_input ($_POST['email']);
    $return_email = mi_db_read_by_id('lawyer', array('email'=>$email));
    if(count($return_email)>0){
        $msg = array('message' => 'This email address is already used', 'status'=>'error');
    }else {

        if (empty($name)) {
            $msg = array('message' => 'Please Fill the name field', 'status' => 'error');
        } elseif (is_numeric($name)) {
            $msg = array('message' => 'Name should be Latter', 'status' => 'error');
        } elseif (empty($phone)) {
            $msg = array('message' => 'Please write Phone number', 'status' => 'error');
        } elseif (!is_numeric($phone)) {
            $msg = array('message' => 'Phone number should be digits', 'status' => 'error');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = array('message' => 'Invalid email format', 'status' => 'error');
        } elseif ($image['name']) {
            $msg = array('message' => 'Please select a image', 'status' => 'error');
        } elseif (is_numeric($address)) {
            $msg = array('message' => 'Please fill address field', 'status' => 'error');
        } elseif (empty($self_details)) {
            $msg = array('message' => 'Please tell us something about you', 'status' => 'error');
        } elseif (empty($area)) {
            $msg = array('message' => 'Please select a district', 'status' => 'error');
        } elseif (empty($category)) {
            $msg = array('message' => 'Please select Your Court', 'status' => 'error');
        } elseif (empty($document['name'])) {
            $msg = array('message' => 'Please Your ber council certificate ', 'status' => 'error');
        } elseif ($password != $cpass) {
            $msg = array('message' => 'Your password not matched ', 'status' => 'error');
        } else {

            $up_doc = str_replace('../', '', mi_uploader($document['name'], $document['tmp_name'], '../uploads/', array('doc', 'docx', 'rtf', 'txt')));
            $up_img = str_replace('../', '', mi_uploader($image['name'], $image['tmp_name'], '../uploads/', array('png', 'PNG', 'jpg', 'jpeg', 'JPG', 'gif', 'GIF', 'JPEG', 'svg', 'SVG')));
            $data = array(
                'name' => $name, 'phone' => $phone, 'email' => $email,
                'nid' => $nid, 'image' => $up_img, 'address' => $address,
                'gender' => $gender, 'self_details' => $self_details, 'case_type' => $l_type,
                'lawyer_category_id' => $category, 'services_id' => $srvc, 'service_area' => $area,
                'documents' => $up_doc, 'token'=>$token,'password' => md5($password),'request_date'=>''
            );
            $result = mi_db_insert('lawyer', $data);
            if ($result) {
                $msg = array('message' => 'Thank you ! an activation mail send into your mail ', 'status' => 'success', 'url' => '../index.php');
                $mail = mi_do_mail(array($email), 'Soft Minion Alert', 'Softminion Registration Successful<br>
                  <a class="btn btn-primary" href="http://localhost/www/lawyer-update/pages/token.php?token='.$token.'">
                    Acitivate your account</a>');
//                 if($mail){
//                }
//                $msg = array('message' => 'Please select a district', 'status' => 'error');
            }
        }
    }
    echo json_encode($msg);
    return;
}


//----------------------------------Lawyer signup end---------------------------------------//
              


//----------------------------------Signup for Client---------------------------------------//

if(isset($_POST['save']) && !empty($_POST['save'])){
    $msg = [];
    $name = mi_secure_input($_POST['name']);
    $phone = mi_secure_input($_POST['phone']);
    $email = mi_secure_input ($_POST['email']);
    $address = mi_secure_input ($_POST['address']);
    $password = mi_secure_input($_POST['password']);
    $cpass = mi_secure_input($_POST['cpassword']);
    $gender = mi_secure_input($_POST['gender']);
    $return_email = mi_db_read_by_id('clients', array('email'=>$email));

    if(count($return_email)>0){
        $msg = array('message' => 'This mail is already used', 'status'=>'error');
    }else {
        mi_set_session('email', $email);
        if (empty($name)) {
            $msg = array('message' => 'Please Fill the name field', 'status' => 'error');
        } elseif (is_numeric($name)) {
            $msg = array('message' => 'Name should be Latter', 'status' => 'error');
        } elseif (empty($phone)) {
            $msg = array('message' => 'Please write Phone number', 'status' => 'error');
        } elseif (!is_numeric($phone)) {
            $msg = array('message' => 'Phone number should be digits', 'status' => 'error');
        } elseif (empty($password)) {
            $msg = array('message' => 'Password cannot be blunk', 'status' => 'error');
        } elseif ($password != $cpass) {
            $msg = array('message' => 'Your password not matched', 'status' => 'error');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = array('message' => 'Invalid email format', 'status' => 'error');
        } else {
            $data = array(
                'name'              => $name,
                'phone'             => $phone,
                'email'             => $email,
                'address'           => $address,
                'gender'            => $gender,
                'password'          => md5($password)
            );

            $insert = mi_db_insert('clients', $data);

            if ($insert) {
                $client_id = mi_db_read_by_id('clients', array('email'=>mi_get_session('email')))[0];
                mi_set_session('id', $client_id['id']);
                $msg = array('message' => 'Thank you ! Registration successful', 'status' => 'success', 'url' => '../index.php');
                mi_unset('email');

//                $mail = mi_do_mail(array($email), 'Soft Minion Alert', 'Softminion Registration Successful');
//                    if ($mail) {
//                        mi_redirect("profile.php");
//                    }
                  }

            }

    }
    echo json_encode($msg);
    return;
}

//----------------------------------signup for clients end---------------------------------------//


//----------------------------------Update Client profile ---------------------------------------//

if(isset($_POST['update']) && !empty($_POST['update'])){
    $msg=[];
    $name = mi_secure_input($_POST['name']);
    $id = mi_secure_input($_POST['id']);
    $phone = mi_secure_input($_POST['phone']);
    $email = mi_secure_input ($_POST['email']);
    $address = mi_secure_input ($_POST['address']);

    if (empty($name) || empty($phone) || empty($email) || empty($address)) {
        $msg = array('message' => 'Please Fill all the field ', 'status'=>'error');
    }elseif (!is_numeric($phone)){
        $msg = array('message' => 'Phone number should be digits', 'status'=>'error');
    }elseif (is_numeric($name)){
        $msg = array('message' => 'Name should be latter', 'status'=>'error');
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msg = array('message' => 'Invalid email format', 'status'=>'error');
    }else{
        $data = array(
        'name'              => $name,
        'phone'             => $phone,
        'email'             => $email,
        'address'           => $address
    );
        $update = mi_db_update('clients', $data , array('id'=>$id));
        if ($update){
            $msg = array('message' => 'Profile update successfully', 'status'=>'success', 'url'=>'profile.php' );
        }
    }
    echo json_encode($msg);
    return;
}

//----------------------------------Update clients end---------------------------------------//


//----------------------------------Upload Client case details---------------------------------------//

if(isset($_POST['upload-file']) && !empty($_POST['upload-file'])){
    $msg = [];
    $cdetails = mi_secure_input($_POST['case_details']);
    $client_id = mi_secure_input($_POST['id']);
    $lawyer_id = mi_secure_input($_POST['lid']);
    $case_id    = rand(500,100000);

    if (isset($_FILES['document']) && empty($_FILES['document'])) {
        $msg = array('message' => 'Please upload your case file ', 'status'=>'error');
    }elseif (empty($cdetails)){
        $msg = array('message' => 'Please tell us about your case ', 'status'=>'error');
    }else{
        $document = $_FILES['document'];
        $up_doc = str_replace('../', '',
        mi_uploader(
            $document['name'],
            $document['tmp_name'],
            '../uploads/',
            array('doc','docx','rtf', 'txt')
        )
    ); 
        $data = array(
        'case_id'           => $case_id,
        'client_id'         => $client_id,
        'lawyer_id'         => $lawyer_id,
        'case_document'     => $up_doc,
        'case_details'      => $cdetails
        
    );

        $insert = mi_db_insert('clients_cases', $data);
        if ($insert){
            $msg = array('message' => 'Your case file uploaded successfully ', 'status'=>'success');
        }
    }
    echo json_encode($msg);
    return;
}

//----------------------------------Upload Client case details end---------------------------------------//


//----------------------------------Contact us form---------------------------------------//
  if(isset($_POST['contact']) && !empty($_POST['contact'])){
    $msg        =[];
    $name       = mi_secure_input($_POST['your_name']);
    $email      = mi_secure_input($_POST['email_address']);
    $phone      = mi_secure_input($_POST['phone_number']);
    $subject    = mi_secure_input($_POST['subject']);
    $message    = mi_secure_input($_POST['message']);

    if (empty($name) || empty($email) || empty($subject) || empty($phone) || empty($message)) {
        $msg = array('message' => 'Any field cannot blank', 'status'=>'error');
    }elseif (is_numeric($name)){
        $msg = array('message' => 'Name should be word', 'status'=>'error');
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msg = array('message' => 'Invalid email format', 'status'=>'error');
    }elseif (!is_numeric($phone)){
        $msg = array('message' => 'Phone number should be numeric', 'status'=>'error');
    }else{
        $data = array(
            'name'               => $name,
            'email'              => $email,
            'phone'              => $phone,
            'subject'            => $subject,
            'message'            => $message
        );
        $insert = mi_db_insert('contact_us', $data);
        if ($insert){
            $msg= array('message' => 'Thank you for getting in touch with us.', 'status'=> 'success', 'url'=>'index.php');
            $mail = mi_do_mail(array('islamrakib361@gmail.com'), $subject, $message);
        }else{
            mi_redirect('profile.php');
        }

    }
      echo json_encode($msg);
      return;
}

//----------------------------------Contact us form end---------------------------------------//



//--------------------------------------------User Login---------------------------------------//

if (isset($_POST['login'])) {
    $msg = [];
    $email = mi_secure_input($_POST['email']);
    $password = mi_secure_input($_POST['password']);
    $pass = md5($password);
    $check = mi_secure_input($_POST['check']);
        
    if (empty($email) || empty($password)) {
        $msg = array('message' => 'Password or email invalid', 'status'=>'error');

    } else {
        if ($check === 'lawyer') {
            $result = mi_db_read_by_id('lawyer', array('email'=>$email, 'password'=>$pass));
            if (count($result)>0) {
                mi_set_session('lawyer_id', $result[0]['id']);
                $msg = array('message' => 'Thank you ! Login successfull', 'status'=>'success', 'url'=>'admin/lawyer_index.php');
            } else {
                $msg = array('message' => 'Incorrect email or password', 'status'=>'error');
            }

        }else{

            $query = mi_db_read_by_id('clients', array('email'=>$email, 'password'=>$pass));
            if (count($query)>0) {
                mi_set_session('id', $query[0]['id']);
                $msg = array('message' => 'Thank you ! Login successfull', 'status'=>'success', 'url'=>'profile.php');
            } else {
                $msg = array('message' => 'Password or email Incorrect', 'status'=>'error');
            }
        
        }
    }

    echo json_encode($msg);
    return;
}
//----------------------------------User Login end---------------------------------------//
