

<!-- previous jopb experience details -->

<!-- Modal -->
<div class="modal fade" id="jobExperience" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="staticBackdropLabel">Job Experience</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 


          <!-- modal body goes here -->
            <form action="../partials/user_resume/handle_experience/_handle_previousJobs.php?edit=true" method="post">


 

                  <div class="mb-3">
                    <label for="numberOfJobs" class="form-label">Number of previously attained jobs</label>
                    <input type="number" class="form-control" id="numberOfJobs" name ="numberOfJobs">
                  </div>


                  <div class="mb-3">
                  
                  <p>List down the <strong> most recent </strong> previous jobs</p>


                  <div class="row">
                  

                        <div class="col-md-6">

                        <label class="form-label text-center">Title</label>
                        <input type="text" name="title1" class="form-control mb-2" id="exampleInputPassword1">
                        
                        </div>

                        <div class="col-md-6">
                        
                        
                        <label class="form-label text-center">Company</label>
                        <input type="text" name= "companyName1" class="form-control mb-2" id="exampleInputPassword1">
                        
                        </div>
                  
                  
                  </div>

                  <div class="row">
                  

                  <div class="col-md-6">

                  <label class="form-label text-center">Title</label>
                  <input type="text" name="title2" class="form-control mb-2" id="exampleInputPassword1">
                  
                  </div>

                  <div class="col-md-6">
                  
                  
                  <label class="form-label text-center">Company</label>
                  <input type="text" name= "companyName2" class="form-control mb-2" id="exampleInputPassword1">
                  
                  </div>
            
            
            </div>


            <div class="row">
                  

                  <div class="col-md-6">

                  <label class="form-label text-center">Title</label>
                  <input type="text" name="title3" class="form-control mb-2" id="exampleInputPassword1">
                  
                  </div>

                  <div class="col-md-6">
                  
                  
                  <label class="form-label text-center">Company</label>
                  <input type="text" name= "companyName3" class="form-control mb-2" id="exampleInputPassword1">
                  
                  </div>
            
            
            </div>



                </div>


                  
                 

                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <!-- <button class="btn btn-primary me-md-2" type="button">Button</button> -->
              
              <button type="submit" id="proceedButton" class="btn btn-primary">Save</button>
            </div>

            </form>




      </div>

    </div>
  </div>
</div>