namespace App\Validation;

use Codeigniter\Validation\Rules;

class MyRules extends Rules
{
    public function dob_before_2024(string $str, string &$error = null): bool
    {
        $currentYear = date('Y');
        $birthYear = date('Y', strtotime($str));
        if ($birthYear >= 2024) {
            $error = 'The Date of Birth must be before the year 2024.';
            return false;
        }
        return true;
    }
}