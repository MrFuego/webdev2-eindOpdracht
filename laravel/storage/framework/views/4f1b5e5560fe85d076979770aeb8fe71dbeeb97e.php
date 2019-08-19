<?php $__env->startSection('title', 'add project'); ?>

<?php $__env->startSection('content'); ?>


    <div class="column is-full">
        <h1 class="title">Project uploader</h1>
    </div>

    <!-- Notificatie laten zien -->
    <!-- @todo: vervangen door een Noty notificatie :-) -->
    <?php if(Session::has('notification')): ?>
        <div class="notification is-<?php echo e(Session::get('notification')); ?>">
            <?php echo e(Session::get('message')); ?>

        </div>
    <?php endif; ?>
    <div class="column is-full">
        <form class="project_form" action="<?php echo e(route('project.upload')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>


            <input type="hidden" id="amountOfImages" name="amountOfImages" value="<?php echo e(old('amountOfImages', 1)); ?>">

            <input type="hidden" id="amountOfPerks" name="amountOfPerks" value="<?php echo e(old('amountOfPerks', 1)); ?>">

            <?php if(count($errors) > 0): ?>

                <div class="notification is-danger">
                    <?php echo app('translator')->getFromJson('messages.somethingwentwrong'); ?>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

            <?php endif; ?>

            <h2 class="title is-5">
                Titel voor het project:
            </h2>
            <div class="field">
                <div class="control">
                    <input class="input is-expanded" type="text" name="project_name" placeholder="Mijn waanzinnig project">
                </div>
            </div>

            <h2 class="title is-5">
                Doel bedrag:
            </h2>
            <div class="field">
                <div class="control">
                        <input class="input" name="goal" type="number" placeholder='1000'>
                </div>
            </div>


            <h2 class="title is-5">
                Eind datum:
            </h2>
            <div class="field">
                <div class="control">
                        <input class="input" name="final_date" type="date">
                </div>
            </div>

            <h2 class="title is-5">
                Categorie:
            </h2>
            <div class="field">
                <div class="control">
                    <select name="project_category">
                        <option value="" disabled selected>Kies een categorie</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <h2 class="title is-5">
                Korte omschrijving over het project:
            </h2>
            <div class="field">
                <div class="control">
                    <input class="input" type="textfield" name="project_intro" placeholder="Mijn korte uitleg over mijn project">
                </div>
            </div>

            <h2 class="title is-5">
                Uitgebreide uitleg over het project:
            </h2>
            <div class="field">
                <div class="control">
                    <textarea class="input" name="project_description" placeholder="Mijn uitgebreide epische uitleg over mijn project"></textarea>
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
                    <?php echo app('translator')->getFromJson('labels.send'); ?>
                </button>
            </div>
        </form>

    
    </div>

<script type="text/javascript">

    CKEDITOR.replace( 'project_description' );

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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/uploader/index.blade.php ENDPATH**/ ?>