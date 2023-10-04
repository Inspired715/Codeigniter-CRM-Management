<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <form class="mt-4" method="post" action="<?php echo base_url('updateLeadDetail')?>">
                <h5 class="card-title fw-semibold mb-4">Main information</h5>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label fw-semibold">First name</label>
                        <div class="controls">
                            <input type="text" name="first_name" class="form-control" value="<?php echo $params[0]->first_name?>">
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label fw-semibold">Last name</label>
                        <div class="controls">
                            <input type="text" name="last_name" class="form-control" value="<?php echo $params[0]->last_name?>">
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label fw-semibold">Status</label>
                        <div class="controls">
                            <select class="form-select" name="status" id="status">
                                <option value="0">All</option>
                                <option value="<?php echo LEAD_STATUS_NEW?>">New</option>
                                <option value="<?php echo LEAD_STATUS_NOT_INTERESTED?>">Not Interested</option>
                                <option value="<?php echo LEAD_STATUS_FOLLOW_UP?>">Follow Up</option>
                                <option value="<?php echo LEAD_STATUS_WRONG_NUMBER?>">Wrong Number</option>
                                <option value="<?php echo LEAD_STATUS_UNQUALIFIED?>">Unqualified</option>
                                <option value="<?php echo LEAD_STATUS_MONEY?>">Call later</option>
                                <option value="<?php echo LEAD_STATUS_FTD?>">FTD</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label fw-semibold">Phone number</label>
                        <div class="controls">
                            <input type="text" name="phone" class="form-control" value="<?php echo $params[0]->phone_number?>">
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label fw-semibold">E-mail</label>
                        <div class="controls">
                            <input type="text" name="email" class="form-control" value="<?php echo $params[0]->email?>">
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label fw-semibold">Created date</label>
                        <div class="controls">
                            <input type="date" class="form-control" id="from_date" value="<?php echo $params[0]->created_date?>"/>
                        </div>
                    </div>
                </div>
                <h5 class="card-title fw-semibold mb-4 mt-4">Sub information</h5>
                <div class="row">
                <?php foreach ($params as $item) { ?>
                    <div class="mb-3 col-md-4">
                        <label class="form-label fw-semibold"><?php echo $item->sub_name?></label>
                        <div class="controls">
                            <input type="text" name="s~<?php echo $item->id?>" class="form-control" value="<?php echo $item->sub_value ?>">
                        </div>
                    </div>
                <?php }?>
                </div>
                <input type="text" name="id" value="<?php echo $params[0]->lead_id ?>" hidden />
                <div class="row" style="float:right">
                    <div class="mb-3 col-md-4">
                        <button class="btn btn-primary" type="submit" style="height:35px">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $('#status').val(<?php echo $params[0]->status?>);
</script>