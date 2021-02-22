<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;


    protected $table = 'portfolios';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function featuredImage()
    {
        return $this->hasOne('App\Models\PortfolioImage', 'portfolio_id', 'id')
            ->where('featured', 1);
    }
}
