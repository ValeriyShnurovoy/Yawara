<?php

namespace App\Http\Services;

use App\Helpers\Constants;
use App\Configuration;
use App\UserRoles;

class AccessService
{

	public function getAccessMatrix(): array
	{
		$matrix = [];
		$roles = UserRoles::all();
		$adminRouters = Constants::ADMIN_ROUTERS;

		foreach ($adminRouters as $router) {

			$configurations = Configuration::where('controller', $router)->get();

			foreach ($roles as $role) {
				$matrix[$router][$role->id] = $this->isIssetAccess($role->id, $configurations);
			}			
		}

		return $matrix;
	}


	protected function isIssetAccess($role, $configurations): bool
	{
		$result = false;

		foreach ($configurations as $configuration) {

			if ($configuration->role_id == $role) {
				$result = true;
				break;
			}
		}

		return $result;
	}
}