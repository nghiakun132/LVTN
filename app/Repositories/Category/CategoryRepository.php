<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;

class CategoryRepository extends BaseRepository implements RepositoryInterface
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
}