<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationProduct;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DonationController extends Controller
{
    public function index()
    {
        $products = DonationProduct::query()
            ->orderBy('price')
            ->get();

        return view('donate.index', [
            'products' => $products
        ]);
    }

    public function checkout(Request $request, $id)
    {
        $product = DonationProduct::query()
            ->findOrFail($id);

        $successUrl = route('donate.checkout.success')
            . '?session_id={CHECKOUT_SESSION_ID}&user_id='
            . $request->user()->id;

        return $request->user()->checkout([$product->stripe_id => 1], [
            'success_url' => $successUrl,
            'cancel_url' => route('donate.index')
        ]);
    }

    public function success(Request $request)
    {
        $inputs = $this->validate($request, [
            'session_id' => [
                'required',
                'string'
            ],
            'user_id' => [
                'required',
                'integer'
            ]
        ]);

        $user = $request->user();

        if ($this->donationAlreadyProcessed($user, $inputs['session_id'])) {
            return redirect()->route('store.index');
        }

        $items = $user->stripe()->checkout->sessions->allLineItems($inputs['session_id']);

        $amounts = $this->getItemAmounts($items);

        $products = DonationProduct::query()
            ->whereIn('stripe_id', array_keys($amounts))
            ->get();

        $total = $this->getTotal($products, $amounts);

        $this->createDonation($user, $inputs, $total);

        $user->increment('balance', $total);

        $this->updateUserRoles($user);

        return redirect()->route('store.index');
    }

    private function updateUserRoles(User $user): void
    {
        $roles = Role::query()
            ->whereNotNull('requirement')
            ->orderBy('weight')
            ->get();

        $currentRoles = $user->roles
            ->filter(fn(Role $role) => $role->requirement !== null)
            ->map(fn(Role $role) => $role->id);

        $totalDonations = (int)$user->donations()
            ->sum('total');

        $highestRole = $roles->last(fn(Role $role) => $role->requirement < $totalDonations);

        foreach ($roles as $role) {
            if ($role->id === $highestRole->id) {
                break;
            }

            if (!$currentRoles->contains($role->id)) {
                continue;
            }

            $user->removeRole($role);
        }

        $user->assignRole($highestRole);
    }

    private function getTotal(Collection $products, array $amounts): int
    {
        $balance = 0;

        foreach ($amounts as $id => $amount) {
            $product = $products->firstWhere('stripe_id', '=', $id);
            if ($product === null) {
                continue;
            }

            $balance += $product->amount * $amount;
        }

        return $balance;
    }

    private function donationAlreadyProcessed(User $user, string $sessionId): bool
    {
        return Donation::query()
            ->where('session_id', '=', $sessionId)
            ->where('user_id', '=', $user->id)
            ->exists();
    }

    private function createDonation(User $user, array $inputs, int $total): void
    {
        $donation = new Donation([
            'session_id' => $inputs['session_id'],
            'total' => $total
        ]);

        $donation->user()->associate($user);

        $donation->save();
    }

    private function getItemAmounts($items): array
    {
        $ids = [];

        foreach ($items->data as $item) {
            $id = $item->price->id;
            if (!isset($ids[$id])) {
                $ids[$id] = 0;
            }

            $ids[$id] += $item->quantity;
        }

        return $ids;
    }
}
