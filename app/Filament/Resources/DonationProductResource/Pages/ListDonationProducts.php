<?php

namespace App\Filament\Resources\DonationProductResource\Pages;

use App\Filament\Resources\DonationProductResource;
use App\Models\DonationProduct;
use Carbon\Carbon;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDonationProducts extends ListRecords
{
    protected static string $resource = DonationProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('refresh')
                ->label('Refresh')
                ->icon('heroicon-o-information-circle')
                ->action(fn() => $this->refresh())
                ->requiresConfirmation()
                ->modalSubheading('Are you sure you want to refresh all the donations? This will sync with the latest Stripe store'),

            Actions\Action::make('dashboard')
                ->label('Stripe dashboard')
                ->url('https://dashboard.stripe.com/dashboard')
                ->openUrlInNewTab()
                ->color('secondary')
        ];
    }

    protected function refresh()
    {
        DonationProduct::query()->delete();

        $stripe = auth()->user()->stripe();

        $prices = $stripe->prices->all([
            'active' => true,
            'limit' => 100
        ]);

        foreach ($prices->autoPagingIterator() as $price) {
            $product = $stripe->products->retrieve($price->product);

            if(!$product->active) {
                continue;
            }

            DonationProduct::create([
                'name' => $product->name,
                'stripe_id' => $price->id,
                'price' => $price->unit_amount,
                'amount' => $product->metadata->amount ?? 0,
                'created_at' => new Carbon($product->created),
                'updated_at' => new Carbon($product->updated),
            ]);
        }

        $this->notify('success', 'Donations have been refreshed');
    }
}
