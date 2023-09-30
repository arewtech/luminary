<?php

namespace App\Charts;

use App\Models\RentLog;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class MonthlyBookRentChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $years = date('Y');
        $months = date('m');

        for ($i = 1; $i <= $months; $i++) {
            $data[] = RentLog::where('user_id', auth()->user()->id)->whereMonth('created_at', $i)->whereYear('created_at', $years)->count();
            $dataMonth[] = Carbon::create($years, $i)->format('F');
        }

        return $this->chart->lineChart()
            ->setTitle('Book Rent Chart')
            ->setSubtitle('Monthly Book Rent Chart, ' . $years)
            ->addData('Rent', $data)
            ->setXAxis($dataMonth);
    }
}