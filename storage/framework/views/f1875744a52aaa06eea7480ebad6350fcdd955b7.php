<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <?php if($message): ?>
            <div class="mb-5 bg-teal-100 border-t-4 border-teal-500 rounded text-teal-900 px-4 py-3 shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p class="font-bold mt-1"><?php echo e($message); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="float-left">
            <nav class="text-black font-bold my-3" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="<?php echo e(route('dashboard')); ?>">Панель</a>
                    </li>
                </ol>
            </nav>
        </div>
        
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('document.create', ['emitTo' => null])->html();
} elseif ($_instance->childHasBeenRendered('l3127428247-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3127428247-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3127428247-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3127428247-0');
} else {
    $response = \Livewire\Livewire::mount('document.create', ['emitTo' => null]);
    $html = $response->html();
    $_instance->logRenderedChild('l3127428247-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('document.show', ['documents' => null])->html();
} elseif ($_instance->childHasBeenRendered('l3127428247-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3127428247-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3127428247-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3127428247-1');
} else {
    $response = \Livewire\Livewire::mount('document.show', ['documents' => null]);
    $html = $response->html();
    $_instance->logRenderedChild('l3127428247-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>

<?php $__env->startSection('scripts'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.ui.position.js"></script>
<script>
$(function() {
    var arrClasses = [];
    $("div[class*='document-item-']").each(function() { // Select the element divs which has class that starts with some-class-
        var className = this.className.match(/(?<=document-item-).*/); //get a match to match the pattern some-class-somenumber and extract that classname

        if (className) {
            arrClasses.push(className[0]); //if it is the one then push it to array
        }
    });

    arrClasses.forEach(element => {
        $.contextMenu({
            selector: `.document-item-${element}`,
            build: function($triggerElement, e) {
                return {
                    callback: function() {

                    },
                    items: $.contextMenu.fromMenu(`#html5menu-${element}`)
                }
            }
        });
    });
});

let deleteFiles = (id, title, csrfToken) => {
        if (confirm(`${title} dokümanı silinecektir. Onaylıyor musunuz?`)) {
            $.ajax(`http://127.0.0.1:8000/document/${id}/delete`, {
            type: 'GET',
            data: {
                '_token': csrfToken
            },
            success: function(data, status, xhr) {
                console.log('status: ' + status + ', data: ' + data);
                window.location.reload(true);
            },
            error: function(jqXhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage);
            }
        })
        }
    }
</script>
<?php $__env->stopSection(); ?><?php /**PATH C:\collaborative-document-editor-development\server\resources\views/livewire/dashboard.blade.php ENDPATH**/ ?>