@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        $.notify({
        icon: 'add_alert',
        title: "<strong>警告:</strong> ",
        message: "{{$error}}"
        },{
        type: 'danger',
        delay: 5000,
        timer: 100,
        });
    @endforeach
@endif
@if (session('success'))
    $.notify({
    icon: 'add_alert',
    message: "{{session('success')}}"
    },{
    type: 'success',
    placement: {
    from: "top",
    align: "center"
    },
    delay: 5000,
    timer: 100,
    });
@endif
@if (session('warning'))
    $.notify({
    icon: 'add_alert',
    message: "{{session('warning')}}"
    },{
    type: 'warning',
    placement: {
    from: "top",
    align: "center"
    },
    delay: 5000,
    timer: 100,
    });
@endif
@if (session('danger'))
    $.notify({
    icon: 'add_alert',
    message: "{{session('danger')}}"
    },{
    type: 'danger',
    placement: {
    from: "top",
    align: "center"
    },
    delay: 5000,
    timer: 100,
    });
@endif