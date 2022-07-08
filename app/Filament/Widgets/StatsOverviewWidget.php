<?php

namespace App\Filament\Widgets;

use Akaunting\Money\Money;
use App\Models\Order;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use DB;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Collection;
use Str;

class StatsOverviewWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            $this->getPendingOrdersCard(),
            $this->getRevenueCard(),
            $this->getUserCard()
        ];
    }

    private function getPendingOrdersCard(): Card
    {
        $count = Order::query()
            ->whereNull('completed_at')
            ->count();

        return Card::make('Pending orders', number_format($count))
            ->description('Orders need fulfilling')
            ->url('#');
    }

    private function getRevenueCard(): Card
    {
        return Card::make('Revenue', Money::GBP(0))
            ->description('0% increase')
            ->descriptionIcon('heroicon-s-trending-down')
            ->chart([
                7,
                2,
                10,
                3,
                15,
                4,
                17
            ])
            ->color('danger');
    }

    private function getUserCard(): Card
    {
        $users = $this->getNewUsers();

        $values = $users->values();

        $previous = $values->splice(29, 1)->first();
        $current = $values->last();
        $difference = $current - $previous;

        $increase = $difference > 0;
        $difference = abs($difference);

        return Card::make('New users', number_format($current))
            ->description(
                $increase
                    ? $difference . ' increase'
                    : $difference . ' decrease'
            )
            ->descriptionIcon(
                $increase
                    ? 'heroicon-s-trending-up'
                    : 'heroicon-s-trending-down'
            )
            ->chart($values->all())
            ->color(
                $increase
                    ? 'success'
                    : 'danger'
            );
    }

    private function getNewUsers(): Collection
    {
        $users = DB::table('users')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as users'))
            ->whereRaw('created_at BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')
            ->groupBy('date')
            ->get()
            ->collect()
            ->mapWithKeys(fn($r) => [
                $r->date => $r->users
            ]);

        $allUsers = collect();

        $today = CarbonImmutable::today();
        $current = $today->subDays(30);
        while ($current->lessThanOrEqualTo($today)) {
            $key = $current->format('Y-m-d');

            $allUsers->put($key, $users->get($key, 0));

            $current = $current->addDay();
        }

        return $allUsers;
    }
}
