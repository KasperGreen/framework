<?php

/**
 * @copyright  Frederic G. Østby
 * @license    http://www.makoframework.com/license
 */

namespace mako\database\midgard\relations;

use mako\database\connections\Connection;
use mako\database\midgard\ORM;
use mako\database\midgard\relations\HasOne;
use mako\database\midgard\relations\HasOneOrManyPolymorphicTrait;

/**
 * Has one polymorphic relation.
 *
 * @author  Frederic G. Østby
 */

class HasOnePolymorphic extends HasOne
{
	use HasOneOrManyPolymorphicTrait {
		HasOneOrManyPolymorphicTrait::__construct as constructor;
	}

	/**
	 * Constructor.
	 *
	 * @access  public
	 * @param   \mako\database\connections\Connection  $connection       Database connection
	 * @param   \mako\database\midgard\ORM             $parent           Parent model
	 * @param   \mako\database\midgard\ORM             $related          Related model
	 * @param   string                                 $polymorphicType  Polymorphic type
	 */

	public function __construct(Connection $connection, ORM $parent, ORM $related, $polymorphicType)
	{
		$this->constructor($connection, $parent, $related, $polymorphicType);
	}
}