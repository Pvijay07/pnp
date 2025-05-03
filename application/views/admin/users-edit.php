<link href="<?=base_url()?>assets/css/theme-default.css" rel="stylesheet" />
<link href="<?=base_url()?>assets/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
<link rel='stylesheet' href='https://www.tiny.cloud/css/codepen.min.css'>
<style Type="text/css">
/*toggle-swich*/
.wk-days .tgle-switch input[type=checkbox]{
	height: 0;
	width: 0;
	visibility: hidden;
}

.wk-days .tgle-switch label {
	cursor: pointer;
	/*text-indent: -9999px;*/
	width: 50px;
	height: 25px;
	background: grey;
	/*display: block;*/
	border-radius: 100px;
	margin: 0 15px 0 0;
	position: relative;

}

.wk-days .tgle-switch label:after {
	content: '';
	position: absolute;
	top: 2px;
	left: 2px;
	width: 20px;
	height: 20px;
	background: #fff;
	border-radius: 50%;
	transition: 0.3s;
}

.wk-days .tgle-switch input:checked + label {
	background: #1ca195;
}

.wk-days .tgle-switch input:checked + label:after {
	left: calc(100% - 2px);
	transform: translateX(-100%);
}

.wk-days .tgle-switch label:active:after {
	width: 20px;
}
.wk-days span{
	font-size: 18px;
	font-weight: 600;
	display: inline-block;
}
.tgle-switch{
	display: flex;
	align-items: center;
	margin-bottom: 30px;
}
.wk-days ul{
	list-style-type: none;
	padding: 0;
	display: flex;
	justify-content: space-between;
	align-items: center;
	flex-wrap: wrap;
	/*margin: 0 0 30px 0;*/
	margin: 0 -12px;
	padding: 0 5px;

}
.wk-days ul li{
	display: flex;
	align-items: center;
	flex: 0 0 calc(100% / 4 - 24px);
	max-width: 100%;
	margin: 0 12px 20px;
}
.wk-days ul li input[type=checkbox], input[type=radio] {
    width: 22px;
    height: 22px;
    margin: 0 15px 0 0;
}
.tmng-check {
    height: 22px;
}
.wk-days ul li .c-tmng{
	font-size: 18px;
	letter-spacing: 0.5px;
  font-weight: 500;
}
.wk-days {
    padding: 20px 20px 0 20px;
}
.guru_tmngs .sbmt-btn {
    padding: 20px 30px;
}
</style>
<!--start content-->
<main class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3"><?=$title?></div>
      <div class="ms-auto">
         <a href="<?=base_url("admin/users/index/".$user_type)?>" class="btn btn-primary">View <?=ucfirst($user_type).'s'?></a>
      </div>
   </div>
   <!--end breadcrumb-->
   <div class="row">
      <div class="card">
         <div class="card-body">
            <div class="border p-3 rounded">
            <?php $this->load->view("admin/includes/_messages"); ?>
               <form class="row g-3" action="<?=base_url('admin/users/edit/'.$user_type.'/'.$user->id)?>" method="post" enctype="multipart/form-data">
                  <div class="col-6">
                     <label class="form-label">Name</label>
                     <input type="text" class="form-control" name="name" data-validation="required" value="<?=$user->name?>">
                  </div>
                                    
                  <div class="col-6">
                     <label class="form-label">Email</label>
                     <input type="email" class="form-control" name="email" data-validation="email" value="<?=$user->email?>">
                  </div>
                  
                  <div class="col-6">
                     <label class="form-label">Mobile No.</label>
                     <input type="number" class="form-control" name="phone" data-validation="required" value="<?=$user->phone?>">
                  </div>

                  <div class="col-6">
                     <label class="form-label">Password</label>
                     <input type="password" class="form-control" name="pass">
                  </div>
                  
                  <div class="col-6">
                     <label class="form-label">Status</label>
                     <select name="status" class="form-select">
                        <option value="1" <?php if($user->is_active == 1) echo 'selected'; ?>>Active</option>
                        <option value="0" <?php if($user->is_active == 0) echo 'selected'; ?>>Inactive</option>
                     </select>
                  </div>

                  <div class="col-6">
                     <label class="form-label">Upload Image</label>
                     <input name="image" class="form-control" type="file" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break=""
       data-validation-max-size="5M" />
       <input type="hidden" name="old_image" value="<?=$user->image?>">
                  </div>

                  <?php if($user_type == "teacher"){ ?>

                  <div class="col-6">
                     <label class="form-label">Skype ID</label>
                     <input type="text" class="form-control" name="skype" data-validation="required" value="<?=$guru_profile->skype_id?>">
                  </div>

                  <div class="col-6">
                     <label class="form-label">Qualification</label>
                     <input type="text" class="form-control" name="qualification" data-validation="required" value="<?=$guru_profile->qualification?>">
                  </div>
                  
                  <div class="col-6">
                     <label class="form-label">Skills</label>
                     <input type="text" name="skills" class="form-control" data-role="tagsinput" value="<?=$guru_profile->skills?>">
                  </div>

                  <div class="col-6">
                     <label class="form-label">Speaking Languages</label>
                     <input type="text" name="languages" class="form-control" data-role="tagsinput" value="<?=$guru_profile->languages?>">
                  </div>

                  <div class="col-6">
                     <label class="form-label">Admin Approval</label>
                     <select name="approve" class="form-select">
                        <option value="1" <?php if($user->admin_approve == 1) echo 'selected'; ?>>Yes</option>
                        <option value="0" <?php if($user->admin_approve == 0) echo 'selected'; ?>>No</option>
                     </select>
                  </div>

                  <div class="col-12">
                     <label class="form-label">About Me</label>
                     <textarea name="about" class="form-control" rows="8"><?=$guru_profile->about?></textarea>
                  </div>

                     <h5>Courses</h5><hr>
                     <?php 
                     foreach($categories as $category) { 
                     $courses = $this->crud_model->get_by_arry('courses', array("category" => $category->id,'status'=>1));  
                     ?>
                        <p><strong><?=$category->name?> :</strong></p>
                        
                        <?php 
                        
                         if(count($courses) != 0){ 
                           foreach($courses as $course) { 
                              $course_check = $this->crud_model->check_availability("guru_courses", array("guru_id"=>$user->id,"course"=>$course->id));    
                              if($course_check != 0){
                                 $course_info = $this->crud_model->get_by_arry2("guru_courses", array("guru_id"=>$user->id,"course"=>$course->id));   
                        ?>
                        
                           <div class="col-3">
                                 <div class="form-check">
                                    <input class="form-check-input course_check" type="checkbox" name="courses[]" id="flexCheckDefault" value="<?=$course->id?>" checked>
                                    <label class="form-check-label" for="flexCheckDefault"><?=$course->name?></label>
                                    <input type="text" class="form-control price_per_lesson<?=$course->id?>" name="price[]" placeholder="Price per Lesson" value="<?=$course_info->price?>" data-validation="required" data-validation="number" data-validation-allowing="float">
                                 </div>
                           </div>
                           <?php } else { ?>
                              <div class="col-3">
                                 <div class="form-check">
                                    <input class="form-check-input course_check" type="checkbox" name="courses[]" id="flexCheckDefault" value="<?=$course->id?>">
                                    <label class="form-check-label" for="flexCheckDefault"><?=$course->name?></label>
                                    <input type="text" class="form-control price_per_lesson<?=$course->id?>" name="price[]" placeholder="Price per Lesson" style="display:none;"  data-validation="required" data-validation="number" data-validation-allowing="float">
                                 </div>
                           </div>

                              <?php } ?>
                           <?php } } else echo '<p class="text-danger">No Courses found in this Category.</p>'; ?>
                     <?php  } ?>           

                 
                  <h5>Timing Availability</h5><hr>
                  <?php
                $days_arry = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");               
                $i=1;
                foreach($days_arry as $day){
                  $field = !empty($guru_timings["day_".$i]) ? $guru_timings["day_".$i] : "";
                ?>
                  <div class="wk-days">
                    <div class="tgle-switch">
                    <input type="checkbox" class="tswitch" id="switchone<?=$day?>" data-id="<?=$i?>" name="day_<?=$i?>" value="1" <?php if(!empty($field)) echo "checked"; ?> /><label for="switchone<?=$day?>"></label>
                        <span><?=strtoupper($day)?></span>
                    </div>
                    <ul class="tmng_h<?=$i?>" <?php if(empty($field)) echo 'style="display:none;"'; ?>>
                    <?php 
                        $j=1;
                        foreach(TIMESLOTS as $slot){
                          $field_array = explode(",",$field)
                        ?>
                        <li>
                        <div class="tmng-check"><input type="checkbox" value="<?=$slot?>" name="slots_<?=$i?>[]" <?php if(in_array($slot,$field_array)) echo "checked"; ?>></div>
                            <div class="c-tmng"><?=$slot?></div>
                        </li>
                        <?php $j++; } ?>                        
                    </ul>
                </div>
                <?php $i++;  } ?>
                  

                        <?php } else { ?>
                           <div class="col-6">
                              <label class="form-label">Skype ID</label>
                              <input type="text" class="form-control" name="skype" data-validation="required" value="<?=$student_profile->skype?>">
                           </div>
                           <div class="col-6">
                              <label class="form-label">Country</label>
                              <input type="text" class="form-control" name="country" data-validation="required" value="<?=$student_profile->country?>">
                           </div>
                           <div class="col-6">
                              <label class="form-label">Category</label>
                              <select name="category" class="form-select">
                                 <option value="">Select Category</option>
                                 <?php foreach($categories as $category){ ?>
                                    <option value="<?=$category->id?>" <?php if($student_profile->category == $category->id) echo 'selected'; ?>><?=$category->name?></option>
                                    <?php } ?>
                              </select>
                           </div>
                  <?php } ?>

                  <div class="col-sm-12">
                     <input name="submit" type="submit" class="btn btn-primary px-5" value="Submit">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!--end row-->
</main>
<!--end page main-->

<script src="<?=base_url()?>assets/js/jquery.form-validator.js"></script>
<script src="<?=base_url()?>assets/plugins/input-tags/js/tagsinput.js"></script>

<script>
    $.validate({
        modules : 'security,file'
    });



    $('.course_check').click(function(){
      var val = $(this).attr("value");
         if (this.checked) {
            $('.price_per_lesson'+ val).show();
            
        }
        else {
            $('.price_per_lesson'+ val).hide();
            $('.price_per_lesson'+ val).attr("disabled", "disabled");
        }   
    });


    $('.tswitch').change(function() {
      var id = $(this).attr("data-id");
     
      if (this.checked) {
            $('.tmng_h' + id).show();
      } else {
            $('.tmng_h' + id).hide();
      }
   });   

    </script>