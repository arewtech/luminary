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
            ->setColors(['#4e73df', '#e74a3b', '#000000'])
            ->setDataLabels(true)
            ->setWidth(450)
            ->setHeight(450);
    }
}
