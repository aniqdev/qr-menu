@extends('layouts.back')

@section('content')
<div class="shadow-block col-sm-4">
	<div id="myForm"></div>
</div>
<script src="/js/bs-jsonform.js"></script>
<script>
var formData = {
    hide_validation: false,
    button_orientation: "left",
    fields: [
        {
            id: "name",
            name: "What is your name?",
            type: "field",
            field: {
                type: "text",
                placeholder: "Name",
                default_value: "Bob Smith"
            }
        },
        {
            id: "color",
            name: "What is your favorite color?",
            type: "field",
            field: {
                type: "color",
                placeholder: "Color"
            }
        },
        {
            id: "canttouchthis",
            name: "You can't touch this",
            type: "field",
            field: {
                type: "text",
                readonly: true,
                placeholder: "I'm a placeholder"
            }
        },
        {
            id: "notcheckedanddisabled",
            name: "Can't check me",
            type: "field",
            field: {
                type: "checkbox",
                readonly: true,
            }
        },
        {
            id: "checked",
            name: "Uncheck me",
            type: "field",
            field: {
                type: "checkbox",
                default_value: "true",
            }
        },
        {
            id: "abcradio",
            name: "A, B, or C?",
            type: "field",
            field: {
                type: "radio",
                // default_value: "Option B",
                options: ["Option A", "Option B", "Option C"]
            }
        },
        {
            id: "switchon",
            name: "Switch that is on by default",
            type: "field",
            field: {
                type: "switch",
                default_value: "true",
            }
        },
        {
            id: "select",
            name: "Pick a direction",
            type: "field",
            field: {
                type: "select",
                default_value: "Top",
                options: ["Left", "Right", "Top", "Bottom"]
            }
        },
    ]
}

var jsonForm = new JsonForm()
window.jsonForm.create("#myForm", formData,"MyForm");

window.jsonForm.registerSubmit(Form1Handler, "MyForm")

function Form1Handler(valid, data) {
    log(valid, data)
    valid || toastr.error('Fill all fields')
}
</script>

@endsection