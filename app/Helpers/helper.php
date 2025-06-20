<?php

namespace App\Helpers;

use App\Models\Bank;

class Helper
{
    public static function IDGenerator($model, $trow, $prefix, $length = 4)
    {
        $data = $model::orderBy('id', 'desc')->first();
        if (!$data) {
            $og_length = $length;
            $last_number = '';
        } else {
            $code = substr($data->$trow, strlen($prefix) + 1);
            $actual_last_number = ($code / 1) * 1;
            $increment_last_number = ((int)$actual_last_number) + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= "0";
        }
        return $prefix . '-' . $zeros . $last_number;
    }

    public static function bankAccountBalance($id, $amount, $type)
    {
        $bankAccount = Bank::find($id);
        if ($bankAccount) {
            if ($type == 'credit') {
                $bankAccount->balance += $amount;
                $bankAccount->save();
            } elseif ($type == 'debit') {
                $bankAccount->balance -= $amount;
                $bankAccount->save();
            }
        }
    }
    public static function bankReversalBalance($id, $amount, $type)
    {
        $bankAccount = Bank::find($id);
        if ($bankAccount) {
            if ($type == 'credit') {
                $bankAccount->balance += $amount;
                $bankAccount->save();
            } elseif ($type == 'debit') {
                $bankAccount->balance -= $amount;
                $bankAccount->save();
            }
        }
    }
    public static function getRate($account_id)
    {
        $account = Bank::find($account_id);
        return $account->rate;
    }
}
