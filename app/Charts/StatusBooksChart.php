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
            ->setColors(['rgb(0, 227, 150)', 'rgb(254, 176, 25)', 'rgb(255, 69, 95)'])
            ->setDataLabels(true)
            ->setWidth(450)
            ->setHeight(450);
    }
}
