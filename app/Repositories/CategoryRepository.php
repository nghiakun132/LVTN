<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function getModel()
    {
        return Category::class;
    }
    public function show(&$data, $parent_id)
    {
        $menuTree = [];
        foreach ($data as $key => $value) {
            if ($value['parent_id'] == $parent_id) {
                if ($value['parent_id'] == $parent_id) {
                    $children = $this->show($data, $value['c_id']);
                    if ($children) {
                        $value['children'] = $children;
                    }
                    $menuTree[] = $value;
                    unset($data[$key]);
                }
            }
        }
        return $menuTree;
    }
    public function showSelect($list, $num)
    {
        $num++;
        $html = '';
        foreach ($list as $key => $value) {
            $html .= '<option value=' . $value['c_id'] . '>' . str_repeat('----', $num - 1) . $value['c_name'] . '</option>';
            if (isset($value['children'])) {
                $html .= $this->showSelect($value['children'], $num);
            }
        }
        return $html;
    }

    public function findOne($id)
    {
        return $this->model->where('c_id', $id)->first();
    }

    public function update($attributes = [], $id)
    {
        $result = $this->findOne($id);
        if ($result) {
            $result->update($attributes);
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->findOne($id);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }
}
