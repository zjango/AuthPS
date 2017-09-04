<?php
namespace Zjango\Verify\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
	protected $prefix = '';

	public function __construct(array $attributes = array())
	{
		parent::__construct($attributes);

		$this->prefix = config('verify.prefix', '');
		$this->table = $this->prefix . $this->getTable();
	}
}
