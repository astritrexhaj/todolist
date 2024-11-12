<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use App\Models\User;

class Task extends Model
{

    public function user(): BelongsToMany 
    {
        return $this->belongsToMany(User::class);
    }
    
    public function scopeFilterByRequest($query, Request $request)
    {
        // Check if status filter is present
        if ($request->has('status')) {
            // dd($request->get('status'));
            $status = $request->get('status');
            if($status != null){
                $query->where('status', '=', $request->get('status'));
            }
            
        }

        // Check if priority filter is present
        if ($request->has('priority')) {
            // dd($request->get('priority'));
            $priority = $request->get('priority');
            if($priority != null){
                $query->where('priority', '=', $request->get('priority'));
            }
        }

        return $query;
    }

}
