<?php

namespace App\Helpers\Stripe\Traits;

use Exception;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Models\ClientVoucher;
use FrittenKeeZ\Vouchers\Models\VoucherRecharge;

trait StripeCard
{
    public static function CreateCardToken($holder_name, $number, $exp_month, $exp_year, $cvc)
    {
        try {
            if ($stripe = self::Client()) {
                $token = $stripe->tokens->create([
                    'card' => [
                        'name' => $holder_name,
                        'number' => $number,
                        'exp_month' => $exp_month,
                        'exp_year' => $exp_year,
                        'cvc' => $cvc,
                    ],
                ]);
                return $token;
            } else return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function RechargeVoucher($card_data, $amount, $currency, $voucher, $user_id)
    {
        try {
            if ($stripe = self::Client()) {

                $token = $stripe->tokens->create([
                    'card' => $card_data,
                ]);

                $charge = $stripe->charges->create([
                    'amount' => $amount,
                    'currency' => $currency,
                    'source' => $token->id,
                ]);

                VoucherRecharge::create([
                    'stripe_id' => $charge->id,
                    'voucher_id' => $voucher->id,
                    'user_id' => $user_id,
                    'amount' => $charge->amount,
                ]);

                $voucher->update([
                    'balance' => $voucher->balance + $charge->amount,
                ]);

                return session()->flash('success', 'Successfully recharged');
            } else return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }

    public static function ChargeClientCard($card, $amount, $currency, $application_fee_amount, $comission_percentage, $stripe_account,$voucher_id)
    {
        try {
            if ($stripe = self::Client()) {
                $token = $stripe->tokens->create([
                    'card' => $card,
                ]);
                $charge = $stripe->charges->create([
                    'amount' => $amount * 100,
                    'currency' => $currency,
                    'source' => $token->id,
                    'application_fee_amount' => $application_fee_amount * 100,
                ], ['stripe_account' => $stripe_account]);

                ClientVoucher::create([
                    'stripe_id' => $charge->id,
                    'voucher_id' => $voucher_id,
                    'user_id' => Auth::user()->id,
                    'price' => $amount,
                    'currency' => $currency,
                    'comission_percentage' => $comission_percentage,
                    'final_amount' => $amount-$application_fee_amount,
                ]);

                return true;

            } else return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return $e->getMessage();
        } catch (\Stripe\Exception\RateLimitException $e) {
            return $e->getMessage();
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return $e->getMessage();
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return $e->getMessage();
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
