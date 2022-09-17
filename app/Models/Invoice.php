<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'twinmoti_invoice.invoices';

    protected $fillable = ['pay_num','situation','user_id','creator_id','address_id','client_address','shipping','sub_total','grand_total','due_date','pay_date','production_date','getready_date','send_date','finish_date'];


    protected $appends = [
        'date',
        'date_n',
        'price_fa'
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function creator()
    {
        return $this->belongsTo('App\Models\User')->select('id','name');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address')->withTrashed();
    }


    public function detail()
    {
        return $this->hasOne('App\Models\InvoiceDetail', 'invoice_id');
    }

    public function survey()
    {
        return $this->hasOne(Survey::class);
    }


    public function getDueDateAttribute($value){
        return Verta($value)->format('l d F Y');
    }

    public function getPayDateAttribute($value){
        if (!$value) {return null;}
        return Verta($value)->format('l d F Y ساعت H:i');
    }

    public function getDateAttribute(){
        return Verta($this->attributes['created_at'])->format('d F Y');
    }

    public function getDateNAttribute(){
        return Verta($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getPriceFaAttribute(){
        return notowo($this->sub_total / 10, 'fa')->currency('تومان');
    }

    public function getCreatedAtAttribute($value){
        return Verta($value)->format('l d F Y ساعت H:i');
    }

}
