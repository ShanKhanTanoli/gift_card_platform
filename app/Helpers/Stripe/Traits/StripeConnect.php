<?php

namespace App\Helpers\Stripe\Traits;

use Exception;
use Illuminate\Support\Facades\Auth;

trait StripeConnect
{
    public static function CreateIndividualAccount($country, $email, $first_name, $last_name, $phone, $dob_day, $dob_month, $dob_year)
    {
        try {
            if ($stripe = self::Client()) {
                $account = $stripe->accounts->create(
                    [
                        'country' => $country,
                        'type' => 'express',
                        'email' => $email,
                        'capabilities' => [
                            'card_payments' => ['requested' => true],
                            'transfers' => ['requested' => true],
                        ],
                        'business_type' => 'individual',
                        'individual' => [
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'email' => $email,
                            'phone' => $phone,
                            'dob' => [
                                'day' => $dob_day,
                                'month' => $dob_month,
                                'year' => $dob_year,
                            ],
                        ],
                    ]
                );
                Auth::user()->update(['account_id' => $account->id]);
                session()->flash('success', 'Account created Successfully.');
                return $account;
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

    public static function CreateCompanyAccount($country, $email, $name)
    {
        try {
            if ($stripe = self::Client()) {
                $account = $stripe->accounts->create(
                    [
                        'country' => $country,
                        'type' => 'express',
                        'email' => $email,
                        'capabilities' => [
                            'card_payments' => ['requested' => true],
                            'transfers' => ['requested' => true],
                        ],
                        'business_type' => 'company',
                        'company' => [
                            'name' => $name,
                        ],
                    ]
                );
                Auth::user()->update(['account_id' => $account->id]);
                session()->flash('success', 'Account created Successfully.');
                return $account;
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

    public static function CreateAccountLink($account, $refresh_url, $return_url, $type)
    {
        try {
            if ($stripe = self::Client()) {
                $link = $stripe->accountLinks->create([
                    'account' => $account,
                    'refresh_url' => $refresh_url,
                    'return_url' => $return_url,
                    'type' => $type,
                ]);
                return redirect($link->url);
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

    public static function CreateLoginLink($account)
    {
        try {
            if ($stripe = self::Client()) {
                $link = $stripe->accounts->createLoginLink($account, []);
                return redirect($link->url);
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

    public static function RetrieveAccount($account)
    {
        try {
            if ($stripe = self::Client()) {
                return $stripe->accounts->retrieve($account, []);
            } else return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
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
            return session()->flash('error', 'Something went wrong.Refresh the page and try again later.');
        }
    }
}
