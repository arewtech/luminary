<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class StatusBooksChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($data): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
            ->setTitle('LB | Status Books')
            ->setSubtitle(\Carbon\Carbon::now()->translatedFormat("F Y"))
            ->addData($data)
            ->setLabels(['Available', 'Unavailable', 'Lost'])
            // hijau, kuning, merah
            ->setColors(['#2ecc71', '#f1c40f', '#e74c3c'])
            ->setDataLabels(true)
            ->setWidth(450)
            ->setHeight(450);
    }
}
