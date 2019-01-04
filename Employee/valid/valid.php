
<script type="text/javascript">
$(function(){
  $('#cnic').mask("99999-9999999-9");
         $('#error_name').hide();
         $('#error_fname').hide();
         $('#error_cnic').hide();
         $('#error_date').hide();
        
        
         var error_name=false;
         var error_fname=false;
         var error_cnic=false;
         var error_date=false;
         
        $('#name').focusout(function(){

          check_name();
        });
        $('#fname').focusout(function(){

        check_fname();
        });
         $('#cnic').focusout(function(){

        check_cnic();
        });
          $('#date').focusout(function(){

        check_date();
        });
         
        
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
      if(cnic_length!=0){
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
  else
  {
    ('#error_cnic').hide();
    error_cnic=false; 
  }
  }
   function check_date(){
          
  var date_value=$('#date').val();
  var da=$('#da').val();


    if(date_value==''){
       $('#error_date').html("<font color='red'>*Birthday must be not empty</font>");
        $('#error_date').show();
        error_date=true;   
    }
    else if(date_value>da)
    {
       $('#error_date').html("<font color='red'>*Birthday must be equal or less than current date</font>");
        $('#error_date').show();
    }
    else
    {
     ('#error_date').hide();
    error_date=false; 
    }
 }
 


  $('#form1').submit(function(){
    
      error_name=false;
      error_fname=false;
      error_cnic=false;
      error_date=false;
    
      check_name();
      check_fname();
      check_cnic();
      check_date();
      
      if(error_name==false && error_fname==false && error_cnic==false && error_date==false){
        return true;
      }
      else
      {
        return false;
      }
  });
    });

</script>