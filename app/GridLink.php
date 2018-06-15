<?php
namespace App;
use Nayjest\Grids\Components\Tr;
class GridLink extends Tr
{
    public function getAttributes()
    {
        // Get value of 'user_id' column from current row
        $userId = $this->getDataRow()->getCellValue('id');
        // Prepare your attributes
        $newAttributes = [
             'data-href' => route('admin.userdetail', [$userId]),
             'class' => 'my-class table-row',
        ];
        return array_merge(parent::getAttributes(), $newAttributes);
    }

    public function getTagName() { return 'tr'; }
}