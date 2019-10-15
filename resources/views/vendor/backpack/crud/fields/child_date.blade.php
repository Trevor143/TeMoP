<?php
// if the column has been cast to Carbon or Date (using attribute casting)
// get the value as a date string
if (isset($field['value']) && ($field['value'] instanceof \Carbon\CarbonInterface)) {
    $field['value'] = $field['value']->toDateString();
}
?>

<div @include('crud::inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
    @include('crud::inc.field_translatable_icon')
    <input
        type="date"
        ng-model="item.{{ $field['name'] }}"
        name="{{ $field['name'] }}"
        value="{{ old(square_brackets_to_dots($field['name'])) ?? $field['value'] ?? $field['default'] ?? '' }}"
        @include('crud::inc.field_attributes')
    >

    {{-- HINT --}}
    @if (isset($field['hint']))
{{--        <p class="help-block">{!! $field['hint'] !!}</p>--}}
    @endif
</div>


@if (!$crud->child_resource_included['date'])

    @push('crud_fields_styles')
        <style>
            .table input[type='date'] { text-align: right; padding-right: 5px; }
        </style>
    @endpush

    <?php $crud->child_resource_included['date'] = true; ?>
@endif


<!-- html5 date input -->

{{--<div @include('crud::inc.field_wrapper_attributes') >--}}
{{--    @include('crud::inc.field_translatable_icon')--}}
{{--    @if(isset($field['prefix']) || isset($field['suffix'])) <div class="input-group"> @endif--}}
{{--        @if(isset($field['prefix'])) <div class="input-group-addon">{!! $field['prefix'] !!}</div> @endif--}}
{{--        <input--}}
{{--        type="date_picker"--}}
{{--        ng-model="item.{{ $field['name'] }}"--}}
{{--        @include('crud::inc.field_attributes')--}}
{{--    >--}}
{{--        @if(isset($field['suffix'])) <div class="input-group-addon">{!! $field['suffix'] !!}</div> @endif--}}

{{--        @if(isset($field['prefix']) || isset($field['suffix'])) </div> @endif--}}
{{--     HINT--}}
{{--    @if (isset($field['hint']))--}}
{{--        <p class="help-block">{!! $field['hint'] !!}</p>--}}
{{--    @endif--}}
{{--</div>--}}

{{--@if (!$crud->child_resource_included['number'])--}}

{{--    @push('crud_fields_styles')--}}
{{--        <style>--}}
{{--            .table input[type='number'] { text-align: right; padding-right: 5px; }--}}
{{--        </style>--}}
{{--    @endpush--}}

{{--    <?php $crud->child_resource_included['number'] = true; ?>--}}
{{--@endif--}}
