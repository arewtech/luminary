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
            ->setColors(['#4e73df', '#f6c23e', '#e74a3b'])
            ->setDataLabels(true)
            ->setWidth(450)
            ->setHeight(450);
    }
}
