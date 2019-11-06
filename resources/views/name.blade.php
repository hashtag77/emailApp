@component('mail::message')

@php
$user_template = str_replace('{first_name}',$first_name,$user_template);
$user_template = str_replace('{last_name}',$last_name,$user_template);
$user_template = str_replace('{email}',$email,$user_template);
$user_template = str_replace('{phone}',$phone,$user_template);
$user_template = str_replace('{address}',$address,$user_template);
$user_template = str_replace('{city}',$city,$user_template);
$user_template = str_replace('{state}',$state,$user_template);
$user_template = str_replace('{country}',$country,$user_template);
$user_template = str_replace('{template_name}',$template_name,$user_template);
@endphp

@if (! empty($user_template))
{!!$user_template!!} <br>
@endif
@endcomponent
