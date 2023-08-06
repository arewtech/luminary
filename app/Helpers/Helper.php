<?php
function getStatusColor($status)
{
    switch ($status) {
        case "returned":
            return "bg-success";
        case "not returned":
            return "bg-warning";
        default:
            return "bg-danger";
    }
}

function formatRupiah($nominal, $prefix = null)
{
    // prefix ini adalah simbol mata uang, misalnya Rp. atau $ atau €
    $prefix = $prefix ?? "Rp. ";
    // kenapa ?? karena jika prefix tidak diisi, maka akan otomatis diisi dengan Rp.
    return $prefix . number_format($nominal, 0, ",", ".");
    // kenapa harus di return ?
    // karena kita akan memanggil function ini di view, dan kita akan menampilkan hasilnya di view.
    // composer dump-autoload => untuk mengupdate file helper.php
}
