<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Leads</h5>
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
                                <h6 class="fw-semibold mb-0 text-center color-white">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    case LEAD_STATUS_NEW:
                                        echo '<span class="badge bg-primary rounded-3 fw-semibold text-center">New</span>';
                                        break;
                                    case LEAD_STATUS_ASSIGNED:
                                        echo '<span class="badge bg-success rounded-3 fw-semibold text-center">Assigned</span>';
                                        break;
                                    case LEAD_STATUS_DELETED:
                                        echo '<span class="badge bg-danger rounded-3 fw-semibold text-center">Deleted</span>';
                                        break;
                                    default:
                                        echo '<span class="badge bg-primary rounded-3 fw-semibold text-center">New</span>';
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
                                <div class="text-center">
                                    <span class="badge bg-secondary rounded-3 fw-semibold more pointer" data-lid="<?php echo $lead->id?>">More</span>
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