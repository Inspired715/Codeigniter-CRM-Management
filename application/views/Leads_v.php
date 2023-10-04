<div class="row">
    <div class="card w-100">
        <div class="card w-100 p-3">
            <h5 class="card-title fw-semibold mb-4">Leads</h5>
            <div id="chart-pie-simple"></div>
        </div>
        <div class="card-body p-4">
            
            <div class="row">
                <div class="col-lg-2">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Status</label>
                        <select class="form-select" id="filter_status">
                            <option selected="" value="0">All</option>
                            <option value="<?php echo LEAD_STATUS_NEW?>">New</option>
                            <option value="<?php echo LEAD_STATUS_NOT_INTERESTED?>">Not Interested</option>
                            <option value="<?php echo LEAD_STATUS_FOLLOW_UP?>">Follow Up</option>
                            <option value="<?php echo LEAD_STATUS_WRONG_NUMBER?>">Wrong Number</option>
                            <option value="<?php echo LEAD_STATUS_UNQUALIFIED?>">Unqualified</option>
                            <option value="<?php echo LEAD_STATUS_MONEY?>">Money</option>
                            <option value="<?php echo LEAD_STATUS_FTD?>">FTD</option>
                        </select>
                    </div>
                </div>
                <?php if($_SESSION['role'] == 1){?>
                <div class="col-lg-2">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Created by</label>
                        <select class="form-select" id="filter_created">
                            <option selected="" value="0">All</option>
                            <?php foreach($publishers as $item){?>
                                <option value="<?php echo $item->id?>"><?php echo $item->full_name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <?php }?>
                <div class="col-lg-3">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">From</label>
                        <input type="date" class="form-control" id="from_date" value="<?php echo Date('Y-m-d')?>"/>
                    </div>
                </div>                
                <div class="col-lg-3">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">To</label>
                        <input type="date" class="form-control" id="to_date" value="<?php echo Date('Y-m-d')?>"/>
                    </div>
                </div>
                <div class="col-lg-2" style="display:flex;align-items:center">
                    <i class="ti ti-search" style="font-size:30px;cursor:pointer;color:white" id="search_btn"></i>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0 bg-blue" style="width:100px;">
                                <h6 class="fw-semibold mb-0 text-center color-white">No</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">First name</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Last name</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Status</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Phone number</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Country</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">E-mail</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Created by</h6>
                            </th>
                            <?php if($_SESSION['role'] == 1){?>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Modified by</h6>
                            </th>
                            <?php }?>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Created date</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="lead_table">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>let view = <?php echo $_SESSION['role'];?></script>
<script src="assets/js/pages/leads.js"></script>