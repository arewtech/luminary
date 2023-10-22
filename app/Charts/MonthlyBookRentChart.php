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

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $years = date('Y');
        $months = date('m');

        for ($i = 1; $i <= $months; $i++) {
            $data[] = RentLog::whereUserId(auth()->id())->whereMonth('created_at', $i)->whereYear('created_at', $years)->count();
            $dataMonth[] = Carbon::create($years, $i)->format('F');
        }
        // dd($data);
        return $this->chart->areaChart()
            ->setTitle('Book Rent Chart')
            ->setSubtitle('Monthly Book Rent Chart, ' . Carbon::now()->format('F') . ' ' . $years)
            ->addData('Rent', $data)
            ->setXAxis($dataMonth);
    }
}
