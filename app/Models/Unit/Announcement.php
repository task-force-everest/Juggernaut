<?php

namespace App\Models\Unit;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Unit\Announcement
 *
 * @property int $id
 * @property int $user_id
 * @property string $subject
 * @property string $message
 * @property string $category
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read string $action_buttons
 * @property-read string $delete_button
 * @property-read string $edit_button
 * @property-read string $show_button
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unit\Announcement whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unit\Announcement whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unit\Announcement whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unit\Announcement whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unit\Announcement whereSubject($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unit\Announcement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Unit\Announcement whereUserId($value)
 * @mixin \Eloquent
 */
class Announcement extends Model
{

    protected $fillable = ['subject','message','category'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.announcements.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="View"></i></a> ';
    }
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.announcements.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.announcements.destroy', $this).'"
             data-method="delete"
             data-trans-button-cancel="Cancel"
             data-trans-button-confirm="Delete"
             data-trans-title="Are you sure?"
             class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a> ';

    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return
           // $this->getShowButtonAttribute().
            $this->getEditButtonAttribute().
            $this->getDeleteButtonAttribute();
    }

}
