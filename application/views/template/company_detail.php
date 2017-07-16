
<div class="spacer"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 bg-primary">
            <h4>Comapny Detail</h4>
        </div>
        <div class="col-lg-10 col-lg-offset-1 main-content">
            <div class="spacer"></div>
            <div class="col-lg-12 col-lg-offset-11">
                <a href="<?= base_url()?>" class="btn btn-primary btn-xs">
                    <span class="glyphicon glyphicon-arrow-left"></span>
                </a>
            </div>
            <div class="spacer"></div>
            <div class="col-lg-10 col-lg-offset-1">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <td>Logo</td>
                        <td><img height="80px" src="<?= base_url($company->logo); ?>"></td>
                    </tr>

                    <tr>
                        <td>Country</td>
                        <td><?= $company->country; ?></td>
                    </tr>

                    <tr>
                        <td>Name</td>
                        <td><?= $company->name; ?></td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td><?= $company->address; ?></td>
                    </tr>

                    <tr>
                        <td>Phone</td>
                        <td><?= $company->phone; ?></td>
                    </tr>

                    <tr>
                        <td>Fax</td>
                        <td><?= $company->fax; ?></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td><?= $company->email; ?></td>
                    </tr>

                    <tr>
                        <td>Web Url</td>
                        <td><?= $company->web_url; ?></td>
                    </tr>

                    <tr>
                        <td>Date of Establishment</td>
                        <td><?= $company->date_established; ?></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <div class="spacer"></div>
</div>
