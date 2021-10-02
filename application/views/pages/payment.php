<div class='d-grid gap-2 d-md-flex justify-content-md-start'><a class='btn btn-light' href="<?PHP echo base_url('index.php/home');?>">Kembali</a></div>
<br>
<div class="row order-frame">
    <div class="col col-8">

        <div class="row order-frame">
            <div class="row spinner-order-frame" style="display:none;">
                <div class="text-center">
                    <div class="spinner-border text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="row list-order-frame" style="display:none;">
            </div>
        </div>
    </div>

    <div class="col col-4">
        <div class="ordered-item-frame padding-10">
            <div class="row">
            <div class="d-grid gap-2"><a class="btn btn-secondary btn-sm block" id="#btn-commit" href="<?PHP echo base_url('index.php/payment/list_trans');?>">Lihat History Pembayaran</a></div>
            </div>
            <br>
            <div class="row">
                <div class="col">Kasir: <strong><?PHP echo $this->session->userdata('Name');?></strong></div>
            </div>
            <hr>
            <div class="row">
                <div class="row spinner-ordered-item-frame" style="display:none;">
                    <div class="text-center">
                        <div class="spinner-border text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <table class="list-ordered-item-frame table table-hover table-striped" style="display:none;">
                    </table>
                </div>

                <div class="row">
                    <div class="col col-6">Total Pesanan: </div>
                    <div class="col col-6">
                        <input type="number" class="form-control input-sm disabled" readonly="true" id="TotalOrder" placeholder="Total Pesanan" value="0">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <label class="control-label col-sm-6" for="DiscPersen">Diskon %:</label>
                    <div class="col col-6 text-right">
                        <input type="number" class="form-control input-sm" id="DiscPersen" placeholder="Diskon (%)" value="0" onkeyup='hitung_total();'>
                        <input type="hidden" class="form-control input-sm" id="DiscRupiah" value="0">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col col-6">PPN <?PHP echo $setup->PPNPersen;?>%: </div>
                    <div class="col col-6 text-right">
                        <input type="hidden" readonly="true" id="PPNPersen" value="<?PHP echo $setup->PPNPersen;?>">
                        <input type="number" class="form-control input-sm disabled" readonly="true" id="PPNRupiah" placeholder="PPN Rupiah" value="0">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col col-6">Service Charge <?PHP echo $setup->SCPersen;?>%: </div>
                    <div class="col col-6 text-right">
                        <input type="hidden" readonly="true" id="SCPersen" value="<?PHP echo $setup->SCPersen;?>">
                        <input type="number" class="form-control input-sm disabled" readonly="true" id="SCRupiah" placeholder="Service Charge" value="0">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <label class="control-label col-sm-6" for="Voucher">Voucher:</label>
                    <div class="col col-6 text-right">
                        <input type="number" class="form-control input-sm" id="Voucher" placeholder="Voucher" value="0" onkeyup='hitung_total();'>
                    </div>
                </div>
                <br>
                <br>
                <hr>
                <div class="row">
                    <label class="control-label col-sm-6" for="TotalTagihan">Total Tagihan:</label>
                    <div class="col col-6 text-right">
                        <input type="number" class="form-control input-sm disabled" readonly='true' id="TotalTagihan" placeholder="Total Tagihan" value="0">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <label class="control-label col-sm-6" for="ID_PaymentMethod">Jenis Pembayaran:</label>
                    <div class="col col-6 text-right">
                        <select class="form-select" id="ID_PaymentMethod">
                            <?PHP foreach($payment_method as $payment){?>
                            <option value="<?PHP echo $payment->ID;?>"><?PHP echo $payment->PaymentMethod;?></option>
                            <?PHP } ?>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <label class="control-label col-sm-6" for="TotalBayar">Total Bayar:</label>
                    <div class="col col-6 text-right">
                        <input type="number" class="form-control input-sm" id="TotalBayar" placeholder="Total Bayar" value="0" onkeyup='hitung_total();'>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <label class="control-label col-sm-6" for="TotalChange">Kembali:</label>
                    <div class="col col-6 text-right">
                        <input type="number" class="form-control input-sm disabled" readonly="true" id="TotalChange" placeholder="Kembali" value="0">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="d-grid gap-2"><button type="button" class="btn btn-primary bg-primaya btn-sm block" id="btn-commit" onclick="confirm_save();">Simpan Pembayaran</button></div>
            </div>
        </div>
    </div>
</div>

<input type='hidden' id='ID_User' value='<?PHP echo $this->session->userdata('ID_User');?>'>
<input type='hidden' id='counter' value='0'>