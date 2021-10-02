<?PHP require_once('report.php');?>

<div class="row list-frame" id="data-print">
    <div class="col col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Meja</th>
                        <th scope="col">Pelayan</th>
                        <th scope="col">Jumlah Produk</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP 
                            $Total1 = 0;
                            $Total2 = 0;
                            foreach($list as $ls){
                                $Total1 += $ls->Qty;
                                $Total2 += $ls->Total;
                        ?>
                            <tr>
                            <td scope="row"><?PHP echo $ls->ID;?></td>
                            <td><?PHP echo date_format(date_create($ls->DateTime),'d-m-Y H:i:s');?></td>
                            <td><?PHP echo $ls->TableName;?></td>
                            <td><?PHP echo $ls->NameUser;?></td>
                            <td><?PHP echo number_format($ls->Qty,0,',','.');?> Produk</td>
                            <td>Rp. <?PHP echo number_format($ls->Total,0,',','.');?></td>
                            <td><?PHP if($ls->FlagPayment == '1'){ echo 'Closed';} else { echo 'Outstanding';}?></td>
                            </tr>
                        <?PHP } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan='4'>Total</th>
                            <th><?PHP echo number_format($Total1,0,',','.');?> Produk</th>
                            <th>Rp. <?PHP echo number_format($Total2,0,',','.');?></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>