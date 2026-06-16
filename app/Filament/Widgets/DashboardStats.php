<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Project;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Bookings', Booking::count())
                ->description('All submitted booking requests')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),

            Stat::make('New Bookings', Booking::where('status', 'new')->count())
                ->description('Need admin follow-up')
                ->descriptionIcon('heroicon-m-bell-alert')
                ->color('danger'),

            Stat::make('Published Projects', Project::where('status', 'published')->count())
                ->description('Visible on Works page')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('success'),

            Stat::make('Published Services', Service::where('status', 'published')->count())
                ->description('Active service listings')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('info'),
        ];
    }
}