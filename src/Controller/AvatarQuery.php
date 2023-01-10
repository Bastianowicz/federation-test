<?php declare(strict_types=1);
namespace App\Controller;

use App\Controller\Type\AvatarType;
use Overblog\GraphQLBundle\Annotation as GQL;
use Overblog\GraphQLBundle\Definition\Resolver\QueryInterface;


#[GQL\Provider]
class AvatarQuery implements QueryInterface
{

	#[GQL\Query(name: 'avatar')]
	public function avatar(int $user_id): AvatarType
	{
        return new AvatarType(identifier: 1234, user_id: $user_id);
	}
}
