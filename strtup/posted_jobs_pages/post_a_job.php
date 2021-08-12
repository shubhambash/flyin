<!--  asks user to post a job  -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">




    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Roboto:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <style>
      *{
font-family: 'Rubik', sans-serif;}


  body{


  
background-image : linear-gradient(rgba(255,255,255,0.97), rgba(255,255,255,0.97)), url(../images/doodle.png);
background-position: center;
background-size: 900px 900px;

}
  
  


    </style>

    <title>Post</title>


  </head>
  <body>
 


<!-- navbar  -->

 <?php 
 include '../partials/_navbar2.php';
 include '../partials/_db-connection.php';


 


 ?>








<!-- post a job -->

<h3 class="text-center mt-5"><bold>Post an internship or a job and hire the best candidates</b></h3>

<div class="container">
  <div class="max-width-container">

      <div class="row mt-5">
      <div class="col-lg-6 offset-lg-3">
      
      <!-- form goes here -->
                    <form action="../partials/employer_details/handle_employer/_handle_job_details.php" method="post">



<!-- 
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="internship" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Internship
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="parttime" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                        Part-time Job
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fulltime" id="flexRadioDefault3" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                        Full-time Job
                        </label>
                    </div> -->















                    <div>
                    <label class="btn-group mb-2">Type of work</label>

                    <div class="form-check form-check-inline" required>
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="internship" onlclick="showDuration()">
                      <label class="form-check-label" for="inlineRadio1">Internship</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="parttime" onlclick="hideDuration();">
                      <label class="form-check-label" for="inlineRadio2">Part-time Job</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="fulltime" onlclick="hideDuration();">
                      <label class="form-check-label" for="inlineRadio2">Full-time job</label>
                    </div>
          
                    </div>

                  


                      <div class="mb-3">
                        <label for="jobTitle" class="form-label"><strong>Title</strong></label>
                        <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="e.g. Full stack developer" required>
                      </div>

                   

                      <div class="mb-3">
                        <label for="jobCategory" class="form-label"><strong>Category</strong></label>
                        <input type="text" class="form-control" id="jobCategory" name = "jobCategory" placeholder="e.g. marketing, technology, design, art, sales, content writing" required>
                        <div id="emailHelp" class="form-text">please be mindful while choosing the category</div>

                      </div>


                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="workFromHome" id="workFromHome" value=1>
                        <label class="form-check-label" for="workFromHome"><strong>Work from home</strong></label>
                      </div>


                      <div class="mb-3">
                        <label for="location" class="form-label"><strong>Location</strong></label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="e.g. Bangalore, Karnataka, India">
                      </div>


                      <div class="mb-3">
                        <label for="startDate" class="form-label"><strong>Start date</strong></label>
                        <input type="date" class="form-control" name="startDate" id="startDate" required>
                      </div>

                      <div class="mb-3">
                        <label for="duration" class="form-label"><strong>Duration </strong>(in days)</label>
                        <input type="number" class="form-control" style="display:block;" name="duration" id="duration1" required>
                      </div>


                        <div class="form-check form-switch mb-3">
                          <input class="form-check-input" type="checkbox" name="paid" id="flexSwitchCheckChecked" value=1 checked>
                          <label class="form-check-label" for="flexSwitchCheckChecked"><strong>Paid Internship/Job</strong></label>
                        </div>

                      <div class="mb-3">
                        <label for="duration" class="form-label"><strong>Salary/Stipend per Month</strong></label>
                            <div class="form-check mb-3">
                                  <input class="form-check-input" name="negotiable" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                   Negotiable?
                                  </label>
                            </div>

                        <input type="number" class="form-control" id="" name="stipend" placeholder="estimated Salary/Stipend">
                      </div>


                      <div class="mb-3">
                        <label for="duration" class="form-label"><strong>Skills required</strong></label>
                        <div id="emailHelp" class="form-text">filling all field is not compulsory</div>

                        <div class="row my-2">
                          <div class="col-md-6">                        <input type="text" class="form-control" name="skill1" id="skill1" placeholder="e.g. HTML">
                            </div>
                          <div class="col-md-6">                        <input type="text" class="form-control" name="skill2" id="skill2" placeholder="e.g. marketing">
                            </div>
                        </div>




                        <div class="row my-2">
                          <div class="col-md-6">                        <input type="text" class="form-control" name="skill3" id="skill3"  placeholder="e.g. excel">
                            </div>
                          <div class="col-md-6">                        <input type="text" class="form-control" name="skill4" id="skill4"  placeholder="e.g. JavaScript">
                            </div>
                        </div>




                        <div class="row my-2">
                          <div class="col-md-6">                        <input type="text" class="form-control" name="skill5" id="skill5"  placeholder="e.g. inter-personal">
                            </div>
                          <div class="col-md-6">                        <input type="text" class="form-control" name="skill6" id="skill6"  placeholder="e.g. typing">
                            </div>
                        </div>


                        <div class="row my-2">
                          <div class="col-md-6">                        <input type="text" class="form-control" name="skill7" id="skill7"  placeholder="e.g. inter-personal">
                            </div>
                          <div class="col-md-6">                        <input type="text" class="form-control" name="skill8" id="skill8"  placeholder="e.g. typing">
                            </div>
                        </div>


                        <div class="row my-2">
                          <div class="col-md-6">                        <input type="text" class="form-control" name="skill9" id="skill9"  placeholder="e.g. inter-personal">
                            </div>
                          <div class="col-md-6">                        <input type="text" class="form-control" name="skill10" id="skill10"  placeholder="e.g. typing">
                            </div>
                        </div>



                 
                      </div>



                      <div class="mb-3">
                      <label for="duration" class="form-label"><strong>Eligibility (optional)</strong></label>

                        
                        <input type="text" class="form-control mb-2" name="eligibility1" id="eligibility1" placeholder="e.g. Must have completed plus 2 or equivalent">
                        <input type="text" class="form-control mb-2" name="eligibility2" id="eligibility1" placeholder="e.g. Must have past experience in a particular field">

                        <input type="text" class="form-control mb-2" name="eligibility3" id="eligibility1" placeholder="e.g. Should have good communication skills">
                        <input type="text" class="form-control mb-2" name="eligibility4" id="eligibility1" placeholder="e.g. Must have a particular course certification">
                        <input type="text" class="form-control mb-2" name="eligibility5" id="eligibility1" placeholder="e.g. Must be enrolled in second year of graduation program">

                        
                      </div>


                      
                      <div class="mb-3">
                        <label for="duration" class="form-label"><strong>No. of Openings</strong></label>
                        <input type="number" class="form-control" name="openings" id="openings" placeholder="e.g. Full stack developer" required>
                      </div>

                      
                      <div class="form-group">
                          <label for="jobDescription"><strong>Describe the work in brief</strong></label>
                          <textarea class="form-control" rows="5" name="jobDescription" id="jobDescription" required></textarea>
                      </div>


                  
                      <button type="submit" class="btn mt-5 mb-5" style="background-color: #44859e; color: white;">Post</button>

              </form>
                    
      </div>



      <div class="col-md-4"></div>
      </div>

  </div>
</div>



<!-- scripts -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script>



  
  </body>
</html>



























