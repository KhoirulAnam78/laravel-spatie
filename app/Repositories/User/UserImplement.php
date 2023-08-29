<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserImplement implements UserInterface
{
  public function getDataByUserId($id)
  {
    return DB::table('users')->find($id);
  }

  public function getAllUser()
  {
    return DB::table('users')->get();
  }
}
