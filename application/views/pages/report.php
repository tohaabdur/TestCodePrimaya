<div class='d-grid gap-2 d-md-flex justify-content-md-start'>
    <a class='btn btn-light' href="<?PHP echo base_url('index.php/home');?>">Kembali</a>
</div>
<br>
<div class="containter-fluid">
    <div class="card">
        <div class="card-body">
            <div class="col col-6">
                <form name='form_report' id="form_report" method="post" action='<?PHP echo base_url('index.php/report/get_data');?>'>
                    <div class="input-group mb-3">
                        Tanggal &nbsp; <input type="date" name="Tgl1" id="Tgl1" placeholder="Tanggal Awal" value='<?PHP echo $Tgl1;?>' class='form-control'>
                        &nbsp;sd&nbsp;
                        <input type="date" name="Tgl2" id="Tgl2" placeholder="Tanggal Akhir" value='<?PHP echo $Tgl2;?>' class='form-control'>
                        &nbsp;
                        <select class='form-select' id='Option' name="Option">
                            <option value='rekap_order' <?PHP if($Option == 'rekap_order'){ echo " selected='selected'"; }?>>Rekap Pesanan</option>
                            <option value='detail_order' <?PHP if($Option == 'detail_order'){ echo " selected='selected'"; }?>>Detail Pesanan</option>
                            <?PHP if($this->session->userdata('ID_UserLevel') == '2'){?>
                            <option value='rekap_payment' <?PHP if($Option == 'rekap_payment'){ echo " selected='selected'"; }?>>Rekap Pembayaran</option>
                            <option value='detail_payment' <?PHP if($Option == 'detail_payment'){ echo " selected='selected'"; }?>>Detail Pembayaran</option>
                            <?PHP } ?>
                        </select>
                        &nbsp;
                        <input type='hidden' name="ID_User" id="ID_User" value="<?PHP echo $this->session->userdata('ID_User');?>">
                        &nbsp;
                        <button type="button" name="btn-submit" id="btn-submit" class='btn btn-primary btn-sm bg-primaya' onclick="get_data();">Proses</button>
                        <?PHP if($list){?>
                        <button type="button" name="btn-print" id="btn-print" class='btn btn-secondary btn-sm'>Cetak</button>
                        <?PHP } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>