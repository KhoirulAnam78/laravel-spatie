<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $result = $this->userRepository->getAllUser();
        return response()->json([
            'code' => '200',
            'message' => 'Success',
            'date' => $result
        ]);
    }

    public function show($id)
    {
        $result = $this->userRepository->getDataByUserId($id);
        return response()->json([
            'code' => '200',
            'message' => 'Success',
            'date' => $result
        ]);
    }
}
