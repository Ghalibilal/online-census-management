 <script type="text/javascript">
 $(function(){
         $('#error_name').hide();
         $('#error_fname').hide();
         var error_name=false;
         var error_fname=false;
        $('#name').focusout(function(){

          check_name();
        });
        $('#fname').focusout(function(){

        check_fname();
        });
        function check_name(){

        var $regexname=/^([a-zA-Z\s]{3,40})$/;
  var name_length=$('#name').val().length;
  if (name_length<3 || !$('#name').val().match($regexname)) {
    $('#error_name').html("<font color='red'>name must be greater than 3 character and not digit</font>");
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
  if (fname_length<3 || !$('#fname').val().match($regexname1)) {
    $('#error_fname').html("<font color='red'>name must be greater than 3 character and not digit</font>");
        $('#error_fname').show();
        error_fname=true;   
  }
  else
  {
    ('#error_fname').hide();
    error_fname=false;

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