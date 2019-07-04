
<?php require "inc/database.php";?>

<?php

session_start();

?>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {

        $fname = $_POST['fname'];

        $lname = $_POST['lname'];

        $email = $_POST['email'];

        $password = $_POST['password'];
        $group = $_POST['group'];

        $gender = $_POST['gender'];

        $v_pass = $_POST['v_password'];

        $company = $_POST['company'];

        $faculty = $_POST['faculty'];
        $address = $_POST['address'];
        $country = $_POST['country'];

        $dep = $_POST['department'];

        $state = $_POST['state'];

        $phone = $_POST['mobile'];

        $errors = [];

        if ($password != $v_pass) {
            $errors[] = "password not match";
        }
        if (empty($errors)) {

            $sql = "INSERT INTO `auther`(`A-fname`,`A-lname`,`A-email`,`password`,`gender`,`company`,`co-group`,`faculty`,`department`,`state`,`country`,`phone`,`A-address`)VALUES ('$fname','$lname','$email','$password','$gender','$company','$group','$faculty','$dep','$state','$country','$phone','$address') ";


            if(mysqli_query($connect , $sql))
            {
                $_SESSION['id'] = mysqli_insert_id($connect);
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['fullname'] = $fname." ".$lname;
                $_SESSION['email'] = $email;
                $_SESSION['group'] = $group;
                $_SESSION['gender'] = $gender;
                $_SESSION['address'] = $address;
                $_SESSION['company'] = $company;
                $_SESSION['country'] = $country;
                $_SESSION['dep'] = $dep;
                $_SESSION['phone'] = $phone;
                $_SESSION['faculty'] = $faculty;
                $_SESSION['state'] = $state;
                $_SESSION['phone'] = $phone;
                
                header("location:auther/profile.php");
            }else{
                echo mysqli_error($connect);
            }

        }

    }
}

?>

<style>
    body {margin:0; padding:0; font-family: Arial, Tahoma; background: #252F31}
            .container {width: 900px; margin: 50px auto; padding:25px}

            h1 {color: #FFF; text-align: center; margin-bottom: 50px}
            h2 {color: #FFF; margin-bottom: 25px}
            .first-paragraph {color: #999; line-height: 1.4; text-align: left}
            label {color: #FFF; font-size: 19px; margin-left: 15px}
            input {padding:7px; background: #475252; color: #FFF; font-size:16px; border:0; position: relative}
            input[name="fname"] {left: 90px}
            input[name="lname"] {left: 100px}
            input[name="email"] {left:128px}
            input[name="password"] {left:92px}
            input[name="v_password"] {left:40px}
            hr {margin-top: 30px; margin-bottom: 30px}
            input[name="Given Name"] {left: 90px}
            input[name="Family Name"] {left: 100px}
            .menu1 {padding:7px; background: #475252; color: #FFDAB9; font-size:16px; border:0; position: relative; left:113px}
            input[name="company"] {left: 96px}
            input[name="faculty"] {left: 115px}
            input[name="department"] {left: 77px}
            textarea {padding: 10px; width: 55%; height: 180px; background: #475252; color: #FFF; font-size:17px; border:0; position: relative; left:200px}
            input[name="state"] {left: 48px}
            .menu2 {padding:7px; background: #475252; color: #FFDAB9; font-size:16px; border:0; width: 28%; position: relative; left:105px}
            input[name="mobile"] {left: 62px}
            .footer {width:100%; height:70px; margin-top:0; padding-top:10px; padding-bottom:18px; text-align: center; background: #191E22; color: #888; font-weight: bold}
            .footer ul {list-style: none; padding-left:0}
            .footer ul li {display: inline-block; padding: 2px}
            .footer ul li a {color: #000; font-size: 17px}
            .footer ul li a:hover {color: silver}

        </style>


<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1> Registration </h1>
        <h2> Login Information </h2>

        <label> Full Name* </label>
        <input type="text" name="fname" placeholder="First Name" style="width: 25%"> <input type="text" name="lname"
            placeholder="Last Name" style="width: 25%"> <br><br>

        <label> Email* </label>
        <input type="email" name="email" style="width: 30%"> <span style="color: #999; margin-left: 128px; font-size: 13px">(All
            communications will be sent to this email)</span><br> <br>

        <label> Password* </label>
        <input type="password" name="password" maxlength="15" style="width: 25%"> <span style="color: #999; margin-left: 92px; font-size: 13px">(Password
            must be 8-15 alphanumeric)</span><br> <br>

        <label> Verify Password* </label>
        <input type="password" name="v_password" maxlength="15" style="width: 25%">

        <hr color="#777" size="1">

        <h2> Personal Detail </h2>


        <label>co-authers group No (must be uniqe )</label>
        <input type="number" name="group" style="width: 28%"> <br><br>

        <label> Gender* </label>
        <select class="menu1" name="gender">

            <option selected value=""> -Select Gender- </option>
            <option value="male"> Male </option>
            <option value="female"> Female </option>

        </select> <br><br>

        <label> Company* </label>
        <input type="text" name="company" style="width: 30%"> <br><br>


        <label> Faculty* </label>
        <input type="text" name="faculty" style="width: 40%"> <br><br>

        <label> Department* </label>
        <input type="text" name="department" style="width: 40%"> <br><br>


        <hr color="#777" size="1">

        <h2> Contact Detail </h2>

        <label> Address* </label><br>
        <textarea name="address"></textarea> <br><br>

        <label> State/Province* </label>
        <input type="text" name="state" style="width: 28%"> <br><br>

        <label> Country* </label>
        <select class="menu2" name="country" >

            <option selected value=""> -Select Country- </option>
            <option value="afghanistan"> Afghanistan </option>
            <option value="albania"> Albania </option>
            <option value="Algeria"> Algeria </option>
            <option value="Andorra"> Andorra </option>
            <option value="Angola"> Angola </option>
            <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
            <option value="Argentina"> Argentina </option>
            <option value="Armenia"> Armenia </option>
            <option> Australia </option>
            <option> Austria </option>
            <option> Azerbaijan </option>
            <option> Bahamas </option>
            <option> Bahrain </option>
            <option> Bangladesh </option>
            <option> Barbados </option>
            <option> Belarus </option>
            <option> Belgium </option>
            <option> Belize </option>
            <option> Benin </option>
            <option> Bhutan </option>
            <option> Bolivia </option>
            <option> Bosnia and Herzegovina </option>
            <option> Botswana </option>
            <option> Brazil </option>
            <option> Brunei </option>
            <option> Bulgaria </option>
            <option> Burkina Faso </option>
            <option> Burma (Myanmar) </option>
            <option> Burundi </option>
            <option> Cambodia </option>
            <option> Cameroon </option>
            <option> Canada </option>
            <option> Cape Verde </option>
            <option> Cayman Islands </option>
            <option> Central African Republic </option>
            <option> Chad </option>
            <option> Chile </option>
            <option> China </option>
            <option> Christmas Island </option>
            <option> Cocos Islands </option>
            <option> Colombia </option>
            <option> Comoros </option>
            <option> Cook Islands </option>
            <option> Costa Rica </option>
            <option> Croatia </option>
            <option> Cuba </option>
            <option> Curacao </option>
            <option> Cyprus </option>
            <option> Czech Republic </option>
            <option> Democratic Republic of Congo </option>
            <option> Denmark </option>
            <option> Djibouti </option>
            <option> Dominica </option>
            <option> Dominican Republic </option>
            <option> East Timor </option>
            <option> Ecuador </option>
            <option> Egypt </option>
            <option> El Salvador </option>
            <option> Equatorial Guinea </option>
            <option> Eritrea </option>
            <option> Estonia </option>
            <option> Ethiopia </option>
            <option> Falkland Islands </option>
            <option> Faroe Islands </option>
            <option> Fiji </option>
            <option> Finland </option>
            <option> France </option>
            <option> French Polynesia </option>
            <option> Gabon </option>
            <option> Gambia </option>
            <option> Georgia </option>
            <option> Germany </option>
            <option> Ghana </option>
            <option> Gibraltar </option>
            <option> Greece </option>
            <option> Greenland </option>
            <option> Guadeloupe </option>
            <option> Guam </option>
            <option> Guatemala </option>
            <option> Guinea </option>
            <option> Guinea-Bissau </option>
            <option> Guyana </option>
            <option> Haiti </option>
            <option> Honduras </option>
            <option> Hong Kong </option>
            <option> Hungary </option>
            <option> Iceland </option>
            <option> India </option>
            <option> Indonesia </option>
            <option> Iran </option>
            <option> Iraq </option>
            <option> Ireland </option>
            <option> Isle of Man </option>
            <option> Israel </option>
            <option> Italy </option>
            <option> Ivory Coast </option>
            <option> Jamaica </option>
            <option> Japan </option>
            <option> Jordan </option>
            <option> Kazakhstan </option>
            <option> Kenya </option>
            <option> Kiribati </option>
            <option> Kosovo </option>
            <option> Kuwait </option>
            <option> Kyrgyzstan </option>
            <option> Laos </option>
            <option> Latvia </option>
            <option> Lebanon </option>
            <option> Lesotho </option>
            <option> Liberia </option>
            <option> Libya </option>
            <option> Liechtenstein </option>
            <option> Lithuania </option>
            <option> Luxembourg </option>
            <option> Macau </option>
            <option> Macedonia </option>
            <option> Madagascar </option>
            <option> Malawi </option>
            <option> Malaysia </option>
            <option> Maldives </option>
            <option> Mali </option>
            <option> Malta </option>
            <option> Marshall Islands </option>
            <option> Mauritania </option>
            <option> Mauritius </option>
            <option> Mexico </option>
            <option> Micronesia </option>
            <option> Moldova </option>
            <option> Monaco </option>
            <option> Mongolia </option>
            <option> Montenegro </option>
            <option> Montserrat </option>
            <option> Morocco </option>
            <option> Mozambique </option>
            <option> Myanmar [Burma] </option>
            <option> Namibia </option>
            <option> Nauru </option>
            <option> Nepal </option>
            <option> Netherlands </option>
            <option> New Caledonia </option>
            <option> New Zealand </option>
            <option> Nicaragua </option>
            <option> Niger </option>
            <option> Nigeria </option>
            <option> Niue </option>
            <option> Norfolk Island </option>
            <option> North Korea </option>
            <option> Northern Mariana Islands </option>
            <option> Norway </option>
            <option> Oman </option>
            <option> Pakistan </option>
            <option> Palau </option>
            <option> Panama </option>
            <option> Papua New Guinea </option>
            <option> Paraguay </option>
            <option> Peru </option>
            <option> Philippines </option>
            <option> Pitcairn Islands </option>
            <option> Poland </option>
            <option> Portugal </option>
            <option> Puerto Rico </option>
            <option> Qatar </option>
            <option> Republic of the Congo </option>
            <option> Reunion </option>
            <option> Romania </option>
            <option> Russia </option>
            <option> Rwanda </option>
            <option> Taiwan </option>
            <option> Tajikistan </option>
            <option> Tanzania </option>
            <option> Thailand </option>
            <option> Togo </option>
            <option> Tokelau </option>
            <option> Trinidad and Tobago </option>
            <option> Tunisia </option>
            <option> Turkey </option>
            <option> Turkmenistan </option>
            <option> Tuvalu </option>
            <option> Uganda </option>
            <option> Ukraine </option>
            <option> United Arab Emirates </option>
            <option> United Kingdom </option>
            <option> United States </option>
            <option> Uruguay </option>
            <option> Uzbekistan </option>
            <option> Vanuatu </option>
            <option> Vatican </option>
            <option> Venezuela </option>
            <option> Vietnam </option>
            <option> Western Sahara </option>
            <option> Yemen </option>
            <option> Zambia </option>
            <option> Zimbabwe </option>

        </select> <br><br>

        <label> Mobile/HP No </label>
        <input type="text" name="mobile" style="width: 28%"> <br><br>


        <input type="submit" value="Register" name="submit" style="width:170px; padding:15px; font-weight: bold; font-size: 19px; color: #FFF; background: #191E22; border-radius: 8px; margin-top: 50px; margin-left: 40%">

    </form>
</div>

<div class="footer">

    <span>&copy; Copyright 2019 <span style="color: #2ecc71">Se</span><span style="color: #FFF">nior</span><span style="color: #2ecc71">_</span><span
            style="color: #FFF">N</span><span style="color: #2ecc71">our</span> Inc</span>

</div>

<?php require "inc/footer.php";?>