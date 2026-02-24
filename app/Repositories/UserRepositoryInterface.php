<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getTodayCount(): int;
    public function getThisWeekCount(): int;
    public function getThisMonthCount(): int;
    public function getTotalCount(): int;
    public function getAyliqUserSayisi(): Collection;

}