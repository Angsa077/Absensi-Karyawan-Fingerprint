<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function create()
    {
        return view('template.create');
    }

    public function store(Request $request)
    {
        $template1_vx9 = "ocosgoulTUEdNKVRwRQ0I27BDTEkdMEONK9KQQunMVSBK6VPLEENk9MwgQ+DP3PBC1FTXEEG4ihpQQQ3vFQBO4K+WwERYilHAQ8ztktBEBbKQ0ELDtJrwQ7dqCiBCz+/IgEGKrBjQQhEO0zBFQNDQYEKFbhrQQdLF1wBDxclfUELMNFXwQRvvmHBCslKUAEZfU1OQRzmIU5BXRW0eoEKPMltgQnQGUyBJQSfRIEUSzIdAQ45l3gBByHUTMEJ5yVhQQmi0UZBFHvYPUEGeKxTAQ6rFGNBCIYURoEOZS9VwR+1M4RoE5m0DRUTF8DHd6HdqxHAxWmj393M28DDX2FkanKi/t7LGsDCWqGarmt1BaL/25nAwVaiipu/cgcQGKG6mcDBU6KYmr5wChQcobmJIsDBUKKJmZ1uExyi+ZaYwMFMgU2CQCSinYdnJsDBR4Ghl3Q4owa3dnfAwUamdlZlR5p2Zi7AwUSndERlfOpWZlfAwUOiQzVkLDhDopRUVTLAwT2iQ0ZjIzVMolNFRcDBN6I0ZlQebVaiEjRVwMEyolVVUxVxXKEBRUTAwS+iZVYyD3JhoQJFTMDBLKJlVUIKcWShBVVTwMIkoWVkFQhyaaEVZ1rAwh6hVlUPAW+iNGd3wMIToWdlBnWiRWZ3aMDDCqRmZjRpZmrAxASjd2Vnh2/gAA==";

        $data = [
            'pin' => rand(1, 9999),
            'finger_id' => 0,
            'size' => 514,
            'valid' => 1,
            'template' => $template1_vx9
        ];

        $result = setUserTemplate($data);
        if ($result) {
            return response()->json(['success' => 'User Template Created successfully']);
        } else {
            return response()->json(['error' => 'Failed to create user template'], 500);
        }
    }
}
