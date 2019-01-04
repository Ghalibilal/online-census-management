<div class="col-sm-2"></div>
<div class="col-sm-6 rightside">
  <h4 align="center"> Insert Employees Form</h4><br>
      
    <table class="table">

       <form  action='employ_insert.php' method='post' id='form1' name='registration'>
    <tr><th colspan='2' style='color:red;'><?php echo @$_GET['error'];?></th>
    </tr>
      <tr>
        <td> <label for="name">Name:</label></td>
        <td><input type="name" id='name' class="form-control" minlength='3' placeholder="Enter Name" id='name' name="name"  pattern="[A-Za-z\s]+" required><span class='form_error' id='error_name'></td>
        <td> <label for="father_name">Father_name:</label></td>
        <td>  <input type="text" class="form-control" minlength='3' placeholder="Enter father_name" id='fname' name="father_name" id='fathername' pattern="[A-Za-z\s]*" required><span class='form_error' id='error_fname'></td>
      </tr>
    <tr><td><br></td></tr>
      <tr>
        <td> <label for="cnic">Cnic:</label></td>
        <td> <input type="text" class="form-control" id='cnic'  placeholder="Enter Cnic with e.g 15302-6769504-1" maxlength='15' name="cnic" required pattern="[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}"><span class='form_error' id='error_cnic'></td>

        <td> <label for="father_name">Area/Circle:</label></td>

        <td><input type="text" class="form-control" id='area'  placeholder="Enter Area" name="area" required><span class='form_error' id='error_area'></td>

      </tr>
      <tr><td><br></td></tr>
      <tr>
       <?php include_once('tehsil.php'); ?> 

        <?php include_once('districts.php');?>
      </tr>
      <tr><td><br></td></tr>
      <tr>
        <td><label for="province">Select Province:</label></td>
        <td><select name="province" class='form-control'>
    <option value="KPK">KPK</option>
    <option value="Sindh">Sindh</option>
    <option value="Punjab">Punjab</option>
    <option value="Balochistan">Balochistan</option>
    <option value="Gilgit Baltistan">Gilgit Baltistan</option>
    <option value='none'>None</option>
  </select></td>
  <td><label for="region">Select region:</label></td>
        <td><select name="region" class='form-control'>
    <option value="urban">Urban</option>
    <option value="rural">Rural</option>
  </td>
      </tr>
      <tr><td><br>
      </td></tr>
      <tr>
      <td><label for="email">Email:</label></td>
      <td><input type="email" class="form-control" required id='email' placeholder="Enter Email" name="email"><span class='form_error' id='error_email'></td>
      <td>
          <label for="phone">Phone:</label></td>

      <td><input type="text" class="form-control" id='phone' placeholder="Enter Phone" name="phone" required pattern='[0]{1}[3]{1}[0-4]{1}[0-9]{8}' maxlength='11'><span class='form_error' id='error_phone'>
    </div></td>

      </tr>
      <tr><td><br></td></tr>

    <tr>
      <td colspan='4' align="center"><input class='btn btn-block btn-primary' name="submit" id='submit' class='form-control bg-success text-success ' type="submit" value="Insert"></td>
    </tr>
    
    
  
     </form> 
    </table>

     
        
      
       
        </div>
      </div>
    </div>