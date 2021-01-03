<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<body onload="myFunction()">
    <div class="container">
        <br>

        <div class="row justify-content-md-center">
            <div class="col-md-12">

                

                <?php if (session('Insert')) : ?>
                    <div class="text-danger"><?= session('Insert') ?></div>
                <?php endif ?>

                <?php echo form_open(site_url('Clients/store'), ['name' => 'Client_create',  'id' => 'Client_create', 'enctype' => 'multipart/form-data']); ?>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="client_type">Client Type<span style="color:red;" class="ml-1">*</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                        $options = array(
                            'Individual' => 'Individual',
                            'Corporate' => 'Corporate'
                        );
                        echo form_dropdown('client_type',  $options, '', ['class' => 'form-control', 'id' => 'client_type']);
                        ?>
                    </div>
                </div>


                <div class="row form-group" id="company_name">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="company_name">Company Name: (In English)<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'company_name',  'class' => 'form-control', 'value' => set_value('company_name'), 'placeholder' => "Please enter company name"]); ?>
                    </div>
                </div>

                <!-- <div class="col-md-8">
        <img id="blah" src="#" alt="Not an image" class="imagesize" />
    </div> -->

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="user_name">User Name: (In English)<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'user_name', 'id' => 'user_name', 'class' => 'form-control', 'value' => set_value('user_name'), 'placeholder' => "Please enter user name"]); ?>

                        <!-- <span class="text-danger" id="duplicateUser"></span> -->
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="birth_date">Date of Birth<span style="color:red;" class="ml-1">*</label>
                    </div>
                    <div class="col-md-2">
                        <?php
                        $day1 = array(
                            '01' => '01',
                            '02' => '02',
                            '03' => '03',
                            '04' => '04',
                            '05' => '05',
                            '06' => '06',
                            '07' => '07',
                            '08' => '08',
                            '09' => '09',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                            '13' => '13',
                            '14' => '14',
                            '15' => '15',
                            '16' => '16',
                            '17' => '17',
                            '18' => '18',
                            '19' => '19',
                            '20' => '20',
                            '21' => '21',
                            '22' => '22',
                            '23' => '23',
                            '24' => '24',
                            '25' => '25',
                            '26' => '26',
                            '27' => '27',
                            '28' => '28',
                            '29' => '29',
                            '30' => '30',
                            '31' => '31'
                        );
                        echo form_dropdown('day', array('' => 'Day') + $day1, set_value('day'), ['class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-2">
                        <?php
                        $month1 = array(
                            '01' => '01',
                            '02' => '02',
                            '03' => '03',
                            '04' => '04',
                            '05' => '05',
                            '06' => '06',
                            '07' => '07',
                            '08' => '08',
                            '09' => '09',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12'
                        );
                        echo form_dropdown('month', array('' => 'Month') + $month1, set_value('month'), ['class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?php
                        $year1 = array(
                            '1930' => '1930',
                            '1931' => '1931',
                            '1932' => '1932',
                            '1933' => '1933',
                            '1934' => '1934',
                            '1935' => '1935',
                            '1936' => '1936',
                            '1937' => '1937',
                            '1938' => '1938',
                            '1939' => '1939',
                            '1940' => '1940',
                            '1941' => '1941',
                            '1942' => '1942',
                            '1943' => '1943',
                            '1944' => '1944',
                            '1945' => '1945',
                            '1946' => '1946',
                            '1947' => '1947',
                            '1948' => '1948',
                            '1949' => '1949',
                            '1950' => '1950',
                            '1951' => '1951',
                            '1952' => '1952',
                            '1953' => '1953',
                            '1954' => '1954',
                            '1955' => '1955',
                            '1956' => '1956',
                            '1957' => '1957',
                            '1958' => '1958',
                            '1959' => '1959',
                            '1960' => '1960',
                            '1961' => '1961',
                            '1962' => '1962',
                            '1963' => '1963',
                            '1964' => '1964',
                            '1965' => '1965',
                            '1966' => '1966',
                            '1967' => '1967',
                            '1968' => '1968',
                            '1969' => '1969',
                            '1970' => '1970',
                            '1971' => '1971',
                            '1972' => '1972',
                            '1973' => '1973',
                            '1974' => '1974',
                            '1975' => '1975',
                            '1976' => '1976',
                            '1977' => '1977',
                            '1978' => '1978',
                            '1979' => '1979',
                            '1980' => '1980',
                            '1981' => '1981',
                            '1982' => '1982',
                            '1983' => '1983',
                            '1984' => '1984',
                            '1985' => '1985',
                            '1986' => '1986',
                            '1987' => '1987',
                            '1988' => '1988',
                            '1989' => '1989',
                            '1990' => '1990',
                            '1991' => '1991',
                            '1992' => '1992',
                            '1993' => '1993',
                            '1994' => '1994',
                            '1995' => '1995',
                            '1996' => '1996',
                            '1997' => '1997',
                            '1998' => '1998',
                            '1999' => '1999',
                            '2000' => '2000',
                            '2001' => '2001',
                            '2002' => '2002',
                            '2003' => '2003',
                            '2004' => '2004',
                            '2005' => '2005',
                            '2006' => '2006',
                            '2007' => '2007',
                            '2008' => '2008',
                            '2009' => '2009',
                            '2010' => '2010',
                            '2011' => '2011',
                            '2012' => '2012',
                            '2013' => '2013',
                            '2014' => '2014',
                            '2015' => '2015',
                            '2016' => '2016',
                            '2017' => '2017',
                            '2018' => '2018',
                            '2019' => '2019',
                            '2020' => '2020'
                        );
                        echo form_dropdown('year', array('' => 'Year') + $year1, set_value('year'), ['class' => 'form-control']); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="gender">Gender<span style="color:red;" class="ml-1">*</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                        $options = array(
                            'Female' => 'Female',
                            'Male' => 'Male'
                        );
                        echo form_dropdown('gender', array('' => 'No Selected') + $options, '', ['class' => 'form-control']);
                        ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="occupation">Occupation<span style="color:red;" class="ml-1">*</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                        $options = array(
                            'Bussiness' => 'Bussiness',
                            'Service' => 'Service'
                        );
                        echo form_dropdown('occupation', array('' => 'No Selected') + $options, '', ['class' => 'form-control']);
                        ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="present_add">Present Address<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_textarea(['name' => 'present_add', 'rows' => '2', 'cols' => '10', 'class' => 'form-control', 'value' => set_value('present_add'), 'placeholder' => "Enter present address"]); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="permanent_add">Permanent Address<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_textarea(['name' => 'permanent_add', 'rows' => '2', 'cols' => '10', 'class' => 'form-control', 'value' => set_value('permanent_add'), 'placeholder' => "Enter permanent address"]); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="contact_phone">Contact Phone</label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'contact_phone', 'class' => 'form-control', 'value' => set_value('contact_phone'), 'maxlength' => 11, 'placeholder' => "Please enter contact phone"]); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="contact_mobile">Contact Mobile<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'contact_mobile', 'class' => 'form-control', 'value' => set_value('contact_mobile'), 'maxlength' => 11, 'placeholder' => "Please enter contact mobile"]); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="contact_email">Contact Email<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'contact_email', 'class' => 'form-control', 'value' => set_value('contact_email'), 'placeholder' => "Please enter contact email"]); ?>
                    </div>
                </div>


                <div class="row form-group" id="technical_phone">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="technical_phone">Technical Phone</label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'technical_phone', 'class' => 'form-control', 'value' => set_value('technical_phone'), 'maxlength' => 11, 'placeholder' => "Please enter technical phone"]); ?>
                    </div>
                </div>

                <div class="row form-group" id="technical_mobile">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="technical_mobile">Technical Mobile<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'technical_mobile', 'class' => 'form-control', 'value' => set_value('technical_mobile'), 'maxlength' => 11, 'placeholder' => "Please enter technical mobile"]); ?>
                    </div>
                </div>

                <div class="row form-group" id="technical_email">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="technical_email">Technical Email<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'technical_email', 'class' => 'form-control', 'value' => set_value('technical_email'), 'placeholder' => "Please enter technical email"]); ?>
                    </div>
                </div>

                <div class="row form-group" id="billing_phone">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="billing_phone">Billing Phone</label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'billing_phone', 'class' => 'form-control', 'value' => set_value('billing_phone'), 'maxlength' => 11, 'placeholder' => "Please enter billing phone"]); ?>
                    </div>
                </div>

                <div class="row form-group" id="billing_mobile">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="billing_mobile">Billing Mobile<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'billing_mobile', 'class' => 'form-control', 'value' => set_value('billing_mobile'), 'maxlength' => 11, 'placeholder' => "Please enter billing mobile"]); ?>
                    </div>
                </div>

                <div class="row form-group" id="billing_email">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="billing_email">Billing Email<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'billing_email', 'class' => 'form-control', 'value' => set_value('billing_email'), 'placeholder' => "Please enter billing email"]); ?>
                    </div>
                </div>



                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="father_name">Father Name<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'father_name', 'class' => 'form-control', 'value' => set_value('father_name'), 'placeholder' => "Please enter father name"]); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="mother_name">Mother Name<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'mother_name', 'class' => 'form-control', 'value' => set_value('mother_name'), 'placeholder' => "Please enter mother name"]); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="spouse_name">Spouse Name</label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'spouse_name', 'class' => 'form-control', 'value' => set_value('spouse_name'), 'placeholder' => "Please enter spouse name"]); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="photo_identity">Photo Identity<span style="color:red;" class="ml-1">*</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                        $options = array(
                            'Birth certificate' => 'Birth certificate',
                            'Driving license' => 'Driving license',
                            'NID' => 'NID',
                            'Passport' => 'Passport'
                        );
                        echo form_dropdown('photo_identity', array('' => 'No Selected') + $options, '', ['class' => 'form-control']);
                        ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="identity_number">Photo Identity Number<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'identity_number', 'class' => 'form-control', 'value' => set_value('identity_number'), 'placeholder' => "Please enter identity number"]); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="identity_scan">Photo Identity Scan Copy<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php $js = 'onchange="readURL(this);"'; ?>
                        <?php echo form_input('identity_scan', '', $js, 'file'); ?>
                    </div>
                </div>


                <div class="row form-group" id="trade_license">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="trade_license">Trade License<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php $js = 'onchange="readURL(this);"'; ?>
                        <?php echo form_input('trade_license', '', $js, 'file'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="auth_person_photo">Authurized Person's Photo<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php $js = 'onchange="readURL(this);"'; ?>
                        <?php echo form_input('auth_person_photo', '', $js, 'file'); ?>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="provider_name">Internet Connection Provider Name<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'provider_name', 'class' => 'form-control', 'value' => set_value('provider_name'), 'placeholder' => "Please enter provider name"]); ?>
                    </div>
                </div>

                <div class="row form-group" id="approve_no">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="approve_no">Approved Number<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_input(['name' => 'approve_no', 'class' => 'form-control', 'value' => set_value('approve_no'), 'placeholder' => "Please enter approved no"]); ?>
                    </div>
                </div>

                <div class="row form-group" id="status">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="status">Status<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <?php
                        $options = array(
                            'Pending' => 'Pending',
                            'Approved' => 'Approved'
                        );
                        echo form_dropdown('status',  $options, '', ['class' => 'form-control']);
                        ?>

                    </div>
                </div>

                <div class="row form-group ">
                    <div class="col-md-4 d-flex justify-content-end">
                        <label for="provider_name">Captcha Code<span style="color:red;" class="ml-1"> *</span></label>
                    </div>
                    <div class="col-md-8">
                        <!-- <?php // echo form_input(['name' => 'Captcha', 'class' => 'form-control', 'value' => set_value('Captcha'), 'placeholder' => "Please enter Captcha"]); 
                                ?> -->
                        <div class="g-recaptcha" data-sitekey="6LezdeAZAAAAAGufpkheQtxjc6dU_gE-O1fxU7i0"></div>
                        <?php if (session('CaptchaMsg')) : ?>
                            <span class="text-danger"><?= session('CaptchaMsg') ?></span>
                        <?php endif ?>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">

                    </div>
                    <div class="col-md-8">
                        <?php echo form_submit(['name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-success']); ?>
                        <a href="<?php echo site_url('Clients/start')  ?>" class="btn btn-info ">Close</a>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4 d-flex justify-content-end">

                    </div>
                    <div class="col-md-8">
                        <label><strong class="mr-1">Note:</strong>Field Marked with<span style="color:red;" class="ml-1 mr-1"> * </span>are required</label>
                    </div>
                </div>


                <!--</form>-->
                <?php echo form_close(); ?>
            </div>

        </div>

    </div>
    <script>
        if ($("#Client_create").length > 0) {
            $("#Client_create").validate({

                rules: {
                    client_type: {
                        required: true,
                    },
                    company_name: {
                        required: true,
                    },
                    user_name: {
                        required: true,
                    },
                    day: {
                        required: true,
                    },
                    month: {
                        required: true,
                    },
                    year: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    occupation: {
                        required: true,
                    },
                    present_add: {
                        required: true,
                    },
                    permanent_add: {
                        required: true,
                    },
                    contact_mobile: {
                        required: true,
                    },
                    contact_email: {
                        required: true,
                        email: true,
                    },
                    technical_mobile: {
                        required: true,
                    },
                    technical_email: {
                        required: true,
                        email: true,
                    },
                    billing_mobile: {
                        required: true,
                    },
                    billing_email: {
                        required: true,
                        email: true,
                    },
                    father_name: {
                        required: true,
                    },
                    mother_name: {
                        required: true,
                    },
                    photo_identity: {
                        required: true,
                    },
                    identity_number: {
                        required: true,
                    },
                    identity_scan: {
                        required: true,
                    },
                    trade_license: {
                        required: true,
                    },
                    auth_person_photo: {
                        required: true,
                    },
                    provider_name: {
                        required: true,
                    },
                },
                messages: {
                    client_type: {
                        required: "Please enter client type",
                    },
                    company_name: {
                        required: "Please enter company name",
                    },
                    user_name: {
                        required: "Please enter user name",
                    },
                    day: {
                        required: "Please enter days",
                    },
                    month: {
                        required: "Please enter months",
                    },
                    year: {
                        required: "Please enter years",
                    },
                    gender: {
                        required: "Please enter gender",
                    },
                    occupation: {
                        required: "Please enter occupation",
                    },
                    present_add: {
                        required: "Please enter present address",
                    },
                    permanent_add: {
                        required: "Please enter permanent address",
                    },
                    contact_mobile: {
                        required: "Please enter contact mobile",
                    },
                    contact_email: {
                        required: "Please enter contact email",
                    },
                    technical_mobile: {
                        required: "Please enter technical mobile",
                    },
                    technical_email: {
                        required: "Please enter technical email",
                    },
                    billing_mobile: {
                        required: "Please enter billing mobile",
                    },
                    billing_email: {
                        required: "Please enter billing email",
                    },
                    father_name: {
                        required: "Please enter father name",
                    },
                    mother_name: {
                        required: "Please enter mother name",
                    },
                    photo_identity: {
                        required: "Please enter photo indentity",
                    },
                    identity_number: {
                        required: "Please enter identity number",
                    },
                    identity_scan: {
                        required: "Please enter identity scan",
                    },
                    trade_license: {
                        required: "Please enter trade license",
                    },
                    auth_person_photo: {
                        required: "Please enter auth person photo",
                    },
                    provider_name: {
                        required: "Please enter provider name",
                    },
                },
            })
        }
    </script>
    <script>
        function myFunction() {
            $("#company_name").hide();
            $("#technical_phone").hide();
            $("#technical_mobile").hide();
            $("#technical_email").hide();
            $("#billing_phone").hide();
            $("#billing_mobile").hide();
            $("#billing_email").hide();
            $("#trade_license").hide();
            $("#approve_no").hide();
            $("#status").hide();
        }

        $('#client_type').on('change', function() {
            var value = $(this).val();
            if (value == "Individual") {
                $("#company_name").hide();
                $("#technical_phone").hide();
                $("#technical_mobile").hide();
                $("#technical_email").hide();
                $("#billing_phone").hide();
                $("#billing_mobile").hide();
                $("#billing_email").hide();
                $("#trade_license").hide();

            } else if (value == "Corporate") {
                $("#company_name").show();
                $("#technical_phone").show();
                $("#technical_mobile").show();
                $("#technical_email").show();
                $("#billing_phone").show();
                $("#billing_mobile").show();
                $("#billing_email").show();
                $("#trade_license").show();

            }

        });

        // $("#user_name").blur(function() {
        //     var user = $(this).val();
        //     console.log(user);
        //     $.ajax({
        //         url: "<?php // echo base_url('ClientControl/check_user'); 
                            ?>/" + user,
        //         type: "GET",
        //         dataType: "JSON",
        //         success: function(res) {
        //             console.log(res);

        //             var html = '';
        //             html += 'Duplicate user name. Please use another user name';

        //             if (res == null) {

        //                 $('#duplicateUser').html('');
        //             } else {
        //                 $('#duplicateUser').html(html);
        //             }


        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             console.log(jqXHR);
        //             // alert('Error get data from ajax');
        //         }
        //     });
        // });
    </script>
</body>



<?= $this->endSection() ?>