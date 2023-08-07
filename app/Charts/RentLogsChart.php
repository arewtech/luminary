<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class RentLogsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($data): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
             ->setTitle('LB | Rent Logs')
            ->setSubtitle(\Carbon\Carbon::now()->translatedFormat("F Y"))
            ->addData($data)
            ->setLabels(['Returned', 'Not Returned', 'Late'])
            ->setColors(['#2ecc71', '#f1c40f', '#e74c3c'])
            ->setDataLabels(true)
            ->setWidth(450)
            ->setHeight(450);
    }
}
