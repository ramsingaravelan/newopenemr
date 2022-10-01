<!---this tab panel is used in bootstrap4.5--->
<?php
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-select2--!>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<!-select2--!>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<!-- <script src="https://gitcdn.xyz/repo/FuriosoJack/TableHTMLExport/v1.0.0/src/tableHTMLExport.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
  <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <div class="container">
      <!-- Tab navigation -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
</ul>

<!-- Tab content -->
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <h1>Tab Home</h1>
    <div class="form-group ">
         <label>Patient Name</label>
         <input type="text" name="patient_name" id="patient_name" class="form-control" />

        </div>
        <div class="form-group">
         <label>Age</label>
         <input type="text" name="age" id="age" class="form-control"  />

        </div>
        <div class="form-group">
         <label>Address</label>
         <textarea class="form-control" id="address" name="address" rows="3"></textarea>

        </div>
        <div class="form-group">
         <label>Phone number</label>
         <input type="text" name="phone" id="phone" class="form-control" />

        </div>
        <div class="form-group">
         <label>Gender</label>
         <label class="radio-inline">
          <input type="radio" name="gender" value="male" checked> Male
         </label>
         <label class="radio-inline">
          <input type="radio" name="gender" value="female"> Female
         </label>
        </div>

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <h1>Tab Profile</h1>
    <div class="form-group">
         <label>Qualification</label>
         <input type="text" name="qualification" id="qualification" class="form-control"  />

        </div>
        <div class="form-group">
         <label>University</label>
         <input type="text" name="university" id="university" class="form-control"  />

        </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <h1>Tab Contact</h1>
    <div class="form-group">
         <label>Blood group</label>
         <input type="text" name="blood_group" id="blood_group" class="form-control"  />
         </div>
        <div class="form-group">
         <label>Height</label>
         <input type="text" name="height" id="height" class="form-control"  />

        </div>
        <div class="form-group">
         <label>Weight</label>
         <input type="text" name="weight" id="weight" class="form-control" />

        </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <h1>Tab Contact</h1>
    <div class="form-group">
         <label>Father Name</label>
         <input type="text" name="father_name" id="father_name" class="form-control"  />

        </div>
        <div class="form-group">
         <label>Mother Name</label>
         <input type="text" name="mother_name" id="mother_name" class="form-control" />

        </div>
  </div>
</div>

<!-- Tab carousel -->
<button class="prevtab btn btn-success">Prev</button>
<button class="nexttab btn btn-success">Next</button>
  </div>
<script>
    function bootstrapTabControl(){
  var i, items = $('.nav-link'), pane = $('.tab-pane');
  // next
  $('.nexttab').on('click', function(){
      for(i = 0; i < items.length; i++){
          if($(items[i]).hasClass('active') == true){
              break;
          }
      }
      if(i < items.length - 1){
          // for tab
          $(items[i]).removeClass('active');
          $(items[i+1]).addClass('active');
          // for pane
          $(pane[i]).removeClass('show active');
          $(pane[i+1]).addClass('show active');
      }

  });
  // Prev
  $('.prevtab').on('click', function(){
      for(i = 0; i < items.length; i++){
          if($(items[i]).hasClass('active') == true){
              break;
          }
      }
      if(i != 0){
          // for tab
          $(items[i]).removeClass('active');
          $(items[i-1]).addClass('active');
          // for pane
          $(pane[i]).removeClass('show active');
          $(pane[i-1]).addClass('show active');
      }
  });
}
bootstrapTabControl();
</script>
