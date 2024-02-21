<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($transiactions)): ?>
                <?php foreach ($transiactions as $transiaction): ?>

                    <tr>
                        <td>
                            <?= formatDate($transiaction['date']) ?>
                        </td>
                        <td>
                            <?= $transiaction['check'] ?>
                        </td>
                        <td>
                            <?= $transiaction['desc'] ?>
                        </td>
                        <td>
                            <?= formatDollarAmount($transiaction['amount']) ?>
                        </td>

                    </tr>

                <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td>
                    <?= formatDollarAmount($totalAmount['incomeTotals']) ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td>
                    <?= formatDollarAmount($totalAmount['outcomeTotals']) ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td>
                    <?= formatDollarAmount($totalAmount['netTotals']) ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>