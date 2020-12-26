$(document).ready(function () {

    //registration form validation
    $("#regisBtn").on('click',function(e){
        e.preventDefault();
        const name = $("input[name=name]").val();
        const email = $("input[name=email]").val();
        const password = $("input[name=password]").val();
        const mobile = $("input[name=mobile]").val();
        const gender = $("input[name=gender]:checked").val();
        const hobbies =  [];
        const country = $("select[name=country] option:selected").val();
        const address = $("textarea[name=address]").val();
        const profile = $("input[name=profile]").val();
        var nameReg = /^[A-Z a-z]+$/;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailValid = false;
        var passValid = false;
        var usernameValid = false;
        var mobileValid = false;
        var genderValid = false;
        var hobbiesValid = false;
        var countryValid = false;
        var addressValid = false;
        var profileValid = false;

        $("input[name='hobbies[]']:checked").each(function(){
            hobbies.push($(this).val());
        });

        //validate username
        if(name<1){
            $(".usernameValid").text("Name is required");
        }else{
            if(!nameReg.test(name)){
                $(".usernameValid").text("Only alphabets are allowed");
            }else{
                if(name.length<3 || name.length>25){
                    $(".usernameValid").text("Name must be at least 3 to 25 characters");
                }else{                    
                    $(".usernameValid").text("");
                    usernameValid = true;
                }                
            }
        }

        //validate email
        if(email.length<1){
                $(".emailValid").text("Email is required");
        }else{
            if(!emailReg.test(email)){
                $(".emailValid").text("Invalid Email Address");
            }else{
                $(".emailValid").text("");
                emailValid = true;
            }
        }

        //validate password
        if(password.length<1){
            $(".passValid").text("Password is required");
        }else{
            if(password.length<7){
                $(".passValid").text("Password must be at least 7 characters long");
            }else{
                $(".passValid").text("");
                passValid = true;

            }
        }

        //validate mobile number
        if(mobile.length<1){
            $(".mobileValid").text("Mobile number is required");
        }else{
            if(isNaN(mobile)){
                $(".mobileValid").text("Mobile must be a number ");
            }else{
                $(".mobileValid").text("");

                if(mobile.length<10 || mobile.length>13){
                    $(".mobileValid").text("Mobile length must be at least 10 to 13 digits long");
                }else{
                    $(".mobileValid").text("");
                    mobileValid = true;
                }                
            }

        }    

        //validate gender
        if(gender.length<1){
            $(".genderValid").text("Gender is required");
        }else{
            $(".genderValid").text("");
            genderValid = true;

        }

        //validate hobbies
        if(hobbies == ""){
            $(".hobbiesValid").text("Hobbies is required");
        }else{
            $(".hobbiesValid").text(""); 
            hobbiesValid = true;           
        }
        
        //validate country
        if(country == ""){
            $(".countryValid").text("Country is required");
        }else{
            $(".countryValid").text("");
            countryValid = true;
        }

        if(address == ""){
            $(".addressValid").text("Address is required");
        }else{            
            $(".addressValid").text("");
            addressValid = true;
        }

        //Validate profile
        if(profile.length<1){
            $(".profileValid").text("Profile is required");
        }else{
            $(".profileValid").text("");
            profileValid = true;
        }
        // console.log(`${usernameValid}  ${emailValid}  ${passValid}  ${mobileValid}  ${profileValid}`);
        if(usernameValid == true && emailValid==true && passValid == true && mobileValid == true && genderValid == true && hobbiesValid == true && countryValid == true && addressValid == true && profileValid == true){
            $("#resForm").submit();
            $("#resForm").trigger("reset");

        }
        
    });
       
    //login form validation
    $("#loginBtn").on('click', function(e){
        e.preventDefault();
        const email = $("input[name=email]").val();
        const password = $("input[name=password]").val();        
        var emailValid = false;
        var passValid = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        //validate email
        if(email.length<1){
                $(".emailValid").text("Email is required");
        }else{
            if(!emailReg.test(email)){
                $(".emailValid").text("Invalid Email Address");
            }else{
                $(".emailValid").text("");
                emailValid = true;
            }
        }

        //validate password
        if(password.length<1){
            $(".passValid").text("Password is required");
        }else{
            $(".passValid").text("");
            passValid = true;
        }

        if(emailValid==true && passValid == true){
            $("#loginForm").submit();
        }

    });
    
    //edit profile form validation
    $("#updateBtn").on('click',function(e){
        e.preventDefault();
        const name = $("input[name=name]").val();
        const email = $("input[name=email]").val();
        const mobile = $("input[name=mobile]").val();
        const gender = $("input[name=gender]:checked").val();
        const hobbies =  [];
        const country = $("select[name=country] option:selected").val();
        const address = $("textarea[name=address]").val();

        var nameReg = /^[A-Z a-z]+$/;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var phoneno = /^\d{10}$/; 
        var emailValid = false;
        var usernameValid = false;
        var mobileValid = false;
        var genderValid = false;
        var hobbiesValid = false;
        var countryValid = false;
        var addressValid = false;  

      

        $("input[name='hobbies[]']:checked").each(function(){
            hobbies.push($(this).val());
        });
        
       //validate name
        if(name<1){
            $(".usernameValid").text("Name is required");
        }else{
            if(!nameReg.test(name)){
                $(".usernameValid").text("Only alphabets are allowed");
            }else{
                if(name.length<3 || name.length>25){
                    $(".usernameValid").text("Name must be at least 3 to 25 characters");
                }else{                    
                    $(".usernameValid").text("");
                    usernameValid = true;
                }                
            }
        }

        //validate email
        if(email.length<1){
                $(".emailValid").text("Email is required");
        }else{
            if(!emailReg.test(email)){
                $(".emailValid").text("Invalid Email Address");
            }else{
                $(".emailValid").text("");
                emailValid = true;
            }
        }

        //validate mobile number
        if(mobile.length<1){
            $(".mobileValid").text("Mobile number is required");
        }else{
            if(isNaN(mobile)){
                $(".mobileValid").text("Mobile must be a number ");
            }else{
                $(".mobileValid").text("");
                if(mobile.length<10 || mobile.length>13){
                    $(".mobileValid").text("Mobile length must be at least 10 to 13 characters long");
                }else{
                    $(".mobileValid").text("");
                    mobileValid = true;
                }                
            }

        }    

        //validate gender
        if(gender.length<1){
            $(".genderValid").text("Gender is required");
        }else{
            $(".genderValid").text("");
            genderValid = true;

        }

        //validate hobbies
        if(hobbies == ""){
            $(".hobbiesValid").text("Hobbies is required");
        }else{
            $(".hobbiesValid").text(""); 
            hobbiesValid = true;           
        }
        
        //validate country
        if(country == ""){
            $(".countryValid").text("Country is required");
        }else{
            $(".countryValid").text("");
            countryValid = true;
        }

        if(address == ""){
            $(".addressValid").text("Address is required");
        }else{            
            $(".addressValid").text("");
            addressValid = true;
        }        
        
        if(usernameValid == true && emailValid==true && mobileValid == true && genderValid == true && hobbiesValid == true && countryValid == true && addressValid == true){
            $("#editForm").submit();
        }
        
    });

    //password change form validation
    $("#updatePassBtn").on('click', function(e){
        e.preventDefault();
        const newpass = $("input[name=new_password]").val();
        const conpass = $("input[name=confirm_password]").val();        
        var newpassValid = false;
        var conpassValid = false;

        //validate new password
        if(newpass.length<1){
                $(".passValid").text("Password is required");
        }else{
            if(newpass.length<7){
                $(".passValid").text("Password must be at least 7 characters long");
            }else{
                $(".passValid").text("");
                newpassValid = true;
            }
        }

        //validate confirm password

        if(conpass.length<1){
            $(".cpassValid").text("Confirm Password is required");
        }else{
            if(newpass!=conpass){
              $(".cpassValid").text("Password does not match");
            }else{
                $(".cpassValid").text("");
                conpassValid = true;
            }

        }
        //form submit
        if(newpassValid==true && conpassValid == true){
            $("#changePasswordForm").submit();
        }

    });

    //forget password form validation
    $("#changePasswordBtn").on('click', function(e){
        e.preventDefault();
        const email = $("input[name=email]").val();
        const password = $("input[name=password]").val();        
        var emailValid = false;
        var passValid = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        //validate email
        if(email.length<1){
                $(".emailValid").text("Email is required");
        }else{
            if(!emailReg.test(email)){
                $(".emailValid").text("Invalid Email Address");
            }else{
                $(".emailValid").text("");
                emailValid = true;
            }
        }

        //validate password
        if(password.length<1){
            $(".passValid").text("Password is required");
        }else{
            $(".passValid").text("");
            passValid = true;
        }

        if(emailValid==true && passValid == true){
            $("#forgetPassForm").submit();
        }

    });

    //reset password form validation
    $("#resetPassBtn").on('click', function(e){
        e.preventDefault();
        const email = $("input[name=email]").val();
        var emailValid = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        //validate email
        if(email.length<1){
                $(".emailValid").text("Email is required");
        }else{
            if(!emailReg.test(email)){
                $(".emailValid").text("Invalid Email Address");
            }else{
                $(".emailValid").text("");
                emailValid = true;
            }
        }    
        if(emailValid==true){
            $("#resetPassForm").submit();
        }

    });

    //confirm box for delete record
    
   
});
