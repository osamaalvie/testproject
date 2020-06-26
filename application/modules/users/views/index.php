<body>
<?php echo validation_errors(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php echo form_open('users/create'); ?>

                <div class="card mt-2">
                    <div class="card-header">Add User</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input class="form-control" id="first_name" name="first_name"/>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input class="form-control" id="last_name" name="last_name"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"/>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="status" name="status"/>
                            <label for="status" class="form-check-label">Status</label>

                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="form-control btn btn-success" id="btnSubmit">Submit</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-md-6">
            <div class="card mt-2">
                <div class="card-header">Users</div>
                <div class="card-body"
                <ul class="list-group">
                    <?php foreach ($users as $user): ?>
                        <li class="list-group-item"><?php echo $user['first_name'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>


</div>




