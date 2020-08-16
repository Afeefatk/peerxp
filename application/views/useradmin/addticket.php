<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<?php 
//session_start();
 $message = $this->session->userdata('message');
  $message1 = $this->session->userdata('message1');
 $id = $this->session->userdata('userid');
 $query = $this->db->get_where('tbl_login', array('UserId' => $id));
 if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $username = $row->Username;
                 $email = $row->Email;
                   $name = $row->Name;
                 $user = $row->UserId;
                  $this->session->set_userdata('userid', $user);
            }
          }
           

if(isset($id) && $id!="")
 {
?>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PeerXp Support - UserAdmin Panel</title>
    <meta name="description" content="Admin Panel">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<script src="https://cdn.ckeditor.com/4.10.0/standard-all/ckeditor.js"></script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->

   <?php include_once "include/sidebar.php"; ?>


    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    

                        <div class="dropdown for-message">
                          
                          
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                   

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                       <!-- <h1>Welcome to <?php if(isset($logo) && $logo!="") echo $name;?></h1> -->
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active"><a href="#">Submit Ticket  </a></li>
                           
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <?php
           // if(isset($_SESSION['message']) && $_SESSION['message']!="")
           if(isset($message) && $message!="")
            {
            ?>
            <div id="resultblock" class="notification success hideit" style="margin-top:100px;margin-left:220px;"><strong> <?php  echo $message; ?></strong></div>
           <?php } 
          

          else if(isset($message1) && $message1!="")
            {
            ?>
            <div id="resultblock" class="notification success hideit" style="margin-top:100px;margin-left:220px;"><strong> <?php  echo $message1; ?></strong></div>
           <?php } 
           $this->session->unset_userdata('message1');
            $this->session->unset_userdata('message');
            ?>

            <div class="animated fadeIn">


                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header" >
                        <strong>Submit Ticket</strong>
                      </div>
                      
                      <div class="card-body card-block">
 
     <form action="<?php echo base_url();?>useradmin/add_ticket" method="post" onsubmit="return checkemail();" id="reg_form"  enctype="multipart/form-data">

    <div class="form-group"><label for="nf-email" class=" form-control-label"> Department</label>
        <select name="dep" class="form-control" required>
            <option>Select Department</option>
             <option value="PWSLab DevOps Support">PWSLab DevOps Support</option>
              <option value="iSupport">iSupport</option>
               <option value="Naveena">Naveena</option>
                
        </select>
    <!-- <input type="text" id="nf-email" name="email" placeholder="Email..." class="form-control" required> -->
   
    </div>
      <div class="form-group"><label for="nf-email" class=" form-control-label"> Category</label>
        <select name="cat" class="form-control" required>
            <option>Select Category</option>
             <option value="None">-None-</option>
              <option value="NEW Project CI/CD Pipeline Setup">NEW Project CI/CD Pipeline Setup</option>
               <option value="Update CI/CD Pipeline Configuration">Update CI/CD Pipeline Configuration</option>
              <option value="DevSecOps Pipeline Setup">DevSecOps Pipeline Setup</option>
                <option value="None">CI/CD pipeline failure</option>
            <option value="CI/CD pipeline failure">CI/CD pipeline failure</option>
            <option value="Automated Deployment failure">Automated Deployment failure</option>
            <option value="Docker and Containers">Docker and Containers</option>   
              <option value="Kubernetes Deployments (like EKS/GCP)">Kubernetes Deployments (like EKS/GCP)</option>  
       <option value="Git Source control">Git Source control</option>  
      <option value="PWSLab server not responding (502/503 errors)">PWSLab server not responding (502/503 errors)</option>  
      <option value="PWSLab Runner not working (jobs not running)">PWSLab Runner not working (jobs not running)</option>  
      <option value="User management and Project access">User management and Project access</option>  
      <option value="Cloud Integration Consultation - AWS/GCP/Azure">Cloud Integration Consultation - AWS/GCP/Azure</option>  
     <option value="Others">Others</option>             
        </select>
    <!-- <input type="text" id="nf-email" name="email" placeholder="Email..." class="form-control" required> -->
   
    </div>

   <div class="form-group"><label for="nf-email" class=" form-control-label">PWSLab Project URL</label>
    <input type="text" id="nf-email" name="url" placeholder="PWSLab Project URL..." class="form-control" required>
   
    </div>
    <div class="form-group"><label for="nf-email" class=" form-control-label">Subject</label>
    <input type="text" id="nf-email" name="sub" placeholder="Subject..." class="form-control" required>
   
    </div>
      <div class="form-group"><label for="nf-email" class=" form-control-label">Description</label>
<textarea name="description" id="description" rows="9" placeholder="Description..." class="form-control" >
    </textarea>
    <script>
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;
     
        CKEDITOR.replace( 'description' );
    </script>
    </div>
 <div class="form-group"><label for="nf-email" class=" form-control-label">   
<b>Contact Details</b></label>
</div>
 <div class="form-group"><label for="nf-email" class=" form-control-label">Contact Name</label>
    <input type="text" id="" name="contact" value="<?php echo $name;?>" placeholder="Contact Name..." class="form-control" required>
   
    </div>

    <div class="form-group"><label for="nf-email" class=" form-control-label">Email</label>
    <input type="text" id="" name="email" value="<?php echo $email;?>" placeholder="Email..." onkeyup="checkemail();" class="form-control" required>
   <span id="email_status"></span>
    </div>
    <div class="ajax_response_result"></div>

<div class="form-group"><label for="nf-email" class=" form-control-label">Phone</label>
    <input type="text" id="" name="phone" placeholder="Phone..." class="form-control" required>
   
    </div>
<div class="form-group"><label for="nf-email" class=" form-control-label">   
<b>Additional Information</b></label>
</div>
     <div class="form-group"><label for="nf-email" class=" form-control-label"> Priority</label>
        <select name="priority" class="form-control" required>
            <option>None</option>
             <option value="High - Production System Down">High - Production System Down</option>
              <option value="Medium - System Impaired">Medium - System Impaired</option>
               <option value="Low - General Guidance">Low - General Guidance</option>
               
        </select>
    <!-- <input type="text" id="nf-email" name="email" placeholder="Email..." class="form-control" required> -->
   
    </div>
    <div class="form-group"><label for="nf-email" class=" form-control-label">Attach a file</label>
    <input type="file" id="myfile" name="userfile" class="form-control" >
   
    </div>

 
    
    <!--  <div class="form-group"><label for="nf-email" class=" form-control-label">Description</label>
<textarea name="description" id="description" rows="9" placeholder="Description..." class="form-control" >
    </textarea>
    <script>
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;
     
        CKEDITOR.replace( 'description' );
    </script>
    </div> -->
    <!--   <div class="form-group"><label for="nf-email" class=" form-control-label">Upload Image</label>
    <input type="file" id="file-input" name="userfile" class="form-control-file">
    </div> -->
<input type="hidden" name="row_id" value="<?php echo $id; ?>">
<!-- <button type="submit" name="save" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button> -->
                        <input type="submit" name="save" value="Submit" class="btn btn-primary btn-sm"/>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
     </form>
                      </div>
                      <div class="card-footer">
                        
                      </div>
                    </div>
                   
                   </div>
                   

                </div>
                 


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="<?php echo base_url();?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

   <script src="<?php echo base_url();?>assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/lib/data-table/datatables-init.js"></script>



 <!-- DATE PICKR -->

    <link href="<?php echo base_url(); ?>assets/css/jquery.datepick.css" rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <!-- DATE PICKER -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.plugin.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.datepick.js"></script>



 <script type="text/javascript">
        $(document).ready(function() {
             
                $("#result,#resultblock,#resultproduct,#resultAjax").click(function() {
                    //fades the notification out    
                    $(this).fadeOut(500);
                });
                var delay = 5000;
        setTimeout(function() {
            $("#result,#resultblock,#resultAjax").hide();
        }, delay);
          $('#bootstrap-data-table-export').DataTable();
        } );

$('#date').datepick({
           dateFormat: "dd-mm-yyyy",
           changeMonth: true,
            changeYear: true,
            yearRange: "-100:+100:+0",
            //yearRange: "-100:+0"
        });
function checkemail()
{
 var email=document.getElementById( "UserEmail" ).value;
    
 if(email)
 {
  $.ajax({
  type: 'post',
  url: '<?php echo site_url('useradmin/checkdata') ?>',
  data: {
   user_email:email,
  },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="OK")   
   {
    return true;    
   }
   else
   {
    return false;   
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}
    </script>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $(document).on('click','#save',function(){
    jQuery.ajax({
    type: "POST",
    url: "<?php echo site_url('useradmin/ajax_signup') ?>",    
    data: $("#reg_form").serialize(),
    success: function(res) {
     $(".ajax_response_result").html(res);
     }
    });
  });
});
</script>


</body>
</html>
<?php } else 
{ 
$this->load->view("useradmin/login");
}
?>