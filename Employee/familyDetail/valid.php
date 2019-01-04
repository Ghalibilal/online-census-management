 <script type="text/javascript">
 $(function(){
         $('#error_name').hide();
         $('#error_fname').hide();
         $('#error_date').hide();
         var error_name=false;
         var error_fname=false;
         var error_date=false;
        $('#name').focusout(function(){

          check_name();
        });
        $('#fname').focusout(function(){

        check_fname();
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
  function check_date(){
 var date=$('#date').val();
 var da=$('#da').val();
if(date==''){

  $('#error_date').html("<font color='red'>*Add Birthday</font>");
        $('#error_date').show();
        error_date=true;  
}
else if(date>da){
  $('#error_date').html("<font color='red'>*Birthday must be equal or less than current date</font>");
        $('#error_date').show();
        error_date=true;  
}
else
{
  ('#error_date').hide();
    error_date=false;
 
}
  }
  $('#form').submit(function(){
      error_name=false;
      error_fname=false;
      check_name();
      check_fname();
      if(error_name==false && error_fname==false){
        return true;
      }
      else
      {
        return false;
      }
  });
    });
 </script>