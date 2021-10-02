<div class='d-grid gap-2 d-md-flex justify-content-md-start'>
    <a class='btn btn-light' href="<?PHP echo base_url('index.php/home');?>">Kembali</a>
    <button class='btn btn-primary' onclick='popup_new();'>Tambah Data Baru</a>
</div>
<br>
<div class="row list-frame">
    <div class="col col-12">
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
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Subkategori</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP foreach($list as $list){?>
                            <tr>
                            <th scope="row"><?PHP echo $list->ID;?></th>
                            <td><?PHP echo $list->Name;?></td>
                            <td><?PHP echo $list->NameCategory;?></td>
                            <td><?PHP echo $list->NameSubcategory;?></td>
                            <td><?PHP echo $list->Unit;?></td>
                            <td><?PHP echo $list->Price;?></td>
                            <td><?PHP if($list->FlagReady == '1'){ echo 'Ready';} else { echo 'Not Ready';}?></td>
                            <td><button class="btn btn-primary bg-primaya btn-sm" id='btn-choose-trans-<?PHP echo $list->ID;?>' data-id="<?PHP echo $list->ID;?>" onclick="choose_product(this);">Detail</button></td>
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
</div>
<input type='hidden' id='selected_ID' value=''>
<input type='hidden' id='ID_User' value='<?PHP echo $this->session->userdata('ID_User');?>'>


<!-- Modal -->
<div class="modal fade" id="ModalDetailProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="mb-3 row">
            <label for="ID" class="col-sm-4 col-form-label">ID</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control" id="ID" value="" placeholder='Otomatis'>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Name" class="col-sm-4 col-form-label">Nama</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Name" value="" placeholder='Nama'>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ID_Category" class="col-sm-4 col-form-label">Kategori</label>
            <div class="col-sm-8">
                <select class="form-select" id="ID_Category" name="ID_Category" onChange='change_category();'>
                    <?PHP foreach($category as $cat){?>
                        <option value='<?PHP echo $cat->ID?>'><?PHP echo $cat->Name;?></option>
                    <?PHP }?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ID_Subcategory" class="col-sm-4 col-form-label">Subkategori</label>
            <div class="col-sm-8">
                <select class="form-select" id="ID_Subcategory" name="ID_Subcategory">
                    <option>Pilih Kategori Telebih Dahulu</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ID_Unit" class="col-sm-4 col-form-label">Satuan</label>
            <div class="col-sm-8">
                <select class="form-select" id="ID_Unit" name="ID_Unit">
                    <?PHP foreach($unit as $un){?>
                        <option value='<?PHP echo $un->ID?>'><?PHP echo $un->Unit;?></option>
                    <?PHP }?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Price" class="col-sm-4 col-form-label">Harga</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="Price" value="0" placeholder='Harga'>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="FlagReady" class="col-sm-4 col-form-label">Status</label>
            <div class="col-sm-8">
                <select class="form-select" id="FlagReady" name="FlagReady">
                    <option value='1'>Ready</option>
                    <option value='0'>Not Ready</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Image" class="col-sm-4 col-form-label">Image</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Image" value="0" placeholder='Nama Gambar'>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary bg-primaya" id='btn-confirm'>Simpan</button>
        <button type="button" class="btn btn-danger" id='btn-delete' onclick='delete_data();'>Hapus</button>
      </div>
    </div>
  </div>
</div>