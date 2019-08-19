
@extends('layout')

@section('title', 'edit project')

@section('content')


    <div class="column is-full">
        <h1 class="title">Project aanpassen</h1>
    </div>

    <!-- Notificatie laten zien -->
    <!-- @todo: vervangen door een Noty notificatie :-) -->
    @if(Session::has('notification'))
        <div class="notification is-{{ Session::get('notification') }}">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="column is-full">
        <form class="project_form" action="/projects/{{ $project->id }}" method="post" enctype="multipart/form-data">

            {{ method_field('PATCH') }}

            @csrf


            <input type="hidden" id="amountOfImages" name="amountOfImages" value="{{ old('amountOfImages', 1) }}">

            <input type="hidden" id="amountOfPerks" name="amountOfPerks" value="{{ old('amountOfPerks', 1) }}">

            @if(count($errors) > 0)

                <div class="notification is-danger">
                    @lang('messages.somethingwentwrong')
                    <ul>
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>

            @endif

            <h2 class="title is-5">
                Titel voor het project:
            </h2>
            <div class="field">
                <div class="control">
                    <input class="input is-expanded" type="text" name="project_name" placeholder="Mijn waanzinnig project" value="{{ $project->project_name }}">
                </div>
            </div>

            <h2 class="title is-5">
                Doel bedrag:
            </h2>
            <div class="field">
                <div class="control">
                        <input class="input" name="goal" type="number" placeholder='1000' value="{{ $project->goal }}">
                </div>
            </div>


            <h2 class="title is-5">
                Eind datum:
            </h2>
            <div class="field">
                <div class="control">
                        <input class="input" name="final_date" type="date" value="{{ $project->final_date }}">
                </div>
            </div>

            <h2 class="title is-5">
                Categorie:
            </h2>
            <div class="field">
                <div class="control">
                    <select name="project_category">
                        <option value="" disabled selected>Kies een categorie</option>
                        @foreach ( $categories as $category)
                            <option value="{{ $category->id }}"
                                    @if ($category->id == $project->category )
                                        selected="selected"
                                    @endif
                                >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <h2 class="title is-5">
                Korte omschrijving over het project:
            </h2>
            <div class="field">
                <div class="control">
                    <input class="input" type="textfield" name="project_intro" placeholder="Mijn korte uitleg over mijn project" value="{{ $project->project_intro }}">
                </div>
            </div>

            <h2 class="title is-5">
                Uitgebreide uitleg over het project:
            </h2>
            <div class="field">
                <div class="control">
                    <textarea class="input" name="project_description" id='project_description' placeholder="Mijn uitgebreide epische uitleg over mijn project" value="{{ $project->description }}"></textarea>
                </div>
            </div>

            <table id="imageUploadTable" class="table is-striped">
                <tbody>
                    <tr id="first">
                        <td>
                            <input type="file" name="file[]" accept="image/png, image/jpeg, image/jpg, image/gif">
                        </td>
                        <td>
                            <div class="control">
                                <button type="button" class="button is-success add-image"><i class="fas fa-plus"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div id="perkUploadTable">
                <div class="box box-reward perk first-perk">
                    <h2 class="title is-5">
                        Titel voor deze reward:
                    </h2>
                    <div class="control">
                        <input  class="input" type="text" name="perk_title[]" placeholder="Titel van deze perk">
                    </div>
                    <h2 class="title is-5">
                        Prijs voor deze reward
                    </h2>
                    <div class="control">
                        <input  class="input" type="number" name="perk_price[]" placeholder="100">
                    </div>
                    <h2 class="title is-5">
                        Wat zit er in deze reward
                    </h2>
                    <div class="control">
                        <textarea class="input" name="perk_description[]" placeholder="Wat zit er in deze perk"></textarea>
                    </div>
                </div>
            </div>
            <div class="control">
                <button type="button" class="button is-success add-perk"><i class="fas fa-plus"></i>Reward toevoegen</button>
            </div>




            <table style="display: none;">
                <tbody id="clone-image">
                    <tr>
                        <td>
                            <input type="file" name="file[]">
                        </td>
                        <td>
                            <div class="control">
                                <button type="button" class="button is-danger remove-image"><i class="fas fa-minus"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div style="display: none;">
                <div id="clone-perk">
                    <div class="box box-reward perk">
                        <h2 class="title is-5">
                            Titel voor deze reward:
                        </h2>
                        <div class="control">
                            <input  class="input" type="text" name="perk_title[]" placeholder="Titel van deze perk">
                        </div>
                        <h2 class="title is-5">
                            Prijs voor deze reward
                        </h2>
                        <div class="control">
                            <input  class="input" type="number" name="perk_price[]" placeholder="100">
                        </div>
                        <h2 class="title is-5">
                            Wat zit er in deze reward
                        </h2>
                        <div class="control">
                            <textarea class="input" name="perk_description[]" placeholder="Wat zit er in deze perk"></textarea>
                        </div>
                        <div class="control">
                            <button type="button" class="button is-danger remove-perk">Deze reward verwijderen</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="control">
                <button type="submit" class="button is-primary">
                    @lang('labels.update')
                </button>
            </div>
        </form>

    {{--  <div class="columns">

    @foreach($images as $image)
    <div class="column is-one-quarter">
        <img src="{{ asset($image->filepath . '/' . $image->filename) }}" alt="{{ $image->title }}" style="width: 100%;">
    </div>
    @endforeach


    </div> --}}
    </div>



<script type="text/javascript">

    CKEDITOR.replace( 'project_description' );

    let inhoud = '{{ $project->project_description }}';

    let inhoud2 = inhoud.replace(/&lt;/g, '<');
    let inhoud3 = inhoud2.replace(/&gt;/g, '>');

    console.log(inhoud3);
    CKEDITOR.instances.project_description.setData(inhoud3);

    let amountOfImages = 1;
    let amountOfPerks = 1;
    $(document).ready(function() {
        setAmountOfImages();
        $(".button.is-success.add-image").click(function(){
            addImageRow();
            updateAmountOfImages();
        });
        $("body").on("click",".button.is-danger.remove-image",function(){
            $(this).parents("tr").remove();
            updateAmountOfImages();
        });
        function addImageRow() {
            var html = $("#clone-image").html();
            $("#imageUploadTable tr:last-of-type").after(html);
        }
        function setAmountOfImages() {
            let amountOfRows = $('#amountOfImages').val();
            for(i=1;i<amountOfRows;i++) {
                addImageRow();
            }
        }
        function updateAmountOfImages() {
            let amountOfRows = $('#imageUploadTable tr').length;
            $('#amountOfImages').val(amountOfRows);
        }



        setAmountOfPerks();
        $(".button.is-success.add-perk").click(function(){
            console.log("test");
            addPerkRow();
            updateAmountOfPerks();
        });
        $("body").on("click",".button.is-danger.remove-perk",function(){
            $(this).parents("div.perk").remove();
            updateAmountOfPerks();
        });
        function addPerkRow() {
            console.log("test3");
            var html = $("#clone-perk").html();
            $("#perkUploadTable div.perk:last-of-type").after(html);
        }
        function setAmountOfPerks() {
            let amountOfRows = $('#amountOfPerks').val();
            for(i=1;i<amountOfRows;i++) {
                addPerkRow();
            }
        }
        function updateAmountOfPerks() {
            let amountOfRows = $('#perkUploadTable div.perk').length;
            $('#amountOfPerks').val(amountOfRows);
        }
    });
</script>


@endsection
