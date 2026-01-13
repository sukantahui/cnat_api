<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Helper\CommonHelper;

class CustomVoucher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Prevent double generation in the same request
    public static bool $locked = false;
    public static string $cachedNumber = '';

    public static function generate(string $voucherName, $minDigits = 4, string $prefix = "")
    {
        // If already generated once in this request → return same number
        if (self::$locked) {
            return self::$cachedNumber;
        }

        $year = CommonHelper::getCurrentAccountingYear();

        // Lock row → no duplicates, concurrency safe
        $voucher = self::where('voucher_name', $voucherName)
            ->where('accounting_year', $year)
            ->lockForUpdate()
            ->first();

        if (!$voucher) {
            $voucher = self::create([
                'voucher_name' => $voucherName,
                'accounting_year' => $year,
                'last_counter' => 0,
                'prefix' => $prefix,
                'min_digits' => $minDigits,
            ]);
        }

        // Increment inside transaction
        $voucher->last_counter++;
        $voucher->save();

        // Final formatted number
        $number = $voucher->prefix . '-' .
            str_pad($voucher->last_counter, $voucher->min_digits, '0', STR_PAD_LEFT) .
            '-' . $voucher->accounting_year;

        // Lock for whole request
        self::$locked = true;
        self::$cachedNumber = $number;

        return $number;
    }
}
