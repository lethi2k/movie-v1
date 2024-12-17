<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class BookingEnum extends Enum
{
    const STATUS = [
        'WAIT_CONFIRM' => 'Chờ xác nhận',
        'CONFIRM' => 'Đã xác nhận',
        'ARRIVED' => 'Tới nơi',
        'PART_ARRIVED' => 'Đã tới 1 phần',
        'EAT' => 'Đã ngồi',
        'APPETIZER' => 'Món khai vị',
        'MAIN_DISHES' => 'Món chính',
        'DESSERT' => 'Tráng miệng',
        'LATE' => 'Muộn',
        'COMPLETE' => 'Hoàn thành',
        'CANCEL' => 'Đã hủy',
        'NO_CONFIRM' => 'Không xác nhận'
    ];

    const STATUS_CURRENTLIS = [
        'ARRIVED',
        'PART_ARRIVED',
        'EAT',
        'APPETIZER',
        'MAIN_DISHES',
        'DESSERT',
        'LATE'
    ];

    public static function listStatus($type = '')
    {
        return self::STATUS;
    }




    public static function statusName($status)
    {
        switch ($status) {
            case "WAIT_CONFIRM":
                return 'Chờ xác nhận';
            case "CONFIRM":
                return 'Đã xác nhận';
            case "ARRIVED":
                return 'Tới nơi';
            case "PART_ARRIVED":
                return 'Đã tới 1 phần';
            case "EAT":
                return 'Đã ngồi';
            case "APPETIZER":
                return 'Món khai vị';
            case "MAIN_DISHES":
                return 'Món chính';
            case "DESSERT":
                return 'Tráng miệng';
            case "LATE":
                return 'Muộn';
            case "COMPLETE":
                return 'Hoàn thành';
            case "CANCEL":
                return 'Đã hủy';
            case "NO_CONFIRM":
                return 'Không xác nhận';
            default:
                return 'Trạng thái không xác định';
        }
    }
}
