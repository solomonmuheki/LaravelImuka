<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    //
    protected $table = 'deals';

    protected $fillable = ['user_id','companyName', 'companyType','companyIndustry', 'Address ','telephone','rating', 'email','AmountToRaise', 'image','detailedDescription', 'businessPlan','MOU', 'certificateOfRegistration','financialStatement', 'cashFlowStatement ','contractDocument', ' auditedAccounts'];
}
