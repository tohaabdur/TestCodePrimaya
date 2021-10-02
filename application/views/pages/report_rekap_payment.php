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
                        <th scope="col">Jumlah Pesanan</th>
                        <th scope="col">Total Pesanan</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">PPN</th>
                        <th scope="col">Service Charge</th>
                        <th scope="col">Total Tagihan</th>
                        <th scope="col">Voucher</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP 
                            $Total1 = 0;
                            $Total2 = 0;
                            $Total3 = 0;
                            $Total4 = 0;
                            $Total5 = 0;
                            $Total6 = 0;
                            $Total7 = 0;
                            $Total8 = 0;
                            foreach($list as $ls){
                                $Total1 += $ls->TotalOrder;
                                $Total2 += $ls->DiscRupiah;
                                $Total3 += $ls->PPNRupiah;
                                $Total4 += $ls->ServiceChargeRupiah;
                                $Total5 += $ls->TotalTagihan;
                                $Total6 += $ls->Voucher;
                                $Total7 += $ls->TotalPayment;
                                $Total8 += $ls->TotalChange;
                        ?>
                            <tr>
                            <td scope="row"><?PHP echo $ls->ID;?></td>
                            <td><?PHP echo date_format(date_create($ls->DateTime),'d-m-Y H:i:s');?></td>
                            <td><?PHP echo $ls->NameUser;?></td>
                            <td><?PHP echo $ls->PaymentMethod;?></td>
                            <td><?PHP echo number_format($ls->CountOrder,0,',','.');?> Pesanan</td>
                            <td>Rp. <?PHP echo number_format($ls->TotalOrder,0,',','.');?></td>
                            <td>Rp. <?PHP echo number_format($ls->DiscRupiah,0,',','.');?></td>
                            <td>Rp. <?PHP echo number_format($ls->PPNRupiah,0,',','.');?></td>
                            <td>Rp. <?PHP echo number_format($ls->ServiceChargeRupiah,0,',','.');?></td>
                            <td>Rp. <?PHP echo number_format($ls->TotalTagihan,0,',','.');?></td>
                            <td>Rp. <?PHP echo number_format($ls->Voucher,0,',','.');?></td>
                            <td>Rp. <?PHP echo number_format($ls->TotalPayment,0,',','.');?></td>
                            <td>Rp. <?PHP echo number_format($ls->TotalChange,0,',','.');?></td>
                            </tr>
                        <?PHP } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan='5'>Total</th>
                            <th>Rp. <?PHP echo number_format($Total1,0,',','.');?></th>
                            <th>Rp. <?PHP echo number_format($Total2,0,',','.');?></th>
                            <th>Rp. <?PHP echo number_format($Total3,0,',','.');?></th>
                            <th>Rp. <?PHP echo number_format($Total4,0,',','.');?></th>
                            <th>Rp. <?PHP echo number_format($Total5,0,',','.');?></th>
                            <th>Rp. <?PHP echo number_format($Total6,0,',','.');?></th>
                            <th>Rp. <?PHP echo number_format($Total7,0,',','.');?></th>
                            <th>Rp. <?PHP echo number_format($Total8,0,',','.');?></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>