<?php
namespace App\Utility;
use Illuminate\Support\Facades\DB;
class Helper
{
    public static function number_with_dot($params){
        $number = number_format($params,0,'','.');
        return $number;
    }

    public static function toastr($type, $message)
    {
        $notifications = session()->get('toastr', []);
        $notifications[] = ['type' => $type, 'message' => $message];
        session()->flash('toastr', $notifications);
    }

    public static function extractNumber($string) {
        // Use regular expression to extract the first sequence of digits
        if (preg_match('/\d+/', $string, $matches)) {
            return (int)$matches[0]; // Return the matched number as an integer
        }
        return 0; // Default to 0 if no number is found
    }
}
