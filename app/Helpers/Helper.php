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
