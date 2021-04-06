<?php

namespace App\Helpers;

use App\Models\ActivityLog as ActivityLogModel;

class ActivityLog
{
    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url']     = request()->fullUrl();
    	$log['method']  = request()->method();
    	$log['ip']      = request()->getClientIp();
    	$log['agent']   = request()->userAgent(); // header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : 1;
    	ActivityLogModel::create($log);
    }

    public static function activityLogLists()
    {
    	return ActivityLogModel::latest()->get();
    }

}