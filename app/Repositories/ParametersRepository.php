<?php

namespace App\Repositories;

use App\Parameter;


class ParametersRepository
{
  /**
   * Получить все задачи заданного пользователя.
   *
   * @param  User  $user
   * @return Collection
   */
  public function forItem(Item $item)
  {
    return $item->parameters()              
              ->get();
  }
}