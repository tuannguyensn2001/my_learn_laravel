<?php


namespace App\Defines;


class Level
{

    const _EASY = 'EASY';
    const _MEDIUM = 'MEDIUM';
    const _HARD = 'HARD';


    public static function get(): array
    {
        return [
            self::_EASY => trans('level.easy'),
            self::_MEDIUM => trans('level.medium'),
            self::_HARD => trans('level.hard'),
        ];
    }

}
