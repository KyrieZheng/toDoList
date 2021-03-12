<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function addItem(Request $request)
    {
        $name = $request->get('name', 'test');
        $data = [
            [
                'name' => $name,
                'status' => 0
            ]
        ];
        DB::table('td_item')->insert($data);
        return $this->success('添加成功');
    }

    public function getItem()
    {
        $data = DB::table('td_item')->get();
        return $this->success('', 200, $data);
    }

    public function deleteItem($id)
    {
        DB::table('td_item')->where('id', $id)->delete();
        return $this->success();
    }

    public function updateItem(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');

        $item = DB::table('td_item')
            ->where('id', $id)
            ->first();

        if (!empty($item)) {
            DB::table('td_item')
                ->where('id', $id)
                ->update([
                    'status' => $status
                ]);
        }

        return $this->success();
    }
}
