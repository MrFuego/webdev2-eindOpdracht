
@extends('layout')

@section('title', 'add project')

@section('content')



<div class="container">

    <div class="columns is-desktop">
        <div class="column">
            <h1 class="title">Project uploader</h1>
        </div>
    </div>

    <!-- Notificatie laten zien -->
    <!-- @todo: vervangen door een Noty notificatie :-) -->
    @if(Session::has('notification'))
        <div class="notification is-{{ Session::get('notification') }}">
            {{ Session::get('message') }}
        </div>
    @endif


    <div class="columns is-desktop">
        <div class="column">
            <form action="{{route('projectUpload')}}" method="post" enctype="multipart/form-data">

                @csrf

                <input type="hidden" id="amountOfImages" name="amountOfImages" value="{{ old('amountOfImages', 1) }}">

                <div class="field">
                    <div class="control">
                        <input class="input" type="text" name="project_name" placeholder="Mijn waanzinnig project">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input class="input" type="textfield" name="project_description" placeholder="Mijn epische uitleg over mijn project">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                            <input class="input" name="final_date" type="date">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                            <input class="input" name="goal" type="number" placeholder='1000'>
                    </div>
                </div>

                <table id="imageUploadTable" class="table is-striped">
                    <tbody>
                        <tr id="first">
                            <td>
                                <input type="file" name="file[]">
                            </td>
                            <td>
                                <div class="control">
                                    <button type="button" class="button is-success"><i class="fas fa-plus"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="display: none;">
                    <tbody id="clone">
                        <tr>
                            <td>
                                <input type="file" name="file[]">
                            </td>
                            <td>
                                <div class="control">
                                    <button type="button" class="button is-danger"><i class="fas fa-minus"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="control">
                    <button type="submit" class="button is-primary">
                        @lang('labels.send')
                    </button>
                </div>
            </form>
            @if(count($errors) > 0)
            <div class="notification is-danger">
                @lang('messages.somethingwentwrong')
                <ul>
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>

            @endif
        </div>
    </div>

    <div class="columns">

    {{-- @foreach($images as $image)
    <div class="column is-one-quarter">
        <img src="{{ asset($image->filepath . '/' . $image->filename) }}" alt="{{ $image->title }}" style="width: 100%;">
    </div>
    @endforeach --}}


    </div>
</div>

<script type="text/javascript">
    let amountOfImages = 1;
    $(document).ready(function() {
        setAmountOfImages();
        $(".button.is-success").click(function(){
            addRow();
            updateAmountOfImages();
        });
        $("body").on("click",".button.is-danger",function(){
            $(this).parents("tr").remove();
            updateAmountOfImages();
        });
        function addRow() {
            var html = $("#clone").html();
            $("#imageUploadTable tr:last-of-type").after(html);
        }
        function setAmountOfImages() {
            let amountOfRows = $('#amountOfImages').val();
            for(i=1;i<amountOfRows;i++) {
                addRow();
            }
        }
        function updateAmountOfImages() {
            let amountOfRows = $('#imageUploadTable tr').length;
            $('#amountOfImages').val(amountOfRows);
        }
    });
</script>


@endsection
