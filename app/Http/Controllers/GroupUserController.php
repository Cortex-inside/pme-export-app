<?php

namespace PMEexport\Http\Controllers;

use Artesaos\Defender\Facades\Defender;
use PMEexport\Http\Requests\CreateCaeRequest;
use PMEexport\Http\Requests\UpdateCaeRequest;
use PMEexport\Models\User;
use PMEexport\Repositories\CaeRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use PMEexport\Services\UserService;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GroupUserController extends AppBaseController
{
    public function index(){
        $groups = Defender::rolesList();
        return view('group_user.index',compact('groups'));
    }
}
