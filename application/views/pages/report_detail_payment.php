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
                        <th scope="col">Kasir</th>
                        <th scope="col">Jenis Pembayaran</th>
                        <th scope="col">ID Pesanan</th>
                        <th scope="col">Total Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP 
                            $Total1 = 0;
                            foreach($list as $ls){
                                $Total1 += $ls->TotalOrder;
                        ?>
                            <tr>
                            <td scope="row"><?PHP echo $ls->ID;?></td>
                            <td><?PHP echo date_format(date_create($ls->DateTime),'d-m-Y H:i:s');?></td>
                            <td><?PHP echo $ls->NameUser;?></td>
                            <td><?PHP echo $ls->PaymentMethod;?></td>
                            <td><?PHP echo $ls->ID_Order;?></td>
                            <td>Rp. <?PHP echo number_format($ls->TotalOrder,0,',','.');?></td>
                            </tr>
                        <?PHP } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan='5'>Total</th>
                            <th>Rp. <?PHP echo number_format($Total1,0,',','.');?></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>