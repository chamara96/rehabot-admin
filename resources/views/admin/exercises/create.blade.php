@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Add Exercise
        </div>

        <div class="card-body">
            <form action="{{ route('admin.exercises.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name*</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name', isset($exercise) ? $exercise->name : '') }}" required>
                    @if ($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                </div>

                <div class="form-group">
                    <p>
                        <label id="s_text" for="shoulder">Shoulder: </label>
                        <input type="hidden" name="s_min" id="shoulder_min" readonly>
                        <input type="hidden" name="s_max" id="shoulder_max" readonly>
                    </p>

                    <div id="slider-shoulder"></div>
                </div>

                <br>

                <div class="form-group">
                    <p>
                        <label id="e_text" for="shoulder">Elbow: </label>
                        <input type="hidden" name="e_min" id="elbow_min" readonly>
                        <input type="hidden" name="e_max" id="elbow_max" readonly>
                    </p>

                    <div id="slider-elbow"></div>
                </div>

                <br>

                <div>
                    <input class="btn btn-danger" type="submit" value="Add">
                </div>
            </form>


        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/flick/jquery-ui.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-ui-Slider-Pips/1.11.1/jquery-ui-slider-pips.css" />
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-ui-Slider-Pips/1.11.1/jquery-ui-slider-pips.min.js"></script>

    <script>
        $(function() {
            $("#slider-shoulder").slider({
                    range: true,
                    min: 0,
                    max: 90,
                    values: [15, 75],
                    step: 1,
                    slide: function(event, ui) {
                        $("#shoulder_max").val(ui.values[1]);
                        $("#shoulder_min").val(ui.values[0]);
                        $("#s_text").text("Shoulder (Min:" + ui.values[0] + "°  Max:" + ui.values[1] +
                            "°)");
                    }
                })
                .slider("pips", {
                    rest: "label",
                    step: 5,
                    suffix: "°"
                });

            $("#slider-elbow").slider({
                    range: true,
                    min: 0,
                    max: 90,
                    values: [15, 75],
                    step: 1,
                    slide: function(event, ui) {
                        $("#elbow_max").val(ui.values[1]);
                        $("#elbow_min").val(ui.values[0]);
                        $("#e_text").text("Elbow (Min:" + ui.values[0] + "°  Max:" + ui.values[1] +
                            "°)");
                    }
                })
                .slider("pips", {
                    rest: "label",
                    step: 5,
                    suffix: "°"
                });

            $("#s_text").text("Shoulder (Min:" + $("#slider-shoulder").slider("values", 0) + "°  Max:" + $(
                "#slider-shoulder").slider("values", 1) + "°)");

            $("#e_text").text("Elbow (Min:" + $("#slider-elbow").slider("values", 0) + "°  Max:" + $(
                "#slider-elbow").slider("values", 1) + "°)");
        });

    </script>
@endsection
