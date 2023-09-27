<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <div style="display:flex; justify-content:space-between;">
                <h5 class="card-title fw-semibold mb-4">Token list</h5>
                <button class="btn btn-primary" style="height:35px" id="create_token">Create Token</button>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Full name</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Token</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">E-mail</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Phone number</h6>
                            </th>
                            <th class="border-bottom-0 bg-blue">
                                <h6 class="fw-semibold mb-0 text-center color-white">Created date</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($params as $token){ ?>
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?php echo $token->full_name?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?php echo $token->token?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?php echo $token->email?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"><?php echo $token->phone_number?></h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 text-center"><?php echo $token->created_date?></h6>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/pages/token.js"></script>