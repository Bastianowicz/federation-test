<?php declare(strict_types=1);

namespace App\Controller\Type;

use Overblog\GraphQLBundle\Annotation as GQL;
use Overblog\GraphQLBundle\Error\UserError;


#[GQL\Type(name: 'Avatar')]
#[GQL\Description('Avatar Antwort')]
class AvatarType
{
	public function __construct(

		#[GQL\Field(type: "ID!")]
		#[GQL\Description('Gallery-ID des Bildes')]
		public readonly int $identifier,

		// User-ID geben wir nicht außen, wir brauchen sie nur um das Profil einbinden zu können
		public readonly int $user_id,
	)// @formatter:on
	{
	}
}
