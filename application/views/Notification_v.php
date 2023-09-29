<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Notification</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Lead name</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Status</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">updated</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">FTD date</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params as $notification){ ?>
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?php echo $notification->full_name?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <div class="text-center">
                                <?php switch($notification->status){
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
                                    default:
                                        echo '<span class="badge bg-primary rounded-3 fw-semibold text-center">Not interested</span>';
                                }?>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                            <div class="text-center">
                                <?php switch($notification->updated){
                                    case 0:
                                        echo '<span class="badge bg-primary rounded-3 fw-semibold text-center">Processing</span>';
                                        break;
                                    case 1:
                                        echo '<span class="badge bg-success rounded-3 fw-semibold text-center">Updated</span>';
                                        break;
                                    default:
                                        echo '<span class="badge bg-primary rounded-3 fw-semibold text-center">Processing</span>';
                                }?>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 text-center"><?php echo $notification->ftd_date?></h6>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>