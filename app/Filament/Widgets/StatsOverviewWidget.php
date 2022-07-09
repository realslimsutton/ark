<?php

namespace App\Filament\Widgets;

use Akaunting\Money\Money;
use App\Models\Order;
use App\Models\Vault;
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
            $this->getDonationsCard(),
            $this->getUsersCard()
        ];
    }

    private function getPendingOrdersCard(): Card
    {
        $count = Order::query()
            ->whereNull('completed_at')
            ->count();

        return Card::make('Pending orders', number_format($count))
            ->description('Orders need fulfilling')
            ->url(route('filament.resources.store/orders.index'));
    }

    private function getDonationsCard(): Card
    {
        $donations = $this->getNewDonations();

        $values = $donations->values();

        $previous = $values->splice(29, 1)->first();
        $current = $values->last();
        $difference = $current - $previous;

        $increase = $difference >= 0;
        $difference = abs($difference);

        return Card::make('New donations', number_format($current))
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

    private function getUsersCard(): Card
    {
        $users = $this->getNewUsers();

        $values = $users->values();

        $previous = $values->splice(29, 1)->first();
        $current = $values->last();
        $difference = $current - $previous;

        $increase = $difference >= 0;
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

    private function getNewDonations(): Collection
    {
        $donations = DB::table('donations')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as donations'))
            ->whereRaw('created_at BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')
            ->groupBy('date')
            ->get()
            ->collect()
            ->mapWithKeys(fn($r) => [
                $r->date => $r->donations
            ]);

        $allDonations = collect();

        $today = CarbonImmutable::today();
        $current = $today->subDays(30);
        while ($current->lessThanOrEqualTo($today)) {
            $key = $current->format('Y-m-d');

            $allDonations->put($key, $donations->get($key, 0));

            $current = $current->addDay();
        }

        return $allDonations;
    }
}
