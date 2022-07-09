$field = \App\Models\ProductField::create(['name' => 'Region-0', 'in_table' => true]);
$option = \App\Models\ProductFieldOption::create(['name' => 'Albino', 'value' => '#FFFFFF', 'additional_price' => 0]);
$field->options()->attach($option);