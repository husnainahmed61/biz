
<style type="text/css">
    #invoice{
    padding: 30px;
    font-family: sans-serif,apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    /*font-family: monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;*/
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: left;
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>

<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col company-details">
                        <h2 class="name">
                            <?=$company_info[0]['first_name'].' '.$company_info[0]['last_name']?>
                        </h2>
                        <div><?=$company_info[0]['legal_address']?></div>
                        <div><?=$company_info[0]['phone']?></div>
                        <div><?=$company_info[0]['email']?></div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to" style="margin-right: 55%; float: left;">
                        <div class="text-gray-light" >INVOICE TO:</div>
                        <h2 class="to"><?=$supplier_info[0]['supplier_company']?></h2>
                        <p class="to"><?=$supplier_info[0]['first_name'].' '.$supplier_info[0]['last_name']?></p>
                        <div class="address"><?=$supplier_info[0]['supplier_address']?></div>
                        <div class="email"><a href="mailto:<?=$supplier_info[0]['email']?>"><?=$supplier_info[0]['email']?></a></div>
                    </div>
                    <div class="col invoice-details" style="float: left;">
                        <h1 class="invoice-id">PO #<?=$po_info[0]['id']?></h1>
                        <div class="date">Date of PO: <?=$po_info[0]['created_at']?></div>
                        <div class="date">Delivery Date: <?=$po_info[0]['delivery_date']?></div>
                        <div class="text">Delivery Location: <?=$po_info[0]['address']?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">ITEM NAME</th>
                            <th class="text-right">UNIT PRICE</th>
                            <th class="text-right">QTY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td class="no">01</td>
                            <td class="text-left"><h3><?=$item_info[0]['name']?></h3></td>
                            <td class="unit"><?=$item_info[0]['cur']?> <?=$item_info[0]['amount']?></td>
                            <td class="qty"><?=$item_info[0]['qty']?></td>
                            <td class="total"><?=$item_info[0]['cur']?> <?php echo $item_info[0]['amount']*$item_info[0]['qty'] ?></td>
                        </tr>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td><?=$item_info[0]['cur']?> <?php echo $item_info[0]['amount']*$item_info[0]['qty']?></td>
                            <?php $subtotal = $item_info[0]['amount']*$item_info[0]['qty'] ?>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX <?=$po_info[0]['tax_percentage']?>%</td>
                            <td><?=$item_info[0]['cur']?> <?php echo ($po_info[0]['tax_percentage']/100) * $subtotal;?></td>
                            <?php $total_tax =  ($po_info[0]['tax_percentage']/100) * $subtotal; ?>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td><?=$item_info[0]['cur']?> <?=$subtotal+$total_tax?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>PAYMENT DETAILS:</div>
                    <div class="notice">
                        <?=$company_info[0]['payment_detail']?></div>
                </div>
            </main>
            <footer>
                PO was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>