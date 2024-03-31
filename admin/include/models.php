 <!-- Modal -->
 <div class="modal fade" id="DeleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <form action="./include/forms.php" method="POST">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Delete Model</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <h5 class="text-danger">Are you sure want to delete this data</h5>
                     <h4 class="deleteName"></h4>
                     <input type="hidden" name="deleteId" id="deleteId">
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" name="submit" class="btn btn-danger" id="deleteBtn">Delete</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- Amenities Modal -->
 <div class="modal fade" id="AmenitiesModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <form action="./include/forms.php" method="POST">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add Amenities</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="form-group col-lg-12 col-md-12 col-12">
                             <label for="">Amenities Name <span class="text-danger"></span></label>
                             <input type="text" class="form-control" name="name" placeholder="Enter Amenities Name" required>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" name="submit" class="btn btn-success" value="AddAmenities">Add</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- Gallery Modal -->
 <div class="modal fade" id="PropertyGalleryModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <form action="./include/forms.php" method="POST" enctype="multipart/form-data">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add Amenities</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="form-group col-lg-12 col-md-12 col-12">
                             <input type="hidden" name="property_id" value="<?= $_GET['property_id'] ?>">
                             <label for="">Property Gallery Image <span class="text-info">Size(1920 × 860 px)</span><span class="text-danger"></span></label>
                             <input type="file" class="form-control" name="property_img" accept="image/*" required>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" name="submit" class="btn btn-success" value="AddPropertyGallery">Add</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>