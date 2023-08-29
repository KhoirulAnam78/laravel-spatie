<?php

namespace App\Repositories\User;

interface UserInterface
{
  function getDataByUserId($id);
  function getAllUser();
}
