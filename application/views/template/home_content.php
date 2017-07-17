
<div class="spacer"></div>
<div class="container-fluid fluid-margin">
    <div class="row">
        <div class="col-lg-12 bg-primary">
            <h4>Company List</h4>
        </div>
        <div class="col-lg-12 main-content">
            <div class="col-lg-12">
                <form class="form-inline" method="post" action="<?= base_url("search-company"); ?>">
                    <fieldset class="fieldset">
                        <legend>Search</legend>
                        <div class="form-group col-sm-5 col-sm-offset-1">
                            <label for="countryName">Country</label>
                            <select id="countryName" name="search_country" class="form-control bfh-countries" data-country="<?= isset($search_option['search_country']) ? $search_option['search_country'] :''; ?>"></select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="CompanyName">Name</label>
                            <input type="text" name="search_name" class="form-control" id="CompanyName" value="<?= isset($search_option['search_name']) ? $search_option['search_name'] :''; ?>">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-default btn-space">Search</button>
                        </div>                        
                    </fieldset>
                </form>                
            </div>
            <div class="col-lg-12 spacer"></div>
            <div class="col-lg-12 text-center text-danger">
                <?= $this->session->has_userdata('search_error') ? $this->session->flashdata('search_error') : ''; ?>
            </div>
            <div class="col-lg-2 col-lg-offset-10 text-right">
                <a href="<?php echo base_url('add-new') ?>" class="btn btn-default btn-primary">Add New</a>
            </div>
            <div class="col-lg-12">
                <fieldset class="fieldset">
                    <legend>Info List</legend>
                </fieldset>                        
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
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
                            foreach ($company_list as $company) {
                                $counter++;
                                ?>
                                <tr>
                                    <th scope="row"><?= $counter; ?></th>
                                    <td><span class="bfh-countries" data-country="<?= $company->country; ?>"></span></td>
                                    <td><?= $company->name; ?></td>
                                    <td><?= $company->phone; ?></td>
                                    <td><?= $company->fax; ?></td>
                                    <td><?= $company->email; ?></td>
                                    <td><?= $company->web_url; ?></td>
                                    <td>
                                        <a href="<?= base_url('view-detail/' . $this->encryption->encrypt($company->id)); ?>" class="btn btn-success">
                                            <span class="glyphicon glyphicon-open-file" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('edit/' . $this->encryption->encrypt($company->id)); ?>" class="btn btn-primary">
                                            <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('delete/' . $this->encryption->encrypt($company->id)); ?>" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete ?')">
                                            <span class="glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
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
