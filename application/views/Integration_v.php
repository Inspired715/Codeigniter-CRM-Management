<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Integration</h5>
            <div class="row">
                <div class="col-lg-3">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Export to</label>
                        <select class="form-select" id="filter_campaign">
                            <option selected="" value="-1">None</option>
                            <?php foreach($params as $item){?>
                                <option value="<?php echo $item->id?>"><?php echo $item->campaign?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>    
                <div class="col-lg-3" style="display:flex;align-items:center">
                    <button class="btn btn-primary" id="export_all_btn" style="margin-top:5px;">All export</button>
                </div>
                <div class="col-lg-3">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Update from</label>
                        <select class="form-select" id="update_from">
                            <?php foreach($params as $item){?>
                                <option value="<?php echo $item->id?>"><?php echo $item->campaign?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3" style="display:flex;align-items:center">
                    <i class="ti ti-reload color-white" style="font-size:30px;cursor:pointer;" id="update_btn"></i>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0 bg-blue" style="width:100px">
                                <h6 class="fw-semibold mb-0 text-center color-white">No</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">First name</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Last name</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Phone number</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">E-mail</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Created by</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="integration_table">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/pages/integration.js"></script>