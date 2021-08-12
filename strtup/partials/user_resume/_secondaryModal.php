<!-- class 10 details -->


<div class="modal fade" id="secondary" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="staticBackdropLabel">Secondary(X)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- modal body goes here -->

        <form action="../partials/user_resume/handle_education/_handle_secondary.php?edit=true" method="post">


                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="secondaryCompleted" name="secondaryCompleted">
                    <label class="form-check-label" for="secondaryCompleted">Completed grade X</label>
                  </div>

                  <div class="mb-3">
                    <label for="schoolName" class="form-label">school name</label>
                    <input type="text" class="form-control" id="schoolName" name ="schoolName" required>
                  </div>
                  <div class="mb-3">

                  
                  

                      <div class="mb-3">
                      
                          <label for="exampleInputPassword1" class="form-label">year of completion</label>
                          <input type="number" class="form-control" name="completionYear" id="exampleInputPassword1" min="1950" max="2030" value="2020">
                      
                      </div>
                
                  
                  
                        
                    <div class="mb-3">
                      
                      <label for="exampleInputPassword1" class="form-label">Board</label>
                      <input type="text" class="form-control" placeholder="e.g. NEB" name="board" id="exampleInputPassword1">
                  
                    </div>


                  <div class="row mb-3">
                  

                  <div class="col-md-6">
                  <label for="exampleInputPassword1"  class="form-label">Performance scale</label>
                    <select class="form-select" name="performanceScale" aria-label="Default select example">
                       
                        <option value="1">Percentage</option>
                        <option value="2">GPA</option>
                        <option value="3">CGPA</option>
                        <option value="4">Grade</option>
                    </select>
                  
                  </div>
                  <div class="col-md-6 ">
                      <label for="exampleInputPassword1"  class="form-label">Obtained</label>
                      <input type="text" class="form-control" name="obtained" placeholder = "optional" id="exampleInputPassword1">
                  
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