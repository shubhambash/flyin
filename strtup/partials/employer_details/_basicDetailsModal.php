<!-- Modal for basic details of the employer-->

<div class="modal fade" id="basicEmployerDetail" tabindex="-1" aria-labelledby="basicEmployerDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="basicEmployerDetailLabel">Baisc Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        


         <form action="partials/employer_details/handle_employer/_handle_employer_basic.php" method="post">

         <div id="emailHelp" class="form-text">Your private information is safe with us</div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name of organization</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>


                <div class="mb-3">
                    <label for="field" class="form-label">Field of work</label>
                    <input type="text" class="form-control" name="field" id="field" placeholder="e.g. Technology" required>
                </div>

                <div class="form-group">
                    <label for="about">About:</label>
                    <textarea class="form-control" rows="5" id="about" name="about" placeholder="This will be displayed to other users"></textarea>
                </div>
                

                <div class="mb-3">
                    <label for="address" class="form-label">Address of head Office</label>
                    <input type="text" class="form-control" name="address" id="address" required>
                </div>

                <div class="mb-3">
                    <label for="estD" class="form-label">Est. date</label>
                    <input type="date" class="form-control" name="estD" id="estD" required>
                </div>

                
                <div class="mb-3">
                    <label for="contact1" class="form-label">Mobile number</label>
                    <input type="number" class="form-control" name="contact1" id="contact1" required>
                </div>

                     
                <div class="mb-3">
                    <label for="contact2" class="form-label">landline number(optional)</label>
                    <input type="number" class="form-control" name="contact2" id="contact2">
                </div>

                      
                <div class="mb-3">
                    <label for="website" class="form-label">website link(optional)</label>
                    <input type="link" class="form-control" placeholder="www.jobportal.com" name="website" id="website">
                </div>

                <div class="mb-3">
                    <label for="link" class="form-label">Social media handle(optional)</label>
                    <input type="link" class="form-control mb-2"  placeholder="e.g. Linkedin URL" name="socialHandle1" id="socialHandle1">
                    <input type="link" class="form-control mb-2"  placeholder="e.g. Facebook URL" name="socialHandle2" id="socialHandle2">
                    <input type="link" class="form-control mb-2" placeholder="e.g. Instagram URL"  name="socialHandle3" id="socialHandle3">
                </div>

                



                <button type="submit" class="btn" style="background-color: #44859e; color: white;">Submit</button>
        </form>



      </div>
    
    </div>
  </div>
</div>