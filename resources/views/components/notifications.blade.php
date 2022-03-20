<x-wire-notifications />
@if($toasts = session()->pull("wireui.notify", []))
    <script>
        Wireui.hook('notifications:load', () => {
            setTimeout(function (){
                @foreach($toasts AS $toast) window.$wireui.notify({!! json_encode($toast) !!}); @endforeach
            }, 200);
        })
    </script>
@endif
