@component('mail::message')
# {{$tender->name}} tender has been updated

This tender has been updated and some details might have changed
<ul>
    <li>Tender Name : <br>
        Old Name:
        <strong>{{$tender->name}}</strong><br>
        New Name:
        <strong>{{$request->name}}</strong>
    </li>
    <li>Deadline for bid submission <br>
        Old deadline:
        <strong>{{$tender->deadline->isoFormat('dddd D MMMM Y')}}</strong><br>
        New Deadline:
        <strong>{{$request->deadline}}</strong>
    </li>
</ul>

@if($request->status =='DRAFT')
    This tender is no longer avaliable for public viewing.
@endif

{{--<strong>{{$tender->requiredDocs}}</strong>--}}
{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
