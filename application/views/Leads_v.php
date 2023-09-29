<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Leads</h5>
            <div class="row">
                <div class="col-lg-3">
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
                <div class="col-lg-3">
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
                <div class="col-lg-3" style="display:flex;align-items:center">
                    <i class="ti ti-search" style="font-size:30px;cursor:pointer;color:white" id="search_btn"></i>
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
                                <h6 class="fw-semibold mb-0 text-center color-white">Status</h6>
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
                                <h6 class="fw-semibold mb-0 text-center color-white">Created date</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="lead_table">
                        <?php foreach($params as $lead){ ?>
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?php echo $lead->first_name?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?php echo $lead->last_name?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <div class="text-center">
                                <?php switch($lead->status){
                                    case LEAD_STATUS_NOT_INTERESTED:
                                        echo '<span class="badge bg-primary rounded-3 fw-semibold text-center">Not interested</span>';
                                        break;
                                    case LEAD_STATUS_FOLLOW_UP:
                                        echo '<span class="badge bg-success rounded-3 fw-semibold text-center">Follow up</span>';
                                        break;
                                    case LEAD_STATUS_FTD:
                                        echo '<span class="badge bg-danger rounded-3 fw-semibold text-center">Ftd</span>';
                                        break;
                                    case LEAD_STATUS_WRONG_NUMBER:
                                        echo '<span class="badge bg-dark rounded-3 fw-semibold text-center">Wrong number</span>';
                                        break;
                                    case LEAD_STATUS_UNQUALIFIED:
                                        echo '<span class="badge bg-warning rounded-3 fw-semibold text-center">Unqualified</span>';
                                        break;
                                    case LEAD_STATUS_NEW:
                                        echo '<span class="badge bg-secondary rounded-3 fw-semibold text-center">New</span>';
                                        break;
                                    case LEAD_STATUS_MONEY:
                                        echo '<span class="badge bg-info rounded-3 fw-semibold text-center">Money</span>';
                                        break;
                                    default:
                                        echo '<span class="badge bg-primary rounded-3 fw-semibold text-center">Not interested</span>';
                                }?>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="mb-0 fw-semibold text-center"><?php echo $lead->phone_number?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?php echo $lead->email?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?php echo $lead->created_by?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 text-center"><?php echo $lead->created_date?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <div class="text-center">
                                    <span class="badge bg-secondary rounded-3 fw-semibold more pointer" onclick="onDetail('<?php echo $lead->id?>')">More</span>
                                </div>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/pages/leads.js"></script>