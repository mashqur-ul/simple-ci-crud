<div class="container">
    <div class="row spacer"></div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 bg-primary">
            <h4>Edit Company Info</h4>
        </div>

        <div class="col-lg-8 col-lg-offset-2 main-content">
            <div class="col-lg-10 col-lg-offset-1">
                <form class="form-horizontal" action="<?php echo base_url('update-company-info') ?>" method="post" enctype="multipart/form-data">
                    <fieldset class="fieldset">
                        <legend class="">Company Information</legend>
                        <div class="form-group">
                            <label for="countryName" class="col-sm-4 control-label">Country Name</label>
                            <div class="col-sm-8">
                                <select id="countryName" name="country" class="form-control bfh-countries" data-country="<?php echo $company->country; ?>"></select>
                                <span class="text-danger">
                                    <?php echo form_error('country') ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Company Name" value="<?php echo $company->name; ?>">
                                <input type="hidden" name="update_id" value="<?php echo $this->encryption->encrypt($company->id) ?>">
                                <span class="text-danger">
                                    <?php echo form_error('name') ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-sm-4 control-label">Address</label>
                            <div class="col-sm-8">
                                <textarea id="address" name="address" class="form-control" rows="3"><?php echo $company->address; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-4 control-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="<?php echo $company->phone; ?>">
                                <span class="text-danger">
                                    <?php echo form_error('phone') ?>
                                </span>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="fax" class="col-sm-4 control-label">Fax</label>
                            <div class="col-sm-8">
                                <input type="text" name="fax" class="form-control" id="fax" placeholder="Fax" value="<?php echo $company->fax; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email Address" value="<?php echo $company->email; ?>">
                                <span class="text-danger">
                                    <?php echo form_error('email') ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="webUrl" class="col-sm-4 control-label">Web URL</label>
                            <div class="col-sm-8">
                                <input type="text" name="web_url" class="form-control" id="webUrl" placeholder="Website Address" value="<?php echo $company->web_url; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dateEstablishment" class="col-sm-4 control-label">Date of Establishment</label>
                            <div class="col-sm-8">
                                <div class="bfh-datepicker" data-format="y-m-d" data-name="date_established">
                                    <div class="input-prepend bfh-datepicker-toggle" data-toggle="bfh-datepicker">
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                        <input type="text" class="form-control" id="dateEstablishment" readonly value="<?= $company->date_established; ?>">
                                    </div>
                                    <div class="bfh-datepicker-calendar">
                                        <table class="calendar table table-bordered">
                                            <thead>
                                                <tr class="months-header">
                                                    <th class="month" colspan="4">
                                                        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                                        <span></span>
                                                        <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                                                    </th>
                                                    <th class="year" colspan="3">
                                                        <a class="previous" href="#"><i class="icon-chevron-left"></i></a>
                                                        <span></span>
                                                        <a class="next" href="#"><i class="icon-chevron-right"></i></a>
                                                    </th>
                                                </tr>
                                                <tr class="days-header">
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>   

                        <div class="form-group">
                            <label for="exampleInputFile" class="col-sm-4 control-label">File input</label>
                            <div class="col-sm-2">
                                <img height="50px" src="<?= base_url($company->logo); ?>">
                            </div>
                            <div class="col-sm-6">
                                <input name="logo" type="file" id="exampleInputFile">
                                <span class="text-danger">
                                    <?php
                                        if($this->session->has_userdata('upload_error')){
                                            print $this->session->flashdata('upload_error');
                                        }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <div class="col-sm-offset-10 col-sm-2">                            
                            <button type="submit" class="btn btn-default btn-primary btn-space">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

