<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class CitiesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'cities');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'cities',
                'display_name_singular' => __('voyager.data_types.city.singular'),
                'display_name_plural'   => __('voyager.data_types.city.plural'),
                'icon'                  => 'voyager-cities',
                'model_name'            => City::class,
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
        //Data Rows
        $cityDataType = DataType::where('slug', 'cities')->firstOrFail();
        $dataRow = $this->dataRow($cityDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($cityDataType, 'cod');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager.data_rows.cod'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($cityDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 3,
                'order' => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($cityDataType, 'slug');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.slug'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'slugify' => [
                        'origin' => 'name',
                    ],
                ],
                'order' => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($cityDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($cityDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 6,
            ])->save();
        }

        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager.menu_items.cities'),
            'url'     => '',
            'route'   => 'voyager.cities.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-cities',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 12,
            ])->save();
        }

        //Permissions
        Permission::generateFor('cities');

        //Content
        $city = City::firstOrNew([
            'slug' => 'city-1',
        ]);
        if (!$city->exists) {
            $city->fill([
                'cod'  => 'abc',
                'name' => 'City 1',
            ])->save();
        }

        $city = City::firstOrNew([
            'slug' => 'city-2',
        ]);
        if (!$city->exists) {
            $city->fill([
                'cod'  => 'xyz',
                'name' => 'City 2',
            ])->save();
        }
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
