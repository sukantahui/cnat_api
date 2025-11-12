<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helper\CommonHelper;

class CustomVoucher extends Model
{
    /** @use HasFactory<\Database\Factories\CustomVoucherFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public static function generate(string $voucherName, $minDigits=4, string $prefix="")
    {
        $accountingYear = CommonHelper::getCurrentAccountingYear();

        $voucher = self::firstOrCreate(
            ['voucher_name' => $voucherName, 'accounting_year' => $accountingYear],
            ['last_counter' => 0, 'prefix'=>$prefix, 'min_digits'=> $minDigits]
        );
        $voucher->last_counter += 1;
        $voucher->save();

        $counter = $voucher->prefix.'-'.str_pad($voucher->last_counter, $voucher->min_digits, '0', STR_PAD_LEFT).'-'.$voucher->accounting_year;
        return $counter;
    }
}
