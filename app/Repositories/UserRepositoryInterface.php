<?php
namespace App\Repositories;


interface UserRepositoryInterface
{
    public function getTodayCount(): int;
    public function getThisWeekCount(): int;
    public function getThisMonthCount(): int;
    public function getTotalCount(): int;

}