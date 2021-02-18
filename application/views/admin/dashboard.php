            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-car"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Data Mobil</h4>
                                    </div>
                                    <div class="card-body">
                                        <?= $mobil; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-grip-horizontal"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Type</h4>
                                    </div>
                                    <div class="card-body">
                                        <?= $type; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Supir</h4>
                                    </div>
                                    <div class="card-body">
                                        <?= $supir; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Customer</h4>
                                    </div>
                                    <div class="card-body">
                                        <?= $customer; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>