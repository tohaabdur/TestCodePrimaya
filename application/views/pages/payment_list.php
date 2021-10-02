<div class='d-grid gap-2 d-md-flex justify-content-md-start'><a class='btn btn-light' href="<?PHP echo base_url('index.php/payment');?>">Kembali</a></div>
<br>
<div class="row list-frame">
    <div class="col col-6">
        <div class="card">
            <div class="card-header">
                <div class="col col-6">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" placeholder="Pencarian..." name='search' id='search' aria-describedby="button-search">
                        <span class="input-group-btn">
                            <button class="btn btn-outline-secondary" type="button" onclick='search();' id="button-search">Cari</button>
                        </span>
                    </div>
                </div>
            
            <?PHP 
            if($search)
            {
                echo "<div class='d-grid gap-2 d-md-flex justify-content-md-start'><button type='button' class='btn btn-outline-secondary' onclick='reset_search();'>Tampilkan Seluruh Data</button></div>";
            }
            ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Kasir</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP foreach($list as $list){?>
                            <tr>
                            <th scope="row"><?PHP echo $list->ID;?></th>
                            <td><?PHP echo date_format(date_create($list->DateTime),'d-m-Y H:i:s');?></td>
                            <td><?PHP echo $list->PaymentMethod;?></td>
                            <td><?PHP echo $list->NameUser;?></td>
                            <td><button class="btn btn-primary bg-primaya btn-sm" id='btn-choose-trans-<?PHP echo $list->ID;?>' data-id="<?PHP echo $list->ID;?>" onclick="choose_trans(this);">Detail</button></td>
                            </tr>
                        <?PHP } ?>
                    </tbody>
                </table>
                        </div>
            </div>
            <div class="card-footer">
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
    <div class="col col-6">
        <div class="detail-frame padding-10">
            <div class="card bg-light">
                <div class="card-header">Detail Transaksi</div>
                <div class="card-body" style="min-height:500px;">
                    <div class="row spinner-detail-frame" style="display:none;">
                        <div class="text-center">
                            <div class="spinner-border text-dark" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <div class='row list-detail-frame'>
                        Anda belum memilih transaksi
                    </div>
                </div>
                <div class="card-footer" id="btn-delete-trans" style="display:none;"><button type="button" class="btn btn-danger" onclick="delete_trans();">Hapus Pembayaran</button></div>
            </div>
        </div>
    </div>
</div>

<input type='hidden' id='selected_ID' value=''>
<input type='hidden' id='ID_User' value='<?PHP echo $this->session->userdata('ID_User');?>'>