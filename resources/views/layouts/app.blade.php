@php($user = auth()->user())
@if($user->isAdminPanelAccount())
    @include("layouts.admin-layout")
@else
    @include("layouts.customer-layout")
@endif
