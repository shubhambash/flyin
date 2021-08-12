

<!-- graduation details -->

<!-- Modal -->
<div class="modal fade" id="diploma" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="staticBackdropLabel">Diploma</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">



          <!-- modal body goes here -->
            <form action="../partials/user_resume/handle_education/_handle_diploma.php?edit=true" method="post">


                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="diplomaCompleted" name="diplomaCompleted" >
                    <label class="form-check-label" for="diplomaCompleted">Completed diploma</label>
                  </div>

                  <div class="mb-3">
                    <label for="InstituteName" class="form-label">Educational Instutute</label>
                    <input type="text" class="form-control" id="InstituteName" name ="InstituteName" required>
                  </div>
                  <div class="mb-3">

                  <div class="row mb-3">
                  

                      <div class="col-md-6">
                      
                          <label for="exampleInputPassword1" class="form-label">Start Year</label>
                          <input type="number" name="startYear" class="form-control" id="exampleInputPassword1" min="1950" max="2030" value="2019" required>
                      
                      </div>
                      <div class="col-md-6">
                          <label for="exampleInputPassword1" class="form-label">End Year</label>
                          <input type="number" class="form-control" name="endYear"  id="exampleInputPassword1" min="1950" max="2030" value="2023" required>
                      
                      </div>
                  
                  
                  </div>



                  <div class="row mb-3">
                  

                  <div class="col-md-6">
                  
                      <label for="exampleInputPassword1" class="form-label">Field</label>
                      <input type="text" name="field" class="form-control" id="exampleInputPassword1" placeholder="e.g. mechanical engineering technology" required>
                  
                  </div>
                  <div class="col-md-6 ">
                      <label for="exampleInputPassword1"  class="form-label">Stream</label>
                      <input type="text" class="form-control" name="stream" placeholder = "optional" id="exampleInputPassword1">
                  
                  </div>
              
              
              </div>

                  </div>

                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <!-- <button class="btn btn-primary me-md-2" type="button">Button</button> -->
              
              <button type="submit" id="proceedButton" class="btn btn-primary" onclick="showGrad()">Save</button>
            </div>

            </form>




      </div>

    </div>
  </div>
</div>