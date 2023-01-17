<!doctype html>
<html lang="en">
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/heads.php'; ?>
  <?php
$res=$me->user_profile();
  
  ?>
    <div class="container mt-5">
                   <div class='card p-4'>
<form id="form">
    <h2>Personal Information</h2>
<div class='form-group mb-2'>
<input type='text' name='firstname' id='fn' value="<?php echo $res['firstname']; ?>" class='form-control' required/>
</div>

<div class='form-group mb-2'>
<input type='text' name='lastname' id='ln' value="<?php echo $res['lastname']; ?>" class='form-control' required/>
</div>

<div class='form-group mb-2'>
<input type='tel' maxlength='15' id='pn' minlength='6' name='phone' value="<?php echo $res['phone']; ?>" class='form-control' required/>
</div>

<br>
    <h2>Account Settings</h2>
<div class='form-group mb-2'>
<input type='email' name='email' id='email' value="<?php echo $res['email']; ?>" class='form-control' required/>
</div>

<div class='form-group mb-2'>
<input type='password' name='pword1' id='pword1' minlength='6' value="<?php echo $res['pword1']; ?>" class='form-control' required/>
</div>

<div class='form-group mb-2'>
<input type='password' name='pword2' id='pword2' minlength='6' value="<?php echo $res['pword2']; ?>" class='form-control' required/>
</div>


<br>
<div class='mt-4'>
   <button type='submit' class='btn btn-rounded btn-xl selected text-lowercase'>
        Save
    </button>
</div>
</form>
   </div>


   </div>



        
       
        <?php require_once $_SERVER['DOCUMENT_ROOT'] .'/headsup/tails.php'; ?>
        <script>
            $(function(){
              $("form#form").submit(function(){
                  var formdata=[];
                  var fn=$("input#fn").val();
                  var ln=$("input#ln").val();
                  var em=$("input#email").val();
                  var ph=$("input#pn").val();
                  var pword1=$("input#pword1").val();
                  var pword2=$("input#pword2").val();
                  
                  if(pword2 !== pword1){
                     Toastify({
  text: "passwords don't match!",
  duration: 3000,
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right, #e91e63 , #e91e63)",
  stopOnFocus: true, // Prevents dismissing of toast on hover

}).showToast();
                  }else{
                    formdata.push(fn,ln,ph,em,pword1,pword2);  
                $.ajax({
                    type:"post",
                    url:'c_profile.php',
                    data:{formdata : formdata },
                    success:function(data){
                        if(data==1){
swal("Profile updated successfully!", "", "success");
                        }else{
                            Toastify({
  text: data,
  duration: 3000,
  newWindow: true,
  close: false,
  gravity: "top", // `top` or `bottom`
  position: 'right', // `left`, `center` or `right`
  backgroundColor: "linear-gradient(to right, #e91e63 , #e91e63)",
  stopOnFocus: true, // Prevents dismissing of toast on hover

}).showToast();
                        }
                    }
                });
                
                  }
                return false;  
              });
                
            })
        </script>
    </body>
    </html>
