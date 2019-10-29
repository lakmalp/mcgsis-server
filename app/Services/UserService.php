<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserService
{
  public static function hasPrincipal()
  {
    if (User::where('usertype', '=', "principal")->exists()) {
      return true;
    }
    return false;
  }
}
