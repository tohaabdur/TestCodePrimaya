<div class='d-grid gap-2 d-md-flex justify-content-md-start'><a class='btn btn-light' href="<?PHP echo base_url('index.php/home');?>">Kembali</a></div>
<br>
<div class="row order-frame">
    <div class="col col-8">

        <div class="row table-frame" style="display:none;">
            <div class="row spinner-table-frame" style="display:none;">
                <div class="text-center">
                    <div class="spinner-border text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="row list-table-frame" style="display:none;">
            </div>
        </div>

        <br>

        <div class="row category-frame" style="display:none;">
            <div class="row spinner-category-frame" style="display:none;">
                <div class="text-center">
                    <div class="spinner-border text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="row list-category-frame" style="display:none;">
            </div>
        </div>

        <br>

        <div class="row product-frame" style="display:none;">
            <div class="row spinner-product-frame" style="display:none;">
                <div class="text-center">
                    <div class="spinner-border text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="row list-product-frame" style="display:none;">
            </div>
        </div>
    </div>

    <div class="col col-4">
        <div class="ordered-item-frame padding-10">
            <div class="row">
            <div class="d-grid gap-2"><a class="btn btn-secondary btn-sm block" id="#btn-commit" href="<?PHP echo base_url('index.php/order/list_trans');?>">Lihat Pesanan Aktif</a></div>
            </div>
            <br>
            <div class="row">
                <div class="col">Pelayan: <strong><?PHP echo $this->session->userdata('Name');?></strong></div>
                <div class="col">Meja: <strong class="table-status" style="display:none;"></strong>&nbsp;<button class="btn btn-sm btn-warning table-edit-btn" style="display:none;" onclick="get_table();">Ubah</button></div>
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
                    <ul class="list-ordered-item-frame list-group list-group-numbered" style="display:none;">
                        
                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col col-6">Total Pesanan: </div>
                <div class="col col-6">
                    <input type="number" class="form-control input-sm disabled" readonly="true" id="TotalOrder" placeholder="Total Pesanan" value="0">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="d-grid gap-2"><button type="button" class="btn btn-primary bg-primaya btn-sm block" id="#btn-commit" onclick="confirm_save();">Simpan Pesanan</button></div>
            </div>
        </div>
    </div>
</div>

<input type='hidden' id='ID_User' value='<?PHP echo $this->session->userdata('ID_User');?>'>
<input type='hidden' id='ID_Table' value=''>
<input type='hidden' id='counter' value='0'>

<!-- Modal -->
<div class="modal fade" id="ModalDetailProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="mb-3 row" style="display:none;">
            <label for="ProductID" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="hidden" readonly class="form-control-plaintext" id="From" value="">
                <input type="hidden" readonly class="form-control-plaintext" id="CounterExisting" value="">
                <input type="text" readonly class="form-control-plaintext" id="ProductID" value="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ProductName" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="ProductName" value="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ProductPrice" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="ProductPrice" value="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ProductNotes" class="col-sm-2 col-form-label">Notes</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ProductNotes" placeholder="Contoh: Tidak pedas" varchar="20">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ProductQty" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ProductQty" value="">
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary bg-primaya" onclick='save_temp_product();'>Simpan</button>
      </div>
    </div>
  </div>
</div>