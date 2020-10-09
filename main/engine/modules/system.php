<?
/**
 * System
 */
class system
{
    public function random_str($value=30)
    {
        return substr(str_shuffle('0123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $value);
    }
}