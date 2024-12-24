@php
    use Illuminate\Support\Number;

    $record = $getRecord();
@endphp

<div class="text-sm">
    <div>{{  Number::currency($record->amount) }}</div>
</div>
