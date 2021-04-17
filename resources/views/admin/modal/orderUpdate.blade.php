<div class="modal" tabindex="-1" id="exampleModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update this order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <label>Select the status</label>
          <select class="form-control" name="status" id="status">
              <option value="-1">Order Placed</option>
              <option value="0">Packing</option>
              <option value="1">On Way</option>
              <option value="2">Deliverd</option>
              <option value="3">Canceled</option>
          </select>
          <label>Select the status</label>
          <input class="form-control mt-2" name="status_text" id="status_text" placeholder="Enter the status">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update">Update</button>
        </div>
      </div>
    </div>
  </div>
