<script type="text/javascript">
$(function(){
   $("#cnic").mask("99999-9999999-9");
   $("#phone").mask("03999999999");

         $('#error_name').hide();
         $('#error_fname').hide();
         $('#error_cnic').hide();
         $('#error_area').hide();
         $('#error_email').hide();
         $('#error_phone').hide();
        
         var error_name=false;
         var error_fname=false;
         var error_cnic=false;
         var error_area=false;
         var error_email=false;
         var error_phone=false;
        $('#name').focusout(function(){

          check_name();
        });
        $('#fname').focusout(function(){

        check_fname();
        });
         $('#cnic').focusout(function(){

        check_cnic();
        });

          $('#area').focusout(function(){

        check_area();
        });
          $('#email').focusout(function(){

        check_email();
        });
       $('#phone').focusout(function(){
        check_phone();
       })
        
        function check_name(){

        var $regexname=/^([a-zA-Z\s]{3,40})$/;
  var name_length=$('#name').val().length;
  if (name_length<3) {
    $('#error_name').html("<font color='red'>*Name must be greater than 2 character</font>");
        $('#error_name').show();
        error_name=true;   
  }
  else if(!$('#name').val().match($regexname))
  {
    $('#error_name').html("<font color='red'>*Name must be alphbet</font>");
        $('#error_name').show();
        error_name=true;   
  }
   else
  {
    ('#error_name').hide();
     error_name=false;
  }
         
        }
        function check_fname(){
           var $regexname1=/^([a-zA-Z\s]{3,40})$/;
  var fname_length=$('#fname').val().length;
  if (fname_length<3) {

    $('#error_fname').html("<font color='red'>*Father Name must be greater than 2 character</font>");
        $('#error_fname').show();
        error_fname=true;   
  }
  else
    if( !$('#fname').val().match($regexname1)){
       $('#error_fname').html("<font color='red'>*Father Name must be alphabet</font>");
        $('#error_fname').show();
        error_fname=true;   
    }
    else
  {
    ('#error_fname').hide();
    error_fname=false;

  }

  }
  function check_cnic(){
           var $regexname2=/^[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}$/;
  var cnic_length=$('#cnic').val().length;
    if(cnic_length<15){
       $('#error_cnic').html("<font color='red'>*cnic must be 15 character</font>");
        $('#error_cnic').show();
        error_cnic=true;   
    }
    else if( !$('#cnic').val().match($regexname2)){
       $('#error_cnic').html("<font color='red'>*cnic must be 15202-6769504-1 format</font>");
        $('#error_cnic').show();
        error_cnic=true;   
    }
    else
    {
      ('#error_cnic').hide();
    error_cnic=false;
    }
  }
   function check_area(){
          
  var area_value=$('#area').val();
    if(area_value==''){
       $('#error_area').html("<font color='red'>*Area must be not empty</font>");
        $('#error_area').show();
        error_area=true;   
    }
    else
    {
     ('#error_area').hide();
    error_area=false; 
    }
 }
  function check_email(){
    var $reg=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var email_val=$('#email').val();
    if(email_val=='')
    {
      $('#error_email').html("<font color='red'>*email must be not empty</font>");
        $('#error_email').show();
        error_email=true; 
    }
  else if( !$('#email').val().match($reg)){
       $('#error_email').html("<font color='red'>*valid email enter</font>");
        $('#error_email').show();
        error_email=true;   
    }
    else
    {
      ('#error_email').hide();
    error_email=false;  
    }
  }
  function check_phone(){
    var $regg=/^[0]{1}[3]{1}[0-4]{1}[0-9]{8}$/;
    var phone_val=$('phone').val();
    if(phone_val=='')
    {
      $('#error_phone').html("<font color='red'>*Phone must be not empty</font>");
        $('#error_phone').show();
        error_phone=true; 
    }
  else if( !$('#phone').val().match($regg)){
       $('#error_phone').html("<font color='red'>*valid phone no. enter</font>");
        $('#error_phone').show();
        error_phone=true;   
    }
    else
    {
      ('#error_phone').hide();
    error_phone=false;  
    }
  }


  $('#form1').submit(function(){
    
      error_name=false;
      error_fname=false;
      error_cnic=false;
      error_area=false;
      error_email=false;
      check_name();
      check_fname();
      check_cnic();
      check_area();
      check_email();
      check_phone();
      if(error_name==false && error_fname==false && error_cnic==false && error_area==false && error_email==false){
        return true;
      }
      else
      {
        return false;
      }
  });
    });

</script>