<?php

return [

[
function() {
App\Models\ProductCategory::create(['title' => 'Dinos']);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Achatina', 'slug' => 'achatina', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Allosaurus', 'slug' => 'allosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Ammonite', 'slug' => 'ammonite', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Andrewsarchus', 'slug' => 'andrewsarchus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Anglerfish', 'slug' => 'anglerfish', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Ankylosaurus', 'slug' => 'ankylosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Araneo', 'slug' => 'araneo', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Archaeopteryx', 'slug' => 'archaeopteryx', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Argentavis', 'slug' => 'argentavis', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Arthropluera', 'slug' => 'arthropluera', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Astrocetus', 'slug' => 'astrocetus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Astrodelphis', 'slug' => 'astrodelphis', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Baryonyx', 'slug' => 'baryonyx', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Basilisk', 'slug' => 'basilisk', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Basilosaurus', 'slug' => 'basilosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Bloodstalker', 'slug' => 'bloodstalker', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Brontosaurus', 'slug' => 'brontosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Bulbdog', 'slug' => 'bulbdog', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Carbonemys', 'slug' => 'carbonemys', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Carnotaurus', 'slug' => 'carnotaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Castoroides', 'slug' => 'castoroides', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Chalicotherium', 'slug' => 'chalicotherium', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Coelacanth', 'slug' => 'coelacanth', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Compy', 'slug' => 'compy', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Crystal_Wyvern', 'slug' => 'crystal_wyvern', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Daeodon', 'slug' => 'daeodon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Deathworm', 'slug' => 'deathworm', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Deinonychus', 'slug' => 'deinonychus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Dilophosaur', 'slug' => 'dilophosaur', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Dimetrodon', 'slug' => 'dimetrodon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Dimorphodon', 'slug' => 'dimorphodon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Diplocaulus', 'slug' => 'diplocaulus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Diplodocus', 'slug' => 'diplodocus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Direwolf', 'slug' => 'direwolf', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Dire_Bear', 'slug' => 'dire_bear', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Dodo', 'slug' => 'dodo', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Doedicurus', 'slug' => 'doedicurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Dung_Beetle', 'slug' => 'dung_beetle', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Dunkleosteus', 'slug' => 'dunkleosteus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Electrophorus', 'slug' => 'electrophorus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Enforcer', 'slug' => 'enforcer', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Equus', 'slug' => 'equus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Eurypterid', 'slug' => 'eurypterid', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Featherlight', 'slug' => 'featherlight', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Ferox', 'slug' => 'ferox', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Gacha', 'slug' => 'gacha', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Gallimimus', 'slug' => 'gallimimus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Gasbags', 'slug' => 'gasbags', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Giant_Bee', 'slug' => 'giant_bee', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Giant_Queen_Bee', 'slug' => 'giant_queen_bee', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Giganotosaurus', 'slug' => 'giganotosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Gigantopithecus', 'slug' => 'gigantopithecus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Glowbug', 'slug' => 'glowbug', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Glowtail', 'slug' => 'glowtail', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Griffin', 'slug' => 'griffin', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Hesperornis', 'slug' => 'hesperornis', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Hyaenodon', 'slug' => 'hyaenodon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Ice_Golem', 'slug' => 'ice_golem', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Ice_Wyvern', 'slug' => 'ice_wyvern', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Ichthyornis', 'slug' => 'ichthyornis', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Ichthyosaurus', 'slug' => 'ichthyosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Iguanodon', 'slug' => 'iguanodon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Jerboa', 'slug' => 'jerboa', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Jug_Bug', 'slug' => 'jug_bug', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Kairuku', 'slug' => 'kairuku', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Kaprosuchus', 'slug' => 'kaprosuchus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Karkinos', 'slug' => 'karkinos', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Kentrosaurus', 'slug' => 'kentrosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Leedsichthys', 'slug' => 'leedsichthys', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Liopleurodon', 'slug' => 'liopleurodon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Lymantria', 'slug' => 'lymantria', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Lystrosaurus', 'slug' => 'lystrosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Macrophage', 'slug' => 'macrophage', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Maewing', 'slug' => 'maewing', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Magmasaur', 'slug' => 'magmasaur', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Mammoth', 'slug' => 'mammoth', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Managarmr', 'slug' => 'managarmr', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Manta', 'slug' => 'manta', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Mantis', 'slug' => 'mantis', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Megachelon', 'slug' => 'megachelon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Megalania', 'slug' => 'megalania', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Megaloceros', 'slug' => 'megaloceros', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Megalodon', 'slug' => 'megalodon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Megalosaurus', 'slug' => 'megalosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Meganeura', 'slug' => 'meganeura', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Megatherium', 'slug' => 'megatherium', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Mega_Mek', 'slug' => 'mega_mek', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Mek', 'slug' => 'mek', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Mesopithecus', 'slug' => 'mesopithecus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Microraptor', 'slug' => 'microraptor', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Morellatops', 'slug' => 'morellatops', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Mosasaurus', 'slug' => 'mosasaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Moschops', 'slug' => 'moschops', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Nameless', 'slug' => 'nameless', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Noglin', 'slug' => 'noglin', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Onyc', 'slug' => 'onyc', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Otter', 'slug' => 'otter', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Oviraptor', 'slug' => 'oviraptor', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Ovis', 'slug' => 'ovis', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Pachy', 'slug' => 'pachy', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Pachyrhinosaurus', 'slug' => 'pachyrhinosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Paraceratherium', 'slug' => 'paraceratherium', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Parasaur', 'slug' => 'parasaur', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Pegomastax', 'slug' => 'pegomastax', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Pelagornis', 'slug' => 'pelagornis', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Phiomia', 'slug' => 'phiomia', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Phoenix', 'slug' => 'phoenix', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Piranha', 'slug' => 'piranha', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Plesiosaur', 'slug' => 'plesiosaur', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Procoptodon', 'slug' => 'procoptodon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Pteranodon', 'slug' => 'pteranodon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Pulmonoscorpius', 'slug' => 'pulmonoscorpius', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Purlovia', 'slug' => 'purlovia', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Quetzal', 'slug' => 'quetzal', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Raptor', 'slug' => 'raptor', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Ravager', 'slug' => 'ravager', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Reaper', 'slug' => 'reaper', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Rex', 'slug' => 'rex', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Rock_Drake', 'slug' => 'rock_drake', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Rock_Elemental', 'slug' => 'rock_elemental', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Roll_Rat', 'slug' => 'roll_rat', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Sabertooth', 'slug' => 'sabertooth', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Sabertooth_Salmon', 'slug' => 'sabertooth_salmon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Sarco', 'slug' => 'sarco', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Scout', 'slug' => 'scout', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Seeker', 'slug' => 'seeker', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Shadowmane', 'slug' => 'shadowmane', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Shinehorn', 'slug' => 'shinehorn', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Snow_Owl', 'slug' => 'snow_owl', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Spino', 'slug' => 'spino', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Stegosaurus', 'slug' => 'stegosaurus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Summoner', 'slug' => 'summoner', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Tapejara', 'slug' => 'tapejara', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Tek_Stryder', 'slug' => 'tek_stryder', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Terror_Bird', 'slug' => 'terror_bird', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Therizinosaur', 'slug' => 'therizinosaur', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Thorny_Dragon', 'slug' => 'thorny_dragon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Thylacoleo', 'slug' => 'thylacoleo', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Titanoboa', 'slug' => 'titanoboa', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Titanomyrma', 'slug' => 'titanomyrma', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Titanosaur', 'slug' => 'titanosaur', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Triceratops', 'slug' => 'triceratops', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Troodon', 'slug' => 'troodon', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Tropeognathus', 'slug' => 'tropeognathus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Tusoteuthis', 'slug' => 'tusoteuthis', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Velonasaur', 'slug' => 'velonasaur', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field3 = \App\Models\ProductField::find(4);
$product->fields()->attach($field3, ['config' => $field3->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Vulture', 'slug' => 'vulture', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Woolly_Rhino', 'slug' => 'woolly_rhino', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Wyvern', 'slug' => 'wyvern', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field2 = \App\Models\ProductField::find(3);
$product->fields()->attach($field2, ['config' => $field2->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
[
function() {
$product = \App\Models\Product::create(['name' => 'Yutyrannus', 'slug' => 'yutyrannus', 'price' => 5000, 'category_id' => 1, 'published_at' => now()]);
$field0 = \App\Models\ProductField::find(1);
$product->fields()->attach($field0, ['config' => $field0->options->pluck('id')->all()]);
$field1 = \App\Models\ProductField::find(2);
$product->fields()->attach($field1, ['config' => $field1->options->pluck('id')->all()]);
$field4 = \App\Models\ProductField::find(5);
$product->fields()->attach($field4, ['config' => $field4->options->pluck('id')->all()]);
$field5 = \App\Models\ProductField::find(6);
$product->fields()->attach($field5, ['config' => $field5->options->pluck('id')->all()]);
}
],
];
