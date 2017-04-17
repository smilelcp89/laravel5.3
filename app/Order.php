<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

	/**
	 * 默认情况下，Eloquent 期望created_at和updated_at已经存在于数据表中，
	 * 如果你不想要这些 Laravel 自动管理的列，在模型类中设置$timestamps属性为false：
	 *
	 * 表明模型是否应该被打上时间戳
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * 模型日期列的存储格式
	 *
	 * @var string
	 */
	protected $dateFormat = 'U';

	/**
	 * 使用数据库连接的名称，如果没有，使用默认
	 *
	 * @var string
	 */
	//protected $connection = 'connection-name';

	/**
	 * 可以被批量赋值的属性.（能够写入数据库的字段集合）
	 *
	 * @var array
	 */
	protected $fillable = ['order_no','order_price'];

	/**
	 * 不能被批量赋值的属性（不能够写入数据库的字段集合，就算写入数据的时候有带上该字段，但是一样会被过滤）
	 */
	//protected $guarded = ['order_price'];

	/**
	 * 关联模型
	 */
	public function user()
	{
		return $this->belongsTo('app\User','user_id','id');
	}

	/**
	 * 在数组中隐藏的属性（输出的时候字段会被过滤）
	 *
	 * @var array
	 */
	//protected $hidden = ['order_no'];

	/**
	 * 在数组中显示的属性（只输出下面的字段）
	 *
	 * @var array
	 */
	//protected $visible = ['order_no','user'];

	/**
	 * 追加到模型数组表单的访问器
	 *
	 * @var array
	 */
	//protected $appends = ['is_admin'];

	/**
	 * 为用户获取管理员标识
	 *
	 * @return bool
	 */
	//public function getIsAdminAttribute()
	//{
	//	return $this->attributes['admin'] == 'yes';
	//}
}
