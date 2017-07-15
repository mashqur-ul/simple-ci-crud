
<div class="spacer"></div>
<div class="container-fluid fluid-margin">
    <div class="row">
        <div class="col-lg-12 bg-primary">
            <h4>View Tabular Data</h4>
        </div>
        <div class="col-lg-12 main-content">
            <div class="col-lg-12">
                <form class="form-inline">
                    <fieldset class="fieldset">
                        <legend>Search</legend>
                        <div class="form-group col-sm-4 col-sm-offset-1">
                            <label for="exampleInputName2">Name of Country</label>
                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="exampleInputEmail2">Name</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-default btn-space">Search</button>
                        </div>                        
                    </fieldset>
                </form>
            </div>
            <div class="col-lg-12 col-lg-offset-10">
                <a href="<?php echo base_url('add-new') ?>" class="btn btn-default btn-primary">Add New</a>
            </div>
            <div class="col-lg-12">
                <fieldset class="fieldset">
                    <legend>Info List</legend>
                </fieldset>                        
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name of Country</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Fax</th>
                                <th>Email</th>
                                <th>Web URL</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            foreach($company_list as $company) {
                            $counter++;
                            ?>
                            <tr>
                                <th scope="row"><?= $counter; ?></th>
                                <td><?= $company->country; ?></td>
                                <td><?= $company->name; ?></td>
                                <td><?= $company->phone; ?></td>
                                <td><?= $company->fax; ?></td>
                                <td><?= $company->email; ?></td>
                                <td><?= $company->web_url; ?></td>
                                <td>
                                    <button class="btn btn-success">
                                        <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-primary">
                                        <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-danger">
                                        <span class="glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="spacer"></div>
</div>