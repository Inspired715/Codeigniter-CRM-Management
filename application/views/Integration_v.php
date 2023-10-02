<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Integration</h5>
            <div class="row">
                <div class="col-lg-3">
                    <div class="mb-4">
                        <select class="form-select" id="filter_created">
                            <option selected="" value="-1">None</option>
                            <?php foreach($publishers as $item){?>
                                <option value="<?php echo $item->id?>"><?php echo $item->full_name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>    
                <div class="col-lg-3">
                    <div class="mb-4">
                        <button class="btn btn-primary" style="height:39px" id="export_all_btn">All export</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
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